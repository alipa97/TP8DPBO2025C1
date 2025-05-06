# TP8DPBO2025C1
Saya Alifa Salsabila dengan NIM 2308138 mengerjakan soal Tugas Praktikum 1 dalam mata kuliah DPBO untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin

# Desain Program
## 1. Model
Model bertanggung jawab untuk mengelola interaksi dengan database. Semua proses mengambil, menambah, mengubah, dan menghapus data dilakukan di sini. Di sistem ini terdapat dua model utama:

### Major.class.php
Model ini menangani operasi terkait data jurusan.
- getMajors() : Mengambil semua data jurusan dari tabel majors.
- getById($id) : Mengambil satu data jurusan berdasarkan id.
- add($data) : Menambahkan jurusan baru ke tabel majors.
- delete($id) : Menghapus data jurusan berdasarkan ID.
- update($id, $data) : Mengupdate nama jurusan berdasarkan ID.

### Student.class.php
Model ini menangani semua data yang berkaitan dengan mahasiswa.
- getStudents() : Mengambil seluruh data mahasiswa, sekaligus men-JOIN data jurusan (majors) agar nama jurusan bisa ditampilkan.
- add($data) : Menambahkan mahasiswa baru ke tabel students.
- delete($id) : Menghapus mahasiswa berdasarkan ID.
- getById($id) : Mengambil detail mahasiswa berdasarkan ID dan join dengan nama jurusannya.
- update($id, $data) : Memperbarui data mahasiswa berdasarkan ID.

##2. View
Bagian View bertugas untuk menampilkan data ke user dalam bentuk HTML yang sudah disiapkan. View mengambil data dari Controller dan me-render-nya ke file template HTML.

### Template.class.php
Merupakan template engine sederhana yang berfungsi untuk memuat file HTML dan mengganti placeholder dengan data dinamis.

### StudentView
Digunakan untuk menampilkan daftar siswa dan form input siswa.
1. Fungsi render($data) :
- Melakukan iterasi data siswa dari $data['student'] dan membuat baris <tr> HTML.
- Melakukan iterasi data jurusan dari $data['major'] dan membuat <option> HTML untuk dropdown jurusan.
- Memuat template templates/student.html.
- Mengganti placeholder.
- Menampilkan hasil akhir ke browser.

### MajorView
Digunakan untuk menampilkan daftar jurusan.
1. Fungsi render($data) :
- Mengiterasi data jurusan dan menyusun tabel HTML.
- Memuat template templates/major.html.
- Mengganti placeholder
- Menampilkan hasil akhir ke browser.

### EditMajorView
Digunakan untuk menampilkan form edit jurusan.
1  Fungsi render($majorData)
- Mengisi placeholder dalam template templates/edit_major.html
- Menampilkan form edit jurusan ke browser.

###EditStudentView
Menampilkan form edit data siswa.
1. Fungsi render($studentData, $majorData)
- Mengisi placeholder dalam template templates/edit_student.html
- Menampilkan form edit student ke browser.

## 3. Controller
Controller berfungsi sebagai penghubung antara Model dan View. Dalam proyek ini, terdapat dua controller utama:

### StudentController
Mengatur logika dan alur data terkait entitas Student (Siswa) dari dan ke model, serta mengatur tampilan melalui view.

Metode:
- __construct() : Inisialisasi koneksi ke model Student dan Major.
- index() : Menampilkan seluruh data siswa dan jurusan dengan memanggil getStudents() dan getMajors() dari model. Data dikirim ke StudentView.
- add($data) : Menambahkan data siswa baru ke database. Input berupa array berisi nama, nim, no. telp, tanggal masuk, dan jurusan.
- showEditForm($id) : Menampilkan form edit siswa berdasarkan ID yang dipilih. Data ditampilkan melalui EditStudentView.
= update($id, $data) : Memperbarui data siswa berdasarkan ID dengan data yang diberikan.
- delete($id) : Menghapus data siswa berdasarkan ID.

### MajorController
Mengatur logika dan alur data terkait entitas Major (Jurusan) dari dan ke model, serta mengatur tampilan melalui view.

Metode:
- __construct() : Inisialisasi koneksi ke model Major.
- index() : Menampilkan seluruh data jurusan melalui getMajors() dan mengirimkannya ke MajorView.
- add($data) : Menambahkan data jurusan baru ke database.
- showEditForm($id) :Menampilkan form edit jurusan berdasarkan ID yang dipilih. Ditampilkan lewat EditMajorView.
- update($id, $data) : Memperbarui data jurusan berdasarkan ID dengan data baru.
- delete($id) : Menghapus data jurusan berdasarkan ID.

# Alur Program
Aplikasi ini dibangun dengan arsitektur MVC (Model-View-Controller) sederhana menggunakan PHP. Terdapat dua entitas utama, yaitu Student (mahasiswa) dan Major (jurusan). Setiap entitas memiliki model, view, dan controller masing-masing. Berikut adalah alur umum dari aplikasi:

## 1. Routing
Routing dilakukan melalui dua file utama: index.php untuk entitas Student dan major.php untuk entitas Major.

## 2. Controller
Controller berfungsi sebagai penghubung antara model dan view.

## 3. Model
Model berfungsi untuk mengakses dan memanipulasi database.

## 4. View
View bertugas untuk menampilkan antarmuka kepada pengguna. View akan menerima data dari controller dan merender HTML sesuai kebutuhan.

## 5. Database
Aplikasi ini menggunakan satu database dengan dua tabel utama
