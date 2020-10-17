$('document').ready(function () {
    $('#save-button').hide();
    $('#ubah-button').click(function () {
        $('#ubah-button').hide();
        $('#password-button').hide();
        $('#save-button').show();
        $('#nama_depan').removeAttr('disabled');
        $('#nama_belakang').removeAttr('disabled');
        $('#email').removeAttr('disabled');
        $('#nama_depan').focus();
    });

    $('#password-button').click(function () {
        $('#reset-password-modal').modal('show');
        $('#reset-password-modal #save').click(function () {
            if ($('#reset-password-modal #new-password').val() != $('#reset-password-modal #re-new-password').val()) {
                $('#announcement-modal .modal-body>p').html('Password baru dan konfirmasi tidak sama!');
                $('#announcement-modal').modal('show');
            }
            else if ($('#reset-password-modal #new-password').val().length < 8) {
                $('#announcement-modal .modal-body>p').html('Password baru minimal 8 karakter!');
                $('#announcement-modal').modal('show');
            }
            else if ($('#reset-password-modal #new-password').val().lenght > 20) {
                $('#announcement-modal .modal-body>p').html('Password baru maksimal 20 karakter!');
                $('#announcement-modal').modal('show');
            }
            else {
                $.ajax({
                    type: 'post',
                    url: 'http://localhost/iLink-ci/application/controllers/profile/ubahPassword',
                    dataType: 'json',
                    data: {
                        old: $('#reset-password-modal #old-password').val(),
                        new: $('#reset-password-modal #new-password').val(),
                        re_new: $('#reset-password-modal #re-new-password').val()
                    },
                    success: function (response) {
                        if (response == 'old') {
                            $('#announcement-modal .modal-body>p').html('Password lama salah!');
                            $('#announcement-modal').modal('show');
                        }
                        else if (response == 'success') {
                            $('#announcement-modal .modal-body>p').html('Password anda telah berhasil direset!');
                            $('#announcement-modal').modal('show');
                        }
                    }
                });
            }
        });
    });
});