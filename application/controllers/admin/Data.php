<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends Admin_Controller {

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
        $this->data['faker'] = Faker\Factory::create('id_ID');
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

    public function ibu()
    {
        if ( ! $this->ion_auth->logged_in() OR ! $this->ion_auth->is_admin())
        {
            redirect('auth/login', 'refresh');
        }
        else
        {
            $this->page_title->push('Data Ibu');
            $this->data['pagetitle'] = $this->page_title->show();
            /* Breadcrumbs */
            $this->breadcrumbs->unshift(1, 'Ibu', 'admin/data/ibu');
            $this->data['breadcrumb'] = $this->breadcrumbs->show();

            // /* Get all ibu */
            $this->data['ibus'] = $this->datamodel->get_data_ibu();

            /* Load Template */
            $this->template->admin_render('admin/data/ibu', $this->data);
        }
    }

    public function bankdarah()
    {
        if ( ! $this->ion_auth->logged_in() OR ! $this->ion_auth->is_admin())
        {
            redirect('auth/login', 'refresh');
        }
        else
        {
            $this->page_title->push('Data Bank Darah');
            $this->data['pagetitle'] = $this->page_title->show();
            /* Breadcrumbs */
            $this->breadcrumbs->unshift(1, 'Bank Darah', 'admin/data/bankdarah');
            $this->data['breadcrumb'] = $this->breadcrumbs->show();

            // /* Get all users */
            $this->data['banks'] = $this->datamodel->get_data_bank_darah();

            /* Load Template */
            $this->template->admin_render('admin/data/bank_darah', $this->data);
        }
    }

    public function transportasi()
    {
        if ( ! $this->ion_auth->logged_in() OR ! $this->ion_auth->is_admin())
        {
            redirect('auth/login', 'refresh');
        }
        else
        {
            $this->page_title->push('Data Transportasi');
            $this->data['pagetitle'] = $this->page_title->show();
            /* Breadcrumbs */
            $this->breadcrumbs->unshift(1, 'Transportasi', 'admin/data/transportasi');
            $this->data['breadcrumb'] = $this->breadcrumbs->show();

            // /* Get all users */
            $this->data['trans'] = $this->datamodel->get_data_transportasi();

            /* Load Template */
            $this->template->admin_render('admin/data/transportasi', $this->data);
        }
    }

}