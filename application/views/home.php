<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>iLink</title>

    <script src="<?= base_url(); ?>assets/global.js"></script>
    <script>
        globalInclude();
    </script>
</head>

<body>
    <!-- navbar -->
    <header>
        <?php if (!$this->session->userdata('email')) { ?>
            <div class="main">
                <a class="logo" href="<?= base_url(); ?>">
                    <img src="assets/img/Logo_ILINK.png">
                </a>
                <ul>
                    <li><a href="#">Home</a> </li>
                    <li><a href="#">About</a> </li>
                    <li><a href="<?= base_url('auth'); ?>">Login</a>
                    </li>
                    <li><a href="<?= base_url('auth/registration'); ?>">Sing Up</a>
                    </li>
                </ul>
            </div>
            <div class="title">
                <h1> TEMUKAN KEMUDAHAN </h1>
                <h1> MENGELOLA AKUNMU DISINI ! </h1>
            </div>
            <div class="button">
                <a href="<?= base_url('auth/registration') ?>" class="btn">SIGN UP FREE!</a>
            </div>
        <?php } else { ?>
            <div class="main">
                <a class="logo" href="<?= base_url(); ?>">
                    <img src="assets/img/Logo_ILINK.png">
                </a>
                <ul>
                    <li><a href="#">Home</a> </li>
                    <li><a href="<?= base_url('profile') ?>">Profile</a>
                    </li>
                    <li><a href="<?= base_url('auth/logout') ?>">Logout</a>
                    </li>
                </ul>
            </div>
            <div class="title">
                <h1> TEMUKAN KEMUDAHAN </h1>
                <h1> MENGELOLA AKUNMU DISINI ! </h1>
            </div>
            <div class="button">
                <a href="<?= base_url('dashboard') ?>" class="btn">ADD LINK</a>
            </div>
        <?php } ?>

    </header>
    <!-- content -->
    <div class="konten">
        <div class="isi">
            <h2> Cara Kerjanya </h2>
            <pre>
                1. Login menggunakna akun 
                   i-Link yang telah dibuat
                2. Masuk ke Halaman but Link
                3. Tambahkan link sesuai yang 
                   diperlukan
                4. Sebarkan link yang sudah 
                   dibuat sesuka anda
                </pre>
        </div>
    </div>
    <!-- footer -->

</body>

</html>