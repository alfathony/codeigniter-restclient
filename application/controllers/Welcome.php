<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{


		// Load the rest client spark
		// $this->load->spark('restclient/2.2.1');

		// Load the library
		$this->load->library('rest');

		// Set config options (only 'server' is required to work)

		$this->rest->initialize(array('server' => 'https://api.twitter.com','http_auth' => 'basic','ssl_verify_peer' => TRUE,));
		$username = 'radityadika';
		// Pull in an array of tweets
		$data['tweets'] = $this->rest->get('/1.1/statuses/user_timeline.json?screen_name='.$username);

		$this->load->view('welcome_message',$data);

	}
}
