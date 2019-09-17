<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

header("Access-Control-Allow-Origin: *");

class Diretor extends CI_Controller {
	
    public function __construct(){
		parent::__construct();
		$this->load->model("Diretor_model");
	}
	
	public function index()
     {    
          $dados['segmento'] = $this->Diretor_model->get_segmento()->result();
          $dados['status'] = $this->Diretor_model->get_status()->result();
          $dados['beneficiario'] = $this->Diretor_model->get_beneficiario()->result();
          $dados['boletos'] = $this->Diretor_model->get_boletos_pagos()->result();
          $dados['pagoMes'] = $this->Diretor_model->boletosPagosMes()->result();
          $dados['debitosMes'] = $this->Diretor_model->boletosAvencerMes()->result();
          //echo $this->db->last_query(); //Use para verificar a última consulta executada
          //exit(); 
          $this->load->view("calendar_diretor/index.php", $dados);
     }
	
	public function convenio()
	{    
          $query['convenio'] = $this->Diretor_model->listarBeneficios()->result();
          $query['servicos'] = $this->Diretor_model->listarServicos()->result();
          $query['nome'] = $this->Diretor_model->listarEmpresas()->result();
		$this->load->view('tamplete/diretor/header');
		$this->load->view('pages/diretor/convenio', $query);
		$this->load->view('tamplete/diretor/footer');
	}

	public function contasPagar()
	{
		$this->load->view('tamplete/diretor/header');
		$this->load->view('pages/diretor/contaspagar');
		$this->load->view('tamplete/diretor/footer');
		
	}

	public function boletosPagos()
	{
		$dados['boletos'] = $this->Diretor_model->get_boletos_pagos()->result();
		$this->load->view('tamplete/diretor/header');
		$this->load->view('pages/diretor/boletospagos');
		$this->load->view('tamplete/diretor/footer');
	}

	public function boletos_a_Vencer()
	{
		$dados['boletos'] = $this->Diretor_model->get_boletos_a_vencer()->result();
		$this->load->view('tamplete/diretor/header');
		$this->load->view('pages/diretor/boletos_a_vencer');
		$this->load->view('tamplete/diretor/footer');
	}

	public function boletos_Vencidos()
	{
		$dados['boletos'] = $this->Diretor_model->get_boletos_vencidos()->result();
		$this->load->view('tamplete/diretor/header');
		$this->load->view('pages/diretor/boletos_vencidos');
		$this->load->view('tamplete/diretor/footer');
     }
     
     public function dashboard()
	{
          $dados['contasAPagarSemana'] = $this->Diretor_model->contasAPagarSemana()->result();
          $data = [];
          foreach($dados['contasAPagarSemana'] as $row){
               $data['dia'][] = $row->dia;
               $data['totalSemana'][] = $row->totalSemana;
          }

          $dados['contasAPagarMes'] = $this->Diretor_model->contasAPagarMes()->result();
          $mes = [];
          foreach($dados['contasAPagarMes'] as $row){
               $mes['mes'][] = $row->mes;
               $mes['totalMes'][] = $row->totalMes;
          }

          $dados['contasPagasSemana'] = $this->Diretor_model->contasPagasSemana()->result();
          $dia = [];
          foreach($dados['contasPagasSemana'] as $row){
               $dia['dia'][] = $row->dia;
               $dia['totalPagoSemana'][] = $row->totalPagoSemana;
          }

          $dados['contasPagasMes'] = $this->Diretor_model->contasPagasMes()->result();
          $mespago = [];
          foreach($dados['contasPagasMes'] as $row){
               $mespago['mes'][] = $row->mes;
               $mespago['totalPagoMes'][] = $row->totalPagoMes;
          }

          $data['chart_data'] = json_encode($data);
          $data['chart_mes'] = json_encode($mes);
          $data['chart_pago_semana'] = json_encode($dia);
		$data['chart_pago_mes'] = json_encode($mespago);
		$this->load->view('tamplete/Diretor/header');
		$this->load->view('pages/Diretor/dashboard', $data);
		$this->load->view('tamplete/Diretor/footer');
     }
     
     public function contas_a_pagar_semana() {
   
          $query =  $this->db->query("SELECT COUNT(id) as count,MONTHNAME(created_at) as month_name FROM users WHERE YEAR(created_at) = '" . date('Y') . "'
          GROUP BY YEAR(created_at),MONTH(created_at)"); 
     
          $record = $query->result();
          $data = [];
     
          foreach($record as $row) {
                $data['label'][] = $row->month_name;
                $data['data'][] = (int) $row->count;
          }
          $data['chart_data'] = json_encode($data);
          $this->load->view('bar_chart',$data);
        }

        public function contas_a_pagar_mes() {
   
          $query =  $this->db->query("SELECT COUNT(id) as count,MONTHNAME(created_at) as month_name FROM users WHERE YEAR(created_at) = '" . date('Y') . "'
          GROUP BY YEAR(created_at),MONTH(created_at)"); 
     
          $record = $query->result();
          $data = [];
     
          foreach($record as $row) {
                $data['label'][] = $row->month_name;
                $data['data'][] = (int) $row->count;
          }
          $data['chart_data'] = json_encode($data);
          $this->load->view('bar_chart',$data);
        }

        public function contas_receber_semana() {
   
          $query =  $this->db->query("SELECT COUNT(id) as count,MONTHNAME(created_at) as month_name FROM users WHERE YEAR(created_at) = '" . date('Y') . "'
          GROUP BY YEAR(created_at),MONTH(created_at)"); 
     
          $record = $query->result();
          $data = [];
     
          foreach($record as $row) {
                $data['label'][] = $row->month_name;
                $data['data'][] = (int) $row->count;
          }
          $data['chart_data'] = json_encode($data);
          $this->load->view('bar_chart',$data);
        }

        public function contas_receber_mes() {
   
          $query =  $this->db->query("SELECT COUNT(id) as count,MONTHNAME(created_at) as month_name FROM users WHERE YEAR(created_at) = '" . date('Y') . "'
          GROUP BY YEAR(created_at),MONTH(created_at)"); 
     
          $record = $query->result();
          $data = [];
     
          foreach($record as $row) {
                $data['label'][] = $row->month_name;
                $data['data'][] = (int) $row->count;
          }
          $data['chart_data'] = json_encode($data);
          $this->load->view('bar_chart',$data);
        }

     /*Função Listar Eventos*/
     public function get_events()
          {
               // Our Start and End Dates
               $start = $this->input->get("start");
               $end = $this->input->get("end");

               $startdt = new DateTime('now'); // setup a local datetime
               $startdt->setTimestamp($start); // Set the date based on timestamp
               $start_format = $startdt->format('Y-m-d H:i:s');

               $enddt = new DateTime('now'); // setup a local datetime
               $enddt->setTimestamp($end); // Set the date based on timestamp
               $end_format = $enddt->format('Y-m-d H:i:s');

               $events = $this->Diretor_model->get_events($start_format, $end_format);
               $data_events = array();

               foreach($events->result() as $r) {

                    $data_events[] = array(
                         "id" => $r->id,
                         "valor" => $r->valor,
                         "codigo_de_barras" => $r->codigo_de_barras,
                         "obs" => $r->obs,
                         "end" => $r->end,
                         "start" => "$r->start",
                         "title" => $r->segmento,
                         "title" => $r->segmento.": R$ ".number_format($r->valor, 2, ',', '.'),
                         "id_segmento" => $r->id_segmento,
                         "id_status" => $r->id_status,
                         "beneficiario" => $r->beneficiario,
                         "totalPagoDia" => number_format($r->totalPagoDia, 2, ',', '.')

                    );
               }

               echo json_encode(array("events" => $data_events));
               exit();
          }

     /*Função Adicionar Evento*/
     public function add_event() 
          {
          /* Our calendar data */
          $id_segmento = $this->input->post("add_id_segmento", TRUE);
          $id_status = $this->input->post("add_id_status", TRUE);
          $beneficiario = $this->input->post("add_beneficiario", TRUE);
          $valor = $this->input->post("add_valor", TRUE);
          $codigo_de_barras = $this->input->post("add_codigo", TRUE);
          $obs = $this->input->post("add_obs", TRUE);
          $start = $this->input->post("add_data", TRUE);
          $end = $this->input->post("add_data", TRUE);

          if(!empty($start_date)) {
               $sd = DateTime::createFromFormat("Y/m/d H:i", $start_date);
               $start_date = $sd->format('Y-m-d H:i:s');
               $start_date_timestamp = $sd->getTimestamp();
          } else {
               $start_date = date("Y-m-d H:i:s", time());
               $start_date_timestamp = time();
          }

          if(!empty($end_date)) {
               $ed = DateTime::createFromFormat("Y/m/d H:i", $end_date);
               $end_date = $ed->format('Y-m-d H:i:s');
               $end_date_timestamp = $ed->getTimestamp();
          } else {
               $end_date = date("Y-m-d H:i:s", time());
               $end_date_timestamp = time();
          }

          $this->Diretor_model->add_event(array(
               "id_segmento" => $id_segmento,
               "id_status" => $id_status,
               "beneficiario" => $beneficiario,
               "valor" => str_replace(",",".",str_replace(".","",$valor)),
               "codigo_de_barras" => $codigo_de_barras,
               "obs" => $obs,
               "start" => $start,
               "end" => $end
               )
          );

               //echo $this->db->last_query(); //Use para verificar a última consulta executada
               //exit();    

          redirect(site_url("diretor"));
          }

     /*Funcão Editar Evento*/ 
     
     public function edit_event()
     {
          $id = intval($this->input->post("id"));
          $event = $this->Diretor_model->get_event($id);          
          if($event->num_rows() == 0) {
               echo"Invalid Event";
               exit();
          }

          $event->row();

          /* Our calendar data */
          $id_segmento = $this->input->post("id_segmento", TRUE);
          $id_status = $this->input->post("id_status", TRUE);
          $beneficiario = $this->input->post("beneficiario", TRUE);
          $valor = $this->input->post("valor", TRUE);
          $codigo_de_barras = $this->input->post("codigo", TRUE);
          $obs = $this->input->post("obs", TRUE);
          $start_date = "";
          $end_date = "";
          $start = $this->input->post("edit_data");
          $end = $this->input->post("edit_data");
          $delete = intval($this->input->post("delete"));

          if(!$delete) {

               if(!empty($start_date)) {
                    $sd = DateTime::createFromFormat("Y/m/d H:i", $start_date);
                    $start_date = $sd->format('Y-m-d H:i:s');
                    $start_date_timestamp = $sd->getTimestamp();
               } else {
                    $start_date = date("Y-m-d H:i:s", time());
                    $start_date_timestamp = time();
               }

               if(!empty($end_date)) {
                    $ed = DateTime::createFromFormat("Y/m/d H:i", $end_date);
                    $end_date = $ed->format('Y-m-d H:i:s');
                    $end_date_timestamp = $ed->getTimestamp();
               } else {
                    $end_date = date("Y-m-d H:i:s", time());
                    $end_date_timestamp = time();
               }

               $this->Diretor_model->update_event($id, array(
                    "id_segmento" => $id_segmento,
                    "id_status" => $id_status,
                    "beneficiario" => $beneficiario,
                    "valor" => $valor,
                    "codigo_de_barras" => $codigo_de_barras,
                    "obs" => $obs,
                    "start" => $start,
                    "end" => $end
                    )
                 );

          } else {
               $this->Diretor_model->delete_event($id);
          }
          //echo $this->db->last_query(); //Use para verificar a última consulta executada
          //exit(); 
          redirect(site_url("diretor"));
     }

     public function procuraBoletosAVencer(){
		$inicio = $this->input->post("inicio");
		$fim = $this->input->post("fim");
		$data['boletos'] =  $this->Diretor_model->procuraBoletosAVencer($inicio, $fim)->result();
		$this->load->view('tamplete/diretor/header');
		$this->load->view('pages/diretor/boletos_a_vencer', $data);
		$this->load->view('tamplete/diretor/footer');		 
		 
	 }

      public function procuraBoletosPagos(){
		$inicio = $this->input->post("inicio");
		$fim = $this->input->post("fim");
		$data['boletos'] =  $this->Diretor_model->procuraBoletosPagos($inicio, $fim)->result();
		$this->load->view('tamplete/diretor/header');
		$this->load->view('pages/diretor/boletospagos', $data);
		$this->load->view('tamplete/diretor/footer');		 
		 
	 }
	 
	 public function procuraBoletosVencidos(){
		$inicio = $this->input->post("inicio");
		$fim = $this->input->post("fim");
		$data['boletos'] =  $this->Diretor_model->procuraBoletosVencidos($inicio, $fim)->result();
		$this->load->view('tamplete/diretor/header');
		$this->load->view('pages/diretor/boletos_vencidos', $data);
		$this->load->view('tamplete/diretor/footer');		 
		 
	 }		 
     	
}

?>