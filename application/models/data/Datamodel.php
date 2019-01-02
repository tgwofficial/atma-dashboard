<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datamodel extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }


    public function get_data_ibu(){  
        return $this->db->query("SELECT data_identitas_ibu.name as nama,data_identitas_ibu.dusun as dusunasal,data_identitas_ibu.telp as telpon, data_identitas_ibu.*, data_rencana_persalinan.*, data_status_persalinan.*, data_transportasi.* FROM data_identitas_ibu LEFT JOIN data_rencana_persalinan ON data_identitas_ibu.unique_id=data_rencana_persalinan.id_ibu LEFT JOIN data_status_persalinan ON data_identitas_ibu.unique_id=data_status_persalinan.id_ibu LEFT JOIN data_transportasi ON data_rencana_persalinan.id_trans=data_transportasi.unique_id LEFT JOIN (SELECT * FROM data_identitas_ibu_edit WHERE id IN (SELECT MAX(id) FROM data_identitas_ibu_edit GROUP BY unique_id)) edit ON data_identitas_ibu.unique_id=edit.unique_id")->result();
    }

    public function get_data_transportasi(){  
        return $this->db->query("SELECT * FROM data_transportasi LEFT JOIN (SELECT * FROM data_transportasi_edit WHERE id IN (SELECT MAX(id) FROM data_transportasi_edit GROUP BY unique_id)) edit ON data_transportasi.unique_id=edit.unique_id")->result();
    }

    public function get_data_bank_darah(){  
        return $this->db->query("SELECT * FROM data_bank_darah LEFT JOIN (SELECT * FROM data_bank_darah_edit WHERE id IN (SELECT MAX(id) FROM data_bank_darah_edit GROUP BY unique_id)) edit ON data_bank_darah.unique_id=edit.unique_id")->result();
    }

    public function getLoginInfo($username) {
        $this->db->select('id,username,email,created_on,last_login,active,first_name,last_name,company,phone');
        $this->db->where('username', $username);
        $user = $this->db->get('users')->row_array();

        $this->db->select('*');
        $this->db->where('user_id', $user['id']);
        $user_map = $this->db->get('user_map')->row_array();

        $this->db->select('*,name');
        $this->db->where('user_id', $user['id']);
        $this->db->join('groups', 'users_groups.group_id = groups.id');
        $users_groups = $this->db->get('users_groups')->row_array();
        $user['groups'] = $users_groups['name'];

        $res['user'] = $user;

        $this->db->select('location.*,location_tag.name as tag_name, description');
        $this->db->join('location_tag', 'location.location_tag_id = location_tag.location_tag_id');
        $this->db->where('location_id', $user_map['location_id']);
        $loc = $this->db->get('location')->row_array();
        $res['user_location'] = $loc;

        // $locs = [];
        // $locs[] = $loc;
        // while($loc['parent_location']!=NULL){
        //     $loc = $this->getParentLocation($loc);
        //     $locs[] = $loc;
        // }
        // $locs = array_reverse($locs);
        // $locs = $this->getChildLocations($locs,$res['user_location']);
        

        // $res['locations_tree'] = $locs;

        return $res;
    }

    private function getParentLocation($loc){
        $this->db->select('*');
        $this->db->where('location_id', $loc['parent_location']);
        $loc = $this->db->get('location')->row_array();
        return $loc;
    }

    private function getChildLocations($locs,$loc){
        $this->db->select('*');
        $this->db->where('parent_location', $loc['location_id']);
        $result = $this->db->get('location')->result_array();
        foreach ($result as $child) {
            $locs[] = $child;
            $locs = $this->getChildLocations($locs,$child);
        }
        return $locs;
    }

    public function getChildLocationsById($locId){
        $this->db->select('*');
        $this->db->where('parent_location', $locId);
        $result = $this->db->get('location')->result_array();
        $locs = [];
        foreach ($result as $child) {
            $locs[] = $child;
        }
        return $locs;
    }

    public function getLocations($locations_tree){
        $this->db->select('*');
        $tags = $this->db->get('location_tag')->result_array();
        $loc_tags = [];
        foreach ($tags as $tag) {
            $loc_tags[$tag['location_tag_id']] = $tag;
        }
        $res = [];
        foreach ($locations_tree as $loc) {
            $res[$loc_tags[$loc['location_tag_id']]['name']][] = $loc;
        }
        return $res;
    }
}
