<?php

class Calendar_Model extends CI_Model
{

    public function get_events($start, $end)
    {
        return $this->db->where("start >=", $start)->where("end <=", $end)->get("calendar_events");

    }
    
    public function add_event($data)
    {
        $this->db->insert("tbl_gasto", $data);
    }
    
    public function get_event($id)
    {
        return $this->db->where("ID", $id)->get("calendar_events");
    }
    
    public function update_event($id, $data)
    {
        $this->db->where("ID", $id)->update("calendar_events", $data);
    }
    
    public function delete_event($id)
    {
        $this->db->where("ID", $id)->delete("calendar_events");
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


}

?>