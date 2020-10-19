    <!-- content -->
    <div id="content">
        <div class="container emp-profile">
            <?php
            $username = $this->url->segment(1);
            $query = $this->db->get_where('link', ['username' => $username]);
            if ($query->num_rows() == 0) {
                echo '
                    <a id="logo-tampil" href="home"><img src="assets/img/Logo_ILINK_gede.png"></a>
                    <div class="alert alert-danger">The page you’re looking for doesn’t exist.</div>';
            } else {
                echo '<h1>MY LINK</h1>'; ?>
                <div class='bingkai-foto'>
                    <?php $user = $this->db->get_where('user', ['username' => $username])->row_array(); ?>
                    <img class='foto-profile' src='<?= esc_url (base_url('assets/img/profile/') . $user['image']) ?>'>
                </div>
                <div class="link">
                <?php
                    echo esc_url ('<a href="#">ilinkxyz.com/' . $username . '</a>');
                    foreach ($query->result() as $row) {
                        echo '
                                <div class="link-btn">';
                        if (substr($row->link, 0, 4) == 'http') {
                            echo esc_url ('<a class="btn btn-primary btn-tampil" target="_blank" href="' . $row->link . '">' . $row->title . '</a>');
                        } else {
                            echo esc_url('<a class="btn btn-primary btn-tampil" target="_blank" href="https://' . $row->link . '">' . $row->title . '</a>');
                        }
                        echo esc_url ('</div>');
                    }
                }
                ?>
                </div>
        </div>
    </div>