# LP11DPBO2024C2
LP11DPBO2024C2

Saya Marvel Ravindra Dioputra [2200481] LatPrak11 dalam Mata Kuliah DPBO untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

Membuat kode oop php bertema pasien, dimana hanya terdapat satu tabel pasien yang tidadk berelasi dengan struktur MVP.

Hubungan antara Model, View, dan Presenter dalam Kode:

Model:
- Model merepresentasikan data atau informasi yang digunakan dalam aplikasi.
- Model memberi tahu Presenter ketika terjadi perubahan data.

View:
- View bertanggung jawab untuk menampilkan informasi kepada pengguna.

Presenter:
- Presenter bertindak sebagai perantara antara Model dan View.
- Presenter mengambil data dari Model, kemudian menampilkan data tersebut ke dalam View.
- Presenter menangani input, seperti klik tombol atau input teks, dan meneruskannya ke Model untuk diproses.

Alur Kerja:
1. Menampilkan Data Pasien:
  Ketika tampil() dipanggil, TampilPasien akan menggunakan ProsesPasien untuk mendapatkan data pasien.
  Data pasien kemudian ditampilkan dalam bentuk tabel HTML.

2. Menambah Data Pasien:
  Ketika pengguna mengirimkan formulir tambah data pasien, TampilPasien akan menerima data tersebut dan menggunakan ProsesPasien untuk menambahkan data baru.
  Hasil operasi ditampilkan melalui echo pesan sukses atau gagal.

3. Mengedit Data Pasien:
  Saat pengguna memilih untuk mengedit data pasien, TampilPasien akan menampilkan formulir edit dengan data pasien yang sudah ada.
  Pengguna dapat mengubah data dan mengirimkannya.
  Data yang diubah akan diproses oleh ProsesPasien untuk melakukan pembaruan data.

4. Menghapus Data Pasien:
  Saat pengguna memilih untuk menghapus data pasien, TampilPasien akan meminta ProsesPasien untuk menghapus data dengan ID yang sesuai.
  Pesan sukses atau gagal akan ditampilkan setelah operasi selesai.

Homepage
![image](https://github.com/rdmrvl/LP11DPBO2024C2/assets/64513644/053cd199-5f1d-4e5e-900d-5be47a84c0f5)

Form Add
![image](https://github.com/rdmrvl/LP11DPBO2024C2/assets/64513644/ee053045-299c-419d-8575-b378f90c1cbf)

Form Edit
![image](https://github.com/rdmrvl/LP11DPBO2024C2/assets/64513644/18115527-0086-46a8-8312-bfbecc2b3c71)

