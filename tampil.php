<?php
  include('koneksi.php'); 
  
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Tampilkan Data</title>
    <style>
      * {
        font-family: "balsamiq sans";
      }
      h1 {
        text-transform: uppercase;
        color: #9400D3;
      }
    table {
      border: solid 1px #DDEEEE;
      border-collapse: collapse;
      border-spacing: 0;
      width: 70%;
      margin: 0px auto 10px auto;
    }
    table thead th {
        background-color: #DDEFEF;
        border: solid 1px #DDEEEE;
        color: #336B6B;
        padding: 10px;
        text-align: center;
        text-shadow: 1px 1px 1px #fff;
        text-decoration: none;
    }
    table tbody td {
        border: solid 1px #DDEEEE;
        color: #333;
        padding: 10px;
        text-align: center;
    }
    a {
          background-color: #9400D3;
          color: #fff;
          padding: 10px;
          text-decoration: none;
          font-size: 12px;
    }
    #caridata {
      padding: 6px;
      width: 30%;
      margin-top: 50px;
      
      box-sizing: border-box;
      background: #f8f8f8;
      border: 2px solid #ccc;
      outline-color: #9400D3;
      border-radius: 10px;
    }
    </style>
  </head>
  <body>
    <center><h1>Data Buku</h1><center>
    <center><a href="formulir.php">+ &nbsp; Tambah Buku</a><center>
    <form action="tampil.php" method="get">
	<input id="caridata" type="text" name="cari" placeholder="Cari data buku.." value="">
</form>
    <br/>
    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>Judul Buku</th>
          <th>Penulis</th>
          <th>Jenis Buku</th>
          <th>Gambar Buku</th>
          <th>tindakan</th>
        </tr>
    </thead>
    <tbody>
      <?php

      if(isset($_GET['cari'])){
        $cari = $_GET['cari'];
        $query = "SELECT buku.id_buku, buku.judul_buku, buku.penulis, jenis_buku.jenis_buku , buku.gambar_buku, buku.id_jenis
        FROM buku
        INNER JOIN jenis_buku
        ON buku.id_jenis=jenis_buku.id_jenis
        where judul_buku like '%".$cari."%';";	
        $result = mysqli_query($conn, $query);		
      }else{
        $query = "SELECT buku.id_buku, buku.judul_buku, buku.penulis, jenis_buku.jenis_buku , buku.gambar_buku, buku.id_jenis
        FROM buku
        INNER JOIN jenis_buku
        ON buku.id_jenis=jenis_buku.id_jenis;";
        $result = mysqli_query($conn, $query);
        
        if(!$result){
         die ("Query Error: ".mysqli_errno($conn).
             " - ".mysqli_error($conn));
        }	
      }

      
      $no = 1; 
      
      while($row = mysqli_fetch_assoc($result))
      {
      ?>
       <tr>
          <td><?php echo $no; ?></td>
          <td><?php echo $row['judul_buku']; ?></td>
          <td><?php echo $row['penulis']; ?></td>
          <td><?php echo $row['jenis_buku']; ?></td>
          <td style="text-align: center;"><img src="gambar/<?php echo $row['gambar_buku']; ?>" style="width: 120px;"></td>
          <td>
              <a href="ubah.php?id_buku=<?php echo $row['id_buku']; ?>">Ubah</a> |
              <a href="hapus.php?id_buku=<?php echo $row['id_buku']; ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
          </td>
      </tr>
         
      <?php
        $no++;
      }
      ?>
    </tbody>
    </table>
  </body>
</html>