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
    <nav id="navbar" class="d-flex">
        <a id="logo" href="<?= base_url(); ?>">
            <img src="<?= base_url(); ?>assets/img/Logo_ILINK.png">
        </a>
    </nav>

    <!-- content -->
    <div id="content">
        <div class="container wrap">
            <div class="kepala">
                <img src="<?= base_url(); ?>assets/img/logo.png" class="logo">
            </div>
            <div class="form">
                <form class="register-form" method="post" action="<?= base_url('auth/registration'); ?>">
                    <?= form_error('username', '<div class="alert alert-danger">', '</div>'); ?>
                    <?= form_error('email', '<div class="alert alert-danger">', '</div>'); ?>
                    <?= form_error('password', '<div class="alert alert-danger">', '</div>'); ?>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" name="email" type="email" maxlength="50" value="<?= set_value('email'); ?>" />
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input id="username" name="username" type="username" maxlength="10" value="<?= set_value('username'); ?>" />
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input id="password" name="password" type="password" maxlength="20" />
                    </div>
                    <div class="form-group">
                        <label for="repeat-password">Repeat Password</label>
                        <input id="repeat-password" name="repeat-password" type="password" maxlength="20" />
                    </div>
                    <div class="submit-button">
                        <button type="submit" id="register-button">daftar</button>
                    </div>
                </form>
            </div>
            <p class="message">Sudah punya akun?
                <a href="<?= base_url('auth'); ?>"><u>MASUK SEKARANG</u></a>
            </p>
        </div>
    </div>

    <!-- footer -->
    <footer id="footer" class="page-footer">
        <div class="footer-copyright py-3 text-center">
            <span>©2019 Copyright:</span>
            <a id="flink" href="<?= base_url(); ?>">iLink</a>
        </div>
    </footer>
</body>

</html>