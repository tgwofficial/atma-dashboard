<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();

        /* Load :: Common */
        $this->lang->load('admin/users');
        $this->load->model('data/datamodel','datamodel');

        /* Title Page :: Common */
        $this->page_title->push('Reports');
        $this->data['pagetitle'] = $this->page_title->show();
        $this->data['atma_api_url'] = $this->config->item('atma_api_url');

        /* Breadcrumbs :: Common */
        $this->breadcrumbs->unshift(1, 'Reports', 'admin/reports');
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
            $this->template->admin_render('admin/reports/index', $this->data);
        }
    }


	public function table()
	{
        if ( ! $this->ion_auth->logged_in() OR ! $this->ion_auth->is_admin())
        {
            redirect('auth/login', 'refresh');
        }
        else
        {
            $this->data['userinfo'] = $this->datamodel->getLoginInfo($this->session->userdata('username'));
            // var_dump($this->data['userinfo']);exit;
            /* Breadcrumbs */
            $this->data['breadcrumb'] = $this->breadcrumbs->show();

            // /* Get all users */
            // $this->data['users'] = $this->ion_auth->users()->result();
            // foreach ($this->data['users'] as $k => $user)
            // {
            //     $this->data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
            // }

            /* Load Template */
            $this->template->admin_render('admin/reports/table', $this->data);
        }
	}

    public function graph()
    {
        if ( ! $this->ion_auth->logged_in() OR ! $this->ion_auth->is_admin())
        {
            redirect('auth/login', 'refresh');
        }
        else
        {
            $this->data['userinfo'] = $this->datamodel->getLoginInfo($this->session->userdata('username'));
            /* Breadcrumbs */
            $this->data['breadcrumb'] = $this->breadcrumbs->show();

            // /* Get all users */
            // $this->data['users'] = $this->ion_auth->users()->result();
            // foreach ($this->data['users'] as $k => $user)
            // {
            //     $this->data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
            // }

            /* Load Template */
            $this->template->admin_render('admin/reports/graph', $this->data);
        }
    }

}