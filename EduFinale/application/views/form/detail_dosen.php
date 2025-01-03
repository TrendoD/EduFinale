<?php
function status($status) {
    if ($status == 'pending') return '<a class="btn btn-xs btn-orange "><i class="fa fa-arrow-circle-o-right"></i> Belum Disetujui</a>';
    if ($status == 'approved') return '<a class="btn btn-xs btn-green"><i class="fa fa-check-circle"></i> Sudah Disetujui</a>';
    if ($status == 'rejected') return '<a class="btn btn-xs btn-red"><i class="fa fa-warning"></i> Formulir Ditolak</a>';
    if ($status == 'deleted') return '<a class="btn btn-xs btn-default"><i class="fa fa-trash-o"></i> Formulir Dihapus</a>';
    if ($status == 'edited') return '<a class="btn btn-xs btn-blue "><i class="fa fa-pencil"></i> Formulir Diedit</a>';
}

function namaDosen($arr, $nim) {
    foreach ($arr->result() as $row) {
        if ($row->nim == $nim) {
            return $row->nama;
        }
    }
}
?>

<script type="text/javascript">
    function sendAct(action) {
        $("[name=action]").val(action);
        $("#frm").submit();
    }
</script>

<div id="page-wrapper">

            <div class="page-content">

                <!-- begin PAGE TITLE ROW -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-title">
                            <h1>Detail Mahasiswa Bimbingan
                                <small></small>
                            </h1>
                            <ol class="breadcrumb">
                                <li><i class="fa fa-dashboard"></i>  Detail
                                </li>
                                <li class="active">Mahasiswa Bimbingan</li>
                            </ol>
                        </div>
                        <!--
                        <?php
                        if ($datadb->status == 'pending') {
                            ?>
                                <div class="alert alert-warning alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <strong>Pending : </strong> Formulir sedang ditinjau admin. Silahkan dicek secara berkala untuk melihat perubahan status
                                </div>
                            <?php
                        }elseif($datadb->status == 'approved') {
                            ?>
                            <script type="text/javascript">
                                     $(document).ready(function(){
                                        $(".btn").remove();
                                    });
                                 </script>
                                                            <?php
                        }elseif($datadb->status == 'rejected') {
                            ?>
                                <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <strong>Rejected : </strong> Formulir ditolak. Silahkan dicek kembali isian data
                                </div>
                            <?php
                        }
                        ?>
                        -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <!-- end PAGE TITLE ROW -->

                <!-- begin MAIN PAGE ROW -->
                <div class="row">

                    <!-- begin LEFT COLUMN -->
                    <div class="col-lg-12">

                        <div class="row">

                            <!-- Basic Form Example -->
                           <div class="col-lg-12">


                                <div class="portlet portlet-blue">
                                    <div class="portlet-heading">
                                        <div class="portlet-title">
                                            <h4>Rincian Informasi</h4>
                                        </div>
                                        <div class="portlet-widgets">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#formControls"><i class="fa fa-chevron-down"></i></a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div id="formControls" class="panel-collapse collapse in">
                                        <div class="portlet-body">
                                            
                                            <div class="form-horizontal">

                                                <div class="form-group">
                                                    <label for="textInput" class="col-sm-3 control-label">Nama Lengkap</label>
                                                    <div class="col-sm-9">
                                                        <label class="control-label" style="font-weight: normal;"><?=$detail->nama?></label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="textInput" class="col-sm-3 control-label">NIM</label>
                                                    <div class="col-sm-9">
                                                        <label class="control-label" style="font-weight: normal;"><?=$detail->nim?></label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="textInput" class="col-sm-3 control-label">Judul</label>
                                                    <div class="col-sm-9">
                                                        <label class="control-label" style="font-weight: normal;"><?=$detail->judul?></label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="textInput" class="col-sm-3 control-label">Dosen Pembimbing 1</label>
                                                    <div class="col-sm-9">
                                                        <label class="control-label" style="font-weight: normal;"><?=namaDosen($dosen, $detail->dosbing1)?></label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="textInput" class="col-sm-3 control-label">Dosen Pembimbing 2</label>
                                                    <div class="col-sm-9">
                                                        <label class="control-label" style="font-weight: normal;"><?=namaDosen($dosen, $detail->dosbing2)?></label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="textInput" class="col-sm-3 control-label">Tanggal Submit</label>
                                                    <div class="col-sm-9">
                                                        <label class="control-label" style="font-weight: normal;"><?php echo date('l, d/m/Y', strtotime($detail->tanggal))?></label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="textInput" class="col-sm-3 control-label">Tanggal Verifikasi</label>
                                                    <div class="col-sm-9">
                                                        <label class="control-label" style="font-weight: normal;"><?php echo date('l, d/m/Y', strtotime($detail->tanggalverif))?></label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="textInput" class="col-sm-3 control-label">Berkas</label>
                                                    <div class="col-sm-9">
                                                    <label class="control-label" style="font-weight: normal;"><?=$detail->berkas?></label>
                                                        <a href="/berkas/<?=$detail->berkas?>" download class="btn btn-xs btn-primary" style="margin-left: 10px;">
                                                            <i class="fa fa-download"></i> Unduh
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.portlet -->
                            </div>
                            <!-- /.col-lg-12 (nested) -->
                            <!-- End Basic Form Example -->

                            <!-- Inline Form Example -->
                            <!-- /.col-lg-12 (nested) -->
                            <!-- End Inline Form Example -->

                            <!-- Horizontal Form Example -->
                            <!-- /.col-lg-12 (nested) -->
                            <!-- End Horizontal Form Example -->

                            <!-- Input Groups Example -->

                            <!-- /.col-lg-12 (nested) -->
                            <!-- End Input Groups Example -->

                        </div>
                        <!-- /.row (nested) -->

                    </div>
                    <!-- /.col-lg-6 -->
                    <!-- end LEFT COLUMN -->

                    <!-- begin RIGHT COLUMN -->
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="portlet portlet-green">
                                    <div class="portlet-heading">
                                        <div class="portlet-title">
                                            <h4><i class="fa fa-exchange fa-fw"></i> Riwayat Bimbingan</h4>
                                        </div>
                                        <div class="portlet-widgets">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#transactionsPortlet"><i class="fa fa-chevron-down"></i></a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div id="transactionsPortlet" class="panel-collapse collapse in">
                                        <div class="portlet-body">
                                            <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modalTambahRiwayat">
                                                <i class="fa fa-plus"></i> Tambah Riwayat
                                            </button>
                                            <br><br>
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>Pertemuan</th>
                                                            <th>Tanggal</th>
                                                            <th>Waktu</th>
                                                            <th>Tempat</th>
                                                            <th>Catatan</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php 
                                                        $riwayat = $this->db->get_where('riwayat_bimbingan', array(
                                                            'id_mahasiswa' => $detail->nim,
                                                            'id_dosen' => $this->session->userdata('nim')
                                                        ))->result();
                                                        
                                                        if(!empty($riwayat)): 
                                                            foreach($riwayat as $r): 
                                                        ?>
                                                            <tr>
                                                                <td><?= $r->pertemuan ?></td>
                                                                <td><?= date('d/m/Y', strtotime($r->tanggal)) ?></td>
                                                                <td><?= $r->waktu_mulai ?> - <?= $r->waktu_selesai ?></td>
                                                                <td><?= $r->tempat ?></td>
                                                                <td><?= $r->catatan ?></td>
                                                                <td>
                                                                    <a href="<?= base_url('aksi/hapus_riwayat/'.$r->id_riwayat) ?>" class="btn btn-xs btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus riwayat ini?')">
                                                                        <i class="fa fa-trash-o"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        <?php 
                                                            endforeach;
                                                        else: 
                                                        ?>
                                                            <tr>
                                                                <td colspan="6" class="text-center">Belum ada riwayat bimbingan</td>
                                                            </tr>
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
                    <!-- end RIGHT COLUMN -->

                </div>
                <!-- /.row -->
                <!-- end MAIN PAGE ROW -->

            </div>
            <!-- /.page-content -->

        </div>
        <!-- /#page-wrapper -->
        <!-- end MAIN PAGE CONTENT -->

    </div>
    <!-- /#wrapper -->

    <!-- GLOBAL SCRIPTS -->

<!-- Modal Tambah Riwayat -->
<div class="modal fade" id="modalTambahRiwayat" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Riwayat Bimbingan</h4>
            </div>
            <form action="<?= base_url('aksi/tambah_riwayat') ?>" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="id_mahasiswa" value="<?= $detail->nim ?>">
                    
                    <div class="form-group">
                        <label>Pertemuan Ke-</label>
                        <input type="number" class="form-control" name="pertemuan" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" class="form-control" name="tanggal" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Waktu Mulai</label>
                        <input type="time" class="form-control" name="waktu_mulai" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Waktu Selesai</label>
                        <input type="time" class="form-control" name="waktu_selesai" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Tempat</label>
                        <input type="text" class="form-control" name="tempat" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Catatan</label>
                        <textarea class="form-control" name="catatan" rows="3" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                       <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                       <button type="submit" class="btn btn-primary">Simpan</button>
                   </div>
               </form>
           </div>
       </div>
   </div>