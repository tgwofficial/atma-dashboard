<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datamodel extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }


    public function get_data_ibu(){  
        return $this->db->query("SELECT data_identitas_ibu.name as nama,data_identitas_ibu.dusun as dusunasal,data_identitas_ibu.telp as telpon, data_identitas_ibu.*, data_rencana_persalinan.*, data_status_persalinan.*, data_transportasi.* FROM data_identitas_ibu LEFT JOIN data_rencana_persalinan ON data_identitas_ibu.unique_id=data_rencana_persalinan.id_ibu LEFT JOIN data_status_persalinan ON data_identitas_ibu.unique_id=data_status_persalinan.id_ibu LEFT JOIN data_transportasi ON data_rencana_persalinan.id_trans=data_transportasi.unique_id")->result();
    }

    public function get_data_transportasi(){  
        return $this->db->query("SELECT * FROM data_transportasi")->result();
    }

    public function get_data_bank_darah(){  
        return $this->db->query("SELECT * FROM data_bank_darah")->result();
    }
}
