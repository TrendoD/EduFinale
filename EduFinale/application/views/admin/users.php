<div id="page-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-title">
                    <h1>Manajemen User
                        <small></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-dashboard"></i> Dashboard</li>
                        <li class="active">Manajemen User</li>
                    </ol>
                </div>
            </div>
        </div>

        <!-- Success Messages -->
        <?php if($this->input->get('success')) { ?>
            <div class="alert alert-success">
                <?php
                switch($this->input->get('success')) {
                    case 'add':
                        echo "User berhasil ditambahkan!";
                        break;
                    case 'edit':
                        echo "User berhasil diubah!";
                        break;
                    case 'delete':
                        echo "User berhasil dihapus!";
                        break;
                }
                ?>
            </div>
        <?php } ?>

        <!-- Error Messages -->
        <?php if($this->input->get('error')) { ?>
            <div class="alert alert-danger">
                <?php
                switch($this->input->get('error')) {
                    case 'incomplete':
                        echo "Semua field harus diisi!";
                        break;
                    case 'nim_exists':
                        echo "NIM/Username sudah digunakan!";
                        break;
                    case 'add':
                        echo "Gagal menambahkan user!";
                        break;
                    case 'edit':
                        echo "Gagal mengubah user!";
                        break;
                    case 'delete':
                        echo "Gagal menghapus user!";
                        break;
                    case 'self_delete':
                        echo "Tidak dapat menghapus akun sendiri!";
                        break;
                    case 'invalid':
                        echo "Request tidak valid!";
                        break;
                }
                ?>
            </div>
        <?php } ?>

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Data User
                            </div>
                            <div class="col-md-6 text-right">
                                <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#addUserModal">
                                    <i class="fa fa-plus"></i> Tambah User
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
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
                                            <?php if($user->id != $data->id) { ?>
                                            <a href="<?= base_url('admin/delete_user/'.$user->id) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Apakah Anda yakin ingin menghapus user ini?')">
                                                <i class="fa fa-trash"></i> Hapus
                                            </a>
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
                                                <form action="<?= base_url('admin/edit_user') ?>" method="post">
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
            <form action="<?= base_url('admin/add_user') ?>" method="post">
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

<script>
$(document).ready(function() {
    // Inisialisasi DataTable
    $('#userTable').DataTable({
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
        },
        "pageLength": 10
    });

    // Hapus alert setelah 3 detik
    setTimeout(function() {
        $('.alert').fadeOut('slow');
    }, 3000);
});
</script>