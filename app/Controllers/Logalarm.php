<?php namespace App\Controllers;

class Logalarm extends BaseController
{
	public function index()
	{
		if ($this->session->status != 'logged in') {
            return redirect()->to(base_url().'/login');
        }
		$data['dataLogAlarm'] = $this->alarmModel
								->join('user', 'user.idUser = alarm.idUser')
								->orderBy('alarm.waktu', 'desc')
								->findAll();
		echo view('menu/header');
		echo view('menu/LogAlarmView', $data);
		echo view('menu/footer');
	}

	//--------------------------------------------------------------------

}
