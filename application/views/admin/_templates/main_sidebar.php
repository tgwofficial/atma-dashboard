<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

            <aside class="main-sidebar">
                <section class="sidebar">
<?php if ($admin_prefs['user_panel'] == TRUE): ?>
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?php echo base_url($avatar_dir . '/m_001.png'); ?>" class="img-circle" alt="User Image">
                        </div>
                        <div class="pull-left info">
                            <p><?php echo $user_login['firstname'].$user_login['lastname']; ?></p>
                            <a href="#"><i class="fa fa-circle text-success"></i> <?php echo lang('menu_online'); ?></a>
                        </div>
                    </div>

<?php endif; ?>
<?php if ($admin_prefs['sidebar_form'] == TRUE): ?>
                    <!-- Search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="<?php echo lang('menu_search'); ?>...">
                            <span class="input-group-btn">
                                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>

<?php endif; ?>
                    <!-- Sidebar menu -->
                    <ul class="sidebar-menu">
                        <li>
                            <a href="<?php echo "https://kie.atma.theseforall.org/"; ?>">
                                <i class="fa fa-home text-primary"></i> <span><?php echo "WEBSITE KIE"; ?></span>
                            </a>
                        </li>

                        <li class="header text-uppercase"><?php echo lang('menu_main_navigation'); ?></li>
                        <li class="<?=active_link_controller('dashboard')?>">
                            <a href="<?php echo site_url('admin/dashboard'); ?>">
                                <i class="fa fa-dashboard"></i> <span><?php echo lang('menu_dashboard'); ?></span>
                            </a>
                        </li>


                        <li class="header text-uppercase"><?php echo lang('menu_administration'); ?></li>
                        <li class="<?=active_link_controller('users')?>">
                            <a href="<?php echo site_url('admin/users'); ?>">
                                <i class="fa fa-user"></i> <span><?php echo lang('menu_users'); ?></span>
                            </a>
                        </li>
                        <li class="<?=active_link_controller('groups')?>">
                            <a href="<?php echo site_url('admin/groups'); ?>">
                                <i class="fa fa-shield"></i> <span><?php echo lang('menu_security_groups'); ?></span>
                            </a>
                        </li>
                        <li class="treeview <?=active_link_controller('data')?>">
                            <a href="#">
                                <i class="fa fa-database"></i>
                                <span><?php echo 'Data'; ?></span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li class="<?=active_link_function('ibu')?>"><a href="<?php echo site_url('admin/data/ibu'); ?>"><?php echo 'Ibu'; ?></a></li>
                                <li class="<?=active_link_function('bankdarah')?>"><a href="<?php echo site_url('admin/data/bankdarah'); ?>"><?php echo 'Bank Darah'; ?></a></li>
                                <li class="<?=active_link_function('transportasi')?>"><a href="<?php echo site_url('admin/data/transportasi'); ?>"><?php echo 'Transportasi'; ?></a></li>
                            </ul>
                        </li>
                        <li class="treeview <?=active_link_controller('reports')?>">
                            <a href="#">
                                <i class="fa fa-bar-chart"></i>
                                <span><?php echo 'Reports'; ?></span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li class="<?=active_link_function('reports')?>"><a href="<?php echo site_url('admin/reports'); ?>"><?php echo 'Tabel'; ?></a></li>
                                <li class="<?=active_link_function('graphs')?>"><a href="<?php echo site_url('admin/reports/graph'); ?>"><?php echo 'Grafik'; ?></a></li>
                            </ul>
                        </li>
                    </ul>
                </section>
            </aside>
