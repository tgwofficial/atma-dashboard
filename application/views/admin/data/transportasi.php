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
                                                <th>Nama Pemilik</th>
                                                <th>No Hp</th>
                                                <th>Jenis Kendaraan</th>
                                                <th>Kapasitas</th>
                                                <th>Dusun</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php for ($i=0; $i < 12; $i++) { ?>
                                                <tr>
                                                    <td><?php echo $i+1; ?></td>
                                                    <td><?php echo $faker->name('male'); ?></td>
                                                    <td><?php echo $faker->phoneNumber; ?></td>
                                                    <td><?php echo ['Mobil','Motor','Cidomo','Pick-up','Lainnya'][rand(0,4)]; ?></td>
                                                    <td><?php echo rand(2,7); ?></td>
                                                    <td><?php echo $faker->city; ?></td>
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
