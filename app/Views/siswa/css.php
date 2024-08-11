<?= $this->section('stylesheets') ?>
<style>
    .parent-clock {
        display: grid;
        grid-template-columns: auto auto auto auto auto;
        font-size: 40px;
        font-weight: 700;
        justify-content: center;
    }

    #map {
        height: 400px;
        width: 600px;
        margin: auto;
    }

    @media (max-width: 425px) {
        /* Untuk layar small */
        #map {
            width: 250px;
        }
    }
</style>
<?= $this->endSection() ?>