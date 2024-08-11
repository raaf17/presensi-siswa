<?= $this->extend('layouts/main'); ?>

<?= $this->section('content'); ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6 col-md-4">
                <div class="card text-center">
                    <div class="card-header">
                        <h5>Ambil Foto Selfie</h5>
                    </div>
                    <div class="card-body">
                        <input type="hidden" id="id_siswa" name="id_siswa" value="<?= $id_siswa ?>">
                        <input type="hidden" id="tanggal_masuk" name="tanggal_masuk" value="<?= $tanggal_masuk ?>">
                        <input type="hidden" id="jam_masuk" name="jam_masuk" value="<?= $jam_masuk ?>">
                        <div class="d-flex justify-content-center">
                            <div id="my_camera"></div>
                            <div style="display: none;" id="my_result"></div>
                        </div>
                        <button class="btn btn-info mt-4" id="ambil-foto">Masuk</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-3"></div>
        </div>
    </section>
</div>
<?= $this->endSection(); ?>

<?= $this->section('scripts') ?>
<script>
    Webcam.set({
        width: 320,
        height: 240,
        dest_width: 320,
        dest_height: 220,
        image_format: 'jpeg',
        jpeg_quality: 90,
        force_flash: false
    });

    Webcam.attach('#my_camera');

    document.getElementById('ambil-foto').addEventListener('click', function() {
        let id = document.getElementById('id_siswa').value;
        let tanggal_masuk = document.getElementById('tanggal_masuk').value;
        let jam_masuk = document.getElementById('jam_masuk').value;

        Webcam.snap(function(data_uri) {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                document.getElementById('my_result').innerHTML = '<img src="' + data_uri + '" />';
                if (this.readyState == 4 && this.status == 200) {
                    window.location.href = '<?= site_url('siswa/home') ?>';
                }
            }

            xhttp.open("POST", '<?= site_url('siswa/presensimasukaksi') ?>', true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send(
                'foto_masuk=' + encodeURIComponent(data_uri) +
                '&id_siswa=' + id +
                '&tanggal_masuk=' + tanggal_masuk +
                '&jam_masuk=' + jam_masuk
            );
        })
    })
</script>
<?= $this->endSection() ?>