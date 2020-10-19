    <div id="announcement-modal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Pengumuman</h5>
                </div>
                <div class="modal-body">
                    <p></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div id="reset-password-modal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Reset password</h5>
                </div>
                <div class="modal-body">
                    <!-- <div class="form-group">
                        <label for="nama_depan">Nama Depan</label>
                        <input id="nama_depan" name="nama_depan" minlength="3" value="<?= $user['nama_depan'] ?>" disabled />
                    </div> -->
                    <h5>Password Lama</h5><input id="old-password" type="password" class="form-control" maxlength='20' value="">
                    <h5>Password Baru</h5><input id="new-password" type="password" class="form-control" maxlength='20' value="">
                    <h5>Konfirmasi Password Baru</h5><input id="re-new-password" type="password" class="form-control" maxlength='20' value="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button id="save" type="button" class="btn btn-success" data-dismiss="modal">Simpan</button>
                   
                </div>
            </div>
        </div>
    </div>

    <!-- content -->
    <div id="content">
        <div class="container wrap-profile">
            <h2> MY ACCOUNT</h2>
            <div class="form">
                <form class="profile-form" method="post" action="<?= esc_url (base_url('profile/save')); ?>" enctype="multipart/form-data">
                    <?= $this->session->flashdata('pesan'); ?>

                    <!-- mulai ini ya -->
                    <div class="form-group">
                        <img src="<?= esc_url (base_url('assets/img/profile/') . $user['image']); ?>" class="img-thumbnail">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image" name="image" />
                            <label class="custom-file-label" for="image">Choose file</label>
                        </div>
                    </div>
                    <!-- sampai ini -->

                    <div class="form-group">
                        <label for="nama_depan">Nama Depan</label>
                        <input id="nama_depan" name="nama_depan" minlength="3" value="<?= $user['nama_depan'] ?>" disabled />
                    </div>
                    <div class="form-group">
                        <label for="nama_belakang">Nama Belakang</label>
                        <input id="nama_belakang" name="nama_belakang" minlength="3" value="<?= $user['nama_belakang'] ?>" disabled />
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input id="username" name="username" value="<?= $user['username'] ?>" disabled />
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" name="email" value="<?= $user['email'] ?>" disabled />
                    </div>
                    <div class="form-group">
                        <label for="i-link">i-Link</label>
                        <input id="i-link" name="i-link" value="ilinkxyz.com/<?= $user['username'] ?>" disabled />
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-auto">
                            <button type="submit" class="btn btn-success" id="save-button">Save</button>
                        </div>
                    </div>
                </form>
                <div class="row justify-content-end">
                    <div class="col-auto">
                        <button type="submit" class="btn btn-success"id="ubah-button">Ubah</button>
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-success"id="password-button">Change Password</button>
                    </div>
                </div>
               
            </div>
        </div>
    </div>