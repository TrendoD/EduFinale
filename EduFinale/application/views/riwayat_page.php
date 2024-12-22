<div id="page-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-title">
                    <h1>Riwayat Bimbingan
                        <small></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-dashboard"></i> Dashboard</li>
                        <li class="active">Riwayat Bimbingan</li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="portlet portlet-default">
                    <div class="portlet-heading">
                        <div class="portlet-title">
                            <h4>Informasi Tugas Akhir</h4>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="portlet-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <?php if(isset($pengajuan)): ?>
                                <table class="table table-striped">
                                    <tr>
                                        <td width="200">Judul</td>
                                        <td width="10">:</td>
                                        <td><?php echo $pengajuan->judul; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Dosen Pembimbing 1</td>
                                        <td>:</td>
                                        <td>
                                            <?php
                                            $dosbing1 = $this->db->get_where('user', array('nim'=>$pengajuan->dosbing1))->row();
                                            echo isset($dosbing1) ? $dosbing1->nama : '-';
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Dosen Pembimbing 2</td>
                                        <td>:</td>
                                        <td>
                                            <?php
                                            if(!empty($pengajuan->dosbing2)) {
                                                $dosbing2 = $this->db->get_where('user', array('nim'=>$pengajuan->dosbing2))->row();
                                                echo isset($dosbing2) ? $dosbing2->nama : '-';
                                            } else {
                                                echo '-';
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                </table>
                                <?php else: ?>
                                <div class="alert alert-warning">
                                    Anda belum mengajukan judul tugas akhir.
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="portlet portlet-default">
                    <div class="portlet-heading">
                        <div class="portlet-title">
                            <h4>Riwayat Bimbingan</h4>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTable">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 50px">No.</th>
                                        <th class="text-center" style="width: 100px">Pertemuan</th>
                                        <th class="text-center" style="width: 100px">Tanggal</th>
                                        <th class="text-center" style="width: 100px">Waktu</th>
                                        <th style="width: 150px">Dosen Pembimbing</th>
                                        <th style="width: 200px">Tempat</th>
                                        <th>Catatan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(empty($riwayat)): ?>
                                    <tr>
                                        <td colspan="7" class="text-center">Belum ada riwayat bimbingan</td>
                                    </tr>
                                    <?php else: ?>
                                        <?php 
                                        $no = 1;
                                        foreach($riwayat as $row): 
                                            // Convert times to 24-hour format
                                            $waktu_mulai = date('H:i', strtotime($row->waktu_mulai));
                                            $waktu_selesai = date('H:i', strtotime($row->waktu_selesai));
                                        ?>
                                        <tr>
                                            <td class="text-center"><?php echo $no++; ?></td>
                                            <td class="text-center">Ke-<?php echo $row->pertemuan; ?></td>
                                            <td class="text-center"><?php echo date('d/m/Y', strtotime($row->tanggal)); ?></td>
                                            <td class="text-center"><?php echo $waktu_mulai . ' - ' . $waktu_selesai; ?></td>
                                            <td><?php echo $row->nama_dosen; ?></td>
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
        </div>
    </div>
</div>

<!-- Initialize DataTable -->
<script>
$(document).ready(function() {
    if($('#dataTable tbody tr').length > 1) {  // Only initialize if there's actual data
        $('#dataTable').DataTable({
            responsive: true,
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
    }
});
</script>