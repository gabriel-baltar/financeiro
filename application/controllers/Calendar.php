<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

header("Access-Control-Allow-Origin: *");

class Calendar extends CI_Controller
{

     public function __construct() {
        parent::__construct();
        $this->load->model("calendar_model");
    }

     public function index()
     {    
          $dados['segmento'] = $this->calendar_model->get_segmento()->result();
          $dados['status'] = $this->calendar_model->get_status()->result();
          $dados['beneficiario'] = $this->calendar_model->get_beneficiario()->result();
          $dados['boletos'] = $this->calendar_model->get_boletos_pagos()->result();
          //echo $this->db->last_query(); //Use para verificar a última consulta executada
          //exit(); 
          $this->load->view("calendar/index.php", $dados);
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

               $events = $this->calendar_model->get_events($start_format, $end_format);

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
                         "id_segmento" => $r->id_segmento,
                         "id_status" => $r->id_status,
                         "id_beneficiario" => $r->id_beneficiario

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

          $this->calendar_model->add_event(array(
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

          redirect(site_url("calendar"));
          }

     /*Funcão Editar Evento*/ 
     
     public function edit_event()
     {
          $id = intval($this->input->post("id"));
          $event = $this->calendar_model->get_event($id);          
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

               $this->calendar_model->update_event($id, array(
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
               $this->calendar_model->delete_event($id);
          }
          //echo $this->db->last_query(); //Use para verificar a última consulta executada
          //exit(); 
          redirect(site_url("calendar"));
     }
}

?>