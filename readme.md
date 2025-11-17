# 🚀 MyContacts - Sistem Manajemen Kontak

Sebuah aplikasi web CRUD (Create, Read, Update, Delete) sederhana untuk manajemen kontak. Proyek ini dibuat sebagai bagian dari tugas praktikum Pemrograman Web.

Aplikasi ini mendemonstrasikan penggunaan PHP murni untuk server-side logic (validasi, session, dan file handling)
---

## 🌐 Akses Aplikasi

Aplikasi ini sudah di-hosting dan dapat diakses langsung pada domain berikut:

[**Lihat Live Demo**](https://mycontacts.exyluminate.my.id/)

### 🔑 Akun Login

Gunakan kredensial berikut untuk masuk ke dalam sistem:

* **Username:** `admin`
* **Password:** `password123` 

---

## ✨ Fitur Utama

* **Autentikasi Pengguna:** Sistem login dan logout aman menggunakan PHP Session.
* **Manajemen Kontak (CRUD):** Fungsionalitas penuh untuk Tambah, Edit, dan Hapus kontak.
* **Penyimpanan JSON:** Data kontak disimpan di file `.json` di sisi server.
* **Validasi Server-Side:** Validasi form yang ketat untuk semua input (Nama, Email, Telepon WA) sebelum disimpan.
* **UX Form (Old Data & Flash Msg):**
    * Form secara otomatis menyimpan input pengguna (data lama) jika validasi gagal, sehingga pengguna tidak perlu mengetik ulang.
    * Pesan flash (notifikasi sukses atau error) ditampilkan setelah setiap aksi CRUD.
* **Fitur Interaktif (Server-Side):**
    * **Pencarian (Filter):** Live filter untuk mencari kontak berdasarkan Nama atau Email.
    * **Sorting:** Pengurutan tabel secara dinamis (ASC/DESC) berdasarkan Nama atau Email.
* **Link Fungsional:**
    * Email menggunakan `mailto:`.
    * Nomor telepon terintegrasi dengan `wa.me/` (WhatsApp).
    * Ikon sosial media dinamis (GitHub, Instagram, dll.) yang mengarah ke profil.

---

## 🛠️ Teknologi yang Digunakan

Proyek ini dibangun murni menggunakan teknologi *server-side* dan *client-side* dasar tanpa *framework* PHP/JS yang kompleks.

| Teknologi | Penggunaan Utama |
| :--- | :--- |
| ![PHP](https://img.shields.io/badge/PHP-777BB4?style=flat-square&logo=php&logoColor=white) | Logika backend, session, validasi, CRUD, dan manipulasi file JSON. |
| ![Bootstrap 5](https://img.shields.io/badge/Bootstrap_5-7952B3?style=flat-square&logo=bootstrap&logoColor=white) | Framework UI/CSS utama, layout, komponen (Card, Navbar, Form). |
| ![Bootstrap Icons](https://img.shields.io/badge/Bootstrap_Icons-7952B3?style=flat-square&logo=bootstrap&logoColor=white) | Ikon vektor untuk tombol, input, dan link sosial media. |
| ![HTML5](https://img.shields.io/badge/HTML5-E34F26?style=flat-square&logo=html5&logoColor=white) | Struktur halaman. |
| **JSON** | Penyimpanan data |