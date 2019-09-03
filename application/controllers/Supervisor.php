<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

header("Access-Control-Allow-Origin: *");

class Supervisor extends CI_Controller {
	
    public function __construct(){
		parent::__construct();
		$this->load->model("Supervisor_model");
	}
	
	public function index()
     {    
          $dados['segmento'] = $this->Supervisor_model->get_segmento()->result();
          $dados['status'] = $this->Supervisor_model->get_status()->result();
          $dados['beneficiario'] = $this->Supervisor_model->get_beneficiario()->result();
          $dados['boletos'] = $this->Supervisor_model->get_boletos_pagos()->result();
          $dados['debitosMes'] = $this->Supervisor_model->boletosAvencerMes()->result();
          $dados['pagoMes'] = $this->Supervisor_model->boletosPagosMes()->result();
          $this->load->view("calendar/index.php", $dados); 
     }

	public function convenio()
	{    
          $query['convenio'] = $this->Supervisor_model->listarBeneficios()->result();
          $query['servicos'] = $this->Supervisor_model->listarServicos()->result();
          $query['nome'] = $this->Supervisor_model->listarEmpresas()->result();
		$this->load->view('tamplete/supervisor/header');
		$this->load->view('pages/supervisor/convenio', $query);
		$this->load->view('tamplete/supervisor/footer');
	}

	public function contasPagar()
	{
		$this->load->view('tamplete/supervisor/header');
		$this->load->view('pages/supervisor/contaspagar');
		$this->load->view('tamplete/supervisor/footer');
	}

	public function boletosPagos()
	{
		$dados['boletos'] = $this->Supervisor_model->get_boletos_pagos()->result();
		$this->load->view('tamplete/supervisor/header');
		$this->load->view('pages/supervisor/boletospagos', $dados);
          $this->load->view('tamplete/supervisor/footer');
     }

     public function resultado()
	{
		$dados['listagem'] = $this->Supervisor_model->busca($_POST)->result();
		$this->load->view('tamplete/supervisor/header');
		$this->load->view('pages/supervisor/resultado', $dados);
		$this->load->view('tamplete/supervisor/footer');
     }
     

	public function boletos_a_vencer()
	{
		$dados['boletos'] = $this->Supervisor_model->get_boletos_a_vencer()->result();
		$this->load->view('tamplete/supervisor/header');
		$this->load->view('pages/supervisor/boletos_a_vencer', $dados);
		$this->load->view('tamplete/supervisor/footer');
	}

	public function boletos_Vencidos()
	{
		$dados['boletos'] = $this->Supervisor_model->get_boletos_vencidos()->result();
		$this->load->view('tamplete/supervisor/header');
		$this->load->view('pages/supervisor/boletos_vencidos', $dados);
		$this->load->view('tamplete/supervisor/footer');
     }

     public function contareceber()
     {
          $this->load->view('tamplete/supervisor/header');
          $this->load->view('pages/supervisor/contareceber');
          $this->load->view('tamplete/supervisor/footer');
     }

     public function relatorios()
     {
          $this->load->view('tamplete/supervisor/header');
          $this->load->view('pages/supervisor/relatorios');
          $this->load->view('tamplete/supervisor/footer');
     }

     public function dashboard()
	{
          $dados['contasAPagarSemana'] = $this->Supervisor_model->contasAPagarSemana()->result();
          $data = [];
          foreach($dados['contasAPagarSemana'] as $row){
               $data['dia'][] = $row->dia;
               $data['totalSemana'][] = $row->totalSemana;
          }

          $dados['contasAPagarMes'] = $this->Supervisor_model->contasAPagarMes()->result();
          $mes = [];
          foreach($dados['contasAPagarMes'] as $row){
               $mes['mes'][] = $row->mes;
               $mes['totalMes'][] = $row->totalMes;
          }

          $dados['contasPagasSemana'] = $this->Supervisor_model->contasPagasSemana()->result();
          $dia = [];
          foreach($dados['contasPagasSemana'] as $row){
               $dia['dia'][] = $row->dia;
               $dia['totalPagoSemana'][] = $row->totalPagoSemana;
          }

          $dados['contasPagasMes'] = $this->Supervisor_model->contasPagasMes()->result();
          $mespago = [];
          foreach($dados['contasPagasMes'] as $row){
               $mespago['mes'][] = $row->mes;
               $mespago['totalPagoMes'][] = $row->totalPagoMes;
          }

          $data['chart_data'] = json_encode($data);
          $data['chart_mes'] = json_encode($mes);
          $data['chart_pago_semana'] = json_encode($dia);
          $data['chart_pago_mes'] = json_encode($mespago);
		$this->load->view('tamplete/supervisor/header');
		$this->load->view('pages/supervisor/dashboard', $data);
		$this->load->view('tamplete/supervisor/footer');
     }
  
     public function contasAPagarMes()
	{
          $dados['contasAPagarMes'] = $this->Supervisor_model->contasAPagarMes()->result();
          $data = [];
          foreach($dados['contasAPagarMes'] as $row){
               $data['mes'][] = $row->mes;
               $data['totalMes'][] = $row->totalMes;
          }
          $data['chart_data'] = json_encode($data);
		$this->load->view('tamplete/supervisor/header');
		$this->load->view('pages/supervisor/dashboard', $data);
		$this->load->view('tamplete/supervisor/footer');
     }

     public function adicionarEmpresa()
	{
          $tb_empresa['empresa'] = $this->input->post('inputname');
          $tb_empresa['telefone'] = $this->input->post('inputphone');
          $tb_empresa['duracao_contrato'] = $this->input->post('inputcontract');
          $tb_empresa['email'] = $this->input->post('inputemail');
          $tb_empresa['responsavel'] = $this->input->post('inputresponsavel');
          if($this->db->insert('tb_empresa', $tb_empresa)){
               $this->session->set_flashdata('msg-sucesso', "Empresa adicionada com sucesso.");
               redirect(base_url('supervisor/convenio'));
          }else{
               $this->session->set_flashdata('msg-erro', "Ocorreu alguma falha.");
               redirect(base_url('supervisor/convenio'));
          }

     }    

     public function adicionarServico()
     {
          $tb_servicos['tipo'] = $this->input->post('inputservice');
          if($this->db->insert('tb_servicos', $tb_servicos)){
               $this->session->set_flashdata('msg-sucesso', "Serviço adicionado com sucesso.");
               redirect(base_url('supervisor/convenio'));
          }else{
               $this->session->set_flashdata('msg-erro', "Tente novamente");
               redirect(base_url('supervisor/convenio'));
          }
     }

     public function adicionarConvenio()
     {
          $tb_convenio['id_empresa'] = $this->input->post('name');
          $tb_convenio['id_servicos'] = $this->input->post('service');
          $tb_convenio['porcentagem'] = $this->input->post('porcentagem');
          $tb_convenio['obs'] = $this->input->post('obs');
          if($this->db->insert('tb_convenio', $tb_convenio)){
               $this->session->set_flashdata('msg-sucesso', "Convenio adicionado com sucesso.");
               redirect(base_url('supervisor/convenio'));
          }else{
               $this->session->set_flashdata('msg-erro', "Tente novamente");
               redirect(base_url('supervisor/convenio'));
          };
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

               $events = $this->Supervisor_model->get_events($start_format, $end_format);
               $data_events = array();

              $eventos = $events->result();
            
               
              foreach($events->result() as $r) {

               $data_events[] = array(
                    "id" => $r->id,
                    "valor" => $r->valor,
                    "codigo_de_barras" => $r->codigo_de_barras,
                    "obs" => $r->obs,
                    "end" => $r->end,
                    "start" => "$r->start",
                    "title" => $r->segmento,
                    "id_segmento" => $r->id_segmento,
                    "id_status" => $r->id_status,
                    "id_beneficiario" => $r->id_beneficiario,
                    "totalPagoDia" => $r->totalPagoDia

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
          $id_beneficiario = $this->input->post("add_id_beneficiario", TRUE);
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

          $this->Supervisor_model->add_event(array(
               "id_segmento" => $id_segmento,
               "id_status" => $id_status,
               "id_beneficiario" => $id_beneficiario,
               "valor" => str_replace(",",".",str_replace(".","",$valor)),
               "codigo_de_barras" => $codigo_de_barras,
               "obs" => $obs,
               "start" => $start,
               "end" => $end
               )
          );

               //echo $this->db->last_query(); //Use para verificar a última consulta executada
               //exit();    

          redirect(site_url("supervisor"));
          }

     /*Funcão Editar Evento*/ 
     
     public function edit_event()
     {
          $id = intval($this->input->post("id"));
          $event = $this->Supervisor_model->get_event($id);          
          if($event->num_rows() == 0) {
               echo"Invalid Event";
               exit();
          }

          $event->row();

          /* Our calendar data */
          $id_segmento = $this->input->post("id_segmento", TRUE);
          $id_status = $this->input->post("id_status", TRUE);
          $id_beneficiario = $this->input->post("id_beneficiario", TRUE);
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

               $this->Supervisor_model->update_event($id, array(
                    "id_segmento" => $id_segmento,
                    "id_status" => $id_status,
                    "id_beneficiario" => $id_beneficiario,
                    "valor" => $valor,
                    "codigo_de_barras" => $codigo_de_barras,
                    "obs" => $obs,
                    "start" => $start,
                    "end" => $end
                    )
                 );

          } else {
               $this->Supervisor_model->delete_event($id);
          }
          //echo $this->db->last_query(); //Use para verificar a última consulta executada
          //exit(); 
          redirect(site_url("supervisor"));
     }

     	
}

?>
