<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

	public $user;

	public function __construct(){
		parent::__construct();

		//carrega a biblioteca do facebook Oauth
		$this->load->library('facebook');

		// capta os dados do usuário
		$this->user = $this->facebook->getUser();
	}


	public function index(){

		if ($this->user) {

			try {
				$user_face = $this->facebook->api('/me?fields=name,email,link,first_name,last_name,gender');
			} catch (FacebookApiException $e) {
				$this->user = null;
			}
			$logout = $this->facebook->getLogoutUrl(array('next' => base_url() . 'login/logout'));
			//$logout = 'login/logout';
			$user_profile = array(
				'id' => $user_face['id'], 
		        'nome'  => $user_face['first_name'],
		        'sobrenome'     => $user_face['last_name'],
				'link'     => $user_face['link'],
		        'email' => $user_face['email'],
				'icone' => "https://graph.facebook.com/".$user_face['id']."/picture",
			    'logout' => $logout
			);
			$this->session->set_userdata('user_profile',$user_profile);
			redirect('movimentacoes');

		} else {
			$data['login_url'] = $this->facebook->getLoginUrl(array(
                'redirect_uri' => site_url('login'), 
                'scope' => array("email","public_profile") // permissions here
			));
			$this->render('login', $data, 'login');
		}

	}
	
	public function profile(){
		$this->render('profile');
	}

	public function logout(){

		$this->session->sess_destroy();
		
		$this->facebook->destroySession();
		// Make sure you destory website session as well.

		redirect('login');
	}

}

