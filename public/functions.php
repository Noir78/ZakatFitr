<?php

    function tambahmus($datmus){
        global $conn;
        $no_kk = htmlspecialchars($datmus['no_kk']);
        $nama = htmlspecialchars($datmus['nama']);
        $kategori = htmlspecialchars($datmus['kategori']);
        $jml_tanggungan = htmlspecialchars($datmus['jml_tanggungan']);

        mysqli_query($conn, "INSERT INTO mustahik VALUES ('$no_kk','$nama', '$kategori', '$jml_tanggungan', '0')");
        return mysqli_affected_rows($conn);
    }

    function editmus($datmus){
        global $conn;
        $no_kk = htmlspecialchars($datmus['no_kk']);
        $nama = htmlspecialchars($datmus['nama']);
        $kategori = htmlspecialchars($datmus['kategori']);
        $jml_tanggungan = htmlspecialchars($datmus['jml_tanggungan']);

        mysqli_query($conn, "UPDATE mustahik SET nama= '$nama', kategori = '$kategori', jml_tanggungan = '$jml_tanggungan' WHERE no_kk = '$no_kk'");
        return mysqli_affected_rows($conn);
    }

    function hapusmus($idmus){
        global $conn;
        $no_kk = htmlspecialchars($idmus['no_kk']);
        mysqli_query($conn, "DELETE FROM mustahik WHERE no_kk = $no_kk");
        return mysqli_affected_rows($conn);
    }

    function tambahmuz($datmuz){
        global $conn;
        $no_kk = htmlspecialchars($datmuz['no_kk']);
        $nama = htmlspecialchars($datmuz['nama']);
        $jml_tanggungan = htmlspecialchars($datmuz['jml_tanggungan']);
        $beras = $jml_tanggungan * 2.5;
        $uang = $jml_tanggungan * 37500;

        mysqli_query($conn, "INSERT INTO muzakki VALUES ('$no_kk','$nama', '$jml_tanggungan', '$beras', '$uang', '0')");
        return mysqli_affected_rows($conn);
    }

    function editmuz($datmuz){
        global $conn;
        $no_kk = htmlspecialchars($datmuz['no_kk']);
        $nama = htmlspecialchars($datmuz['nama']);
        $jml_tanggungan = htmlspecialchars($datmuz['jml_tanggungan']);
        $beras = $jml_tanggungan * 2.5;
        $uang = $jml_tanggungan * 37500;

        mysqli_query($conn, "UPDATE muzakki SET nama= '$nama', jml_tanggungan = '$jml_tanggungan', beras = '$beras', uang = '$uang' WHERE no_kk = '$no_kk'");
        return mysqli_affected_rows($conn);
    }

    function hapusmuz($idmuz){
        global $conn;
        $no_kk = htmlspecialchars($idmuz['no_kk']);
        mysqli_query($conn, "DELETE FROM muzakki WHERE no_kk = $no_kk");
        return mysqli_affected_rows($conn);
    }

    function tambahzak($datzak){
        global $conn;
        $nama = htmlspecialchars($datzak['nama']);
        $tanggungan = htmlspecialchars($datzak['jml_tanggungan']);
        $sqlmuz = mysqli_query($conn, "SELECT * FROM muzakki WHERE nama = '$nama'");
        $muzakki    =mysqli_fetch_array($sqlmuz);
        $no_kk = $muzakki['no_kk'];
        if($datzak['jenis'] == 'beras'){
            $besar = $tanggungan * 2.5;
            mysqli_query($conn, "INSERT INTO bayarzakat VALUES ('','$nama', '$tanggungan', '$besar', '1', '0', '$no_kk', NOW())");
            mysqli_query($conn, "UPDATE muzakki SET status = '1' WHERE no_kk = '$no_kk'");
        }elseif($datzak['jenis'] == 'uang'){
            $besar = $tanggungan * 37500;
            mysqli_query($conn, "INSERT INTO bayarzakat VALUES ('','$nama', '$tanggungan', '$besar', '0', '1', '$no_kk', NOW())");
            mysqli_query($conn, "UPDATE muzakki SET status = '1' WHERE no_kk = '$no_kk'");
        }
        return mysqli_affected_rows($conn);
    }

    function editzak($datzak){
        global $conn;
        $before = htmlspecialchars($datzak['before']);
        $sqlbefore = mysqli_query($conn, "SELECT * FROM muzakki WHERE nama = '$before'");
        $beforee    =mysqli_fetch_array($sqlbefore);
        $no_kk_before = $beforee['no_kk'];
        mysqli_query($conn, "UPDATE muzakki SET status = '0' WHERE nama = '$before' AND no_kk = '$no_kk_before'");

        $id = htmlspecialchars($datzak['id']);
        $nama = htmlspecialchars($datzak['nama2']);
        $tanggungan = htmlspecialchars($datzak['jml_tanggungan2']);
        $sqlmuz = mysqli_query($conn, "SELECT * FROM muzakki WHERE nama = '$nama'");
        $muzakki    =mysqli_fetch_array($sqlmuz);
        $no_kk = $muzakki['no_kk'];
        if($datzak['jenis2'] == 'beras'){
            $besar = $tanggungan * 2.5;
            mysqli_query($conn, "UPDATE bayarzakat SET nama_kk= '$nama', jml_tanggungan= '$tanggungan', besar_bayar = '$besar', beras = '1', uang = '0', no_kk = '$no_kk' ,waktu = NOW() WHERE id_zakat = '$id'");
            mysqli_query($conn, "UPDATE muzakki SET status = '1' WHERE no_kk = '$no_kk'");
        }elseif($datzak['jenis2'] == 'uang'){
            $besar = $tanggungan * 37500;
            mysqli_query($conn, "UPDATE bayarzakat SET nama_kk= '$nama', jml_tanggungan= '$tanggungan', besar_bayar = '$besar', beras = '0', uang = '1', no_kk = '$no_kk' ,waktu = NOW() WHERE id_zakat = '$id'");
            mysqli_query($conn, "UPDATE muzakki SET status = '1' WHERE no_kk = '$no_kk'");
        }

        return mysqli_affected_rows($conn);
    }

    function hapuszak($idzak){
        global $conn;
        $id = htmlspecialchars($idzak['id']);
        $sqlmuz = mysqli_query($conn, "SELECT * FROM bayarzakat WHERE id_zakat = '$id'");
        $muzakki    =mysqli_fetch_array($sqlmuz);
        $no_kk = $muzakki['no_kk'];
        mysqli_query($conn, "UPDATE muzakki SET status = '0' WHERE no_kk = '$no_kk'");
        mysqli_query($conn, "DELETE FROM bayarzakat WHERE id_zakat = $id");
        return mysqli_affected_rows($conn);
    }

    function tambahdis($datdis){
        global $connection;
        $master = new sql($connection);
        $fetch_beras = $master->besarbayar('beras')->fetch_array();
        $fetch_uang = $master->besarbayar('uang')->fetch_array();
        $fetch_mustahik = $master->all_org_mustahik()->fetch_array();
        $konversi = $fetch_uang['SUM(besar_bayar)'] / 37500 * 2.5;
        $total = $fetch_beras['SUM(besar_bayar)'] + $konversi;
        $pembagian = $total / $fetch_mustahik['SUM(jml_tanggungan)'];

        global $conn;
        $nama = htmlspecialchars($datdis['nama']);
        $sqlmus = mysqli_query($conn, "SELECT * FROM mustahik WHERE nama = '$nama'");
        $mustahik    =mysqli_fetch_array($sqlmus);
        $no_kk = htmlspecialchars($mustahik['no_kk']);
        $kategori = htmlspecialchars($mustahik['kategori']);
        $jml_tanggungan = htmlspecialchars($datdis['jml_tanggungan']);
        $besar = $jml_tanggungan * $pembagian;
        
        mysqli_query($conn, "INSERT INTO distribusi VALUES ('','$nama', '$kategori', '$jml_tanggungan', '$besar', '$no_kk', NOW())");
        mysqli_query($conn, "UPDATE mustahik SET status = '1' WHERE no_kk = '$no_kk'");

        return mysqli_affected_rows($conn);
    }

    function editdis($datdis){
        global $connection;
        $master = new sql($connection);
        $fetch_beras = $master->besarbayar('beras')->fetch_array();
        $fetch_uang = $master->besarbayar('uang')->fetch_array();
        $fetch_mustahik = $master->all_org_mustahik()->fetch_array();
        $konversi = $fetch_uang['SUM(besar_bayar)'] / 37500 * 2.5;
        $total = $fetch_beras['SUM(besar_bayar)'] + $konversi;
        $pembagian = $total / $fetch_mustahik['SUM(jml_tanggungan)'];

        global $conn;
        $before = htmlspecialchars($datdis['before']);
        $sqlbefore = mysqli_query($conn, "SELECT * FROM mustahik WHERE nama = '$before'");
        $beforee    =mysqli_fetch_array($sqlbefore);
        $no_kk_before = $beforee['no_kk'];
        mysqli_query($conn, "UPDATE mustahik SET status = '0' WHERE nama = '$before' AND no_kk = '$no_kk_before'");

        $id = htmlspecialchars($datdis['id']);
        $nama = htmlspecialchars($datdis['nama2']);
        $sqlmus = mysqli_query($conn, "SELECT * FROM mustahik WHERE nama = '$nama'");
        $mustahik    =mysqli_fetch_array($sqlmus);
        $kategori = htmlspecialchars($mustahik['kategori']);
        $jml_tanggungan = htmlspecialchars($datdis['jml_tanggungan2']);
        $sqlmus = mysqli_query($conn, "SELECT * FROM mustahik WHERE nama = '$nama'");
        $mustahik    =mysqli_fetch_array($sqlmus);
        $no_kk = $mustahik['no_kk'];
        $besar = $jml_tanggungan * $pembagian;

        mysqli_query($conn, "UPDATE distribusi SET nama= '$nama', kategori = '$kategori', jml_tanggungan = '$jml_tanggungan', besar = '$besar', waktu = NOW()  WHERE id_penerimaan = '$id'");
        mysqli_query($conn, "UPDATE mustahik SET status = '1' WHERE no_kk = '$no_kk'");

        return mysqli_affected_rows($conn);
    }

    function hapusdis($iddis){
        global $conn;
        $id = htmlspecialchars($iddis['id']);
        $sqlmus = mysqli_query($conn, "SELECT * FROM distribusi WHERE id_penerimaan = '$id'");
        $mustahik    =mysqli_fetch_array($sqlmus);
        $no_kk = $mustahik['no_kk'];
        mysqli_query($conn, "UPDATE mustahik SET status = '0' WHERE no_kk = '$no_kk'");
        mysqli_query($conn, "DELETE FROM distribusi WHERE id_penerimaan = $id");
        return mysqli_affected_rows($conn);
    }
?>