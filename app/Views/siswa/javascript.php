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
        var latitude_siswa = position.coords.latitude;
        var longitude_siswa = position.coords.longitude;

        document.getElementById('latitude_siswa').value = latitude_siswa;
        document.getElementById('longitude_siswa').value = longitude_siswa;

        initMap(latitude_siswa, longitude_siswa);
    }

    function initMap(latitude_siswa, longitude_siswa) {
        var map = L.map('map').setView([<?= $lokasipresensi->latitude ?>, <?= $lokasipresensi->longitude ?>], 13);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        var circle = L.circle([latitude_siswa, longitude_siswa], {
            color: 'red',
            fillColor: '#f03',
            fillOpacity: 0.5,
            radius: 500
        }).addTo(map);

        var greenIcon = L.icon({
            iconUrl: '<?= base_url('images/icons/office-building.png') ?>',
            shadowUrl: '<?= base_url('images/icons/office-building.png') ?>',

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