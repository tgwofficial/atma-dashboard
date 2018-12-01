<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
            <link rel="stylesheet" href="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
            <script src="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
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
                                    <div class="ct-chart ct-perfect-fourth"></div>
                                </div>
                            </div>
                         </div>
                    </div>
                </section>
            </div>
            <script type="text/javascript">
                var data = {
                  labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mai', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                  series: [
                  [5, 4, 3, 7, 5, 10, 3, 4, 8, 10, 6, 8],
                  [3, 2, 9, 5, 4, 6, 4, 6, 7, 8, 7, 4]
                  ]
              };

              var options = {
                  seriesBarDistance: 15
              };

              var responsiveOptions = [
              ['screen and (min-width: 641px) and (max-width: 1024px)', {
                seriesBarDistance: 10,
                axisX: {
                  labelInterpolationFnc: function (value) {
                    return value;
                }
            }
        }],
        ['screen and (max-width: 640px)', {
            seriesBarDistance: 5,
            axisX: {
              labelInterpolationFnc: function (value) {
                return value[0];
            }
        }
    }]
    ];

    new Chartist.Bar('.ct-chart', data, options, responsiveOptions);
            </script>
