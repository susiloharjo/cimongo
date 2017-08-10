<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
		$this->load->library('Mongodriver');

    //Codeigniter : Write Less Do More
  }

	public function index()
	{
		// $this->load->view('welcome_message');
			$filter = [];
			$option = ['limit' => 10];
			$results = $this->mongodriver->query("member",$filter,$option);
			foreach ($results as $row) {
        // echo ($row->id) . "</br>\n";
				echo ($row->nama) . "</br>\n";
				echo ($row->noid) . "</br>\n";
			}
	}

	public function add() {
		$data = array(
	                  'id'=>1,
	                  'nama'=>"Sigit",
	                  'noid'=>"00215"
									);
		$this->mongodriver->insert("member",$data);
		redirect('Welcome');

	}




}
