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
                                <label for="<?=$userinfo['user_location']['tag_name']?>"><?=$userinfo['user_location']['description']?></label>
                                <select id="<?=$userinfo['user_location']['tag_name']?>" class="form-control opt">
                                    <option><?=$userinfo['user_location']['name']?></option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="kecamatan">Kecamatan</label>
                                <select id="kecamatan" class="form-control">
                                    <option value="0">-- Please Select --</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="desa">Desa</label>
                                <select id="desa" class="form-control">
                                    <option value="0">-- Please Select --</option>
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
                                    <option value="2018">2018</option>
                                    <option value="2019">2019</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="bulan">Bulan</label>
                                <select id="bulan" class="form-control opt">
                                    <option value="01">Januari</option>
                                    <option value="02">Februari</option>
                                    <option value="03">Maret</option>
                                    <option value="04">April</option>
                                    <option value="05">Mei</option>
                                    <option value="06">Juni</option>
                                    <option value="07">Juli</option>
                                    <option value="08">Agustus</option>
                                    <option value="09">September</option>
                                    <option value="10">Oktober</option>
                                    <option value="11">November</option>
                                    <option value="12">Desember</option>
                                    <option value="99">Tahunan</option>
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
                                                <th>Ibu Hamil Baru</th>
                                                <th>Ibu Hamil Aktif</th>
                                                <th>Ibu Bersalin</th>
                                                <th>Ibu Meninggal</th>
                                                <th>Bayi Lahir</th>
                                                <th>Bayi Meninggal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
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
                    var base_url = "<?=$atma_api_url?>";
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

                    $.ajax( base_url+"api/location/child?location-id=<?=$userinfo['user_location']['location_id']?>" )
                        .done(function(result) {
                            var ids = new Array();
                            $.each( result, function( key, loc ){
                                $('#kecamatan').append($('<option>', {value:loc.location_id, text:loc.name}));
                                ids.push(loc.location_id);
                            });
                            $('#kecamatan').val(ids[0]).change();
                        });

                    $('#kecamatan').change(function() {
                        if($('#kecamatan').val() != "0"){
                            $("#desa").html("<option value='0'>-- Please Select --</option>");
                            $.ajax( base_url+"api/location/child?location-id="+$('#kecamatan').val() )
                            .done(function(result) {
                                var ids = new Array();
                                $.each( result, function( key, loc ){
                                    $('#desa').append($('<option>', {value:loc.location_id, text:loc.name}));
                                    ids.push(loc.location_id);
                                });
                                $('#desa').val(ids[0]).change();
                            });
                        }
                        
                    });

                    $('#desa').change(function() {
                        if($('#desa').val() != "0"){
                            get_data();
                        }
                    });

                    $('.opt').change(function() {
                        get_data();
                    });

                    function get_data(){
                        $.ajax( base_url+"api/data/reports/child?location-id="+$('#desa').val()+"&t="+$('#tahun').val()+"&b="+$('#bulan').val() )
                        .done(function(result) {
                            myTable.destroy();
                            $('#myTable tbody').html("");
                            $.each( result, function( key, loc ){
                                $('#myTable tbody').append(
                                    "<tr>"+
                                    "<td>"+loc.name+"</td>"+
                                    "<td>"+loc.data.ibu_hamil_baru+"</td>"+
                                    "<td>"+loc.data.ibu_hamil_aktif+"</td>"+
                                    "<td>"+loc.data.ibu_bersalin+"</td>"+
                                    "<td>"+loc.data.ibu_meninggal+"</td>"+
                                    "<td>"+loc.data.bayi_lahir+"</td>"+
                                    "<td>"+loc.data.bayi_meninggal+"</td>"+
                                    "</tr>");
                            });
                            myTable = $('#myTable').DataTable({
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
                        });
                    }
                });
            </script>
