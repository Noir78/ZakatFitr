<?php
    include "koneksi.php";
    $master = new sql($connection);

    $fetch_beras = $master->besarbayar('beras')->fetch_array();
    $fetch_uang = $master->besarbayar('uang')->fetch_array();
    $fetch_dist = $master->bsrdistribusi()->fetch_array();
    $fetch_orang = $master->distribusi()->fetch_array();
    $fetch_muzakki = $master->all_org_muzakki()->fetch_array();
    $fetch_mustahik = $master->all_org_mustahik()->fetch_array();

    date_default_timezone_set('Asia/Jakarta'); 
    $today = date("d-m-Y");
?>
<!DOCTYPE html>
<html>
	<head>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
		<script>
			function generatePDF() {
			const element = document.getElementById('container_content');
			var opt = {
				  margin:       0.2,
				  filename:     'laporan_pengumpulan.pdf',
				  image:        { type: 'jpeg', quality: 0.98 },
				  html2canvas:  { scale: 2 },
				  jsPDF:        { unit: 'in', format: 'a4', orientation: 'portrait' }
				};
				// Choose the element that our invoice is rendered in.
				html2pdf().set(opt).from(element).save();
                var foo = document.write('<meta http-equiv="refresh" content="0.8;url=./laporan.php">');
			}
		</script>
		</head>
<body style="font-family: 'Work Sans', sans-serif;">
<div class="container_content" id="container_content" >
    <div style="width: 720px; height: 1050px; padding: 10px;">
        <div style="margin: 0 auto;">
            <div style="display: flex; padding: 2px; margin: 0 auto; text-align: center;">
                <img src="./img/logo3.png" alt="" style="width: 120px; height: 120px;">
                <div style="margin: 0 auto;">
                    <h3 style="font-weight: 700; font-size: 16px;">ZAKATFITR</h3>
                    <p style="font-size: 12px;">Jl. R. E . Martadinata No.165, Mekarjaya</p>
                    <p style="font-size: 12px;">Masjid Raudhatul Muttaqin</p>
                    <p style="font-size: 12px;">1 Syawal 1444H/2023 M</p>
                </div>
                <img src="./img/logo2.png" alt="" style="width: 190px; height: 120px;">
            </div>
            <hr style="border-bottom: 1px black solid;">
            <div style="padding: 10px;">
                <h1 style="font-weight: 700; font-size: 16px; text-align: center; text-decoration:">LAPORAN HASIL PENGUMPULAN ZAKAT FITRAH</h1>
                <?php
                    $total_orang = $fetch_mustahik['SUM(jml_tanggungan)'] + $fetch_muzakki['SUM(jml_tanggungan)'];
                ?>
                <p style="font-size: 13px; text-align: center;">Jumlah zakat fitrah kepanitia Masjid Raudhatul Muttaqin, 1 Syawal 1444H/2023 M sebanyak : <span style="font-weight: 700;"> <?=$total_orang?> Jiwa</span></p>
                <h4 style="font-weight: 700; font-size: 14px; text-decoration:">MUZZAKI dan MUSTAHIK</h4>
                <p style="font-size: 12px;">KK Muzakki : <?=$master->all_muzakki()->num_rows?></p>
                <p style="font-size: 12px;">KK Mustahik : <?=$master->all_mustahik()->num_rows?></p>
                <p style="font-size: 12px;">Muzakki : <?=$fetch_muzakki['SUM(jml_tanggungan)']?></p>
                <p style="font-size: 12px;">Mustahik : <?=$fetch_mustahik['SUM(jml_tanggungan)']?></p>
                <h4 style="font-weight: 700; font-size: 14px; text-decoration:">ZAKAT YANG TERKUMPUL</h4>
                <p style="font-size: 12px;">Beras : <?=$fetch_beras['SUM(besar_bayar)']?> kg</p>
                <p style="font-size: 12px; ">Uang : Rp.<?=$fetch_uang['SUM(besar_bayar)']?>,-</p>
                <h4 style="font-weight: 700; font-size: 14px; text-decoration: underline;">PERHITUNGAN</h4>
                <p style="font-size: 13px;">Zakat dibagikan secara merata dengan jenis beras, sehingga hasil perhitungan konversinya sebagai berikut :</p>
                <p style="font-size: 12px;">1 Muzakki = 2,5 kg beras = Rp.37.500</p>
                <?php
                  $konversi = $fetch_uang['SUM(besar_bayar)'] / 37500 * 2.5;
                  $total = $fetch_beras['SUM(besar_bayar)'] + $konversi;
                ?>
                <p style="font-size: 12px; ">Rp.<?=$fetch_uang['SUM(besar_bayar)']?> / Rp.37.500 = <?=$konversi?> kg</p>
                <p style="font-size: 12px;">Total keseluruhan beras = <?=$fetch_beras['SUM(besar_bayar)']?> + <?=$konversi?> = <?=number_format((float)$total, 2, '.', '')?> kg</p>
                <br>
                <?php
                    $pembagian = $total / $fetch_mustahik['SUM(jml_tanggungan)'];
                ?>
                <p style="font-size: 12px;">1 Mustahik masing-masing mendapatkan = <?=number_format((float)$pembagian, 2, '.', '')?> kg</p>
            </div>
            <div style="text-align: right; margin-right: 70px;">
                <p style="font-weight: 700; font-size: 16px;"><?=$today?></p>
                <img src="./img/ttd.png" alt=""  style="height: 100px; margin-right: 20px; border-bottom: 1px black solid; text-align: center;">
                <p style="font-weight: 700; font-size: 16px;">ZakatFitr</p>
            </div>
            <h1></h1>
        </div>
    </div>
</div>

<script>
    generatePDF();
</script>
<!--<meta http-equiv="refresh" content="0.2;url=./laporan.php" />-->
</body>
</html>