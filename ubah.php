<?php
  
include 'koneksi.php';

  
  if (isset($_GET['id_buku'])) {
    
    $id_buku = ($_GET["id_buku"]);

    
    $query = "SELECT buku.id_buku, buku.judul_buku, buku.penulis, jenis_buku.jenis_buku , buku.gambar_buku, buku.id_jenis
        FROM buku
        INNER JOIN jenis_buku
        ON buku.id_jenis=jenis_buku.id_jenis
        where id_buku like '%".$id_buku."%';";
    $result = mysqli_query($conn, $query);
    
    if(!$result){
      die ("Query Error: ".mysqli_errno($conn).
         " - ".mysqli_error($conn));
    }
    
    $data = mysqli_fetch_assoc($result);
      
       if (!count($data)) {
          echo "<script>alert('Data tidak ditemukan pada database');window.location='tampil.php';</script>";
       }
  } else {
    echo "<script>alert('Masukkan data id.');window.location='tampil.php';</script>";
  }         
  ?>
<!DOCTYPE html>
<html>
  <head>
    <title>CRUD buku</title>
    <style>
      * {
        font-family: "balsamiq sans";
      }
      h1 {
        text-transform: uppercase;
        color: #9400D3;
      }
    button {
          background-color: #9400D3;
          color: #fff;
          padding: 10px;
          text-decoration: none;
          font-size: 15px;
          border: 0px;
          margin-top: 20px;
          border-radius: 10px;
    }
    label {
      margin-top: 10px;
      float: left;
      text-align: left;
      width: 100%;
    }
    input {
      padding: 6px;
      width: 100%;
      box-sizing: border-box;
      background: #f8f8f8;
      border: 2px solid #ccc;
      outline-color: #9400D3;
      border-radius: 10px;
    }
    select {
      padding: 6px;
      width: 100%;
      box-sizing: border-box;
      background: #f8f8f8;
      border: 2px solid #ccc;
      outline-color: #9400D3;
      border-radius: 10px;
    }
    .base {
      width: 400px;
      height: auto;
      padding: 20px;
      margin-left: auto;
      margin-right: auto;
      background: #ededed;
      border-radius: 15px;
    }
    #lihat {
      font-size: 10px;
    }
    .id_buku{
      padding: 6px;
      width: 10%;
      color: #00000000;
      box-sizing: border-box;
      background: #00000000;
      border: 2px solid #00000000;
      outline-color: #00000000;
      border-radius: 10px;
      pointer-events: none;
    }
    </style>
  </head>
  <body>
      <center>
        <h1>Ubah Buku <?php echo $data['judul_buku']; ?></h1>
      <center>
      <form method="POST" action="simpan_ubah.php" enctype="multipart/form-data" >
      <div class="base">
          <label>Judul Buku</label>
          <input type="text" name="judul_buku" autofocus="" required="" value="<?php echo $data['judul_buku']; ?>"/>
          <label>Penulis</label>
         <input type="text" name="penulis" required="" value="<?php echo $data['penulis']; ?>"/>
          <label>Jenis Buku</label>
         <select name="id_jenis" required="">
             <option value="<?php echo $data['id_jenis']; ?>"><?php echo $data['jenis_buku']; ?></option>
             <option value="KMK">Komik</option>
             <option value="NVL">Novel</option>
             <option value="CRT">Buku Cerita</option>
             <option value="BPL">Buku Pelajaran</option>
             <option value="SJR">Sejarah</option>
             <option value="AGM">Agama</option>
            </select>
          <label>Gambar Buku</label>
          <img src="gambar/<?php echo $data['gambar_buku']; ?>" style="width: 120px;float: left;margin-bottom: 5px;">
         <input type="file" name="gambar_buku" />
         <i style="float: left;font-size: 11px;color: red">Abaikan jika tidak perlu</i>
         <br>
         <br>
         <button type="submit">Simpan Buku</button>
         <br>
         <a href="tampil.php" id="lihat">Lihat Data Buku</a>
        </div>
        <input type="text" name="id_buku" class="id_buku" required="" value="<?php echo $data['id_buku']; ?>"/>
      </form>
  </body>
</html>