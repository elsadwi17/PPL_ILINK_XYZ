<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="<?= esc_url (base_url());?>favicon.ico" type="image/gif">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="<?= esc_url (base_url()); ?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?= esc_url (base_url()); ?>assets/css/style.css">
    
</head>
<link rel="shortcut icon" href="<?= esc_url (base_url()); ?>assets/img/favicon.ico" type="image/x-icon">

<body>
   
        if (!$this->session->userdata('email')) { ?>
            <ul>
                <li><a href="<?= esc_url (base_url('faq')); ?>">FAQs</a></li>
                <li><a href="<?= esc_url (base_url('about')); ?>">Tentang Kami</a></li>
                <li><a href="<?= esc_url (base_url('auth')); ?>">Login</a></li>
            </ul>
        <?php } else { ?>
            <ul>
                <li><a href="<?= esc_url (base_url('dashboard')); ?>">My Link</a> </li>
                <li><a href="<?= esc_url (base_url('profile')); ?>">Profile</a> </li>
                <li><a href="<?= esc_url (base_url('faq')); ?>">FAQs</a> </li>
                <li><a href="<?= esc_url (base_url('about')); ?>">Tentang Kami</a></li>
                <li><a href="<?= esc_url (base_url('auth/logout')); ?>">Logout</a></li>
            </ul>
        <?php } ?>
    </nav> -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" id="logo" href="<?= esc_url (base_url()); ?>"><img src="<?= esc_url (base_url()); ?>assets/img/Logo_ILINK.png"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            </ul>

            <?php
            if (!$this->session->userdata('email')) { ?>
                <ul>
                    <li><a href="<?= esc_url (base_url('faq')); ?>">FAQs</a></li>
                    <li><a href="<?= esc_url (base_url('about')); ?>">Tentang Kami</a></li>
                    <li><a href="<?= esc_url (base_url('auth')); ?>">Login</a></li>
                </ul>
            <?php } else { ?>
                <ul>
                    <li><a href="<?= esc_url (base_url('dashboard')); ?>">My Link</a> </li>
                    <li><a href="<?= esc_url (base_url('profile')); ?>">Profile</a> </li>
                    <li><a href="<?= esc_url (base_url('faq')); ?>">FAQs</a> </li>
                    <li><a href="<?= esc_url (base_url('about')); ?>">Tentang Kami</a></li>
                    <li><a href="<?= esc_url (base_url('auth/logout')); ?>">Logout</a></li>
                </ul>
            <?php } ?>
        </div>
    </nav>