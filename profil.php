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
    echo '<h2 style="color: var(--dark);">Profil Bilgilerinize Erişilemiyor</h2>';
    echo '<p style="color: var(--text-muted); font-size: 1.1rem;">Veritabanı bağlantısı kurulamadığı için tasarımlarınızı şu an görüntüleyemiyoruz. Lütfen daha sonra tekrar deneyin.</p>';
    echo '<a href="index.php" class="cta-button" style="margin-top: 30px; display: inline-block;">Anasayfaya Dön</a>';
    echo '</div>';
    include 'includes/footer.php';
    exit;
}

$user_id = $_SESSION['user_id'];

// Get user's designs
try {
    $stmt = $pdo->prepare("SELECT * FROM designs WHERE user_id = ? ORDER BY created_at DESC");
    $stmt->execute([$user_id]);
    $designs = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $error = "Tasarımlar yüklenirken bir hata oluştu: " . $e->getMessage();
}
?>

<section class="profile-section" style="padding: 80px 0; background: var(--gray); min-height: 80vh;">
    <div class="container">
        <div class="section-title" style="text-align: left; margin-bottom: 50px;">
            <p style="color: var(--primary); font-weight: 700; letter-spacing: 1px; margin-bottom: 5px; font-size: 0.9rem; text-transform: uppercase;">DASHBOARD</p>
            <h2 style="font-size: 2.8rem; color: var(--dark-accent); margin-bottom: 10px;">Profilim</h2>
            <p style="color: var(--text-muted); font-size: 1.1rem;">Hoş geldin, <strong style="color: var(--dark);"><?php echo htmlspecialchars($_SESSION['username']); ?></strong>! Kaydettiğin proje tasarımlarını buradan yönetebilirsin.</p>
        </div>

        <?php if (isset($error)): ?>
            <div style="background: #FEF2F2; color: #991B1B; padding: 20px; border-radius: 12px; margin-bottom: 30px; border: 1px solid #FCA5A5;">
                <i class="fas fa-exclamation-circle" style="margin-right: 10px;"></i> <?php echo $error; ?>
            </div>
        <?php endif; ?>

        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: 40px;">
            <?php if (empty($designs)): ?>
                <div class="card" style="grid-column: 1 / -1; text-align: center; padding: 80px 20px;">
                    <i class="fas fa-palette" style="font-size: 4rem; color: #E2E8F0; margin-bottom: 25px; display: block;"></i>
                    <h3 style="font-size: 1.5rem; color: var(--dark); margin-bottom: 15px;">Henüz Hiç Tasarımın Yok</h3>
                    <p style="font-size: 1.1rem; color: var(--text-muted); margin-bottom: 30px;">Sunuma hazır bir proje kaydınız bulunmuyor.</p>
                </div>
            <?php else: ?>
                <?php foreach ($designs as $design): ?>
                    <div class="card" style="padding: 0; display: flex; flex-direction: column;">
                        <div style="aspect-ratio: 16/10; background: #E2E8F0; display: flex; align-items: center; justify-content: center; position: relative;">
                            <img src="<?php echo htmlspecialchars($design['file_path']); ?>" alt="Proje" style="width: 100%; height: 100%; object-fit: cover;">
                            <div style="position: absolute; top: 15px; right: 15px; background: rgba(255,255,255,0.9); padding: 5px 12px; border-radius: 20px; font-size: 0.75rem; font-weight: 700; color: var(--dark); backdrop-filter: blur(5px);">
                                PROJE
                            </div>
                        </div>
                        <div style="padding: 25px; display: flex; flex-direction: column; flex-grow: 1;">
                            <h4 style="font-size: 1.2rem; color: var(--dark-accent); margin-bottom: 10px;">Tasarım #<?php echo $design['id']; ?></h4>
                            <p style="font-size: 0.85rem; color: var(--text-muted); display: flex; align-items: center; gap: 8px; margin-bottom: 25px;">
                                <i class="far fa-calendar-alt"></i> <?php echo date('d M Y, H:i', strtotime($design['created_at'])); ?>
                            </p>
                            
                            <div style="margin-top: auto; display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin-bottom: 12px;">
                                <a href="<?php echo htmlspecialchars($design['file_path']); ?>" target="_blank" class="dashboard-btn-outline">
                                    <i class="fas fa-eye"></i> İncele
                                </a>
                                <a href="<?php echo htmlspecialchars($design['file_path']); ?>" download class="dashboard-btn-primary">
                                    <i class="fas fa-download"></i> İndir
                                </a>
                            </div>
                            <button onclick="deleteDesign(<?php echo $design['id']; ?>)" class="dashboard-btn-danger">
                                <i class="fas fa-trash-alt"></i> Çöpe At
                            </button>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<style>
.dashboard-btn-primary {
    background: var(--primary);
    color: #fff;
    text-align: center;
    padding: 12px;
    border-radius: 10px;
    font-size: 0.9rem;
    font-weight: 600;
    transition: var(--transition);
    border: 1px solid var(--primary);
    box-shadow: 0 4px 12px rgba(221, 167, 34, 0.2);
}
.dashboard-btn-primary:hover {
    background: var(--primary-hover);
    transform: translateY(-2px);
    color: #fff;
}

.dashboard-btn-outline {
    background: transparent;
    color: var(--text-main);
    text-align: center;
    padding: 12px;
    border-radius: 10px;
    font-size: 0.9rem;
    font-weight: 600;
    transition: var(--transition);
    border: 1px solid #CBD5E1;
}
.dashboard-btn-outline:hover {
    background: #F1F5F9;
    border-color: #94A3B8;
    color: var(--dark-accent);
}

.dashboard-btn-danger {
    background: transparent;
    color: #EF4444;
    text-align: center;
    padding: 12px;
    border-radius: 10px;
    font-size: 0.9rem;
    font-weight: 600;
    transition: var(--transition);
    border: 1px solid #FECACA;
    cursor: pointer;
    width: 100%;
}
.dashboard-btn-danger:hover {
    background: #FEF2F2;
    color: #DC2626;
    border-color: #FCA5A5;
}
</style>

<script>
function deleteDesign(id) {
    if (confirm('Bu projenizi kalıcı olarak silmek istediğinize emin misiniz?')) {
        const formData = new FormData();
        formData.append('id', id);

        fetch('delete_design.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload();
            } else {
                alert('Silme işlemi başarısız: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Silme işlemi sırasında sunucu ile bağlantı koptu.');
        });
    }
}
</script>

<?php include 'includes/footer.php'; ?>
