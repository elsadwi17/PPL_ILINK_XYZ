   
    <div id="content">
        <div class="container wrap">
            <div class="form">
                <p>LOGIN</p>
                <form class="login-form" method="post" action="<?= esc_url (base_url('auth')); ?>">
                    <?= esc_html  (form_error('email', '<div class="alert alert-danger">', '</div>')); ?>
                    <?= esc_html (form_error('password', '<div class="alert alert-danger">', '</div>')); ?>
                    <?= esc_html ($this->session->flashdata('pesan')); ?>
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
                <a href="<?= esc_url (base_url('auth/registration')); ?>"><u>DAFTAR SEKARANG</u></a>
            </p>
        </div>
    </div>