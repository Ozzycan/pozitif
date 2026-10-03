<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'title' => 'Kitap',
                'description' => 'İlkokul, ortaokul ve lise seviyesinde sınav hazırlık, ders ve kültür kitapları.',
                'icon' => 'fa-book-open',
                'color_theme' => 'amber',
                'link' => 'https://pozitifkirtasiye.com.tr/kitap',
                'tags' => ['AYT Kitapları', 'TYT Kitapları', 'Deneme', 'Ders Kitabı', 'Test Kitabı', 'Kültür Kitapları', 'Setler'],
                'order' => 1,
            ],
            [
                'title' => 'Kırtasiye',
                'description' => 'Ajandadan zımbaya, boyalardan kağıt çeşitlerine kadar tüm kırtasiye ihtiyaçları.',
                'icon' => 'fa-pen-fancy',
                'color_theme' => 'blue',
                'link' => 'https://pozitifkirtasiye.com.tr/kirtasiye',
                'tags' => ['Kalem Çeşitleri', 'Defter Çeşitleri', 'Dosya Çeşitleri', 'Bant Çeşitleri', 'Kuru Boya', 'Sulu Boya', 'Pastel Boya', 'Mum Boya', 'Silgi & Kalemtraş', 'Yapıştırıcı', 'Ofis Malzemesi', '+21 alt kategori'],
                'order' => 2,
            ],
            [
                'title' => 'Çanta & Valiz',
                'description' => 'Seyahat, günlük kullanım ve iş hayatı için her tarza uygun çanta ve valiz modelleri.',
                'icon' => 'fa-suitcase-rolling',
                'color_theme' => 'violet',
                'link' => 'https://pozitifkirtasiye.com.tr/canta-valiz',
                'tags' => ['Bavul & Valiz', 'Sırt Çantası', 'El Çantası', 'Bel Çantası', 'Bilgisayar Çantası', 'Evrak Çantası', 'Erkek Cüzdan', 'Kadın Cüzdan', 'Makyaj Çantası'],
                'order' => 3,
            ],
            [
                'title' => 'Okul Çantası',
                'description' => 'Öğrenciler için ergonomik ve lisanslı okul çantası, beslenme ve kalem çantası modelleri.',
                'icon' => 'fa-school',
                'color_theme' => 'emerald',
                'link' => 'https://pozitifkirtasiye.com.tr/okul-cantasi',
                'tags' => ['Sırt Çantası', 'Beslenme Çantası', 'Kalem Çantası', 'Proje Çantası'],
                'order' => 4,
            ],
            [
                'title' => 'Oyuncak',
                'description' => 'Her yaş grubuna uygun eğitici ve eğlenceli oyuncaklar, zeka oyunları ve puzzle çeşitleri.',
                'icon' => 'fa-puzzle-piece',
                'color_theme' => 'rose',
                'link' => 'https://pozitifkirtasiye.com.tr/oyuncak',
                'tags' => ['Akıl & Zeka Oyunları', 'Lego & Puzzle', 'Peluş Oyuncaklar', 'Lisanslı Oyuncaklar', 'Erkek Çocuk', 'Kız Çocuk', 'Uzaktan Kumandalı'],
                'order' => 5,
            ],
            [
                'title' => 'Sanat Malzemeleri',
                'description' => 'Profesyonel ve hobi amaçlı sanatsal malzemeler, boyalar, fırçalar ve çizim araçları.',
                'icon' => 'fa-palette',
                'color_theme' => 'fuchsia',
                'link' => 'https://pozitifkirtasiye.com.tr/sanat-malzemeleri',
                'tags' => ['Cadence Boya', 'Dereceli Kalem', 'Fırça & Fırça Setleri', 'Marker Kalem', 'Hobi', 'Palaka Boyası'],
                'order' => 6,
            ],
            [
                'title' => 'Hediye Özel Ürünler',
                'description' => 'Sevdiklerinize özel anlamlı hediyeler, dekoratif ürünler ve hatıra eşyaları.',
                'icon' => 'fa-gift',
                'color_theme' => 'yellow',
                'link' => 'https://pozitifkirtasiye.com.tr/hediye-ozel-urunler',
                'tags' => ['Biblo', 'Dilek Şişesi', 'Hediyelik Ürünler', 'Konfeti', 'Kumbara'],
                'order' => 7,
            ],
            [
                'title' => 'Panduf',
                'description' => 'Yumuşacık ve rahat ev terliği modelleri, farklı desen ve boyut seçenekleri.',
                'icon' => 'fa-shoe-prints',
                'color_theme' => 'sky',
                'link' => 'https://pozitifkirtasiye.com.tr/terlik',
                'tags' => ['Dobermen', 'Gri Kareli', 'Kareli', 'Kuzu'],
                'order' => 8,
            ],
            [
                'title' => 'İndirimli Ürünler',
                'description' => 'Kampanyalı ve indirimli ürünlerimizi kaçırmayın! Sınırlı stok fırsatları.',
                'icon' => 'fa-tags',
                'color_theme' => 'red',
                'link' => 'https://pozitifkirtasiye.com.tr/indirimli-urunler',
                'tags' => ['Kampanyalı Fiyatlar', 'Fırsat Ürünleri', 'Sezon Sonu'],
                'order' => 9,
            ],
        ];

        foreach ($categories as $cat) {
            \App\Models\Category::create($cat);
        }
    }
}
