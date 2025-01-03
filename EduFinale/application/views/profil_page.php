<div id="page-wrapper">
    <div class="page-content">
        <!-- begin PAGE TITLE ROW -->
        <div class="row">
            <div class="col-lg-12">
                <div class="page-title">
                    <h1>Profil
                        <small></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li style="font-weight: bold;" ><i class="fa fa-dashboard"></i>  Home
                        </li>
                        <li class="active">Profil</li>
                    </ol>
                </div>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <!-- end PAGE TITLE ROW -->

        <!-- begin MAIN PAGE ROW -->
        <div class="row">
            <!-- begin LEFT COLUMN -->
            <div class="col-lg-8">
                <div class="row">
                    <!-- Basic Form Example -->
                   <div class="col-lg-12">
                        <div class="portlet portlet-red">
                            <div class="portlet-heading">
                                <div class="portlet-title">
                                    <h4>Data User</h4>
                                </div>
                                <div class="portlet-widgets">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#formControls"><i class="fa fa-chevron-down"></i></a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div id="formControls" class="panel-collapse collapse in">
                                <div class="portlet-body">
                                    <?php
                                    if ($success=='data') {
                                        echo '
                                        <div class="alert alert-success alert-dismissable">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                            <strong>Sukses : </strong> Sukses mengubah data 
                                        </div>
                                        ';
                                    } else if ($error) {
                                        $error_messages = [
                                            'incomplete' => 'Please fill in all required fields',
                                            'nim_exists' => 'The NIM/Username is already in use',
                                            'update_failed' => 'Failed to update profile. Please try again.',
                                            'invalid_input' => 'Invalid input detected. Please check your data.'
                                        ];
                                        
                                        if (isset($error_messages[$error])) {
                                            echo '<div class="alert alert-danger alert-dismissable">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <strong>Error:</strong> ' . $error_messages[$error] . '
                                                  </div>';
                                        }
                                    }
                                    ?>
                                    <form class="form-horizontal" action="<?=base_url();?>home/profil/updateData" method="post">
                                        <?php include('part/form-profil.php'); ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /.portlet -->
                    </div>
                </div>
                <!-- /.row (nested) -->
            </div>
            <!-- /.col-lg-6 -->
            <!-- end LEFT COLUMN -->

            <!-- begin RIGHT COLUMN -->
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="portlet portlet-purple">
                            <div class="portlet-heading">
                                <div class="portlet-title">
                                    <h4>Foto Profil</h4>
                                </div>
                                <div class="portlet-widgets">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#inputSizing"><i class="fa fa-chevron-down"></i></a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div id="inputSizing" class="panel-collapse collapse in">
                                <div class="portlet-body">
                                    <?php
                                    if ($success=='photo') {
                                        echo '
                                        <div class="alert alert-success alert-dismissable">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                            <strong>Sukses : </strong> Foto profil berhasil dirubah
                                        </div>
                                        ';
                                    } else if ($error == 'photo') {
                                        echo '
                                        <div class="alert alert-danger alert-dismissable">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                            <strong>Gagal : </strong> Gagal mengubah foto profil
                                        </div>
                                        ';
                                    }
                                    ?>
                                    
                                    <center>
                                        <img class="img-circle" 
                                             style="max-height: 250px; max-width: 250px;" 
                                             src="/img/profile/<?= $data->photo ?? 'default.jpg' ?>"
                                             alt="Profile Photo"
                                             loading="lazy"
                                             onerror="this.src='/img/profile/default.jpg'">

                                        <form action="/home/profil/uploadPhoto" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <input name="photo" type="file" id="photo">
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-default">Upload Foto</button>
                                            </div>
                                        </form>
                                    </center>
                                </div>
                            </div>
                        </div>
                        <!-- /.portlet -->
                    </div>
                    <!-- /.col-lg-12 (nested) -->
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

<style>
    .profile-photo {
        max-height: 250px;
        max-width: 250px;
    }
</style>