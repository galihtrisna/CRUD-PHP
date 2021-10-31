<?php
  include('koneksi.php');
  
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
    </style>
  </head>
  <body>
      <center>
        <h1>Tambah Buku</h1>
      <center>
      <form method="POST" action="simpan.php" enctype="multipart/form-data" >
      <div class="base">
          <label>Judul Buku</label>
          <input type="text" name="judul_buku" autofocus="" required="" />
          <label>Penulis</label>
         <input type="text" name="penulis" required=""/>
          <label>Jenis Buku</label>
         <select name="id_jenis" required="">
             <option></option>
             <option value="KMK">Komik</option>
             <option value="NVL">Novel</option>
             <option value="CRT">Buku Cerita</option>
             <option value="BPL">Buku Pelajaran</option>
             <option value="SJR">Sejarah</option>
             <option value="AGM">Agama</option>
            </select>
          <label>Gambar Buku</label>
         <input type="file" name="gambar_buku" required="" />
         <button type="submit">Simpan Buku</button>
         <br>
         <a href="tampil.php" id="lihat">Lihat Data Buku</a>
        </div>
      </form>
  </body>
</html>