<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

header("Access-Control-Allow-Origin: *");

class Calendar extends CI_Controller
{

     public function __construct() {
        Parent::__construct();
        $this->load->model("calendar_model");
    }

     public function index()
     {
          $this->load->view("calendar/index.php", array());
     }

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
                         "id" => $r->ID,
                         "title" => $r->title,
                         "description" => $r->description,
                         "end" => $r->end,
                         "start" => $r->start
                    );
               }

               echo json_encode(array("events" => $data_events));
               exit();
          }

}

?>