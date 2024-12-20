<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- begin MAIN PAGE CONTENT -->
<div id="page-wrapper">
    <div class="page-content">
        <!-- Added padding wrapper -->
        <div class="dashboard-wrapper">
            <!-- begin DASHBOARD CIRCLE TILES -->
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="circle-tile">
                        <a href="#">
                            <div class="circle-tile-heading dark-blue">
                                <i class="fa fa-users fa-fw fa-3x"></i>
                            </div>
                        </a>
                        <div class="circle-tile-content dark-blue">
                            <div class="circle-tile-description text-faded">
                                Total Users
                            </div>
                            <div class="circle-tile-number text-faded">
                                10
                                <span id="sparklineA"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="circle-tile">
                        <a href="#">
                            <div class="circle-tile-heading green">
                                <i class="fa fa-graduation-cap fa-fw fa-3x"></i>
                            </div>
                        </a>
                        <div class="circle-tile-content green">
                            <div class="circle-tile-description text-faded">
                                Total Mahasiswa
                            </div>
                            <div class="circle-tile-number text-faded">
                                <?= $total_mahasiswa ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="circle-tile">
                        <a href="#">
                            <div class="circle-tile-heading orange">
                                <i class="fa fa-user fa-fw fa-3x"></i>
                            </div>
                        </a>
                        <div class="circle-tile-content orange">
                            <div class="circle-tile-description text-faded">
                                Total Dosen
                            </div>
                            <div class="circle-tile-number text-faded">
                                <?= $total_dosen ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="circle-tile">
                        <a href="#">
                            <div class="circle-tile-heading purple">
                                <i class="fa fa-file-text fa-fw fa-3x"></i>
                            </div>
                        </a>
                        <div class="circle-tile-content purple">
                            <div class="circle-tile-description text-faded">
                                Total Proposal
                            </div>
                            <div class="circle-tile-number text-faded">
                                <?= $total_proposal ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="circle-tile">
                        <a href="#">
                            <div class="circle-tile-heading red">
                                <i class="fa fa-tasks fa-fw fa-3x"></i>
                            </div>
                        </a>
                        <div class="circle-tile-content red">
                            <div class="circle-tile-description text-faded">
                                Total Sidang
                            </div>
                            <div class="circle-tile-number text-faded">
                                <?= $total_sidang ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="circle-tile">
                        <a href="#">
                            <div class="circle-tile-heading blue">
                                <i class="fa fa-hourglass-half fa-fw fa-3x"></i>
                            </div>
                        </a>
                        <div class="circle-tile-content blue">
                            <div class="circle-tile-description text-faded">
                                Proposal Pending
                            </div>
                            <div class="circle-tile-number text-faded">
                                <?= $proposal_pending ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="circle-tile">
                        <a href="#">
                            <div class="circle-tile-heading dark-gray">
                                <i class="fa fa-hourglass-half fa-fw fa-3x"></i>
                            </div>
                        </a>
                        <div class="circle-tile-content dark-gray">
                            <div class="circle-tile-description text-faded">
                                Sidang Pending
                            </div>
                            <div class="circle-tile-number text-faded">
                                <?= $sidang_pending ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Info Sections -->
            <div class="row">
                <!-- System Info -->
                <div class="col-lg-6">
                    <div class="portlet portlet-blue">
                        <div class="portlet-heading">
                            <div class="portlet-title">
                                <h4><i class="fa fa-server fa-fw"></i> System Information</h4>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="portlet-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <tr>
                                        <td><i class="fa fa-code"></i> PHP Version</td>
                                        <td><i class="fa fa-info-circle"></i> <?= phpversion() ?></td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-gear"></i> Server</td>
                                        <td><i class="fa fa-server"></i> <?= $_SERVER['SERVER_SOFTWARE'] ?></td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-database"></i> Database</td>
                                        <td><i class="fa fa-database"></i> MySQL</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-cogs"></i> Framework</td>
                                        <td><i class="fa fa-code-branch"></i> CodeIgniter <?= CI_VERSION ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Time Info -->
                <div class="col-lg-6">
                    <div class="portlet portlet-blue">
                        <div class="portlet-heading">
                            <div class="portlet-title">
                                <h4><i class="fa fa-clock fa-fw"></i> Time Information</h4>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="portlet-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <tr>
                                        <td><i class="fa fa-globe"></i> Time Zone</td>
                                        <td><i class="fa fa-location-dot"></i> Asia/Jakarta (WIB)</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-calendar"></i> Current Time</td>
                                        <td><i class="fa fa-clock"></i> <span id="current-time"></span></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Added: Top padding wrapper */
.dashboard-wrapper {
    padding-top: 30px;
}

/* Dashboard Circle Tiles */
.circle-tile {
    margin-bottom: 15px;
    text-align: center;
}

.circle-tile-heading {
    position: relative;
    width: 80px;
    height: 80px;
    margin: 0 auto -40px;
    border: 3px solid rgba(255,255,255,0.3);
    border-radius: 100%;
    color: #fff;
    transition: all ease-in-out .3s;
}

.circle-tile-heading .fa {
    line-height: 80px;
}

.circle-tile-content {
    padding-top: 50px;
    padding-bottom: 20px;
    border-radius: 5px;
}

.circle-tile-number {
    padding: 5px 0 15px;
    font-size: 26px;
    font-weight: 700;
    line-height: 1;
}

.circle-tile-description {
    text-transform: uppercase;
}

.circle-tile-heading.dark-blue, .circle-tile-content.dark-blue { background-color: #4e73df !important; }
.circle-tile-heading.green, .circle-tile-content.green { background-color: #1cc88a !important; }
.circle-tile-heading.orange, .circle-tile-content.orange { background-color: #36b9cc !important; }
.circle-tile-heading.purple, .circle-tile-content.purple { background-color: #f6c23e !important; }
.circle-tile-heading.red, .circle-tile-content.red { background-color: #e74a3b !important; }
.circle-tile-heading.blue, .circle-tile-content.blue { background-color: #858796 !important; }
.circle-tile-heading.dark-gray, .circle-tile-content.dark-gray { background-color: #6f42c1 !important; }

.text-faded {
    color: rgba(255,255,255,0.9);
}

/* Portlet Styles */
.portlet {
    margin-bottom: 15px;
}

.portlet {
    border: 1px solid #ddd;
    border-radius: 4px;
    -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.05);
    box-shadow: 0 1px 1px rgba(0,0,0,.05);
}

.portlet-heading {
    padding: 10px 15px;
    background: #4e73df;
    border-radius: 3px 3px 0 0;
}

.portlet-title {
    color: #fff;
}

.portlet-title h4 {
    margin: 0;
    font-size: 16px;
}

.portlet-body {
    padding: 15px;
    background: #fff;
}

.table > tbody > tr > td {
    padding: 12px 8px;
    vertical-align: middle;
    border-top: 1px solid #e9ecef;
}

.table i {
    margin-right: 8px;
    color: #4e73df;
}
</style>

<script>
function updateTime() {
    var now = new Date();
    var options = { 
        weekday: 'long', 
        year: 'numeric', 
        month: 'long', 
        day: 'numeric',
        hour: '2-digit',
        minute: '2-digit',
        second: '2-digit',
        hour12: false
    };
    document.getElementById('current-time').textContent = now.toLocaleString('id-ID', options);
}

setInterval(updateTime, 1000);
updateTime();
</script>