    <div id="content">
        <div class="container wrap">
            <div class="form">
                <p>Register</p>
                <form class="register-form" method="post" action="<?= esc_attr (base_url('auth/registration')); ?>">
                    <?= esc_html (form_error('username', '<div class="alert alert-danger">', '</div>')); ?>
                    <?= esc_html (form_error('email', '<div class="alert alert-danger">', '</div>')); ?>
                    <?= esc_html(form_error('password', '<div class="alert alert-danger">', '</div>')); ?>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class="form-control" id="email" name="email" type="email" maxlength="50" value="<?= esc_attr(set_value('email')); ?>" />
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <div class="input-group mb-2 mr-sm-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">ilinkxyz.com/</div>
                            </div>
                            <input class="form-control" id="username" name="username" type="text" maxlength="10" value="<?= esc_attr (set_value('username')); ?>" />
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
                <a href="<?= esc_url (base_url('auth')); ?>"><u>MASUK SEKARANG</u></a>
            </p>
        </div>
    </div>