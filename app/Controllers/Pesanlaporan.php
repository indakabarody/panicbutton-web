<?php namespace App\Controllers;

class Pesanlaporan extends BaseController
{
	public function index()
	{
		if ($this->session->status != 'logged in') {
            return redirect()->to(base_url().'/login');
		}
		$data = array('statusPesan' => 'Read');
		$where = array('statusPesan' => 'Unread');
		$this->pesanKhususModel->where($where)->set($data)->update();
		echo view('menu/header');
		echo view('menu/PesanLaporanView');
		echo view('menu/footer');
    }
    
	public function tabelpesan()
	{
		if ($this->session->status != 'logged in') {
            return redirect()->to(base_url().'/login');
		}
		$where = array('statusAlarm' => 'Belum Dikonfirmasi');
		$data['dataPesanLaporan'] = $this->pesanKhususModel
									->join('alarm', 'pesankhusus.idAlarm = alarm.idAlarm')
									->join('user', 'pesankhusus.idUser = user.idUser')
									->where($where)
									->orderBy('pesankhusus.waktu', 'desc')
									->findAll();
		echo view('menu/TabelPesanLaporanView', $data);
	}

	public function jumlahpesan()
	{
		if ($this->session->status != 'logged in') {
            return redirect()->to(base_url().'/login');
		}
		$where = array(
			'statusPesan' => 'Unread',
			'statusAlarm' => 'Belum Dikonfirmasi'
		);
		$dataPesanCount = $this->pesanKhususModel
							->join('alarm', 'pesankhusus.idAlarm = alarm.idAlarm')
							->join('user', 'pesankhusus.idUser = user.idUser')
							->where($where)
							->countAllResults();
		if ($dataPesanCount > 0) {
			echo "<span class='right badge badge-danger'>".$dataPesanCount."</span>";
		}
	}

	public function hapuspesan($idPesanKhusus)
	{
		if ($this->session->status != 'logged in') {
            return redirect()->to(base_url().'/login');
		}
		$where = array('idPesanKhusus' => $idPesanKhusus);
		$this->pesanKhususModel->where($where)->delete();
		$this->session->setFlashdata('success','Berhasil menghapus.');
		return redirect()->back();
	}

	//--------------------------------------------------------------------

}
