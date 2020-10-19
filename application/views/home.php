<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>iLink</title>

    <link rel="stylesheet" href="<?= esc_url (base_url()); ?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?= esc_url (base_url()); ?>assets/css/style.css">
    <link rel="shortcut icon" href="<?= esc_url (base_url()); ?>assets/img/favicon.ico" type="image/x-icon">
</head>

<body>
    <!-- navbar -->
    <div id="content-home">
        <header>
            <?php if (!$this->session->userdata('email')) { ?>
                <div class="main">
                    <a class="logo" href="<?= esc_url (base_url()); ?>">
                        <img src="assets/img/Logo_ILINK.png">
                    </a>
                    <ul>
                        <li><a href="#">Home</a> </li>
                        <li><a href="<?= esc_url (base_url('about')); ?>">About</a> </li>
                        <li><a href="<?= esc_url (base_url('auth')); ?>">Login</a>
                        </li>
                        <li><a href="<?= esc_url (base_url('auth/registration')); ?>">Sign Up</a>
                        </li>
                    </ul>
                </div>
                <div class="title">
                    <h1> TEMUKAN KEMUDAHAN </h1>
                    <h1> MENGELOLA AKUNMU DISINI ! </h1>
                </div>
                <div class="button-home">
                    <a href="<?= esc_url (base_url('auth/registration')); ?>" class="btn">SIGN UP FREE!</a>
                </div>
            <?php } else { ?>
                <div class="main">
                    <a class="logo" href="<?= esc_url (base_url()); ?>">
                        <img src="assets/img/Logo_ILINK.png">
                    </a>
                    <ul>
                        <li><a href="#">Home</a> </li>
                        <li><a href="<?= esc_url (base_url('profile')); ?>">Profile</a>
                        </li>
                        <li><a href="<?= esc_url (base_url('auth/logout')); ?>">Logout</a>
                        </li>
                    </ul>
                </div>
                <div class="title">
                    <h1> TEMUKAN KEMUDAHAN </h1>
                    <h1> MENGELOLA AKUNMU DISINI ! </h1>
                </div>
                <div class="button-home">
                    <a href="<?= esc_url (base_url('dashboard')); ?>" class="btn">ADD LINK</a>
                </div>
            <?php } ?>
        </header>
        <!-- content -->
        <div class="konten">
            <div class="isi">
                <h2> Cara Kerjanya </h2>
                <pre>
                1. Masuk menggunakan akun 
                   i-Link yang telah dibuat
                2. Pergi ke halaman buat Link
                3. Tambahkan link sesuai yang 
                   diperlukan
                4. Sebarkan link yang sudah 
                   dibuat sesuka anda
                </pre>
            </div>
        </div>
        <div class="faq">
            <div class="isifaq ml-4 mr-4" id="accordion">
                <div class="faqHeader mt-5">Have a Question ?</div>
                <div class="card ">
            <div class="card-header">
                <h4 class="card-header">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Apakah perlu mendaftar untuk menggunakannya?</a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in">
                <div class="card-block">
                    Untuk menggunakan layanan ini anda harus menjadi member terlebih dahulu.
                </div>
            </div>
        </div>
        <div class="card ">
            <div class="card-header">
                <h4 class="card-header">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Berapa biaya untuk mendaftar?</a>
                </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse">
                <div class="card-block">
                    <p>Aplikasi kami gratis tanpa dipungut biaya, silahkan mendaftar :)</p>
                </div>
            </div>
        </div>
        <div class="card ">
            <div class="card-header">
                <h4 class="card-header">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Bagaiamana Cara Mendaftar Aplikasi kami?</a>
                </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse">
                <div class="card-block">
                    <p>1. Pilih menu Register/Sign Up atau klik link berikut ini <a target="_blank" href="https://ilinkxyz.com/auth/registration">Register</a></p>
                    <p>2. Isi Form pendaftaran dengan benar dan klik "Daftar"</p>
                    <p>3. Selanjutnya kami akan mengirim email ke akun email yang telah didaftarkan, email tersebut berisikan sebuah link untuk melakukan aktivasi akun</p>
                    <p>4. Jika akun sudah berhasil aktif, maka anda dapat Login dan menggunakan aplikasi kami</p>
                </div>
            </div>
        </div>
                <h4> <br>Click on FAQs to read more</h4>

            </div>
        </div>
    </div>