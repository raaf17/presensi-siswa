<?= $this->section('scripts') ?>
<script>
    window.setInterval('waktuMasuk()', 1000);

    function waktuMasuk() {
        const waktu = new Date();

        document.getElementById('jam-masuk').innerHTML = formatWaktu(waktu.getHours());
        document.getElementById('menit-masuk').innerHTML = formatWaktu(waktu.getMinutes());
        document.getElementById('detik-masuk').innerHTML = formatWaktu(waktu.getSeconds());
    }

    window.setInterval('waktuKeluar()', 1000);

    function waktuKeluar() {
        const waktu = new Date();

        document.getElementById('jam-keluar').innerHTML = formatWaktu(waktu.getHours());
        document.getElementById('menit-keluar').innerHTML = formatWaktu(waktu.getMinutes());
        document.getElementById('detik-keluar').innerHTML = formatWaktu(waktu.getSeconds());
    }

    function formatWaktu(waktu) {
        if (waktu < 10) {
            return "0" + waktu;
        } else {
            return waktu;
        }
    }

    getLocation();

    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            alert('Browser Anda tidak mendukung Geolocation')
        }
    }

    function showPosition(position) {
        var latitude_pegawai = position.coords.latitude;
        var longitude_pegawai = position.coords.longitude;

        document.getElementById('latitude_pegawai').value = latitude_pegawai;
        document.getElementById('longitude_pegawai').value = longitude_pegawai;

        initMap(latitude_pegawai, longitude_pegawai);
    }

    function initMap(latitude_pegawai, longitude_pegawai) {
        var map = L.map('map').setView([<?= $lokasipresensi->latitude ?>, <?= $lokasipresensi->longitude ?>], 13);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        var circle = L.circle([latitude_pegawai, longitude_pegawai], {
            color: 'red',
            fillColor: '#f03',
            fillOpacity: 0.5,
            radius: 500
        }).addTo(map);

        var greenIcon = L.icon({
            iconUrl: '<?= base_url('assets/img/icons/office-building.png') ?>',
            shadowUrl: '<?= base_url('assets/img/icons/office-building.png') ?>',

            iconSize: [50, 64],
            shadowSize: [50, 64],
            iconAnchor: [22, 94],
            shadowAnchor: [52, 66],
            popupAnchor: [-3, -76]
        });

        L.marker([<?= $lokasipresensi->latitude ?>, <?= $lokasipresensi->longitude ?>], {
            icon: greenIcon
        }).addTo(map);

        circle.bindPopup("Lokasi anda saat ini.");
    }

    $(function() {
        <?php if (session()->has('message')) : ?>
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: "error",
                title: "<?= $_SESSION['message'] ?>"
            });
        <?php endif; ?>
    });
</script>
<?= $this->endSection() ?>