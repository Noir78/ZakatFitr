<div class="navigasi my-5">
            <?php if($halamanAktif > 1) : ?>
                <a href="?halaman=<?= $halamanAktif - 1 ?>" class="nav">&laquo;</a>
            <?php endif; ?>

            <?php for($i = 1; $i <= $jumlahHalaman; $i++) : ?>
                <?php if($i == $halamanAktif) : ?>
                <a href="?halaman=<?= $i?>" class="nav text-green-900 font-bold underline"><?= $i;?></a>
                <?php else: ?>
                <a href="?halaman=<?= $i?>" class="nav"><?= $i;?></a>
                <?php endif; ?>
            <?php endfor; ?>

            <?php if($halamanAktif < $jumlahHalaman) : ?>
                    <a href="?halaman=<?= $halamanAktif + 1 ?>" class="nav">&raquo;</a>
            <?php endif; ?>
        </div>