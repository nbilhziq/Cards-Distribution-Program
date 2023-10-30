<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper(array('form', 'url'));
        $this->load->library('pagination');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

	public function index()
	{
		$currentURL = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		
		$parts = parse_url($currentURL);

		if (isset($parts['port'])) {
			$include_port = true;
		} else {
			$include_port = false;
		}

		$data = array(
			'include_port' => $include_port,
		);

		$this->load->view('main',$data);
	}

	public function process() {

		header("Access-Control-Allow-Origin: http://localhost");
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
		header("Access-Control-Allow-Headers: Content-Type");

		$numPeople = $this->input->post('num_people');

        // Create a deck of 52 cards
        $suits = ['S', 'H', 'D', 'C'];
        $values = ['A', 2, 3, 4, 5, 6, 7, 8, 9, 'X', 'J', 'Q', 'K'];
        $deck = [];
        foreach ($suits as $suit) {
            foreach ($values as $value) {
                $deck[] = "$suit-$value";
            }
        }

        // Shuffle the deck
        shuffle($deck);

        // Distribute cards to people
        $output = '';
        for ($i = 0; $i < $numPeople; $i++) {

			$person_count = $i+1;
			$output .= 'Person '.$person_count.': ';

            for ($j = $i; $j < count($deck); $j += $numPeople) {
                $output .= $deck[$j];
                if ($j + $numPeople < count($deck)) {
                    $output .= ',';
                }
            }
            $output .= "</br>";
        }

		$response = array(
			'result' => $output,
		);

        echo json_encode($response);
    }
}
