<?php include('koneksi.php'); ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Buku Baru</title>
    <style>
        body { max-width: 600px; margin: 20px auto; padding: 20px; }
        h2 { color: #2c3e50; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="text"], input[type="number"], select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .btn { 
            background: #3498db; 
            color: white; 
            padding: 10px 15px; 
            border: none; 
            border-radius: 4px; 
            cursor: pointer; 
        }
        .btn:hover { background: #2980b9; }
    </style>
</head>
<body>
    <h2>Tambah Buku Baru</h2>
    <form action="proses_create.php" method="POST">
        <div class="form-group">
            <label for="judul">Judul Buku:</label>
            <input type="text" id="judul" name="judul" required>
        </div>
        
        <div class="form-group">
            <label for="pengarang">Pengarang:</label>
            <input type="text" id="pengarang" name="pengarang" required>
        </div>
        
        <div class="form-group">
            <label for="penerbit">Penerbit:</label>
            <input type="text" id="penerbit" name="penerbit" required>
        </div>
        
        <div class="form-group">
            <label for="tahun_terbit">Tahun Terbit:</label>
            <input type="number" id="tahun_terbit" name="tahun_terbit" min="1900" max="2099" required>
        </div>
        
        <div class="form-group">
            <label for="isbn">ISBN:</label>
            <input type="text" id="isbn" name="isbn" required>
        </div>
        
        <div class="form-group">
            <label for="jumlah_halaman">Jumlah Halaman:</label>
            <input type="number" id="jumlah_halaman" name="jumlah_halaman" min="1">
        </div>
        
        <div class="form-group">
            <label for="kategori">Kategori:</label>
            <select id="kategori" name="kategori">
                <option value="Fiksi">Fiksi</option>
                <option value="Non-Fiksi">Non-Fiksi</option>
                <option value="Sains">Sains</option>
                <option value="Sejarah">Sejarah</option>
                <option value="Romansa">Romansa</option>
                <option value="Pengembangan Diri">Pengembangan Diri</option>
                <option value="Teknologi">Teknologi</option>
                <option value="Lainnya">Lainnya</option>
            </select>
        </div>
        
        <button type="submit" class="btn">Simpan Buku</button>
    </form>
</body>
</html>