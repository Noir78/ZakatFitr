<?php
    $jumlahDataPerHalaman = 10;
    $jumlahData = count(query("SELECT * FROM $nm_db"));
    $jumlahHalaman = ceil( $jumlahData / $jumlahDataPerHalaman);
    $halamanAktif = (isset($_GET['halaman'])) ? $_GET['halaman'] : 1;
    $awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;
?>