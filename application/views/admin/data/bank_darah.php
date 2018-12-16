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
                                    <table id="myTable" class="table table-striped table-hover" title="Data Individual Pendonor">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Nama Donor</th>
                                                <th>Golongan Darah</th>
                                                <th>Rhesus</th>
                                                <th>Dusun</th>
                                                <th>No Hp</th>
                                                <th>Terakhir Donor</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php for ($i=0; $i < 36; $i++) { ?>
                                                <tr>
                                                    <td><?php echo $i+1; ?></td>
                                                    <td><?php echo $faker->name; ?></td>
                                                    <td><?php echo ['A','B','AB','O'][rand(0,3)]; ?></td>
                                                    <td><?php echo ['+','-','N/A'][rand(0,2)]; ?></td>
                                                    <td><?php echo $faker->city; ?></td>
                                                    <td><?php echo $faker->phoneNumber; ?></td>
                                                    <td><?php echo $faker->dateTimeThisYear($max = 'now', $timezone = null)->format('Y-m-d'); ?></td>
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
            <script type="text/javascript">
                $(document).ready( function () {
                    var myTable = $('#myTable').DataTable({
                        "scrollX": true,
                        "autoWidth": false,
                        columnDefs: [
                            { width: 100, targets: 5 }
                        ],
                        fixedColumns: true,
                        scrollCollapse: true,
                        dom: 'lfrtBip',
                        buttons: [
                        {
                            extend: 'excel',
                            title: $('#myTable').attr("title")
                        },
                        {
                            extend: 'pdf',
                            title: $('#myTable').attr("title")
                        },
                        {
                            extend: 'print',
                            title: $('#myTable').attr("title")
                        }
                        ]
                    });
                } );
            </script>
