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
                            <h1>Detail Pengajuan Proposal Tugas Akhir
                                <small></small>
                            </h1>
                            <ol class="breadcrumb">
                                <li><i class="fa fa-dashboard"></i>  Detail
                                </li>
                                <li class="active">Pengajuan Proposal Tugas Akhir</li>
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
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="portlet portlet-green">
                                    <div class="portlet-heading">
                                        <div class="portlet-title">
                                            <h4><i class="fa fa-exchange fa-fw"></i> Aksi</h4>
                                        </div>
                                        <div class="portlet-widgets">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#transactionsPortlet"><i class="fa fa-chevron-down"></i></a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div id="transactionsPortlet" class="panel-collapse collapse in">
                                        <div class="portlet-body">
                                            <div class="form-horizontal">
                                                <form id="frm" action="/aksi/Kaprodi" method="post">
                                                    <input type="hidden" name="nim" value="<?=$detail->nim?>">
                                                    <input type="hidden" name="id" value="<?=$detail->id?>">
                                                    
                                                    <div class="form-group">
                                                        <label for="textInput" class="col-sm-3 control-label">Pilih Dosen Pembimbing 2</label>
                                                        <div class="form-horizontal">
                                                            <div class="col-sm-8">
                                                                <select class="form-control" name="pilihandosen2">
                                                                    <option selected disabled hidden>Pilih Dosen</option>
                                                                    <?php
                                                                    foreach ($dosen->result() as $row) {
                                                                        echo "<option value='$row->nim'>$row->nama - $row->nim</option>";
                                                                    }
                                                                    ?>
                                                                    
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="textArea" class="col-sm-3 control-label"> </label>
                                                        <div class="col-sm-8">
                                                            <button type="submit" class="btn btn-success"><i class="fa fa-check-circle"></i> Simpan Data</button> 
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.col-lg-12 -->

                        </div>
                    </div>

                    <script type="text/javascript">
                        $(document).ready(function() {
                            $('[name=pilihandosen1]').select2();
                            $('[name=pilihandosen2]').select2();
                        });
                    </script>

                            <!-- Form Controls -->

                            <!-- /.col-lg-12 (nested) -->
                            <!-- End Form Controls -->

                            <!-- Input Sizing -->

                            <!-- /.col-lg-12 (nested) -->
                            <!-- End Form Controls -->

                        </div>
                        <!-- /.row (nested) -->

                    </div>
                    <!-- /.col-lg-6 -->
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