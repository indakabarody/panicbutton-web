<?php namespace App\Controllers;

class Login extends BaseController
{
	public function index()
	{
		if ($this->session->status == 'logged in') {
            return redirect()->to(base_url().'/alarm');
		}
		echo view('LoginView');
    }
    
    public function auth()
    {
		$idAdmin = $this->request->getPost('idAdmin');
		$kataSandi = md5($this->request->getPost('kataSandi'));
		$where = array(
			'idAdmin' => $idAdmin,
			'kataSandi' => $kataSandi
            );
        $dataAdminCount = $this->adminModel->where($where)->countAllResults();
        if ($dataAdminCount == 1) {
			$sessionData = array(
				'admin' => $idAdmin,
				'status' => 'logged in'
				);
			$this->session->set($sessionData);
			return redirect()->to(base_url().'/alarm');
		} else {
			$this->session->setFlashdata('error', 'Login gagal. ID Admin atau kata sandi salah!');
			return redirect()->to(base_url().'/login');
		}
    }

    public function ubahsandi()
    {
		if ($this->session->status != 'logged in') {
            return redirect()->to(base_url().'/login');
		}
		$idAdmin = $this->request->getPost('idAdmin');
		$kataSandiLama = md5($this->request->getPost('kataSandiLama'));
		$kataSandi = md5($this->request->getPost('kataSandi'));
		$konfirmasiKataSandi = md5($this->request->getPost('konfirmasiKataSandi'));
		$where = array(
			'idAdmin' => $idAdmin,
			'kataSandi' => $kataSandiLama
		);
		$dataAdminCount = $this->adminModel->where($where)->countAllResults();
		if ($dataAdminCount == 1) {
			if ($kataSandi == $konfirmasiKataSandi) {
				$data = array('kataSandi' => $kataSandi);
				$this->adminModel->where($where)->set($data)->update();
				$this->session->setFlashdata('success', 'Berhasil mengubah kata sandi.');
				return redirect()->back();
			} else {
				$this->session->setFlashdata('error', 'Ubah kata sandi gagal. Silakan periksa kata sandi baru.');
				return redirect()->back();
			}
		} else {
			$this->session->setFlashdata('error', 'Ubah kata sandi gagal. Silakan periksa kata sandi lama.');
			return redirect()->back();
		}
	}
	
	public function logout()
	{
		$this->session->destroy();
		return redirect()->to(base_url().'/login');
	}

	//--------------------------------------------------------------------

}
