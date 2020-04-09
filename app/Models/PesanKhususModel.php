<?php namespace App\Models;

use CodeIgniter\Model;

class PesanKhususModel extends Model {
	protected $table      = 'pesankhusus';
	protected $primaryKey = 'idPesanKhusus';

	protected $returnType = 'object';
	protected $useSoftDeletes = false;

	protected $allowedFields = [
        'idPesanKhusus', 'idAlarm', 'idUser', 'pesan', 'waktu', 'statusPesan'
    ];

	protected $useTimestamps = false;
	protected $createdField  = '';
	protected $updatedField  = '';
	protected $deletedField  = '';

	protected $validationRules    = [];
	protected $validationMessages = [];
	protected $skipValidation     = false;
}
