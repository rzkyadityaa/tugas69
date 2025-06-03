<?php
include('koneksi.php');
$id = $_GET['id'];
$query = "SELECT * FROM buku WHERE id = $id";
$result = mysqli_query($koneksi, $query);
$data = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Buku</title>
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
    <h2>Edit Data Buku</h2>
    <form action="proses_edit.php" method="POST">
        <input type="hidden" name="id" value="<?= $data['id'] ?>">
        
        <div class="form-group">
            <label for="judul">Judul Buku:</label>
            <input type="text" id="judul" name="judul" value="<?= $data['judul'] ?>" required>
        </div>
        
        <div class="form-group">
            <label for="pengarang">Pengarang:</label>
            <input type="text" id="pengarang" name="pengarang" value="<?= $data['pengarang'] ?>" required>
        </div>
        
        <div class="form-group">
            <label for="penerbit">Penerbit:</label>
            <input type="text" id="penerbit" name="penerbit" value="<?= $data['penerbit'] ?>" required>
        </div>
        
        <div class="form-group">
            <label for="tahun_terbit">Tahun Terbit:</label>
            <input type="number" id="tahun_terbit" name="tahun_terbit" value="<?= $data['tahun_terbit'] ?>" min="1900" max="2099" required>
        </div>
        
        <div class="form-group">
            <label for="isbn">ISBN:</label>
            <input type="text" id="isbn" name="isbn" value="<?= $data['isbn'] ?>" required>
        </div>
        
        <div class="form-group">
            <label for="jumlah_halaman">Jumlah Halaman:</label>
            <input type="number" id="jumlah_halaman" name="jumlah_halaman" value="<?= $data['jumlah_halaman'] ?>" min="1">
        </div>
        
        <div class="form-group">
            <label for="kategori">Kategori:</label>
            <select id="kategori" name="kategori">
                <?php
                $kategories = ['Fiksi', 'Non-Fiksi', 'Sains', 'Sejarah', 'Romansa', 'Pengembangan Diri', 'Teknologi', 'Lainnya'];
                foreach ($kategories as $kat) {
                    $selected = ($kat == $data['kategori']) ? 'selected' : '';
                    echo "<option value='$kat' $selected>$kat</option>";
                }
                ?>
            </select>
        </div>
        
        <button type="submit" class="btn">Update Buku</button>
    </form>
</body>
</html>