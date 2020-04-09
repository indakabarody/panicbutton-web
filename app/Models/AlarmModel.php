<?php namespace App\Models;

use CodeIgniter\Model;

class AlarmModel extends Model {
	protected $table      = 'alarm';
	protected $primaryKey = 'idAlarm';

	protected $returnType = 'object';
	protected $useSoftDeletes = false;

	protected $allowedFields = [
        'idAlarm', 'idUser', 'jenis', 'latitude', 'longitude', 'waktu', 'statusTombol', 'statusAlarm'
    ];

	protected $useTimestamps = false;
	protected $createdField  = '';
	protected $updatedField  = '';
	protected $deletedField  = '';

	protected $validationRules    = [];
	protected $validationMessages = [];
	protected $skipValidation     = false;
}
