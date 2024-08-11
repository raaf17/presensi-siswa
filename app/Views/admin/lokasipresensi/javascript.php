<?= $this->section('scripts') ?>
<script>
    var map = L.map('map').setView([<?= $lokasipresensi->latitude ?>, <?= $lokasipresensi->longitude ?>], 13);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    var marker = L.marker([<?= $lokasipresensi->latitude ?>, <?= $lokasipresensi->longitude ?>]).addTo(map);
</script>
<?= $this->endSection() ?>