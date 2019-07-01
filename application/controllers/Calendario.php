<?php

defined('BASEPATH') OR exit('No direct script access allowed');

   

class Calendario extends CI_Controller {

   

    /**

     * Get All Data from this method.

     *

     * @return Response

    */

    public function __construct() {

       parent::__construct();

       $this->load->database();

    }

    

    /**

     * Get All Data from this method.

     *

     * @return Response

    */

    public function index()

    {

        $data['result'] = $this->db->get("eventos")->result();

   

        foreach ($data['result'] as $key => $value) {

            $data['data'][$key]['titulo'] = $value->titulo;

            $data['data'][$key]['data_inicio'] = $value->data_inicio;

            $data['data'][$key]['data_final'] = $value->data_final;

            $data['data'][$key]['backgroundColor'] = "#00a65a";

        }

           

        $this->load->view('calendario', $data);

    }

}