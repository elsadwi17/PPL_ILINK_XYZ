<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Account</title>
    <script src="<?= base_url(); ?>assets/global.js"></script>
    <script>
        globalInclude();
    </script>
    <script src="<?= base_url(); ?>assets/js/dashboard.js"></script>
</head>

<body>
    <!-- navbar -->
    <nav id="navbar" class="d-flex">
        <a id="logo" href="<?= base_url(); ?>">
            <img src="assets/img/Logo_ILINK.png">
        </a>
    </nav>

    <!-- content -->
    <div id="content">
        <div class="container tampil-wrap">
            <h1>LINK KU</h1>
            <div class="bingkai-foto">
                <img src="<?= base_url() ?>assets/img/logo.png" class="foto-profile">
            </div>
            <button class="submit-button">
                <button type="submit" id="add-link-button">Tambah Link</button>
        </div>
        <div class="link">

        </div>
    </div>
    </div>

    <!-- footer -->
    <footer id="footer" class="page-footer">
        <div class="footer-copyright py-3 text-center">
            <span>©2019 Copyright:</span>
            <a id="flink" href="<?= base_url() ?>">iLink</a>
        </div>
    </footer>
</body>

</html>