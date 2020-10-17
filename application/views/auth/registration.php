    <!-- content -->
    <!-- <div id="content">
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
    </div> -->
    <!-- content -->
    <div id="content">
        <div class="container wrap">
            <div class="form">
                <p>Register</p>
                <form class="register-form" method="post" action="<?= base_url('auth/registration'); ?>">
                    <?= form_error('username', '<div class="alert alert-danger">', '</div>'); ?>
                    <?= form_error('email', '<div class="alert alert-danger">', '</div>'); ?>
                    <?= form_error('password', '<div class="alert alert-danger">', '</div>'); ?>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class="form-control" id="email" name="email" type="email" maxlength="50" value="<?= set_value('email'); ?>" />
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <div class="input-group mb-2 mr-sm-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">ilinkxyz.com/</div>
                            </div>
                            <input class="form-control" id="username" name="username" type="text" maxlength="10" value="<?= set_value('username'); ?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input class="form-control" id="password" placeholder="Password Minimal 8 Karakter" name="password" type="password" maxlength="20" />
                    </div>
                    <div class="form-group">
                        <label for="repeat-password">Repeat Password</label>
                        <input class="form-control" id="repeat-password" name="repeat-password" type="password" maxlength="20" />
                    </div>
                    <div class="submit-button">
                        <button type="submit" id="submit-button">daftar</button>
                    </div>
                </form>
            </div>
            <p class="message">Sudah punya akun?
                <a href="<?= base_url('auth'); ?>"><u>MASUK SEKARANG</u></a>
            </p>
        </div>
    </div>