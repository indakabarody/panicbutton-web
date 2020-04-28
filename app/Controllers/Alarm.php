<?php namespace App\Controllers;

class Alarm extends BaseController
{
	public function index()
	{
        if ($this->session->status != 'logged in') {
            return redirect()->to(base_url().'/login');
        }
        echo view('menu/header');
        echo view('menu/AlarmView');
        echo view('menu/footer');
    }
    
    public function tabelalarm()
    {
        if ($this->session->status != 'logged in') {
            return redirect()->to(base_url().'/login');
        }
        $where = array('statusAlarm' => 'Belum Dikonfirmasi');
        $data['dataAlarm'] = $this->alarmModel
                            ->join('user', 'user.idUser = alarm.idUser')
                            ->where($where)
                            ->orderBy('alarm.waktu', 'desc')
                            ->findAll();
        echo view('menu/TabelAlarmView', $data);
    }

    public function jumlahalarm()
    {
        if ($this->session->status != 'logged in') {
            return redirect()->to(base_url().'/login');
        }
        $where = array('statusAlarm' => 'Belum Dikonfirmasi');
        $data['alarmCount']  = $this->alarmModel->where($where)->countAllResults();
        if ($data['alarmCount'] > 0) {
            echo "<span class='right badge badge-danger'>".$data['alarmCount']."</span>";
        }
    }

    public function judulhalaman()
    {
        if ($this->session->status != 'logged in') {
            return redirect()->to(base_url().'/login');
        }
        $where = array('statusAlarm' => 'Belum Dikonfirmasi');
        $data['alarmCount']  = $this->alarmModel->where($where)->countAllResults();
        $where = array('statusPesan' => 'Unread');
        $data['pesanCount']  = $this->pesanKhususModel->where($where)->countAllResults();
        $jumlahNotif = $data['alarmCount'] + $data['pesanCount'];
        if ($jumlahNotif > 0) {
            echo "(".$jumlahNotif.") RS Panic Button";
        } else {
            echo "RS Panic Button";
        }
    }

    public function confirm($idAlarm)
    {
        if ($this->session->status != 'logged in') {
            return redirect()->to(base_url().'/login');
        }
        $data = array('statusAlarm' => 'Dikonfirmasi');
        $where = array('idAlarm' => $idAlarm);
        $this->alarmModel->where($where)->set($data)->update();
        $this->session->setFlashdata('success', 'Berhasil mengkonfirmasi.');
        return redirect()->back();
    }

    public function reject($idAlarm)
    {
        if ($this->session->status != 'logged in') {
            return redirect()->to(base_url().'/login');
        }
        $data = array('statusAlarm' => 'Ditolak');
        $where = array('idAlarm' => $idAlarm);
        $this->alarmModel->where($where)->set($data)->update();
        $this->session->setFlashdata('success', 'Berhasil menolak.');
        return redirect()->back();
    }

	//--------------------------------------------------------------------

}
