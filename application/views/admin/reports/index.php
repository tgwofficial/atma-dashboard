<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
            <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
            <div class="content-wrapper">
                <section class="content-header">
                    <?php echo $pagetitle; ?>
                    <?php echo $breadcrumb; ?>
                </section>

                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                             <div class="box">
                                <!-- <div class="box-header with-border">
                                    <h3 class="box-title"><?php echo anchor('admin/users/create', '<i class="fa fa-plus"></i> '. lang('users_create_user'), array('class' => 'btn btn-block btn-primary btn-flat')); ?></h3>
                                </div> -->
                                <div class="box-body">
                                    <table id="myTable" class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Jumlah Ibu Hamil</th>
                                                <th>Jumlah Ibu Nifas</th>
                                                <th>Jumlah Ibu Meninggal</th>
                                                <th>Jumlah Bayi Lahir</th>
                                                <th>Jumlah Bayi Meninggal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php for ($i=0; $i < 12; $i++) { ?>
                                                <tr>
                                                    <td><?php echo $i+1; ?></td>
                                                    <td><?php echo rand(0,10); ?></td>
                                                    <td><?php echo rand(0,10); ?></td>
                                                    <td><?php echo rand(0,2); ?></td>
                                                    <td><?php echo rand(0,10); ?></td>
                                                    <td><?php echo rand(0,2); ?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                         </div>
                    </div>
                </section>
            </div>
