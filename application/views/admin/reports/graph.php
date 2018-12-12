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
                <div class="form-row">
                                  <div class="form-group col-md-4">
                                      <label for="tahun">Tahun</label>
                                      <select id="tahun" class="form-control">
                                        <option>2018</option>
                                        <option>2019</option>
                                    </select>
                                  </div>
                                  <div class="form-group col-md-4">
                                      <label for="bulan">Bulan</label>
                                      <select id="bulan" class="form-control">
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
                    colors: ['#008000', '#ffa500', '#ff0000'],
                    series: [{
                        name: 'Hamil',
                        data: [16]

                    }, {
                        name: 'Nifas',
                        data: [5]

                    }, {
                        name: 'Meninggal',
                        data: [1]

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
                        data: [5]

                    }, {
                        name: 'Meninggal',
                        data: [1]

                    }]
                });
                $('#bulan').change(function() {
                    chart1.showLoading();
                    chart2.showLoading();
                    if($(this).val() == "Tahunan")
                    {
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
                                name: 'Hamil',
                                data: [Math.floor(Math.random() * 16) + 6,
                                Math.floor(Math.random() * 16) + 6,
                                Math.floor(Math.random() * 16) + 6,
                                Math.floor(Math.random() * 16) + 6,
                                Math.floor(Math.random() * 16) + 6,
                                Math.floor(Math.random() * 16) + 6,
                                Math.floor(Math.random() * 16) + 6,
                                Math.floor(Math.random() * 16) + 6,
                                Math.floor(Math.random() * 16) + 6,
                                Math.floor(Math.random() * 16) + 6,
                                Math.floor(Math.random() * 16) + 6,
                                Math.floor(Math.random() * 16) + 6]

                            }, {
                                name: 'Nifas',
                                data: [Math.floor(Math.random() * 6) + 1,
                                Math.floor(Math.random() * 6) + 1,
                                Math.floor(Math.random() * 6) + 1,
                                Math.floor(Math.random() * 6) + 1,
                                Math.floor(Math.random() * 6) + 1,
                                Math.floor(Math.random() * 6) + 1,
                                Math.floor(Math.random() * 6) + 1,
                                Math.floor(Math.random() * 6) + 1,
                                Math.floor(Math.random() * 6) + 1,
                                Math.floor(Math.random() * 6) + 1,
                                Math.floor(Math.random() * 6) + 1,
                                Math.floor(Math.random() * 6) + 1]

                            }, {
                                name: 'Meninggal',
                                data: [Math.floor(Math.random() * 2) + 0,
                                Math.floor(Math.random() * 2) + 0,
                                Math.floor(Math.random() * 2) + 0,
                                Math.floor(Math.random() * 2) + 0,
                                Math.floor(Math.random() * 2) + 0,
                                Math.floor(Math.random() * 2) + 0,
                                Math.floor(Math.random() * 2) + 0,
                                Math.floor(Math.random() * 2) + 0,
                                Math.floor(Math.random() * 2) + 0,
                                Math.floor(Math.random() * 2) + 0,
                                Math.floor(Math.random() * 2) + 0,
                                Math.floor(Math.random() * 2) + 0]

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
                                data: [Math.floor(Math.random() * 6) + 1,
                                Math.floor(Math.random() * 6) + 1,
                                Math.floor(Math.random() * 6) + 1,
                                Math.floor(Math.random() * 6) + 1,
                                Math.floor(Math.random() * 6) + 1,
                                Math.floor(Math.random() * 6) + 1,
                                Math.floor(Math.random() * 6) + 1,
                                Math.floor(Math.random() * 6) + 1,
                                Math.floor(Math.random() * 6) + 1,
                                Math.floor(Math.random() * 6) + 1,
                                Math.floor(Math.random() * 6) + 1,
                                Math.floor(Math.random() * 6) + 1]

                            }, {
                                name: 'Meninggal',
                                data: [Math.floor(Math.random() * 2) + 0,
                                Math.floor(Math.random() * 2) + 0,
                                Math.floor(Math.random() * 2) + 0,
                                Math.floor(Math.random() * 2) + 0,
                                Math.floor(Math.random() * 2) + 0,
                                Math.floor(Math.random() * 2) + 0,
                                Math.floor(Math.random() * 2) + 0,
                                Math.floor(Math.random() * 2) + 0,
                                Math.floor(Math.random() * 2) + 0,
                                Math.floor(Math.random() * 2) + 0,
                                Math.floor(Math.random() * 2) + 0,
                                Math.floor(Math.random() * 2) + 0]

                            }]
                        });
                    }else{
                        chart1.update({
                            xAxis: {
                                categories: [$(this).val()]
                            },
                            series: [{
                                name: 'Hamil',
                                data: [Math.floor(Math.random() * 16) + 6]

                            }, {
                                name: 'Nifas',
                                data: [Math.floor(Math.random() * 6) + 1]

                            }, {
                                name: 'Meninggal',
                                data: [Math.floor(Math.random() * 2) + 0]

                            }]
                        });
                        chart2.update({
                            xAxis: {
                                categories: [$(this).val()]
                            },
                            series: [{
                                name: 'Lahir',
                                data: [Math.floor(Math.random() * 6) + 1]

                            }, {
                                name: 'Meninggal',
                                data: [Math.floor(Math.random() * 2) + 0]

                            }]
                        });
                    }
                    setTimeout(function(){
                        chart1.hideLoading();
                        chart2.hideLoading();
                    },1000);
                    
                });
            </script>
