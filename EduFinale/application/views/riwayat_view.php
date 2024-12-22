<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Riwayat Bimbingan</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Riwayat Bimbingan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Pertemuan</th>
                            <th>Dosen Pembimbing</th>
                            <th>Tanggal</th>
                            <th>Waktu</th>
                            <th>Tempat</th>
                            <th>Catatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(empty($riwayat)): ?>
                            <tr>
                                <td colspan="6" class="text-center">Belum ada riwayat bimbingan</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach($riwayat as $row): ?>
                                <tr>
                                    <td><?php echo $row->pertemuan; ?></td>
                                    <td><?php echo $row->nama_dosen; ?></td>
                                    <td><?php echo date('d/m/Y', strtotime($row->tanggal)); ?></td>
                                    <td><?php echo substr($row->waktu_mulai, 0, 5) . ' - ' . substr($row->waktu_selesai, 0, 5); ?></td>
                                    <td><?php echo $row->tempat; ?></td>
                                    <td><?php echo $row->catatan; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>