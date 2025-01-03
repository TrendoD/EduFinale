<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>EduFinale - Sistem Informasi Pengajuan Tugas Akhir</title>
    <script src="<?php echo base_url();?>js/jquery.min.js"></script>
    <link href="<?php echo base_url();?>css/plugins/pace/pace.css" rel="stylesheet">
    <script src="<?php echo base_url();?>js/plugins/pace/pace.js"></script>
    <link href="<?php echo base_url();?>css/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700,300italic,400italic,500italic,700italic' rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel="stylesheet" type="text/css">
    <!-- Update Font Awesome ke versi 4.7.0 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>css/plugins/messenger/messenger.css" rel="stylesheet">
    <link href="<?php echo base_url();?>css/plugins/messenger/messenger-theme-flat.css" rel="stylesheet">
    <link href="<?php echo base_url();?>css/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet">
    <link href="<?php echo base_url();?>css/plugins/morris/morris.css" rel="stylesheet">
    <link href="<?php echo base_url();?>css/plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet">
    <link href="<?php echo base_url();?>css/plugins/datatables/datatables.css" rel="stylesheet">
    <!-- <link href="<?php echo base_url();?>css/style.css" rel="stylesheet"> -->
    <link href="<?php echo base_url();?>css/style.css?v=1.0" rel="stylesheet">
    <link href="<?php echo base_url();?>css/plugins.css" rel="stylesheet">
    <link href="<?php echo base_url();?>css/demo.css" rel="stylesheet">
    <link href="<?php echo base_url();?>css/sweetalert2.css" rel="stylesheet">
    <script src="<?php echo base_url();?>js/plugins/messenger/messenger.min.js"></script>
    <script src="<?php echo base_url();?>js/plugins/messenger/messenger-theme-flat.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
</head>
<body>
<div id="wrapper">
    <nav class="navbar-top" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle pull-right" data-toggle="collapse" data-target=".sidebar-collapse">
                <i class="fa fa-bars"></i> Menu
            </button>
            <div class="navbar-brand">
                <span class="edufinale-span" ><img class="edufinale-img" src="/img/edufinaleputih.png" alt="" >  EduFinale</span>
                <a href="/home"></a>
            </div>
        </div>
        <div class="nav-top">
            <ul class="nav navbar-left">
                <li class="tooltip-sidebar-toggle">
                    <a href="#" id="sidebar-toggle" data-toggle="tooltip" data-placement="right" title="Tampilkan/Sembunyikan Menu">
                        <i class="fa fa-bars"></i>
                    </a>
                </li>
            </ul>
            <ul class="nav navbar-right">
                <li class="dropdown pull-right">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-user-circle"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu" style="margin: 0;min-width: 200px">
                        <li>
                            <?php if($data->tipe == "admin"): ?>
                            <a href="<?=base_url();?>admin/profile">
                            <?php else: ?>
                            <a href="<?=base_url();?>home/profil">
                            <?php endif; ?>
                                <i class="fa fa-user-circle"></i> Profil
                            </a>
                        </li>
                        
                        <li class="divider"></li>
                        <li>
                            <a href="/home/logout">
                                <i class="fa fa-sign-out"></i> Keluar
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
        <nav class="navbar-side" role="navigation">
            <div class="navbar-collapse sidebar-collapse collapse">
                <ul id="side" class="nav navbar-nav side-nav">
                    <li class="side-user hidden-xs">
                    <div class="profile-card">
                            <img class="profile-image" src="/img/profile/<?=$data->photo;?>" alt="Profile Photo">
                            <div class="profile-info">
                                <p class="profile-name"><?=$data->nama;?></p>
                                <p class="profile-role"><?=ucfirst($data->tipe);?></p>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </li>
                    <?php if($data->tipe == "admin"): ?>
                    <li>
                        <a href="<?=base_url();?>admin">
                            <i class="fa fa-tachometer"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="<?=base_url();?>admin/profile">
                            <i class="fa fa-user-circle"></i> Profil
                        </a>
                    </li>
                    <li>
                        <a href="<?=base_url();?>admin/users">
                            <i class="fa fa-users"></i> Manajemen User
                        </a>
                    </li>
                    <?php else: ?>
                    <li>
                        <a href="<?=base_url();?>home">
                            <i class="fa fa-tachometer"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="/home/profil">
                            <i class="fa fa-user-circle"></i> Profil
                        </a>
                    </li>
                    <?php endif; ?>
                    <?php 
                    if ($data->tipe == "dosen") {
                        echo '
                        <li>
                            <a href="/pengajuan/dosen">
                                <i class="fa fa-book"></i> Daftar Bimbingan Mhs
                            </a>
                        </li>
                        <li>
                            <a href="/chat/dosen">
                                <i class="fa fa-comments"></i> Chat dengan Mahasiswa
                            </a>
                        </li>';
                    } elseif ($data->tipe == "rmk") {
                        echo '
                        <li>
                            <a href="/pengajuan/rmk">
                                <i class="fa fa-book"></i> Daftar Pengajuan
                            </a>
                        </li>';
                    } elseif ($data->tipe == "kaprodi") {
                        echo '
                        <li class="panel">
                            <a href="javascript:;" data-parent="#side" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#forms">
                                <i class="fa fa-edit"></i> Pengajuan <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="collapse nav" id="forms">
                                <li>
                                    <a href="/pengajuan/kaprodi">
                                        <i class="fa fa-angle-double-right"></i> Proposal Tugas Akhir
                                    </a>
                                </li>
                                <li>
                                    <a href="/sidang/daftar">
                                        <i class="fa fa-angle-double-right"></i> Pengajuan Sidang
                                    </a>
                                </li>
                            </ul>
                        </li>';
                    } elseif ($data->tipe == "mahasiswa") {
                        echo '
                        <li class="panel">
                            <a href="javascript:;" data-parent="#side" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#forms">
                                <i class="fa fa-edit"></i> Pengajuan <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="collapse nav" id="forms">
                                <li>
                                    <a href="/pengajuan/judul">
                                        <i class="fa fa-angle-double-right"></i> Proposal Tugas Akhir
                                    </a>
                                </li>
                                <li>
                                    <a href="/pengajuan/sidang">
                                        <i class="fa fa-angle-double-right"></i> Pengajuan Sidang
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="/chat">
                                <i class="fa fa-comments"></i> Chat Dosen
                            </a>
                        </li>
                        <li>
                            <a href="/riwayat">
                                <i class="fa fa-history"></i> Riwayat Bimbingan
                            </a>
                        </li>';
                    }
                    ?>
                </ul>
            </div>
        </nav>