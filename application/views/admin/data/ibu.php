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
                                    <table id="myTable" class="table table-striped table-hover" title="Data Individual Ibu">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Nama Ibu</th>
                                                <th>Nama Suami</th>
                                                <th>Tanggal Lahir</th>
                                                <th>Dusun</th>
                                                <th>HPHT</th>
                                                <th>No Hp</th>
                                                <th>Status</th>
                                                <th>Kondisi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php for ($i=0; $i < 100; $i++) { ?>
                                                <tr>
                                                    <td><?php echo $i+1; ?></td>
                                                    <td><?php echo $faker->name('female'); ?></td>
                                                    <td><?php echo $faker->name('male'); ?></td>
                                                    <td><?php echo $faker->dateTimeThisCentury->format('Y-m-d'); ?></td>
                                                    <td><?php echo $faker->city; ?></td>
                                                    <td><?php echo $faker->dateTimeThisYear($max = 'now', $timezone = null)->format('Y-m-d'); ?></td>
                                                    <td><?php echo $faker->phoneNumber; ?></td>
                                                    <td><?php echo ['Hamil','Nifas','Hamil','Hamil'][rand(0,3)]; ?></td>
                                                    <td><?php echo ['Hidup','Meninggal','Hidup','Hidup','Hidup','Hidup','Hidup','Hidup','Hidup'][rand(0,8)]; ?></td>
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
