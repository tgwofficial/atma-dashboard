<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();
        include APPPATH.'/third_party/faker/autoload.php';

        /* Load :: Common */
        $this->lang->load('admin/users');
        $this->load->model('data/datamodel','datamodel');

        /* Title Page :: Common */
        $this->data['pagetitle'] = $this->page_title->show();

        /* Breadcrumbs :: Common */
        $this->breadcrumbs->unshift(1, 'Data', 'admin/data');
    }


	public function index()
	{
        if ( ! $this->ion_auth->logged_in() OR ! $this->ion_auth->is_admin())
        {
            redirect('auth/login', 'refresh');
        }
        else
        {
            /* Breadcrumbs */
            $this->data['breadcrumb'] = $this->breadcrumbs->show();

            // /* Get all users */
            // $this->data['users'] = $this->ion_auth->users()->result();
            // foreach ($this->data['users'] as $k => $user)
            // {
            //     $this->data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
            // }

            /* Load Template */
            $this->template->admin_render('admin/data/index', $this->data);
        }
	}

    public function data()
    {
        if ( ! $this->ion_auth->logged_in() OR ! $this->ion_auth->is_admin())
        {
            redirect('auth/login', 'refresh');
        }
        else
        {
            $this->page_title->push('Master Data');
            $this->data['pagetitle'] = $this->page_title->show();
            /* Breadcrumbs */
            $this->breadcrumbs->unshift(1, 'Master Data', 'admin/data/master');
            $this->data['breadcrumb'] = $this->breadcrumbs->show();

            // /* Get all ibu */
            $this->data['userinfo'] = $this->datamodel->getLoginInfo($this->session->userdata('username'));
            $this->data['datas'] = $this->datamodel->get_master_data($this->data['userinfo']['child_locations']);

            /* Load Template */
            $this->template->admin_render('admin/data/master', $this->data);
        }
    }

}