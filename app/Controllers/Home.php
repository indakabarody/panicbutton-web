<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		if ($this->session->status != 'logged in') {
			return redirect()->to(base_url().'/login');
		} else {
			return redirect()->to(base_url().'/alarm');
		}
	}

	//--------------------------------------------------------------------

}
