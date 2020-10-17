    <!-- content -->
    <!-- <div id="content">
        <div class="container wrap">
            <div class="kepala">
                <img src="<?= base_url(); ?>assets/img/logo.png" class="logo">
                <p>qwertyuiopasdfghjklzxcvbnm</p>
            </div>
            <div class="form">
                <form class="login-form" method="post" action="<?= base_url('auth'); ?>">
                    <?= form_error('email', '<div class="alert alert-danger">', '</div>'); ?>
                    <?= form_error('password', '<div class="alert alert-danger">', '</div>'); ?>
                    <?= $this->session->flashdata('pesan'); ?>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" name="email" type="email" maxlength="50" value="<?= set_value('email'); ?>" />
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input id="password" name="password" type="password" maxlength="20" />
                    </div>
                    <div class="submit-button">
                        <button type="submit" id="login-button">masuk</button>
                    </div>
                </form>
            </div>
            <p class="message">Belum punya akun?
                <a href="<?= base_url('auth/registration'); ?>"><u>DAFTAR SEKARANG</u></a>
            </p>
        </div>
    </div> -->

    <!-- content -->
    <div id="content">
        <div class="container wrap">
            <div class="form">
                <p>LOGIN</p>
                <form class="login-form" method="post" action="<?= base_url('auth'); ?>">
                    <?= form_error('email', '<div class="alert alert-danger">', '</div>'); ?>
                    <?= form_error('password', '<div class="alert alert-danger">', '</div>'); ?>
                    <?= $this->session->flashdata('pesan'); ?>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class="form-control" id="email" name="email" type="email" maxlength="50" value="<?= set_value('email'); ?>" />
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input class="form-control" id="password" name="password" type="password" maxlength="20" />
                    </div>
                    <div class="submit-button">
                        <button type="submit" id="submit-button">masuk</button>
                    </div>
                </form>
            </div>
            <p class="message">Belum punya akun?
                <a href="<?= base_url('auth/registration'); ?>"><u>DAFTAR SEKARANG</u></a>
            </p>
        </div>
    </div>