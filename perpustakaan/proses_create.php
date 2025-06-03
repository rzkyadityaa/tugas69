<?php
include('koneksi.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul = mysqli_real_escape_string($koneksi, $_POST['judul']);
    $pengarang = mysqli_real_escape_string($koneksi, $_POST['pengarang']);
    $penerbit = mysqli_real_escape_string($koneksi, $_POST['penerbit']);
    $tahun_terbit = mysqli_real_escape_string($koneksi, $_POST['tahun_terbit']);
    $isbn = mysqli_real_escape_string($koneksi, $_POST['isbn']);
    $jumlah_halaman = mysqli_real_escape_string($koneksi, $_POST['jumlah_halaman']);
    $kategori = mysqli_real_escape_string($koneksi, $_POST['kategori']);

    $query = "INSERT INTO buku (judul, pengarang, penerbit, tahun_terbit, isbn, jumlah_halaman, kategori) 
              VALUES ('$judul', '$pengarang', '$penerbit', '$tahun_terbit', '$isbn', '$jumlah_halaman', '$kategori')";
    
    if (mysqli_query($koneksi, $query)) {
        header("Location: index.php?status=sukses");
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
}
mysqli_close($koneksi);
?>