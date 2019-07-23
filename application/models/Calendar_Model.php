<?php

class Calendar_Model extends CI_Model
{

    public function get_events($start, $end)
    {
        //return $this->db->where("start >=", $start)->where("end <=", $end)->get("tbl_gasto");
        $this->db->select('tbl_gasto.id, tbl_gasto.codigo_de_barras, tbl_gasto.valor, tbl_gasto.id_segmento, tbl_gasto.id_status, tbl_gasto.id_beneficiario, tbl_gasto.vencimento, tbl_gasto.obs, tbl_gasto.start, tbl_gasto.end, segmento');
        $this->db->from('tbl_gasto');
        $this->db->join('tbl_segmento', 'tbl_segmento.id = tbl_gasto.id_segmento');
        $this->db->where("tbl_gasto.start >=", $start)->where("tbl_gasto.end <=", $end);
        $query = $this->db->get();
        return $query;

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

    public function get_boletos_pagos()
    {
        //return $this->db->where("start >=", $start)->where("end <=", $end)->get("tbl_gasto");
        $this->db->select('tbl_segmento.segmento, tbl_beneficiario.beneficiario, tbl_status.status, tbl_gasto.valor, tbl_gasto.codigo_de_barras');
        $this->db->from('tbl_gasto');
        $this->db->join('tbl_beneficiario', 'tbl_beneficiario.id = tbl_gasto.id_beneficiario');
        $this->db->join('tbl_status', 'tbl_status.id = tbl_gasto.id_status');
        $this->db->join('tbl_segmento', 'tbl_segmento.id = tbl_gasto.id_segmento');
        $this->db->where("tbl_gasto.id_status =", "1");
        $query = $this->db->get();
        return $query;

    }

    public function get_boletos_a_vencer()
    {
        //return $this->db->where("start >=", $start)->where("end <=", $end)->get("tbl_gasto");
        $this->db->select('tbl_segmento.segmento, tbl_beneficiario.beneficiario, tbl_status.status, tbl_gasto.valor, tbl_gasto.codigo_de_barras');
        $this->db->from('tbl_gasto');
        $this->db->join('tbl_beneficiario', 'tbl_beneficiario.id = tbl_gasto.id_beneficiario');
        $this->db->join('tbl_status', 'tbl_status.id = tbl_gasto.id_status');
        $this->db->join('tbl_segmento', 'tbl_segmento.id = tbl_gasto.id_segmento');
        $this->db->where("tbl_gasto.id_status =", "2");
        $query = $this->db->get();
        return $query;

    }

    public function get_boletos_vencidos()
    {
        //return $this->db->where("start >=", $start)->where("end <=", $end)->get("tbl_gasto");
        $this->db->select('tbl_segmento.segmento, tbl_beneficiario.beneficiario, tbl_status.status, tbl_gasto.valor, tbl_gasto.codigo_de_barras');
        $this->db->from('tbl_gasto');
        $this->db->join('tbl_beneficiario', 'tbl_beneficiario.id = tbl_gasto.id_beneficiario');
        $this->db->join('tbl_status', 'tbl_status.id = tbl_gasto.id_status');
        $this->db->join('tbl_segmento', 'tbl_segmento.id = tbl_gasto.id_segmento');
        $this->db->where("tbl_gasto.id_status =", "3");
        $query = $this->db->get();
        return $query;

    }

}

?>