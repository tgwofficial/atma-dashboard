<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
            <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
            <div class="content-wrapper">
                <section class="content-header">
                    <?php echo $pagetitle; ?>
                    <?php echo $breadcrumb; ?>
                </section>

                <section class="content-header">
                    <div class="row">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="desa">Desa</label>
                                <select id="desa" class="form-control opt">
                                    <option>Selebung</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="content-header">
                    <div class="row">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="tahun">Tahun</label>
                                <select id="tahun" class="form-control opt">
                                    <option>2018</option>
                                    <option>2019</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="bulan">Bulan</label>
                                <select id="bulan" class="form-control opt">
                                    <option>Januari</option>
                                    <option>Februari</option>
                                    <option>Maret</option>
                                    <option>April</option>
                                    <option>Mei</option>
                                    <option>Juni</option>
                                    <option>Juli</option>
                                    <option>Agustus</option>
                                    <option>September</option>
                                    <option>Oktober</option>
                                    <option>November</option>
                                    <option>Desember</option>
                                    <option>Tahunan</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                             <div class="box">
                                <!-- <div class="box-header with-border">
                                    <h3 class="box-title"><?php echo anchor('admin/users/create', '<i class="fa fa-plus"></i> '. lang('users_create_user'), array('class' => 'btn btn-block btn-primary btn-flat')); ?></h3>
                                </div> -->
                                <div class="box-body">
                                    <table id="myTable" class="table table-striped table-hover" title="Rekap Laporan P4K">
                                        <thead>
                                            <tr>
                                                <th>Dusun</th>
                                                <th>Jumlah Ibu Hamil</th>
                                                <th>Jumlah Ibu Nifas</th>
                                                <th>Jumlah Ibu Meninggal</th>
                                                <th>Jumlah Bayi Lahir</th>
                                                <th>Jumlah Bayi Meninggal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $dusuns = ["Menges","Penandak","Menyiuh","Selebung Lauk","Selebung Daye","Selebung Tengak","Melar","Jali","Nyangget Lauk","Nyangget Daye","Pucung","Mekar Sari"];
                                            foreach ($dusuns as $key => $dusun) { ?>
                                                <tr>
                                                    <td><?php echo $dusun ?></td>
                                                    <td class="val1"><?php echo rand(0,10); ?></td>
                                                    <td class="val2"><?php echo rand(0,10); ?></td>
                                                    <td class="val3"><?php echo rand(0,2); ?></td>
                                                    <td class="val4"><?php echo rand(0,10); ?></td>
                                                    <td class="val5"><?php echo rand(0,2); ?></td>
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
                $('.opt').change(function() {
                    if($('#bulan').val() == "Tahunan"){
                        $('.val1').each(function(){
                            $(this).html((Math.floor(Math.random() * 16) + 6)*9);
                        });
                        $('.val2').each(function(){
                            $(this).html((Math.floor(Math.random() * 16) + 6)*9);
                        });
                        $('.val3').each(function(){
                            $(this).html((Math.floor(Math.random() * 2) + 0)*2);
                        });
                        $('.val4').each(function(){
                            $(this).html((Math.floor(Math.random() * 16) + 6)*9);
                        });
                        $('.val5').each(function(){
                            $(this).html((Math.floor(Math.random() * 2) + 0)*2);
                        });
                    }
                    else{
                        $('.val1').each(function(){
                            $(this).html(Math.floor(Math.random() * 16) + 6);
                        });
                        $('.val2').each(function(){
                            $(this).html(Math.floor(Math.random() * 16) + 6);
                        });
                        $('.val3').each(function(){
                            $(this).html(Math.floor(Math.random() * 2) + 0);
                        });
                        $('.val4').each(function(){
                            $(this).html(Math.floor(Math.random() * 16) + 6);
                        });
                        $('.val5').each(function(){
                            $(this).html(Math.floor(Math.random() * 2) + 0);
                        });
                    }
                });
            </script>
