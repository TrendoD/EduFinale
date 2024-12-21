<?php
function status($status) {
    if ($status == 'pending') return '<a class="btn btn-xs btn-orange "><i class="fa fa-arrow-circle-o-right"></i> Formulir Diajukan</a>';
    if ($status == 'approved') return '<a class="btn btn-xs btn-green"><i class="fa fa-check-circle"></i> Sudah Disetujui</a>';
    if ($status == 'rejected') return '<a class="btn btn-xs btn-red"><i class="fa fa-warning"></i> Formulir Ditolak</a>';
    if ($status == 'deleted') return '<a class="btn btn-xs btn-default"><i class="fa fa-trash-o"></i> Formulir Dihapus</a>';
    if ($status == 'edited') return '<a class="btn btn-xs btn-blue "><i class="fa fa-pencil"></i> Formulir Diedit</a>';
}
?>
        <!-- begin MAIN PAGE CONTENT -->
        <div id="page-wrapper">
            <div class="page-content">
                <!-- begin PAGE TITLE AREA -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-title">
                            <h1>Dashboard
                                <small></small>
                            </h1>
                            <ol class="breadcrumb">
                                <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- end PAGE TITLE AREA -->

                <!-- begin DASHBOARD CIRCLE TILES -->
                <div class="row">
                    <?php
                    if ($data->tipe == "dosen") {
                     echo '
                        <div class="col-lg-3 col-sm-6">
                            <div class="circle-tile">
                                <a href="#">
                                    <div class="circle-tile-heading dark-blue">
                                        <i class="fa fa-user fa-fw fa-3x"></i>
                                    </div>
                                </a>
                                <div class="circle-tile-content dark-blue">
                                    <div class="circle-tile-description text-faded">
                                        Mahasiwa Bimbingan
                                    </div>
                                    <div class="circle-tile-number text-faded">
                                        '.$counter_dosen.'
                                        <span id="sparklineA"></span>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                     ';
                    } else {
                    ?>
                    <div class="col-lg-3 col-sm-6">
                        <div class="circle-tile">
                            <a href="#">
                                <div class="circle-tile-heading dark-blue">
                                    <i class="fa fa-book fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content dark-blue">
                                <div class="circle-tile-description text-faded">
                                    Formulir
                                </div>
                                <div class="circle-tile-number text-faded">
                                    <?=$counter_formulir;?>
                                    <span id="sparklineA"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="circle-tile">
                            <a href="#">
                                <div class="circle-tile-heading green">
                                    <i class="fa fa-check-circle fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content green">
                                <div class="circle-tile-description text-faded">
                                    Disetujui
                                </div>
                                <div class="circle-tile-number text-faded">
                                    <?=$counter_terima;?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="circle-tile">
                            <a href="#">
                                <div class="circle-tile-heading orange">
                                    <i class="fa fa-bell fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content orange">
                                <div class="circle-tile-description text-faded">
                                    Ditinjau
                                </div>
                                <div class="circle-tile-number text-faded">
                                    <?=$counter_tinjau;?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="circle-tile">
                            <a href="#">
                                <div class="circle-tile-heading red">
                                    <i class="fa fa-times-circle fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content red">
                                <div class="circle-tile-description text-faded">
                                    Ditolak
                                </div>
                                <div class="circle-tile-number text-faded">
                                    <?=$counter_tolak;?>
                                    <span id="sparklineC"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php 
                    } 
                    ?>
                </div>
                <!-- end DASHBOARD CIRCLE TILES -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-12">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end MAIN PAGE CONTENT -->
    </div>
    <!-- /#wrapper -->
