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
                                <div class="box-body">
                                    <table id="myTable" class="table table-striped table-hover" title="Master Data">
                                        <thead>
                                            <tr>
                                                <th>Created On</th>
                                                <th>Unique ID</th>
                                                <th>Form Name</th>
                                                <th>Data</th>
                                                <th>Desa</th>
                                                <th>Dusun</th>
                                                <th>User</th>
                                                <th>Server Timestamp</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($datas as $key => $data) {
                                                $time = date("Y-m-d H:i:s", substr($data->update_id,0,10));
                                                $fields = json_decode(json_decode($data->data));
                                             ?>
                                                <tr>
                                                    <td><?php echo $time; ?></td>
                                                    <td><?php echo isset($fields->unique_id)?$fields->unique_id:$fields->id_ibu; ?></td>
                                                    <td><?php echo $data->form_name; ?></td>
                                                    <td><?php foreach ($fields as $key => $value) {
                                                        echo $key." : ".$value.",<br>";
                                                    } ?></td>
                                                    <td><?php echo $data->desa; ?></td>
                                                    <td><?php echo $data->dusun; ?></td>
                                                    <td><?php echo $data->user_id; ?></td>
                                                    <td><?php echo $data->server_timestamp; ?></td>
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
                        fixedColumns: true,
                        scrollCollapse: true,
                        dom: 'lfrtBip',
                        buttons: [
                        {
                            extend: 'excel',
                            title: $('#myTable').attr("title")
                        }
                        ]
                    });
                } );
            </script>