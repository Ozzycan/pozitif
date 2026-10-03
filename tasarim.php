<?php 
require_once 'includes/db.php'; 

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

include 'includes/header.php'; 

if (!$pdo) {
    echo '<div class="container" style="padding: 100px 0; text-align: center;">';
    echo '<i class="fas fa-plug" style="font-size: 3rem; color: #ccc; margin-bottom: 20px;"></i>';
    echo '<h2 style="color: var(--dark);">Stüdyo Çevrimdışı</h2>';
    echo '<p style="color: var(--text-muted); font-size: 1.1rem;">Veritabanı bağlantısı kurulamadığı için tasarımlarınızı kaydedemezsiniz. Geliştirici ekibimiz konu üzerinde çalışıyor.</p>';
    echo '<a href="index.php" class="cta-button" style="margin-top: 30px; display: inline-block;">Anasayfaya Dön</a>';
    echo '</div>';
    include 'includes/footer.php';
    exit;
}
?>

<!-- Canva Style Workspace CSS -->
<style>
    /* Resetting some global layout rules for the workspace */
    body { overflow: hidden; } /* Stop body scrolling */
    header { border-bottom: 1px solid #e2e8f0; padding: 10px 0 !important; }
    footer { display: none; } /* Hide footer on workspace to maximize area */

    .studio-wrapper {
        display: flex;
        height: calc(100vh - 70px);
        background: #F1F5F9;
        font-family: 'Outfit', sans-serif;
    }

    /* 1. Left Sidebar (Dark narrow menu) */
    .studio-sidebar {
        width: 80px;
        background: #0F172A;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding-top: 15px;
        z-index: 20;
        flex-shrink: 0;
    }
    .sb-btn {
        background: transparent;
        border: none;
        color: #94A3B8;
        width: 65px;
        height: 65px;
        border-radius: 12px;
        cursor: pointer;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        margin-bottom: 5px;
        transition: all 0.2s;
    }
    .sb-btn i { font-size: 1.3rem; margin-bottom: 5px; }
    .sb-btn span { font-size: 0.65rem; font-weight: 600; }
    
    .sb-btn:hover { color: #fff; }
    .sb-btn.active { background: #1E293B; color: #fff; }

    .sb-btn.magic-btn { color: #A855F7; }
    .sb-btn.magic-btn:hover, .sb-btn.magic-btn.active { background: #3B0764; color: #D8B4FE; }

    /* 2. Inner Panel */
    .studio-panel-container {
        width: 320px;
        background: #fff;
        border-right: 1px solid #E2E8F0;
        z-index: 10;
        flex-shrink: 0;
        display: flex;
        flex-direction: column;
    }
    .studio-panel {
        display: none;
        flex-direction: column;
        height: 100%;
        overflow-y: auto;
    }
    .studio-panel.active { display: flex; }
    
    .panel-header {
        padding: 20px;
        font-size: 1.1rem;
        font-weight: 700;
        color: #0F172A;
        border-bottom: 1px solid #F1F5F9;
    }
    .panel-content { padding: 20px; }

    /* 3. Main Area */
    .studio-main {
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        position: relative;
    }

    /* Top Action Bar */
    .studio-topbar {
        height: 60px;
        background: #fff;
        border-bottom: 1px solid #E2E8F0;
        display: flex;
        align-items: center;
        padding: 0 20px;
        justify-content: space-between;
        z-index: 5;
    }
    .topbar-tools {
        display: flex;
        align-items: center;
        gap: 15px;
        opacity: 0; /* Hidden unless object selected */
        pointer-events: none;
        transition: opacity 0.2s;
    }
    .topbar-tools.active {
        opacity: 1; pointer-events: auto;
    }

    .tool-btn {
        background: transparent; border: 1px solid #E2E8F0; padding: 8px 12px; border-radius: 6px; cursor: pointer; color: #334155; font-weight: 600; display: flex; align-items: center; gap: 6px;
    }
    .tool-btn:hover { background: #F1F5F9; }
    .tool-select { border: 1px solid #E2E8F0; padding: 8px; border-radius: 6px; outline: none; }

    /* Canvas Wrapper */
    .canvas-stage {
        flex-grow: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: auto;
        padding: 40px;
        position: relative;
    }
    .canvas-box {
        background: #fff;
        box-shadow: 0 10px 40px rgba(15, 23, 42, 0.15);
        border-radius: 2px;
    }

    /* Audio Player UIOverlay */
    #audio-overlay {
        position: absolute;
        bottom: 30px;
        left: 30px;
        background: rgba(15, 23, 42, 0.8);
        color: white;
        padding: 10px 20px;
        border-radius: 50px;
        display: none;
        align-items: center;
        gap: 15px;
        backdrop-filter: blur(5px);
        z-index: 50;
        font-size: 0.8rem;
    }

    /* Components UI Box */
    .grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 10px;}
    .grid-3 { display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 10px;}
    
    .comp-btn {
        border: 1px solid #E2E8F0; background:#F8FAFC; padding: 15px 0; border-radius: 8px; cursor: pointer; text-align: center; color: #334155; transition: 0.2s;
    }
    .comp-btn:hover { background: #E2E8F0; transform: translateY(-2px); }
    .comp-btn i { font-size: 1.5rem; margin-bottom: 5px; display: block;}

    .bg-btn { height: 60px; border-radius: 8px; cursor: pointer; border: 1px solid #E2E8F0; }

    .magic-input { width: 100%; padding: 12px; border-radius: 8px; border: 1px solid #E2E8F0; margin-bottom: 15px; outline: none; }
    .magic-btn { width: 100%; background: linear-gradient(45deg, #A855F7, #EC4899); color: white; border: none; padding: 12px; border-radius: 8px; font-weight: 700; cursor: pointer;}
</style>

<div class="studio-wrapper">
    
    <!-- 1. LEFT SIDEBAR -->
    <div class="studio-sidebar">
        <button class="sb-btn active" onclick="openTab('tab-bilesenler', this)"><i class="fas fa-shapes"></i><span>Bileşenler</span></button>
        <button class="sb-btn" onclick="openTab('tab-metin', this)"><i class="fas fa-font"></i><span>Metin</span></button>
        <button class="sb-btn" onclick="openTab('tab-arkaplan', this)"><i class="fas fa-image"></i><span>Arkaplan</span></button>
        <button class="sb-btn" onclick="openTab('tab-medya', this)"><i class="fas fa-photo-video"></i><span>Görsel/Ses</span></button>
        <button class="sb-btn magic-btn" onclick="openTab('tab-sihirli', this)"><i class="fas fa-magic"></i><span>Sihirli AI</span></button>
    </div>

    <!-- 2. INNER PANEL -->
    <div class="studio-panel-container">
        
        <!-- BILESENLER TAB -->
        <div id="tab-bilesenler" class="studio-panel active">
            <div class="panel-header">Bileşenler & Şekiller</div>
            <div class="panel-content">
                <p style="font-size:0.8rem; color:#64748B; margin-bottom: 10px;">Temel Formlar</p>
                <div class="grid-3" style="margin-bottom: 25px;">
                    <div class="comp-btn" onclick="addShape('rect')"><i class="far fa-square"></i>Kare</div>
                    <div class="comp-btn" onclick="addShape('circle')"><i class="far fa-circle"></i>Daire</div>
                    <div class="comp-btn" onclick="addShape('triangle')"><i class="fas fa-caret-up"></i>Üçgen</div>
                    <div class="comp-btn" onclick="addShape('line')" style="grid-column: 1 / -1; padding: 10px 0;"><i class="fas fa-minus"></i>Ayırıcı Çizgi</div>
                </div>

                <p style="font-size:0.8rem; color:#64748B; margin-bottom: 10px;">İkonlar (Pro)</p>
                <div class="grid-3">
                    <div class="comp-btn" onclick="addIcon('⭐', '#F59E0B')"><span style="font-size:1.5rem;">⭐</span></div>
                    <div class="comp-btn" onclick="addIcon('❤️', '#EF4444')"><span style="font-size:1.5rem;">❤️</span></div>
                    <div class="comp-btn" onclick="addIcon('🔥', '#F97316')"><span style="font-size:1.5rem;">🔥</span></div>
                    <div class="comp-btn" onclick="addIcon('✓', '#22C55E')"><span style="font-size:1.5rem;">✓</span></div>
                    <div class="comp-btn" onclick="addIcon('×', '#EF4444')"><span style="font-size:1.5rem;">×</span></div>
                    <div class="comp-btn" onclick="addIcon('💬', '#3B82F6')"><span style="font-size:1.5rem;">💬</span></div>
                </div>
            </div>
        </div>

        <!-- METIN TAB -->
        <div id="tab-metin" class="studio-panel">
            <div class="panel-header">Metin Ekle</div>
            <div class="panel-content">
                <button onclick="addText('heading')" style="width:100%; padding: 20px; background:#F8FAFC; border:1px solid #E2E8F0; border-radius:8px; font-weight:700; font-size:1.4rem; cursor:pointer; margin-bottom:10px; color:#1E293B;">Bir Başlık Ekleyin</button>
                <button onclick="addText('subheading')" style="width:100%; padding: 15px; background:#F8FAFC; border:1px solid #E2E8F0; border-radius:8px; font-weight:600; font-size:1.1rem; cursor:pointer; margin-bottom:10px; color:#334155;">Bir Alt Başlık Ekleyin</button>
                <button onclick="addText('body')" style="width:100%; padding: 10px; background:#F8FAFC; border:1px solid #E2E8F0; border-radius:8px; font-size:0.9rem; cursor:pointer; color:#64748B;">Gövde metni eklemek için tıklayın...</button>
            </div>
        </div>

        <!-- ARKAPLAN TAB -->
        <div id="tab-arkaplan" class="studio-panel">
            <div class="panel-header">Sayfa Arka Planı</div>
            <div class="panel-content">
                <p style="font-size:0.8rem; color:#64748B; margin-bottom: 10px;">Renk Paleti</p>
                <div class="grid-3" style="margin-bottom: 25px;">
                    <div class="bg-btn" style="background:#FFFFFF; border:1px solid #ccc;" onclick="setBg('#FFFFFF')"></div>
                    <div class="bg-btn" style="background:#0F172A;" onclick="setBg('#0F172A')"></div>
                    <div class="bg-btn" style="background:#DDA722;" onclick="setBg('#DDA722')"></div>
                    <div class="bg-btn" style="background:#EF4444;" onclick="setBg('#EF4444')"></div>
                    <div class="bg-btn" style="background:#3B82F6;" onclick="setBg('#3B82F6')"></div>
                    <div class="bg-btn" style="background:#22C55E;" onclick="setBg('#22C55E')"></div>
                </div>

                <p style="font-size:0.8rem; color:#64748B; margin-bottom: 10px;">Dokular & Resimler</p>
                <div class="grid-2">
                    <div class="bg-btn" style="background:url('https://picsum.photos/200/100?grayscale') center/cover;" onclick="setBgImage('https://picsum.photos/1000/800?grayscale')"></div>
                    <div class="bg-btn" style="background:url('https://picsum.photos/200/100?blur=2') center/cover;" onclick="setBgImage('https://picsum.photos/1000/800?blur=2')"></div>
                    <div class="bg-btn" style="background: linear-gradient(45deg, #FF9A9E, #FECFEF);" onclick="setBg('linear-gradient(45deg, #FF9A9E, #FECFEF)')"></div>
                    <div class="bg-btn" style="background: linear-gradient(to right, #4facfe 0%, #00f2fe 100%);" onclick="setBg('linear-gradient(to right, #4facfe 0%, #00f2fe 100%)')"></div>
                </div>
            </div>
        </div>

        <!-- MEDYA TAB -->
        <div id="tab-medya" class="studio-panel">
            <div class="panel-header">Görsel, Video ve Ses</div>
            <div class="panel-content">
                
                <button onclick="document.getElementById('imgLoader').click()" class="comp-btn" style="width:100%; margin-bottom: 30px;">
                    <i class="fas fa-upload"></i> Kendi Görselinizi Yükleyin
                </button>
                <input type="file" id="imgLoader" style="display: none;" accept="image/*">

                <p style="font-size:0.8rem; color:#64748B; margin-bottom: 10px;">Video Elementi (Placeholder)</p>
                <div class="comp-btn" style="margin-bottom: 30px;" onclick="addVideoPlaceholder()">
                    <i class="fas fa-video"></i> Video Elementi Ekle
                    <p style="font-size: 0.7rem; color: #94A3B8; margin-top:5px; padding:0 10px;">Video bileşenleri çıktı alındığında fotoğraf olarak kaydedilir.</p>
                </div>

                <p style="font-size:0.8rem; color:#64748B; margin-bottom: 10px;">Sunum Arkaplan Sesi</p>
                <div class="comp-btn" onclick="toggleAudioTrack()">
                    <i class="fas fa-music" id="audioIcon"></i> <span id="audioText">Müzik Ekle (Chill Lo-Fi)</span>
                </div>
                
                <!-- Audio Element (hidden) -->
                <audio id="bgMusic" loop>
                    <source src="https://www.soundhelix.com/examples/mp3/SoundHelix-Song-1.mp3" type="audio/mpeg">
                </audio>
            </div>
        </div>

        <!-- SIHIRLI İÇERİK (AI) TAB -->
        <div id="tab-sihirli" class="studio-panel">
            <div class="panel-header" style="color: #9333EA;"><i class="fas fa-magic"></i> Sihirli İçerik (AI)</div>
            <div class="panel-content">
                <p style="font-size:0.9rem; color:#334155; margin-bottom: 20px;">Ne oluşturmak istediğinizi yazın, Pozitif AI sizin için saniyeler içinde kanvasa bir içerik yaratsın.</p>
                
                <textarea id="aiPrompt" class="magic-input" rows="4" placeholder="Örn: Günbatımında karlı bir dağ manzarası..."></textarea>
                
                <button id="aiGenerateBtn" class="magic-btn" onclick="generateMagicContent()">
                    Oluştur <i class="fas fa-sparkles" style="margin-left: 5px;"></i>
                </button>

                <div id="aiLoading" style="display:none; text-align:center; padding: 20px;">
                    <i class="fas fa-circle-notch fa-spin" style="font-size:2rem; color:#A855F7; margin-bottom:10px;"></i>
                    <p style="font-size:0.8rem; color:#64748B;">Sihir gerçekleşiyor...</p>
                </div>
            </div>
        </div>
    </div>


    <!-- 3. MAIN WORKSPACE -->
    <div class="studio-main">
        
        <!-- Smart Toolbar -->
        <div class="studio-topbar">
            
            <div class="topbar-tools" id="objTools">
                <!-- Color -->
                <div style="display:flex; align-items:center; gap:5px; border-right:1px solid #E2E8F0; padding-right:15px;">
                    <input type="color" id="activeColor" style="cursor:pointer; width:30px; height:30px; border:none; padding:0; background:transparent;">
                </div>
                
                <!-- Text Tools (Only shown for text) -->
                <div id="textTools" style="display:flex; align-items:center; gap:5px; border-right:1px solid #E2E8F0; padding-right:15px;">
                    <select id="fontFamily" class="tool-select">
                        <option value="Outfit">Outfit</option>
                        <option value="Arial">Arial</option>
                        <option value="Georgia">Georgia</option>
                    </select>
                    <button class="tool-btn" onclick="toggleStyle('fontWeight', 'bold', 'normal')"><i class="fas fa-bold"></i></button>
                    <button class="tool-btn" onclick="toggleStyle('fontStyle', 'italic', 'normal')"><i class="fas fa-italic"></i></button>
                    <button class="tool-btn" onclick="toggleStyle('underline', true, false)"><i class="fas fa-underline"></i></button>
                </div>
                
                <!-- Layer & Delete Tools -->
                <button class="tool-btn" onclick="bringForward()"><i class="fas fa-layer-group"></i> Öne</button>
                <button class="tool-btn" onclick="sendBackward()"><i class="fas fa-layer-group" style="opacity:0.6;"></i> Geri</button>
                <button class="tool-btn" style="color:#EF4444;" onclick="deleteActive()"><i class="fas fa-trash-alt"></i> Sil</button>
            </div>

            <!-- Global Actions -->
            <div style="display:flex; gap: 10px; margin-left:auto;">
                <button class="tool-btn" onclick="clearCanvas()" style="color:#EF4444;"><i class="fas fa-eraser"></i> Tuvali Temizle</button>
                <button id="saveDesign" class="cta-button" style="padding: 10px 20px; font-size:0.9rem;">
                    Bize Gönder <i class="fas fa-paper-plane" style="margin-left:5px;"></i>
                </button>
            </div>
        </div>

        <!-- Canvas Stage -->
        <div class="canvas-stage">
            
            <!-- Audio Indicator -->
            <div id="audio-overlay">
                <div style="display:flex; gap:3px; align-items:center; height:15px;">
                    <div style="width:3px; height:100%; background:#10B981; animation: bounce 1s infinite;"></div>
                    <div style="width:3px; height:60%; background:#10B981; animation: bounce 1.2s infinite;"></div>
                    <div style="width:3px; height:80%; background:#10B981; animation: bounce 0.8s infinite;"></div>
                </div>
                <span>Proje Müziği Çalıyor</span>
            </div>

            <div class="canvas-box">
                <canvas id="canvas" width="850" height="600"></canvas>
            </div>
        </div>

    </div>

</div>

<!-- Fabric.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/5.3.1/fabric.min.js"></script>

<script>
    /* --- UI LOGIC --- */
    function openTab(tabId, btnElement) {
        // Hide all panels
        document.querySelectorAll('.studio-panel').forEach(p => p.classList.remove('active'));
        // Deactivate all btns
        document.querySelectorAll('.sb-btn').forEach(b => b.classList.remove('active'));
        
        // Activate target
        document.getElementById(tabId).classList.add('active');
        btnElement.classList.add('active');
    }

    /* --- FABRIC.JS CORE --- */
    const canvas = new fabric.Canvas('canvas', {
        preserveObjectStacking: true,
        selectionBorderColor: '#A855F7',
        selectionColor: 'rgba(168, 85, 247, 0.1)',
        selectionLineWidth: 1
    });

    fabric.Object.prototype.set({
        transparentCorners: false,
        cornerColor: '#0F172A',
        borderColor: '#0F172A',
        cornerSize: 8,
        padding: 5
    });

    // Default BG
    canvas.setBackgroundColor('#ffffff', canvas.renderAll.bind(canvas));


    /* --- BILESENLER (SHAPES & ICONS) --- */
    function addShape(type) {
        let obj;
        const color = '#1E293B';
        const center = canvas.getCenter();

        switch(type) {
            case 'rect':
                obj = new fabric.Rect({ left: center.left-50, top: center.top-50, width: 100, height: 100, fill: color, rx: 8, ry: 8 });
                break;
            case 'circle':
                obj = new fabric.Circle({ left: center.left-50, top: center.top-50, radius: 50, fill: color });
                break;
            case 'triangle':
                obj = new fabric.Triangle({ left: center.left-50, top: center.top-50, width: 100, height: 100, fill: color });
                break;
            case 'line':
                obj = new fabric.Line([0,0, 200,0], { left: center.left-100, top: center.top, stroke: color, strokeWidth: 5 });
                break;
        }
        canvas.add(obj); canvas.setActiveObject(obj);
    }

    function addIcon(emoji, color) {
        const text = new fabric.Text(emoji, {
            left: canvas.width / 2 - 25,
            top: canvas.height / 2 - 25,
            fontSize: 50,
            fill: color
        });
        canvas.add(text); canvas.setActiveObject(text);
    }

    /* --- METIN (TEXT HIERARCHY) --- */
    function addText(level) {
        let size = 40, weight = 'normal', textContent = "Metin", color = '#1E293B';
        if(level === 'heading') { size = 60; weight = 'bold'; textContent = "Başlık"; }
        if(level === 'subheading') { size = 32; weight = '600'; textContent = "Alt Başlık"; color = '#334155'; }
        if(level === 'body') { size = 20; weight = 'normal'; textContent = "Gövde metni buraya eklenecektir."; color = '#64748B'; }

        const textObj = new fabric.IText(textContent, {
            left: canvas.width / 2 - 100, top: canvas.height / 2 - (size/2), fontFamily: 'Outfit', fontSize: size, fontWeight: weight, fill: color
        });
        canvas.add(textObj); canvas.setActiveObject(textObj);
    }

    /* --- ARKAPLAN (BACKGROUND) --- */
    function setBg(color) {
        canvas.setBackgroundImage(null, canvas.renderAll.bind(canvas)); // clear image
        // If it's a gradient, fabric string parsing is complex. Let's just use CSS solid colors for safety in basic implementation.
        // For linear gradients, we fake it using canvas wrapper if CSS string is given, but it won't export. 
        // We will just set it if it's solid hex.
        if(color.startsWith('#')) {
            canvas.setBackgroundColor(color, canvas.renderAll.bind(canvas));
        } else {
            // Unexportable CSS gradient fallback for UI thrill
            document.querySelector('.canvas-box').style.background = color;
            canvas.setBackgroundColor('transparent', canvas.renderAll.bind(canvas));
        }
    }
    
    function setBgImage(url) {
        fabric.Image.fromURL(url, function(img) {
            // Scale background to canvas
            const scale = Math.max(canvas.width / img.width, canvas.height / img.height);
            img.set({ scaleX: scale, scaleY: scale, originX: 'left', originY: 'top' });
            canvas.setBackgroundImage(img, canvas.renderAll.bind(canvas));
        }, { crossOrigin: 'anonymous' });
    }

    /* --- MEDIA (VIDEO & AUDIO) --- */
    function addVideoPlaceholder() {
        // Create a fake video UI logic
        const bgRect = new fabric.Rect({ width: 300, height: 180, fill: '#1E293B', rx: 12, ry: 12, originX: 'center', originY: 'center' });
        const playBtnTriangle = new fabric.Triangle({ width: 40, height: 40, fill: '#FFFFFF', originX: 'center', originY: 'center', angle: 90, left: 10 }); // shifted left due to geometrical center of triangle
        const playBtnBg = new fabric.Circle({ radius: 35, fill: 'rgba(255,255,255,0.2)', originX: 'center', originY: 'center' });
        
        const text = new fabric.Text('Video Çerçevesi', { fontSize: 14, fill: '#94A3B8', originX: 'center', top: 60, originY: 'center' });

        const group = new fabric.Group([bgRect, playBtnBg, playBtnTriangle, text], {
            left: canvas.width/2 - 150, top: canvas.height/2 - 90
        });
        canvas.add(group); canvas.setActiveObject(group);
    }

    let isPlaying = false;
    function toggleAudioTrack() {
        const audio = document.getElementById('bgMusic');
        const icon = document.getElementById('audioIcon');
        const text = document.getElementById('audioText');
        const overlay = document.getElementById('audio-overlay');

        if(isPlaying) {
            audio.pause();
            icon.className = 'fas fa-music';
            text.innerText = 'Müzik Ekle (Chill Lo-Fi)';
            overlay.style.display = 'none';
        } else {
            audio.play();
            icon.className = 'fas fa-pause';
            text.innerText = 'Müziği Durdur';
            overlay.style.display = 'flex';
        }
        isPlaying = !isPlaying;
    }

    /* --- SIHIRLI AI (MAGIC CONTENT) --- */
    function generateMagicContent() {
        const prompt = document.getElementById('aiPrompt').value;
        if(prompt.trim() === '') { alert('Lütfen Sihirli AI için bir komut girin!'); return; }
        
        const btn = document.getElementById('aiGenerateBtn');
        const loader = document.getElementById('aiLoading');
        
        btn.style.display = 'none';
        loader.style.display = 'block';

        // Simulate AI request delay
        setTimeout(() => {
            // Using picsum to grab a random 400x300 image to simulate generation
            const randomSeed = Math.floor(Math.random() * 1000);
            fabric.Image.fromURL(`https://picsum.photos/seed/${randomSeed}/400/300`, function(img) {
                img.set({ left: canvas.width/2 - 200, top: canvas.height/2 - 150, rx: 12, ry: 12 });
                // We fake border radius on image via clipPath
                var rect = new fabric.Rect({ width: 400, height: 300, rx: 16, ry: 16, originX: 'center', originY: 'center' });
                img.clipPath = rect;

                canvas.add(img); canvas.setActiveObject(img);
                
                // Rest UI
                loader.style.display = 'none';
                btn.style.display = 'block';
                document.getElementById('aiPrompt').value = '';
            }, { crossOrigin: 'anonymous' });

        }, 2000); // 2 second fake AI thinking time
    }


    /* --- IMAGE UPLOAD --- */
    document.getElementById('imgLoader').onchange = function(e) {
        if(!e.target.files[0]) return;
        const reader = new FileReader();
        reader.onload = function(event) {
            const imgObj = new Image();
            imgObj.src = event.target.result;
            imgObj.onload = function() {
                const img = new fabric.Image(imgObj);
                img.scaleToWidth(250);
                canvas.centerObject(img);
                canvas.add(img); canvas.setActiveObject(img);
            };
        };
        reader.readAsDataURL(e.target.files[0]);
    };


    /* --- SMART TOPBAR LOGIC --- */
    const objTools = document.getElementById('objTools');
    const textTools = document.getElementById('textTools');
    const colorPickerInput = document.getElementById('activeColor');
    const fontSelector = document.getElementById('fontFamily');

    canvas.on('selection:created', updateSmartbar);
    canvas.on('selection:updated', updateSmartbar);
    canvas.on('selection:cleared', () => { objTools.classList.remove('active'); });

    function updateSmartbar(e) {
        objTools.classList.add('active');
        const obj = e.selected[0];
        if(!obj) return;

        // Color handling
        if(obj.type === 'line' || obj.type === 'path') {
            colorPickerInput.value = obj.stroke || '#000000';
            colorPickerInput.disabled = false;
        } else if (obj.fill && typeof obj.fill === 'string') {
            colorPickerInput.value = obj.fill;
            colorPickerInput.disabled = false;
        } else {
            colorPickerInput.disabled = true; // e.g. for image/groups
        }

        // Text handling
        if(obj.type === 'i-text' || obj.type === 'text') {
            textTools.style.display = 'flex';
            fontSelector.value = obj.fontFamily || 'Outfit';
        } else {
            textTools.style.display = 'none';
        }
    }

    /* Edit Commands */
    colorPickerInput.oninput = function() {
        const obj = canvas.getActiveObject();
        if(obj) {
            if(obj.type === 'line') obj.set('stroke', this.value);
            else obj.set('fill', this.value);
            canvas.renderAll();
        }
    };
    fontSelector.onchange = function() {
        const obj = canvas.getActiveObject();
        if(obj && obj.type === 'i-text') { obj.set('fontFamily', this.value); canvas.renderAll(); }
    };
    function toggleStyle(prop, trueVal, falseVal) {
        const obj = canvas.getActiveObject();
        if(obj && obj.type === 'i-text') {
            obj.set(prop, obj[prop] === trueVal ? falseVal : trueVal);
            canvas.renderAll();
        }
    }
    function bringForward() { const obj = canvas.getActiveObject(); if(obj) canvas.bringForward(obj); }
    function sendBackward() { const obj = canvas.getActiveObject(); if(obj) canvas.sendBackwards(obj); }
    function deleteActive() { 
        const actives = canvas.getActiveObjects();
        if(actives.length) { actives.forEach(o => canvas.remove(o)); canvas.discardActiveObject(); }
    }
    function clearCanvas() {
        if(confirm('Tüm tasarımı silmek istediğinize emin misiniz?')) {
            canvas.clear(); canvas.setBackgroundColor('#ffffff', canvas.renderAll.bind(canvas));
        }
    }

    /* --- SAVE DELEGATE --- */
    document.getElementById('saveDesign').onclick = function() {
        this.innerHTML = '<i class="fas fa-spinner fa-spin"></i> İşleniyor...';
        this.disabled = true;

        canvas.discardActiveObject();
        canvas.renderAll();

        const dataURL = canvas.toDataURL({ format: 'png', quality: 1.0, multiplier: 2 });
        const formData = new FormData(); formData.append('image', dataURL);

        fetch('save_design.php', { method: 'POST', body: formData })
        .then(res => res.json())
        .then(data => {
            if(data.success) { window.location.href = 'profil.php'; } 
            else { alert('Kayıt Hatası: ' + data.message); resetSaveBtn(); }
        }).catch(err => {
            alert('Sunucu iletişim hatası!'); resetSaveBtn();
        });

        function resetSaveBtn() {
            const btn = document.getElementById('saveDesign');
            btn.innerHTML = 'Çalışmamı Gönder <i class="fas fa-paper-plane" style="margin-left:5px;"></i>';
            btn.disabled = false;
        }
    };
</script>

<!-- CSS Animation for Audio Bounce -->
<style>
@keyframes bounce {
    0%, 100% { transform: scaleY(0.4); }
    50% { transform: scaleY(1); }
}
</style>
