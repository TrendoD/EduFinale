<div id="page-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-title">
                    <h1>Dashboard Admin
                        <small>Statistik & Informasi</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>

        <!-- Row 1: Statistik -->
        <div class="row">
            <div class="col-lg-3">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-users fa-4x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div style="font-size: 2.5em;"><?= $total_users ?></div>
                                <div>Total User</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-graduation-cap fa-4x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div style="font-size: 2.5em;"><?= $total_mahasiswa ?></div>
                                <div>Total Mahasiswa</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-user fa-4x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div style="font-size: 2.5em;"><?= $total_dosen ?></div>
                                <div>Total Dosen</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3">
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-file-alt fa-4x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div style="font-size: 2.5em;"><?= $total_proposal ?></div>
                                <div>Total Proposal</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Row 2: Statistik Tambahan -->
        <div class="row">
            <div class="col-lg-4">
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-tasks fa-4x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div style="font-size: 2.5em;"><?= $total_sidang ?></div>
                                <div>Total Sidang</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-clock fa-4x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div style="font-size: 2.5em;"><?= $proposal_pending ?></div>
                                <div>Proposal Pending</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-clock fa-4x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div style="font-size: 2.5em;"><?= $sidang_pending ?></div>
                                <div>Sidang Pending</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Info Panel -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-info-circle"></i> Informasi Sistem</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h4><i class="fa fa-server"></i> System Info</h4>
                                <ul class="list-unstyled">
                                    <li><strong>PHP Version:</strong> <?= phpversion() ?></li>
                                    <li><strong>Server:</strong> <?= $_SERVER['SERVER_SOFTWARE'] ?></li>
                                    <li><strong>Database:</strong> MySQL</li>
                                    <li><strong>Framework:</strong> CodeIgniter <?= CI_VERSION ?></li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h4><i class="fa fa-clock"></i> Waktu</h4>
                                <ul class="list-unstyled">
                                    <li><strong>Zona Waktu:</strong> <?= $timezone ?></li>
                                    <li><strong>Waktu Sekarang:</strong> <?= $current_time ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>