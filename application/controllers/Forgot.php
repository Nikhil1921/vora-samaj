<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Forgot extends Public_controller {

	private $table = 'families';
	
	public function index()
	{
		die($this->load->view('forgot-form/form', [], true));
	}

	public function send_otp()
	{
		check_ajax();

		$this->form_validation->set_rules('mobile', 'Mobile no.', 'required|exact_length[10]|is_natural', [
                'required' => "%s is required",
                'is_natural' => "%s is invalid",
                'exact_length' => "%s is invalid"
            ]);

		if ($this->form_validation->run() === FALSE)
		{
			$response = [
				'status'     => false,
				'message'    => strip_tags(validation_errors())
			];
		}
		else
		{
			$check = ['login_approved' => 1, 'mobile' => $this->input->post('mobile')];

			$update = [
				'otp' => rand(100000, 999999),
				'otp' => 999999,
				'expiry' => date('Y-m-d H:i:s', strtotime('+5 minutes'))
			];

			$id = $this->main->get($this->table, 'id, email', $check);
		
			if($id && $this->main->update(['id' => $id['id']], $update, $this->table))
			{
				$this->session->set_tempdata('otpId', $id['id'], 300); // five minutes

				$response = [
						'status' => true,
						'message' => 'OTP sent to '.$id['email']
					];
			}else
				$response = [
					'status' => false,
					'message' => 'Mobile not registered.'
				];
		}

		die(json_encode($response));
	}

	public function verify_otp()
	{
		check_ajax();

		$this->form_validation->set_rules('otp', 'OTP', 'required|exact_length[6]|is_natural', [
                'required' => "%s is required",
                'is_natural' => "%s is invalid",
                'exact_length' => "%s is invalid"
            ]);

		if ($this->form_validation->run() === FALSE)
		{
			$response = [
				'status'     => false,
				'message'    => strip_tags(validation_errors())
			];
		}
		else
		{
			$check = [
					'otp'            => $this->input->post('otp'),
					'login_approved' => 1,
					'id'             => $this->session->otpId,
					'expiry >='      => date('Y-m-d H:i:s')
				];
				
			if($id = $this->main->get($this->table, 'id', $check))
			{
				$this->session->set_tempdata('passId', $id['id'], 300); // five minutes

				$response = [
						'status' => true,
						'message' => 'OTP is verified. Enter new password.'
					];
			}else
				$response = [
					'status' => false,
					'message' => 'OTP is invalid or expired.'
				];
		}

		die(json_encode($response));
	}

	public function change_password()
	{
		if ($this->form_validation->run('change-password') == FALSE)
        {
            $response = [
				'status'     => false,
				'message'    => strip_tags(validation_errors())
			];
        }else{
			$this->session->unset_userdata(['passId', 'otpId']);

            $post = [
                'password' => my_crypt($this->input->post('password'))
            ];

			if($this->main->update(['id' => $this->session->passId], $post, 'families'))
				$response = [
						'status' => true,
						'message' => 'Password changed.'
					];
			else
				$response = [
					'status' => false,
					'message' => 'Password not changed. Try again.'
				];
        }

		die(json_encode($response));
	}
}