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
                                                <th>No Hp</th>
                                                <th>Gol. Darah</th>
                                                <th>Status</th>
                                                <th>HPHT</th>
                                                <th>HTP</th>
                                                <th>Faktor Resiko</th>
                                                <th>Jenis Transportasi</th>
                                                <th>Hub.Dengan Pendonor</th>
                                                <th>Tgl Melahirkan</th>
                                                <th>Kondisi Ibu</th>
                                                <th>Kondisi Anak</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if($this->ion_auth->in_group("demo")) { for ($i=0; $i < 100; $i++) { ?>
                                                <tr>
                                                    <td><?php echo $i+1; ?></td>
                                                    <td><?php echo $faker->name('female'); ?></td>
                                                    <td><?php echo $faker->name('male'); ?></td>
                                                    <td><?php echo $faker->dateTimeThisCentury->format('Y-m-d'); ?></td>
                                                    <td><?php echo $faker->city; ?></td>
                                                    <td><?php echo $faker->phoneNumber; ?></td>
                                                    <td><?php echo ['A','B','AB','O'][rand(0,3)]; ?></td>
                                                    <td><?php echo ['Hamil','Nifas','Hamil','Hamil'][rand(0,3)]; ?></td>
                                                    <td><?php echo $faker->dateTimeThisYear($max = 'now', $timezone = null)->format('Y-m-d'); ?></td>
                                                    <td><?php echo $faker->dateTimeThisYear($max = 'now', $timezone = null)->format('Y-m-d'); ?></td>
                                                    <td><?php echo ['Resiko1','Resiko2','Resiko3','Resiko4'][rand(0,3)]; ?></td>
                                                    <td><?php echo ['Mobil','Motor','Cidomo','Pick-up','Lainnya'][rand(0,4)]; ?></td>
                                                    <td><?php echo ['Suami','Saudara','Tetangga','Kenalan','Lainnya'][rand(0,4)]; ?></td>
                                                    <td><?php echo $faker->dateTimeThisYear($max = 'now', $timezone = null)->format('Y-m-d'); ?></td>
                                                    <td><?php echo ['Hidup','Meninggal','Hidup','Hidup','Hidup','Hidup','Hidup','Hidup','Hidup'][rand(0,8)]; ?></td>
                                                    <td><?php echo ['Hidup','Meninggal','Hidup','Hidup','Hidup','Hidup','Hidup','Hidup','Hidup'][rand(0,8)]; ?></td>
                                                </tr>
                                            <?php }} else{ $i=0; foreach ($ibus as $key => $ibu) { ?>
                                                <tr>
                                                    <td><?php echo $i+1; ?></td>
                                                    <td><?php echo $ibu->nama; ?></td>
                                                    <td><?php echo $ibu->spousename; ?></td>
                                                    <td><?php echo $ibu->tgl_lahir; ?></td>
                                                    <td><?php echo $ibu->dusunasal; ?></td>
                                                    <td><?php echo $ibu->telpon; ?></td>
                                                    <td><?php echo $ibu->gol_darah; ?></td>
                                                    <td><?php echo $ibu->status_bersalin==0||$ibu->status_bersalin==""?$ibu->status_bersalin==0?"hamil":"nifas":$ibu->status_bersalin; ?></td>
                                                    <td><?php echo $ibu->hpht; ?></td>
                                                    <td><?php echo $ibu->htp; ?></td>
                                                    <td><?php echo $ibu->resiko; ?></td>
                                                    <td><?php echo $ibu->jenis_kendaraan; ?></td>
                                                    <td><?php echo $ibu->hubungan_pendonor; ?></td>
                                                    <td><?php echo $ibu->tgl_persalinan; ?></td>
                                                    <td><?php echo $ibu->kondisi_ibu; ?></td>
                                                    <td><?php echo $ibu->kondisi_anak; ?></td>
                                                </tr>
                                            <?php $i++;}} ?>
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