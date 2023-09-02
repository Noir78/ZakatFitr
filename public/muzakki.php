<?php
  session_start();
  ob_start();
  include "koneksi.php";
  $nm_db = 'muzakki';
  include "limit.php";
  $master = new sql($connection);

  $sqlmuzakki = $master->data_muzakki();
  if(isset($_POST['search'])){
    $sqlmuzakki = search($_POST['keyword']);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script src="https://kit.fontawesome.com/faf88445ba.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/4ef2c70460.js" cross origin="anonymous"></script>
    <link href='img/logo2.png' rel='shortcut icon' />
    <title>ZakatFitr | Berbagi Berkah Dengan ZakatFitr</title>
</head>
<body class="font-worksans">
    <div>
        <button id="defaultModalButton" data-modal-toggle="defaultModal" class="bg-blue-700 text-white text-2xl fixed bottom-5 right-5 rounded-full w-12 h-12 drop-shadow-lg z-50 duration-300 hover:bg-blue-500">+</button>
    </div>
        <div id="defaultModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                    <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                        <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                Tambah Muzakki
                            </h3>
                            <button type="button" class="text-black bg-gray-300 hover:bg-red-600 rounded-full px-3 py-1.5 inline-flex items-center dark:hover:bg-red-600 dark:hover:text-white" data-modal-toggle="defaultModal">
                                X<span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <form action="aksi.php?aksi=tambahmuz" method="post">
                            <div class="gap-4 mb-4 sm:grid-cols-2">
                                <div>
                                    <label for="no_kk">No. KK</label>
                                    <input type="text" name="no_kk" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nomor Keluarga..." required>
                                </div>
                                <div class="mt-5">
                                    <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kepala Keluarga Muzakki</label>
                                    <input type="text" name="nama" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Tulis nama..." required>
                                </div>
                                <div class="mt-5">
                                    <label for="jml_tanggungan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah Tanggungan</label>
                                    <input type="number" name="jml_tanggungan" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan jumlah tanggungan..." required>
                                </div>
                            </div>
                            <button type="submit" name="tambah" class="bg-white hover:bg-gray-300 text-black text-center border border-gray-500 rounded-lg p-2">Tambah</button>
                        </form>
                    </div>
                </div>
            </div>

    <div class="flex">
    <?php
      include "header.php";
      ?>
      <div class="mx-auto p-10 w-5/6">
        <h1 class="font-bold text-4xl text-center">Data Muzakki</h1>
        <div>
            <form action="" method="post">
                <input type="text" placeholder="Cari..." name="keyword" class="my-5 border border-black rounded-lg p-2">
                <button type="submit" name="search" class="border border-black rounded-lg bg-zinc-100 hover:bg-gray-300 p-2">Cari</button>
            </form>
        </div>

        <?php include "halaman.php";?>

        <div class="mx-auto">
            <div class="relative overflow-x-auto">
                <table class="w-full border-collapse border border-black">
                    <thead>
                        <tr>
                            <th scope="col" class="border bg-gray-300 border-black py-3 text-center">No. KK</th>
                            <th scope="col" class="border bg-gray-300 border-black py-3 text-center">Nama Kepala Keluarga</th>
                            <th scope="col" class="border bg-gray-300 border-black py-3 text-center">Jumlah Tanggungan</th>
                            <th scope="col" class="border bg-gray-300 border-black py-3 text-center">Status Bayar</th>
                            <th scope="col" class="border bg-gray-300 border-black py-3 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1;
                    ?>
                    <?php foreach($sqlmuzakki as $muzakki) : ?>
                        <tr>
                            <th scope="row" class="border border-black py-4 font-medium text-black text-center">
                                <?=$muzakki['no_kk']?>
                            </th>
                            <td class="border border-black py-4 text-center">
                                <?=$muzakki['nama']?>
                            </td>
                            <td class="border border-black py-4 text-center">
                                <?=$muzakki['jml_tanggungan']?>
                            </td>
                            <td class="border border-black py-4 text-center">
                                <?php
                                if ($muzakki['status'] == 0){
                                    echo "<i class='fa-solid fa-x' style='color: red;'></i>";
                                } else {
                                    echo "<i class='fa-solid fa-check' style='color: green;'></i>";
                                }
                                ?>
                            </td>
                            <td class="border-black py-4 flex justify-center text-left">
                            <button id="defaultModalButton" data-modal-toggle="detail<?=$i?>" class="font-medium text-green-600 hover:text-green-400 mx-2">Detail</button>
                                <div id="detail<?=$i?>" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                                    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                                        <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                                            <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                                    Detail Muzakki
                                                </h3>
                                                <button type="button" class="text-black bg-gray-300 hover:bg-red-600 rounded-full px-3 py-1.5 inline-flex items-center dark:hover:bg-red-600 dark:hover:text-white" data-modal-toggle="detail<?=$i?>">
                                                    X<span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
                                            <div>
                                                <h4>Nomor Kartu Keluarga : <?=$muzakki['no_kk']?></h4>
                                                <h4>Nama Kepala Keluarga : <?=$muzakki['nama']?></h4>
                                                <h4>Jumlah Tanggungan : <?=$muzakki['jml_tanggungan']?></h4>
                                                <p>Perhitungan :</p>
                                                <br>
                                                <p>Beras : <?=$muzakki['jml_tanggungan']?> x 2,5 kg = <?=$muzakki['beras']?> kg</p>
                                                <p>Uang : <?=$muzakki['jml_tanggungan']?> x 37.500 = Rp. <?=$muzakki['uang']?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button id="defaultModalButton" data-modal-toggle="edit<?=$i?>" class="font-medium text-blue-600 hover:text-blue-400 mx-2">Edit</button>
                                <div id="edit<?=$i?>" tabindex="-1" aria-hidden="true" class="justify-start text-left hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
                                    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                                        <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                                            <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                                    Edit Muzakki
                                                </h3>
                                                <button type="button" class="text-black bg-gray-300 hover:bg-red-600 rounded-full px-3 py-1.5 inline-flex items-center dark:hover:bg-red-600 dark:hover:text-white" data-modal-toggle="edit<?=$i?>">
                                                    X<span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
                                            <form action="aksi.php?aksi=editmuz" method="post">
                                                <div class="gap-4 mb-4 sm:grid-cols-2">
                                                    <div>
                                                        <label for="no_kk">No. KK</label>
                                                        <input type="text" name="no_kk" value="<?=$muzakki['no_kk']?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nomor Keluarga..." required style="pointer-events:none;">
                                                    </div>
                                                    <div class="mt-5">
                                                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kepala Keluarga Muzakki</label>
                                                        <input type="text" value="<?=$muzakki['nama']?>" name="nama" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 " placeholder="Tulis nama.." required>
                                                    </div>
                                                    <div class="mt-5">
                                                        <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah Tanggungan</label>
                                                        <input type="number" name="jml_tanggungan" value="<?=$muzakki['jml_tanggungan']?>" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Masukkan jumlah tanggungan..." required>
                                                    </div>
                                                </div>
                                                <button type="submit" name="edit" class="border border-black rounded-lg bg-zinc-100 hover:bg-gray-300 p-2">Edit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <form action="aksi.php?aksi=hapusmuz" method="post">
                                    <input type="text" name="no_kk" value="<?=$muzakki['no_kk']?>" class="hidden">
                                    <button type="submit" name="hapus" class="font-medium text-red-600 hover:text-red-400 mx-2">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    <?php $i++ ?>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
      </div>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
      <script>
        document.addEventListener("DOMContentLoaded", function(event) {
        document.getElementById('defaultModalButton').click();
        });
      </script>
</body>
</html>

<?php 
    function search($keyword){
        global $conn;

        $query = "SELECT * FROM muzakki WHERE nama LIKE '%$keyword%'";
        return mysqli_query($conn, $query);
    }
?>