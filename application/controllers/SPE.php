<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SPE extends CI_Controller {

	public function index()
	{
		$this->load->view('welcome_message');
	}

	function NARCISSISTIC(){
		$numbernar = $this->input->post('numbernar');

		$jum= 0;

		$temp = $numbernar;
		$digit = strlen($numbernar);

		while ($numbernar !=  0) {

			$modulus = $numbernar%10;
			$jum = $jum+pow($modulus, $digit);
			$numbernar = floor($numbernar/10);
		}

		if($jum == $temp){
			$this->session->set_flashdata('true', 'OH YES THIS IS NARCISSISTIC NUNBER ');
		}else{
			$this->session->set_flashdata('false', 'OH NO THIS IS NOT NARCISSISTIC NUMBER');
		}


		redirect('SPE');



	}


	function PARITY(){

		$numberpar1 = $this->input->post('numberpar1');
		$numberpar2 = $this->input->post('numberpar2');
		$numberpar3 = $this->input->post('numberpar3');
		$numberpar4 = $this->input->post('numberpar4');

		$data = array($numberpar1,$numberpar2,$numberpar3,$numberpar4);
		$n=array();
		$genap=0;
		$ganjil=0;
		$sge = 0;
		$sga =0;
		for($i=0; $i<=3; $i++){

			$n[$i] = $data[$i] % 2;

			if($n[$i] == 0){

				$sge = $data[$i];
				$genap++;
			}else{
				$sga = $data[$i];
				$ganjil++;
			}

			if($ganjil == 4 || $genap == 4){
				$this->session->set_flashdata('ste', 'all odd integer, no outlier');
			}elseif($ganjil == 1){
				$this->session->set_flashdata('ste', 'ODD NUMBER :' .$sga.'');
			}elseif($genap == 1){
				$this->session->set_flashdata('ste', 'EVEN NUMBER : ' .$sge.'');
			}else{
				$this->session->set_flashdata('ste', 'CHECK AGAIN YOU HAVE 2 or 3 NUMBER ODD/EVEN ');
			}
		}


		redirect('SPE');

	}

	function NEEDLE(){

		$warna = array('merah'=>'merah',
			'kuning' =>'kuning',
			'ungu' => 'ungu',
			'hijau'=>'hijau',
			'biru'=>'biru',
			'nila'=>'nila'); 
		$kuncicari = $this->input->post('kuncicari');

		if(array_search($kuncicari, $warna) != NULL){
			$this->session->set_flashdata('hasil', array_search($kuncicari, $warna));
		}else{
			$this->session->set_flashdata('hasil', 'OOPS NOT FOUND!');
		}
		redirect('SPE');
	}

	function BLUEOCEAN(){
		$arraynumber = array(
			'a'=>'1',
			'b'=>'2',
			'c' => '3',
			'd' => '3',
			'e' => '10',
			'f' => '10',
			'g' => '1');

		$keydelete = $this->input->post('keydelete');
		$key = array_search($keydelete, $arraynumber);

		if( $key !== FALSE){
			for($i= 0; $i<=6; $i++){
				$key = array_search($keydelete, $arraynumber);
				unset($arraynumber[$key]);
			}
			echo json_encode($arraynumber);
			$this->session->set_flashdata('hasilarray', json_encode($arraynumber) );
		}else{
			$this->session->set_flashdata('hasilarray', 'OOPS NOT FOUND!');
		}
		

		redirect('SPE',$arrayjadi);

	}



}
