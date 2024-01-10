<?php
require_once "include/koneksi.php";
$query = mysqli_query($kon, "SELECT idadmin, namalengkap FROM admin WHERE idadmin='$_SESSION[idadmin]'")
    or die('Ada kesalahan pada query anda : ' . mysqli_error($kon));
$data = mysqli_fetch_assoc($query);

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////Validasi Kategori//////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if ($_GET['p'] == "data_form" and $_GET['form'] == "add") {
    if (isset($_POST["simpan"])) {
        if (!empty($_POST["kode"]) and !empty($_POST["nama"]) and !empty($_POST["stok_sistem"]) and !empty($_POST["stok_lap"])) {
            $query = mysqli_query($kon, "INSERT INTO dataset (kode, nama, stok_sistem, stok_lap, tanggal) 
                            VALUES ('$_POST[kode]', '$_POST[nama]','$_POST[stok_sistem]','$_POST[stok_lap]','$_POST[tanggal]')");
            if ($query) {
                echo "<META HTTP-EQUIV='Refresh' Content='0; URL=?p=data&alert=1'>";
            }
        }
    } 
} else if ($_GET['p'] == "data_form" and $_GET['form'] == "edit") {
    if (isset($_POST['simpan'])) {
        $query = mysqli_query($kon, "UPDATE dataset SET     kode='$_POST[kode]',
                                                            nama='$_POST[nama]',
                                                            stok_sistem='$_POST[stok_sistem]',
                                                            stok_lap='$_POST[stok_lap]',
                                                            tanggal='$_POST[tanggal]' 
                                                            WHERE iddata='$_GET[id]'");
        if ($query) {
            echo "<META HTTP-EQUIV='Refresh' Content='0; URL=?p=data&alert=2'>";
        }
    }
} else if ($_GET['p'] == "aksi" and $_GET['form'] == "del_data") {

    $query = mysqli_query($kon, "DELETE FROM dataset WHERE iddata='$_GET[id]'")
    or die('Ada Kesalahan pada Query Data User:' . mysqli_error($kon));

    if ($query) {
        echo "<META HTTP-EQUIV='Refresh' Content='0; URL=?p=data&alert=3'>";
    }
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////Validasi Kategori//////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if ($_GET['p'] == "jual_form" and $_GET['form'] == "add") {
    if (isset($_POST["simpan"])) {
            $query = mysqli_query($kon, "INSERT INTO data (kode, nama, terjual, tanggal) 
                            VALUES ('$_POST[kode]', '$_POST[nama]','$_POST[terjual]','$_POST[tanggal]')");
            if ($query) {
                echo "<META HTTP-EQUIV='Refresh' Content='0; URL=?p=jual&alert=1'>";
            }
      
    }
} else if ($_GET['p'] == "jual_form" and $_GET['form'] == "edit") {
    if (isset($_POST['simpan'])) {
        $query = mysqli_query($kon, "UPDATE data SET     kode='$_POST[kode]',
                                                            nama='$_POST[nama]',
                                                            terjual='$_POST[terjual]',
                                                            tanggal='$_POST[tanggal]' 
                                                            WHERE iddata='$_GET[id]'");
        if ($query) {
            echo "<META HTTP-EQUIV='Refresh' Content='0; URL=?p=jual&alert=2'>";
        }
    }
} else if ($_GET['p'] == "aksi" and $_GET['form'] == "delet_data") {

    $query = mysqli_query($kon, "DELETE FROM data WHERE iddata='$_GET[id]'")
        or die('Ada Kesalahan pada Query Data User:' . mysqli_error($kon));

    if ($query) {
        echo "<META HTTP-EQUIV='Refresh' Content='0; URL=?p=jual&alert=3'>";
    }
}