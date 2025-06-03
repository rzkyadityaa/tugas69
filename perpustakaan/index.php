<?php include('koneksi.php'); ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Buku Perpustakaan</title>
    <style>
        * { font-family: 'Segoe UI', Tahoma, sans-serif; }
        body { max-width: 1200px; margin: 0 auto; padding: 20px; }
        h1 { color: #2c3e50; text-align: center; }
        .btn { 
            background: #3498db; 
            color: white; 
            padding: 10px 15px; 
            border: none; 
            border-radius: 4px; 
            cursor: pointer; 
            text-decoration: none;
            display: inline-block;
            margin: 5px;
        }
        .btn:hover { background: #2980b9; }
        .btn-danger { background: #e74c3c; }
        .btn-danger:hover { background: #c0392b; }
        table { 
            width: 100%; 
            border-collapse: collapse; 
            margin: 20px 0; 
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        th, td { 
            padding: 12px 15px; 
            text-align: left; 
            border-bottom: 1px solid #ddd;
        }
        th { 
            background-color: #3498db; 
            color: white; 
            position: sticky;
            top: 0;
        }
        tr:hover { background-color: #f5f5f5; }
        .search-box {
            padding: 8px;
            width: 300px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .success { 
            background: #d4edda; 
            color: #155724; 
            padding: 10px; 
            margin: 10px 0;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <h1>Data Buku Perpustakaan</h1>
    
    <?php
    if(isset($_GET['status']) && $_GET['status'] == 'sukses') {
        echo '<div class="success">Operasi berhasil dilakukan!</div>';
    }
    ?>
    
    <a href="create.php" class="btn">Tambah Buku Baru</a>
    
    <input type="text" id="searchInput" class="search-box" placeholder="Cari judul buku..." onkeyup="searchBook()">
    
    <table id="bookTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Pengarang</th>
                <th>Penerbit</th>
                <th>Tahun</th>
                <th>ISBN</th>
                <th>Halaman</th>
                <th>Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM buku";
            $result = mysqli_query($koneksi, $query);
            
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['judul']}</td>
                    <td>{$row['pengarang']}</td>
                    <td>{$row['penerbit']}</td>
                    <td>{$row['tahun_terbit']}</td>
                    <td>{$row['isbn']}</td>
                    <td>{$row['jumlah_halaman']}</td>
                    <td>{$row['kategori']}</td>
                    <td>
                        <a href='edit.php?id={$row['id']}' class='btn'>Edit</a>
                        <a href='delete.php?id={$row['id']}' class='btn btn-danger' onclick='return confirm(\"Hapus buku ini?\")'>Hapus</a>
                    </td>
                </tr>";
            }
            ?>
        </tbody>
    </table>
    
    <script>
    function searchBook() {
        let input = document.getElementById("searchInput");
        let filter = input.value.toLowerCase();
        let table = document.getElementById("bookTable");
        let tr = table.getElementsByTagName("tr");
        
        for (let i = 1; i < tr.length; i++) {
            let td = tr[i].getElementsByTagName("td")[1];
            if (td) {
                let txtValue = td.textContent || td.innerText;
                if (txtValue.toLowerCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }       
        }
    }
    </script>
</body>
</html>