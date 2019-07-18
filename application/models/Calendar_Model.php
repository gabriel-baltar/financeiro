<?php

class Calendar_Model extends CI_Model
{

    public function get_events($start, $end)
    {
        return $this->db->where("start >=", $start)->where("end <=", $end)->get("tbl_gasto");

    }
    
    public function add_event($data)
    {
        $this->db->insert("tbl_gasto", $data);
    }
    
    public function get_event($id)
    {
        return $this->db->where("id", $id)->get("tbl_gasto");
    }
    
    public function update_event($id, $data)
    {
        $this->db->where("id", $id)->update("tbl_gasto", $data);
    }
    
    public function delete_event($id)
    {
        $this->db->where("id", $id)->delete("tbl_gasto");
    }

    public function get_beneficiario(){

        return $this->db->get('tbl_beneficiario');
    }

    public function get_status(){

        return $this->db->get('tbl_status'); 

    }

    public function get_segmento(){

        return $this->db->get('tbl_segmento');

    }

    public function tbl_segmento($id){

        $result = $this->db->join($tbl_segmento, $id_segmento);
        return $result;

    }

}

?>