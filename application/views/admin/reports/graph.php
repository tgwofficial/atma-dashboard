<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
            <!-- <link rel="stylesheet" href="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.css"> -->
            <script src="https://code.highcharts.com/highcharts.js"></script>
            <script src="https://code.highcharts.com/modules/exporting.js"></script>
            <script src="https://code.highcharts.com/modules/export-data.js"></script>
            <div class="content-wrapper">
                <section class="content-header">
                    <?php echo $pagetitle; ?>
                    <?php echo $breadcrumb; ?>
                </section>
                <section class="content-header">
                    <div class="row">
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="<?=$userinfo['user_location']['tag_name']?>"><?=$userinfo['user_location']['description']?></label>
                                <select id="<?=$userinfo['user_location']['tag_name']?>" class="form-control opt">
                                    <option><?=$userinfo['user_location']['name']?></option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="kecamatan">Kecamatan</label>
                                <select id="kecamatan" class="form-control">
                                    <option value="0">-- Please Select --</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="desa">Desa</label>
                                <select id="desa" class="form-control">
                                    <option value="0">-- Please Select --</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="dusun">Dusun</label>
                                <select id="dusun" class="form-control">
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
                            <div class="box">
                                <div class="box-body">
                                    <div id="chart1" class="ct-chart ct-perfect-fourth"></div>
                                </div>
                            </div>
                         </div>
                    </div>
                </div>
                </section>
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                           <div class="box">
                            <div class="box-header with-border">
                                <div class="box-body">
                                    <div id="chart2" class="ct-chart ct-perfect-fourth"></div>
                                </div>
                            </div>
                         </div>
                    </div>
                </div>
                </section>
                    
            </div>
            <script type="text/javascript">
                $(document).ready( function () {
                    $.ajax( "http://localhost/server/api/location/child?location-id=<?=$userinfo['user_location']['location_id']?>" )
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
                            $.ajax( "http://localhost/server/api/location/child?location-id="+$('#kecamatan').val() )
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
                            $("#dusun").html("<option value='0'>-- Please Select --</option>");
                            $.ajax( "http://localhost/server/api/location/child?location-id="+$('#desa').val() )
                            .done(function(result) {
                                var ids = new Array();
                                $.each( result, function( key, loc ){
                                    $('#dusun').append($('<option>', {value:loc.location_id, text:loc.name}));
                                    ids.push(loc.location_id);
                                });
                                $('#dusun').val(ids[0]).change();
                            });
                        }
                        
                    });

                    var bln = {'01':'Januari','02':'Februari','03':'Maret','04':'April','05':'Mei','06':'Juni','07':'Juli','08':'Agustus','09':'September','10':'Oktober','11':'November','12':'Desember'};

                    var chart1 = Highcharts.chart('chart1', {
                        chart: {
                            type: 'column'
                        },
                        title: {
                            text: 'Grafik Ibu Hamil, Nifas, dan Meninggal'
                        },
                        xAxis: {
                            categories: [
                            'Januari'
                            ],
                            crosshair: true
                        },
                        yAxis: {
                            min: 0,
                            title: {
                                text: 'Jumlah Ibu (orang)'
                            }
                        },
                        plotOptions: {
                            column: {
                                pointPadding: 0.2,
                                borderWidth: 0
                            },series: {
                                borderWidth: 0,
                                dataLabels: {
                                    enabled: true,
                                    format: '{point.y:.0f}'
                                }
                            }
                        },
                        colors: ['#008000', '#0000ff', '#ffa500', '#ff0000'],
                        series: [{
                            name: 'Hamil Baru',
                            data: [0]

                        }, {
                            name: 'Hamil Aktif',
                            data: [0]

                        }, {
                            name: 'Bersalin',
                            data: [0]

                        }, {
                            name: 'Meninggal',
                            data: [0]

                        }]
                    });

                    var chart2 = Highcharts.chart('chart2', {
                        chart: {
                            type: 'column'
                        },
                        title: {
                            text: 'Grafik Bayi Lahir dan Meninggal'
                        },
                        xAxis: {
                            categories: [
                            'Januari'
                            ],
                            crosshair: true
                        },
                        yAxis: {
                            min: 0,
                            title: {
                                text: 'Jumlah Bayi (orang)'
                            }
                        },
                        plotOptions: {
                            column: {
                                pointPadding: 0.2,
                                borderWidth: 0
                            },series: {
                                borderWidth: 0,
                                dataLabels: {
                                    enabled: true,
                                    format: '{point.y:.0f}'
                                }
                            }
                        },
                        colors: ['#008000', '#ff0000'],
                        series: [{
                            name: 'Lahir',
                            data: [0]

                        }, {
                            name: 'Meninggal',
                            data: [0]

                        }]
                    });

                    $('#dusun').change(function() {
                        if($('#dusun').val() != "0"){
                            get_data();
                        }
                    });

                    $('.opt').change(function() {
                        get_data();
                    });

                    function get_data(){
                        chart1.showLoading();
                        chart2.showLoading();
                        if($('#bulan').val() == "99"){
                            $.ajax( "http://localhost/server/api/data/reports?location-id="+$('#dusun').val()+"&t="+$('#tahun').val()+"&b="+$('#bulan').val() )
                            .done(function(result) {
                                chart1.update({
                                    xAxis: {
                                        categories: [
                                        'Jan',
                                        'Feb',
                                        'Mar',
                                        'Apr',
                                        'May',
                                        'Jun',
                                        'Jul',
                                        'Aug',
                                        'Sep',
                                        'Oct',
                                        'Nov',
                                        'Dec'
                                        ]
                                    },
                                    series: [{
                                        name: 'Hamil Baru',
                                        data: [parseInt(result.data[0].ibu_hamil_baru),
                                        parseInt(result.data[1].ibu_hamil_baru),
                                        parseInt(result.data[2].ibu_hamil_baru),
                                        parseInt(result.data[3].ibu_hamil_baru),
                                        parseInt(result.data[4].ibu_hamil_baru),
                                        parseInt(result.data[5].ibu_hamil_baru),
                                        parseInt(result.data[6].ibu_hamil_baru),
                                        parseInt(result.data[7].ibu_hamil_baru),
                                        parseInt(result.data[8].ibu_hamil_baru),
                                        parseInt(result.data[9].ibu_hamil_baru),
                                        parseInt(result.data[10].ibu_hamil_baru),
                                        parseInt(result.data[11].ibu_hamil_baru)]

                                    }, {
                                        name: 'Hamil Aktif',
                                        data: [parseInt(result.data[0].ibu_hamil_aktif),
                                        parseInt(result.data[1].ibu_hamil_aktif),
                                        parseInt(result.data[2].ibu_hamil_aktif),
                                        parseInt(result.data[3].ibu_hamil_aktif),
                                        parseInt(result.data[4].ibu_hamil_aktif),
                                        parseInt(result.data[5].ibu_hamil_aktif),
                                        parseInt(result.data[6].ibu_hamil_aktif),
                                        parseInt(result.data[7].ibu_hamil_aktif),
                                        parseInt(result.data[8].ibu_hamil_aktif),
                                        parseInt(result.data[9].ibu_hamil_aktif),
                                        parseInt(result.data[10].ibu_hamil_aktif),
                                        parseInt(result.data[11].ibu_hamil_aktif)]

                                    }, {
                                        name: 'Bersalin',
                                        data: [parseInt(result.data[0].ibu_bersalin),
                                        parseInt(result.data[1].ibu_bersalin),
                                        parseInt(result.data[2].ibu_bersalin),
                                        parseInt(result.data[3].ibu_bersalin),
                                        parseInt(result.data[4].ibu_bersalin),
                                        parseInt(result.data[5].ibu_bersalin),
                                        parseInt(result.data[6].ibu_bersalin),
                                        parseInt(result.data[7].ibu_bersalin),
                                        parseInt(result.data[8].ibu_bersalin),
                                        parseInt(result.data[9].ibu_bersalin),
                                        parseInt(result.data[10].ibu_bersalin),
                                        parseInt(result.data[11].ibu_bersalin)]

                                    }, {
                                        name: 'Meninggal',
                                        data: [parseInt(result.data[0].ibu_meninggal),
                                        parseInt(result.data[1].ibu_meninggal),
                                        parseInt(result.data[2].ibu_meninggal),
                                        parseInt(result.data[3].ibu_meninggal),
                                        parseInt(result.data[4].ibu_meninggal),
                                        parseInt(result.data[5].ibu_meninggal),
                                        parseInt(result.data[6].ibu_meninggal),
                                        parseInt(result.data[7].ibu_meninggal),
                                        parseInt(result.data[8].ibu_meninggal),
                                        parseInt(result.data[9].ibu_meninggal),
                                        parseInt(result.data[10].ibu_meninggal),
                                        parseInt(result.data[11].ibu_meninggal)]

                                    }]
                                });
                                chart2.update({
                                    xAxis: {
                                        categories: [
                                        'Jan',
                                        'Feb',
                                        'Mar',
                                        'Apr',
                                        'May',
                                        'Jun',
                                        'Jul',
                                        'Aug',
                                        'Sep',
                                        'Oct',
                                        'Nov',
                                        'Dec'
                                        ]
                                    },
                                    series: [{
                                        name: 'Lahir',
                                        data: [parseInt(result.data[0].bayi_lahir),
                                        parseInt(result.data[1].bayi_lahir),
                                        parseInt(result.data[2].bayi_lahir),
                                        parseInt(result.data[3].bayi_lahir),
                                        parseInt(result.data[4].bayi_lahir),
                                        parseInt(result.data[5].bayi_lahir),
                                        parseInt(result.data[6].bayi_lahir),
                                        parseInt(result.data[7].bayi_lahir),
                                        parseInt(result.data[8].bayi_lahir),
                                        parseInt(result.data[9].bayi_lahir),
                                        parseInt(result.data[10].bayi_lahir),
                                        parseInt(result.data[11].bayi_lahir)]

                                    }, {
                                        name: 'Meninggal',
                                        data: [parseInt(result.data[0].bayi_meninggal),
                                        parseInt(result.data[1].bayi_meninggal),
                                        parseInt(result.data[2].bayi_meninggal),
                                        parseInt(result.data[3].bayi_meninggal),
                                        parseInt(result.data[4].bayi_meninggal),
                                        parseInt(result.data[5].bayi_meninggal),
                                        parseInt(result.data[6].bayi_meninggal),
                                        parseInt(result.data[7].bayi_meninggal),
                                        parseInt(result.data[8].bayi_meninggal),
                                        parseInt(result.data[9].bayi_meninggal),
                                        parseInt(result.data[10].bayi_meninggal),
                                        parseInt(result.data[11].bayi_meninggal)]

                                    }]
                                });
                                
                                chart1.hideLoading();
                                chart2.hideLoading();
                            });
                        }else{
                            $.ajax( "http://localhost/server/api/data/reports?location-id="+$('#dusun').val()+"&t="+$('#tahun').val()+"&b="+$('#bulan').val() )
                            .done(function(result) {
                                chart1.update({
                                    xAxis: {
                                        categories: [bln[$('#bulan').val()]]
                                    },
                                    series: [{
                                        name: 'Hamil Baru',
                                        data: [parseInt(result.data.ibu_hamil_baru)]

                                    }, {
                                        name: 'Hamil Aktif',
                                        data: [parseInt(result.data.ibu_hamil_aktif)]

                                    }, {
                                        name: 'Bersalin',
                                        data: [parseInt(result.data.ibu_bersalin)]

                                    }, {
                                        name: 'Meninggal',
                                        data: [parseInt(result.data.ibu_meninggal)]

                                    }]
                                });
                                chart2.update({
                                    xAxis: {
                                        categories: [bln[$('#bulan').val()]]
                                    },
                                    series: [{
                                        name: 'Lahir',
                                        data: [parseInt(result.data.bayi_lahir)]

                                    }, {
                                        name: 'Meninggal',
                                        data: [parseInt(result.data.bayi_meninggal)]

                                    }]
                                });
                                
                                chart1.hideLoading();
                                chart2.hideLoading();
                            });
                        }

                    }
                });
                
            </script>
