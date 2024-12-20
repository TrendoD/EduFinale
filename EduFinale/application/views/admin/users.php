<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div id="page-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-title">
                    <h1>Manajemen User</h1>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-dashboard"></i> Dashboard</li>
                        <li class="active">Manajemen User</li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="portlet portlet-default">
                    <div class="portlet-heading">
                        <div class="portlet-title">
                            <h4>Data User</h4>
                        </div>
                        <div class="portlet-widgets">
                            <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#addUserModal">
                                <i class="fa fa-plus"></i> Tambah User
                            </button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="userTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIM/Username</th>
                                        <th>Nama</th>
                                        <th>Tipe User</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $no = 1;
                                    foreach($users as $user) { ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $user->nim ?></td>
                                        <td><?= $user->nama ?></td>
                                        <td><?= ucfirst($user->tipe) ?></td>
                                        <td><?= $user->gender == 'lakilaki' ? 'Laki-laki' : 'Perempuan' ?></td>
                                        <td>
                                            <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#editUserModal<?= $user->id ?>">
                                                <i class="fa fa-edit"></i> Edit
                                            </button>
                                            <?php if($user->nim != $data->nim) { ?>
                                            <button class="btn btn-danger btn-xs" onclick="deleteUser(<?= $user->id ?>, '<?= $user->nama ?>')">
                                                <i class="fa fa-trash"></i> Hapus
                                            </button>
                                            <?php } ?>
                                        </td>
                                    </tr>

                                    <!-- Edit User Modal -->
                                    <div class="modal fade" id="editUserModal<?= $user->id ?>" tabindex="-1" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Edit User</h4>
                                                </div>
                                                <form id="editUserForm<?= $user->id ?>" onsubmit="return updateUser(<?= $user->id ?>)">
                                                    <div class="modal-body">
                                                        <input type="hidden" name="user_id" value="<?= $user->id ?>">
                                                        
                                                        <div class="form-group">
                                                            <label>NIM/Username</label>
                                                            <input type="text" class="form-control" name="nim" value="<?= $user->nim ?>" required>
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <label>Nama</label>
                                                            <input type="text" class="form-control" name="nama" value="<?= $user->nama ?>" required>
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <label>Password (Kosongkan jika tidak ingin mengubah)</label>
                                                            <input type="password" class="form-control" name="password">
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <label>Tipe User</label>
                                                            <select class="form-control" name="tipe" required>
                                                                <option value="mahasiswa" <?= $user->tipe == 'mahasiswa' ? 'selected' : '' ?>>Mahasiswa</option>
                                                                <option value="dosen" <?= $user->tipe == 'dosen' ? 'selected' : '' ?>>Dosen</option>
                                                                <option value="rmk" <?= $user->tipe == 'rmk' ? 'selected' : '' ?>>RMK</option>
                                                                <option value="kaprodi" <?= $user->tipe == 'kaprodi' ? 'selected' : '' ?>>Kaprodi</option>
                                                                <option value="admin" <?= $user->tipe == 'admin' ? 'selected' : '' ?>>Admin</option>
                                                            </select>
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <label>Jenis Kelamin</label>
                                                            <select class="form-control" name="gender" required>
                                                                <option value="lakilaki" <?= $user->gender == 'lakilaki' ? 'selected' : '' ?>>Laki-laki</option>
                                                                <option value="perempuan" <?= $user->gender == 'perempuan' ? 'selected' : '' ?>>Perempuan</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add User Modal -->
<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Tambah User Baru</h4>
            </div>
            <form id="addUserForm" onsubmit="return addUser()">
                <div class="modal-body">
                    <div class="form-group">
                        <label>NIM/Username</label>
                        <input type="text" class="form-control" name="nim" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Tipe User</label>
                        <select class="form-control" name="tipe" required>
                            <option value="">Pilih Tipe User</option>
                            <option value="mahasiswa">Mahasiswa</option>
                            <option value="dosen">Dosen</option>
                            <option value="rmk">RMK</option>
                            <option value="kaprodi">Kaprodi</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select class="form-control" name="gender" required>
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="lakilaki">Laki-laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Konfirmasi Hapus</h4>
            </div>
            <div class="modal-body">
                <p id="deleteConfirmText"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-danger" id="confirmDelete">Ya, Hapus!</button>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $('#userTable').DataTable({
        "pageLength": 10,
        "language": {
            "lengthMenu": "Tampilkan _MENU_ data per halaman",
            "zeroRecords": "Data tidak ditemukan",
            "info": "Menampilkan halaman _PAGE_ dari _PAGES_",
            "infoEmpty": "Tidak ada data tersedia",
            "infoFiltered": "(difilter dari _MAX_ total data)",
            "search": "Cari:",
            "paginate": {
                "first": "Pertama",
                "last": "Terakhir",
                "next": "Selanjutnya",
                "previous": "Sebelumnya"
            }
        }
    });
});

function addUser() {
    $.ajax({
        url: '<?= base_url('admin/add_user') ?>',
        type: 'POST',
        data: $('#addUserForm').serialize(),
        dataType: 'json',
        success: function(response) {
            if(response.status == 'success') {
                $('#addUserModal').modal('hide');
                alert(response.message);
                location.reload();
            } else {
                alert(response.message);
            }
        },
        error: function() {
            alert('Terjadi kesalahan sistem');
        }
    });
    return false;
}

function updateUser(id) {
    $.ajax({
        url: '<?= base_url('admin/edit_user') ?>',
        type: 'POST',
        data: $('#editUserForm' + id).serialize(),
        dataType: 'json',
        success: function(response) {
            if(response.status == 'success') {
                $('#editUserModal' + id).modal('hide');
                alert(response.message);
                location.reload();
            } else {
                alert(response.message);
            }
        },
        error: function() {
            alert('Terjadi kesalahan sistem');
        }
    });
    return false;
}

function deleteUser(id, nama) {
    var userId = id;
    $('#deleteConfirmText').text('Apakah anda yakin ingin menghapus user "' + nama + '"?');
    $('#deleteModal').modal('show');
    
    $('#confirmDelete').off('click').on('click', function() {
        $.ajax({
            url: '<?= base_url('admin/delete_user/') ?>' + userId,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                $('#deleteModal').modal('hide');
                if(response.status === 'success') {
                    alert(response.message);
                    location.reload();
                } else {
                    alert(response.message);
                }
            },
            error: function() {
                $('#deleteModal').modal('hide');
                alert('Terjadi kesalahan sistem');
            }
        });
    });
}
</script>
