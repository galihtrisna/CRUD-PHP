<?php

include 'koneksi.php';

  $id_buku = $_POST['id_buku'];
  $judul_buku   = $_POST['judul_buku'];
  $penulis     = $_POST['penulis'];
  $id_jenis    = $_POST['id_jenis'];
  $gambar_buku = $_FILES['gambar_buku']['name'];


if($gambar_buku != "") {
  $ekstensi_diperbolehkan = array('png','jpg','jpeg');
  $x = explode('.', $gambar_buku);
  $ekstensi = strtolower(end($x));
  $file_tmp = $_FILES['gambar_buku']['tmp_name'];   
  $angka_acak     = rand(1,999);
  $nama_gambar_baru = $angka_acak.'-'.$gambar_buku; 
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {     
                move_uploaded_file($file_tmp, 'gambar/'.$nama_gambar_baru);
                  $query = "UPDATE `buku` SET `judul_buku` = '$judul_buku', `penulis` = '$penulis', `id_jenis` = '$id_jenis', `gambar_buku` = '$nama_gambar_baru' WHERE `buku`.`id_buku` = $id_buku";
                  $result = mysqli_query($conn, $query);
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($conn).
                           " - ".mysqli_error($conn));
                  } else {
                    echo "<script>alert('Berhasil disimpan');window.location='tampil.php';</script>";
                  }
            } else {     
                echo "<script>alert('Gambar yang didukung hanya jpg png jpeg.');window.location='formulir.php';</script>";
            }
} else {
  $query = "UPDATE `buku` SET `judul_buku` = '$judul_buku', `penulis` = '$penulis', `id_jenis` = '$id_jenis' WHERE `buku`.`id_buku` = $id_buku";
  $result = mysqli_query($conn, $query);
  if(!$result){
      die ("Query gagal dijalankan: ".mysqli_errno($conn).
           " - ".mysqli_error($conn));
  } else {
    echo "<script>alert('Berhasil disimpan');window.location='tampil.php';</script>";
  }
}
$conn->close();