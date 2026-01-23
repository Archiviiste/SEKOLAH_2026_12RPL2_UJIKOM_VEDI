<?php
$koneksi = mysqli_connect("localhost","root","","ujikom_12rpl_vedi");
$aidi = $_POST["id"];
$ket = $_POST["ket"];
$action = $_POST["action"];

if($action == "kirim"){
    $kirim = mysqli_query($koneksi, "INSERT INTO kategori VALUES('$aidi','$ket'); ");
}
    else if($action == "hapus"){
        $apus = mysqli_query($koneksi, "DELETE FROM kategori WHERE id_kategori = '$aidi' OR ket_kategori = '$ket' ");
    }

    if ($kirim) {
    header("Location: kategori.php?status=success");
}       elseif ($apus){
        header("Location: kategori.php?status=apus");
}
?>