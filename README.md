# PHP Native Toko

Aplikasi toko sederhana berbasis **PHP Native** tanpa framework.  
Mendukung pembelian produk, login admin, dan pengelolaan data toko.

## 📌 Fitur
- Halaman beranda toko.
- Proses pembelian produk.
- Cek status pesanan.
- Login dan dashboard admin.
- Manajemen produk dan data pembelian.
- Tampilan responsive sederhana.

## 📂 Struktur Folder
```
php-native-toko/
│
├── admin/          # Halaman dan fitur khusus admin
├── assets/         # File CSS, JS, gambar, dll.
├── config/         # Konfigurasi database
├── pages/          # Halaman utama toko
├── templates/      # Template tampilan
│
├── beli.php        # Halaman form pembelian
├── index.php       # Halaman utama
├── login.php       # Halaman login
├── proses_beli.php # Proses penyimpanan pembelian
├── status.php      # Cek status pesanan
└── toko.rar        # Arsip proyek
```

## ⚙️ Instalasi
1. Clone repository:
   ```bash
   git clone https://github.com/reyhan74/php-native-toko.git
   ```
2. Pindahkan folder ke direktori web server (misal: `htdocs` untuk XAMPP).
3. Buat database baru di MySQL dan import file SQL (jika tersedia).
4. Ubah konfigurasi database di folder `config/` sesuai dengan pengaturan server.
5. Jalankan di browser:
   ```
   http://localhost/php-native-toko
   ```

## 🔑 Login Admin
- **URL**: [https://toko.rhn.my.id/login](https://toko.rhn.my.id/login)  
- **Username**: `admin`  
- **Password**: `admin123`

## 🖼️ Demo Online
- [Beranda Toko](https://toko.rhn.my.id/)  
- [Halaman Admin](https://toko.rhn.my.id/admin)

---

✍️ **Dibuat oleh**: Reyhan  
📅 Tahun: 2025
