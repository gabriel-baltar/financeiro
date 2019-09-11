<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Diretor_model extends CI_Model{
	
    public function __construct(){
        parent::__construct();
    }
    
	public function loginDiretor($login, $senha){
		$sql = "SELECT * FROM usuario WHERE login = ? AND senha = ? AND id_login = 1";
		$result = $this->db->query($sql, array($login, $senha));
		return $result;
	}
	
	public function get_events($start, $end)
    {
        //return $this->db->where("start >=", $start)->where("end <=", $end)->get("tbl_gasto");
        $this->db->select('tbl_gasto.id, tbl_gasto.codigo_de_barras, tbl_gasto.valor, tbl_gasto.id_segmento, tbl_gasto.id_status, tbl_gasto.id_beneficiario, tbl_gasto.vencimento, tbl_gasto.obs, tbl_gasto.start, tbl_gasto.end, tbl_segmento.segmento, totais.totalPagoDia');
        $this->db->from('tbl_gasto');
        $this->db->join('tbl_segmento', 'tbl_segmento.id = tbl_gasto.id_segmento');
        $this->db->join('totais', 'totais.start = tbl_gasto.start');
        $this->db->where("tbl_gasto.start >=", $start)->where("tbl_gasto.end <=", $end);
        $query = $this->db->get();
        return $query;      

    }

    public function contasAPagarSemana(){
        $sql = "SELECT dayname(start) as dia, dayofweek(start), SUM(valor) as totalSemana FROM tbl_gasto WHERE WEEKOFYEAR(start) = WEEKOFYEAR(now()) AND id_status = 2 GROUP BY dayname(start) ORDER BY dayofweek(start)";
        $result = $this->db->query($sql);
        return $result;
    }

    public function contasAPagarMes(){
        $sql = "SELECT monthname(start) as mes, SUM(valor) as totalMes FROM tbl_gasto where id_status = 2 AND year(start) = year(now()) GROUP BY monthname(start) ORDER BY dayofmonth(start)"; 
        $result = $this->db->query($sql);
        return $result;
    }

    public function boletosPagosMes(){
        $query = $this->db->select("SUM(valor) AS valor FROM tbl_gasto WHERE MONTH(start) = MONTH(NOW()) AND id_status = '4'", FALSE);
        $query = $this->db->get();
        return $query;
    }
    
    public function boletosAvencerMes(){
        $query = $this->db->select("SUM(valor) AS valor FROM tbl_gasto WHERE MONTH(start) = MONTH(NOW()) AND id_status = '2'", FALSE);
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
        $this->db->where("tbl_gasto.id_status =", "4");
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

    public function procuraBoletosAVencer($inicio, $fim){
        $sql = "SELECT gt.codigo_de_barras, gt.valor, sg.segmento, st.status, bn.beneficiario FROM tbl_gasto gt INNER JOIN tbl_segmento sg ON gt.id_segmento = sg.id INNER JOIN tbl_status st ON gt.id_status = st.id INNER JOIN tbl_beneficiario bn ON gt.id_beneficiario = bn.id WHERE DATE_FORMAT(start, '%Y-%m-%d') >= '$inicio' AND DATE_FORMAT(start, '%Y-%m-%d') <= '$fim' AND gt.id_status = '2'"; 
        $result = $this->db->query($sql);
        return $result;		
	}
	
	public function procuraBoletosPagos($inicio, $fim){
        $sql = "SELECT gt.codigo_de_barras, gt.valor, sg.segmento, st.status, bn.beneficiario FROM tbl_gasto gt INNER JOIN tbl_segmento sg ON gt.id_segmento = sg.id INNER JOIN tbl_status st ON gt.id_status = st.id INNER JOIN tbl_beneficiario bn ON gt.id_beneficiario = bn.id WHERE DATE_FORMAT(start, '%Y-%m-%d') >= '$inicio' AND DATE_FORMAT(start, '%Y-%m-%d') <= '$fim' AND gt.id_status = '4'"; 
        $result = $this->db->query($sql);
        return $result;		
	}

	public function procuraBoletosVencidos($inicio, $fim){
        $sql = "SELECT gt.codigo_de_barras, gt.valor, sg.segmento, st.status, bn.beneficiario FROM tbl_gasto gt INNER JOIN tbl_segmento sg ON gt.id_segmento = sg.id INNER JOIN tbl_status st ON gt.id_status = st.id INNER JOIN tbl_beneficiario bn ON gt.id_beneficiario = bn.id WHERE DATE_FORMAT(start, '%Y-%m-%d') >= '$inicio' AND DATE_FORMAT(start, '%Y-%m-%d') <= '$fim' AND gt.id_status = '3'"; 
        $result = $this->db->query($sql);
        return $result;		
	}
	
}

?>