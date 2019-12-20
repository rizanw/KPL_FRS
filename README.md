# Modul Pembelajaran FRS : Kelompok 5
### Revisi yang telah dilakukan:
- Perbaikan pada <i>aggregate</i> FRS dengan kelas sebagai <i>member</i>.
- Penambahan <i>invariant</i> totalSks dan batasSks.
- Penambahan fungsi untuk pengecekan batas sks mahasiswa, yang dilakukan pada saat mahasiswa melakukan penambahan/pengambilan kelas.
- Pemindahan <i>business logic</i> dari <i>repository</i> dan <i>controller</i> ke domain model.
- Pengecekan totalSks pada domain model FRS.
### Cara pemakaian awal:
1. Install composer pada <i>working directory</i>
2. Salin file .env.example dan gantilah namanya menjadi .env
3. Sesuaikan isi dari file .env sesuai dengan <i>working device</i> Anda
4. Import file .sql yang telah disediakan ke <i>database</i> yang Anda buat
### Tentang Modul Pembelajaran FRS
<i>Business logic</i> yang digunakan sama dengan FRS pada sistem Integra ITS, yaitu mahasiswa dibebaskan dalam melakukan pemilihan kelas pembelajaran.
### Tentang Project
- Merupakan implementasi awal (sebuah simulasi) dari Tugas Akhir <b>Ivaldy Putra Lifiari</b> berjudul <b>Rancang Bangun Sistem Informasi Akademik Generik pada Modul Pembelajaran dan IPD Menggunakan Pola Perancangan <i>Repository Service</i></b>
- Menekankan terhadap <i><b>domain design driven</b></i> yang diimplementasikan dengan <i>framework <b>Phalcon</b></i>
### Fitur Project
1. Jika <i>user</i> merupakan mahasiswa, maka:
    - Fitur yang dapat digunakan adalah FRS. Didalam fitur tersebut, mahasiswa dapat memilih mata kuliah yang diinginkan.
    - Jumlah sks yang dapat diambil bergantung pada IPK mahasiswa tersebut. Jika sudah mencukupi batas sks, maka mahasiswa tidak dapat menambah mata kuliah lagi.
    - Mata kuliah yang tersedia terdapat dua jenis, yaitu mata kuliah yang ditanggung oleh UPMB dan mata kuliah yang ditanggung oleh Departemen.
    - Mahasiswa dapat melakukan <i>drop</i> mata kuliah jika belum dilakukan persetujuan dari dosen wali.
    - Mahasiswa dapat mencetak FRS dalam bentuk KRSM.
    - Informasi yang dapat dilihat pada fitur FRS adalah NRP, nama, IPK, Dosen Wali, batas dan sisa sks, dan mata kuliah yang telah berhasil diambil.
2. Jika <i>user</i> merupakan dosen, maka:
    - Fitur yang dapat digunakan adalah melihat daftar anak wali dan melihat daftar peserta kelas.
    - Pada fitur Daftar Anak Wali, pada halaman tersebut akan terlampir mahasiswa anak walinya.
    - Halaman FRS dapat diakses dengan menekan link <b>Lihat FRS</b> pada halaman Daftar Anak Wali.
    - Dosen dapat melakukan persetujuan FRS pada halaman FRS dengan menekan tombol <b>SETUJUI FRS</b>.
    - Dosen dapat melihat peserta kelas tertentu pada fitur Daftar Peserta Kelas.
### Keterangan <i>Code</i> Project
1. Didalam FrsController terdapat beberapa action yang merupakan bentuk implementasi dari fitur-fitur yang ada. Action-action tersebut antara lain:
    - indexAction: menampilkan halaman awal dari modul pembelajaran FRS
    - frsAction: menampilkan halaman FRS
    Didalamnya terdapat pemanggilan service-service yang berfungsi untuk menampilkan kelas-kelas yang ada dalam database, fitur drop dan pengambilan kelas, pengecekan persetujuan FRS dari dosen dan mendapatkan data dari repository
    - cetakAction: menampilkan halaman untuk mencetak KRSM sesuai dengan kelas yang dipilih mahasiswa dan memanggil service-service yang diperlukan untuk mendapatkan data dari repository
    - anakWaliAction: menampilkan halaman daftar anak wali dan memanggil service-service yang diperlukan untuk mendapatkan data dari repository
    - kelasAction: menampilkan halaman Daftar Peserta Kelas dan memanggil service-service yang diperlukan untuk mendapatkan data dari repository
2. Service digunakan sebagai jembatan antara controller dengan repository.
3. Service request yang ada berfungsi untuk penanganan adanya submit atau menyimpan data, dimana nanti data tersebut akan terbentuk sendiri. Kemudian, service request tersebut akan  mengirim data tersebut ke repository.
4. Service response yang ada berfungsi untuk penanganan adanya request permintaan data. Service tersebut akan mengambil data dengan melakukan request ke repository.
