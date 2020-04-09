<?php namespace App\Controllers;

class Notifikasitelegram extends BaseController
{
	public function index()
	{
		if ($this->session->status != 'logged in') {
            return redirect()->to(base_url().'/login');
		}
		echo view('menu/header');
		echo view('menu/NotifikasiTelegramView');
		echo view('menu/footer');
	}

	//--------------------------------------------------------------------

}
