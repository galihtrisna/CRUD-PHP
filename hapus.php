<?php
include ('koneksi.php');

$id_buku = $_GET['id_buku'];

$sql = "DELETE FROM buku WHERE id_buku='$id_buku'";

if($conn->query($sql) === TRUE){
    echo "<script>alert('Data berhasil dihapus');window.location='tampil.php';</script>";
}else{
    echo "<script>alert('Error');window.location='tampil.php';</script>";
}
$conn->clone();
?>