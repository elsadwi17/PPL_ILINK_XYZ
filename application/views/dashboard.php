<div id="content">
    <?php
    if (!$this->session->userdata('email')) {
        redirect('auth');
    } else { ?>
        <div class='container emp-profile'>
            <h1>MY LINK</h1>
            <div class='bingkai-foto'>
                <?php $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(); ?>
                <img class='foto-profile' src='<?= base_url('assets/img/profile/') . $user['image'] ?>'>
            </div>
        </div>
        <div class=link-ci>
        <?php
        $username = $this->session->userdata('username');
        echo esc_url ('<a target="_blank" href="' . $username . '">ilinkxyz.com/' . $username . '</a>');
        echo esc_url ("</div>");
        echo esc_url ("<div class='add-link'>
                    <button onclick='tambah_link()' type='button' class='btn btn-primary'>+Tambah Link</button>
                  </div>");
        $query = $this->db->get_where('link', ['username' => $username]);
        if ($query->num_rows() == 0) {
            echo esc_url ('<div class="col-md-6 offset-md-3">
                        <div class="alert alert-danger alert-dashboard">Belum Ada Link yang ditambahkan, Silahkan Tambah Link</div>
                      </div>');
        } else {
            echo esc_url  ('<div class="link-result">
                        <table id="table" class="table table-hover">
                            <tr class="table-success">
                                <th scope="col">Title</th>
                                <th scope="col">URL</th>
                                <th scope="col"></th>
                            </tr>');
            foreach ($query->result() as $row) {
                $panjang_link = $row->link;
                echo esc_url ('<tr>
                            <td class="td_first">' . $row->title . '</td>');
                if (strlen($panjang_link) > 63) {
                    $link = substr($row->link, 0, 60);
                    if (substr($row->link, 0, 4) == 'http') {
                        echo  esc_url ('<td><a target="_blank" href="' . $row->link . '">' . $link . '...</a></td>');
                    } else {
                        echo esc_url ('<td><a target="_blank" href="https://' . $row->link . '">' . $link . '...</a></td>');
                    }
                } else {
                    if (substr($row->link, 0, 4) == 'http') {
                        echo esc_url('<td><a target="_blank" href="' . $row->link . '">' . $row->link . '</a></td>');
                    } else {
                        echo esc_url  ('<td><a target="_blank" href="https://' . $row->link . '">' . $row->link . '</a></td>');
                    }
                }
                echo esc_url ('<td width="19%">
                                <a class="btn btn-danger" id="btn-delete" href="javascript:void(0)" title="Hapus" onclick="delete_link(' . "'" . $row->id_link . "'" . ')">Delete</a>
                                <a class="btn btn-success" id="btn-edit" href="javascript:void(0)" title="Edit" onclick="edit_link(' . "'" . $row->id_link . "'" . ')">Edit</a>
                            </td>
                         </tr>');
            }
            echo esc_url ('  </table>
                     </div>');
        }
    }
        ?>
        </div>
        <script type="text/javascript">
            var save_method;
            var table;

            function tambah_link() {
                save_method = 'add';
                $('#form')[0].reset();
                $('.form-group').removeClass('has-error');
                $('.help-block').empty();
                $('#modal_form').modal('show');
                $('.modal-title').text('Tambah Link');
                $('#btnAdd').text('Tambah');
            }

            function edit_link(id) {
                save_method = 'update';
                $('#form')[0].reset();
                $('.form-group').removeClass('has-error');
                $('.help-block').empty();
                $('#btnAdd').text('Save');

                $.ajax({
                    url: "<?php echo esc_url('dashboard/ajax_edit/') ?>/" + id,
                    type: "GET",
                    dataType: "JSON",
                    success: function(data) {
                        $('[name="id_link"]').val(data.id_link);
                        $('[name="title"]').val(data.title);
                        $('[name="link"]').val(data.link);
                        $('#modal_form').modal('show');
                        $('.modal-title').text('Edit Link');
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('Error get data from ajax');
                    }
                });
            }

            function tambah() {
                $('#btnAdd').text('saving...');
                $('#btnAdd').attr('disabled', true);

                if (save_method == 'add') {
                    url = "<?php echo esc_url('dashboard/ajax_tambah') ?>";
                } else if (save_method == 'update') {
                    url = "<?php echo esc_url('dashboard/ajax_update') ?>";
                }

                $.ajax({
                    url: url,
                    type: "POST",
                    data: $('#form').serialize(),
                    dataType: "JSON",
                    success: function(data) {
                        if (data.status) {
                            $('#modal_form').modal('hide');
                            reload_table();
                        } else {
                            for (var i = 0; i < data.inputerror.length; i++) {
                                $('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error');
                                $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]);
                            }
                        }
                        $('#btnAdd').text('Save');
                        $('#btnAdd').attr('disabled', false);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('Error Addin/ Update Data');
                        $('#btnAdd').text('Save');
                        $('#btnAdd').attr('disabled', false);
                    }
                });
            }

            function delete_link(id) {
                if (confirm('Anda yakin akan menghapus data ini?')) {
                    $.ajax({
                        url: "<?php echo esc_url('dashboard/ajax_delete') ?>/" + id,
                        type: "POST",
                        dataType: "JSON",
                        success: function(data) {
                            $('#modal_form').modal('hide');
                            reload_table();
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            alert('Error Delete Data');
                        }
                    });
                }
            }

            function reload_table() {
                location.reload();
            }
        </script>

        <!-- Modal -->
        <div class="modal fade" id="modal_form" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Link</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                    </div>

                    <div class="modal-body">
                        <form id="form" action="#">
                            <input type="hidden" name="id_link" class="form-control" placeholder="Id" required>
                            <div class="form-group row">
                                <label style="color:black" for="namalink" class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10">
                                    <input type="text" name="title" class="form-control" placeholder="Title" required>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label style="color:black;" for="urlink" class="col-sm-2 col-form-label">URL</label>
                                <div class="col-sm-10">
                                    <input type="text" name="link" class="form-control" placeholder="URL Link" required>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label style="color:black;" for="urlink" class="col-sm-2 col-form-label">Hide ?</label>
                                <div class="col-sm-10">
                                    <label class="switch">
                                        <input type="checkbox">
                                        <span class="slider round"></span>
                                        <span class="absolute-no">NO</span>
                                    </label>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="modal-footer">
                        <button type="button" onclick="tambah()" class="btn btn-primary" id="btnAdd">Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>