<div class="col-lg-12">
    <h1 class="page-header"><i class="fa fa-folder-open fa-fw"></i> Kelola Data Set</h1>
</div>
<div class="col-lg-3"></div>
<div class="col-lg-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>Kelola Data Jual</h4>
        </div>
        <div class="panel-body">
            <?php if ($_GET['form'] == "add") {
                include "aksi.php";
                if ($_POST) ?>
                <form action="" method="post">
                    <div class="form-group">
                        <label class="control-label" for="inputError">Input Kode</label>
                        <input type="number" class="form-control" name="kode" id="inputError">
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="inputError">Input Nama</label>
                        <input type="text" class="form-control" name="nama" id="inputError">
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="inputError">Input Terjual</label>
                        <input type="number" class="form-control" name="terjual" id="inputError">
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="inputError">Tanggal</label>
                        <input type="date" class="form-control" name="tanggal" id="inputError">
                    </div>

                    <center>
                        <button class="btn btn-primary btn-user" name="simpan">Simpan Data</button>
                    </center>
                </form>
            <?php } else if ($_GET['form'] == "edit") {

                $query = mysqli_query($kon, "SELECT * FROM data WHERE iddata='$_GET[id]'");
                $data = mysqli_fetch_assoc($query);
                $kode = $data['kode'];
                $nama = $data['nama'];
                $stok_sistem = $data['terjual'];
                $stok_lap = $data['tanggal'];
            ?>
                <?php include "aksi.php";
                if ($_POST) ?>
                <form action="" method="post">
                    <div class="form-group">
                        <label class="control-label" for="inputError">Input Kode</label>
                        <input type="number" class="form-control" name="kode" id="inputError" value="<?= $kode ?>">
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="inputError">Input Nama</label>
                        <input type="text" class="form-control" name="nama" id="inputError" value="<?= $nama ?>">
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="inputError">Input Stok Dalam Sistem</label>
                        <input type="number" class="form-control" name="terjual" id="inputError" value="<?= $stok_sistem ?>">
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="inputError">Input Stok Lapangan</label>
                        <input type="date" class="form-control" name="tanggal" id="inputError" value="<?= $stok_lap ?>">
                    </div>

                    <center>
                        <button class="btn btn-primary btn-user" name="simpan">Simpan Data</button>
                    </center>
                </form>
            <?php } ?>
        </div>
    </div>
</div>