<?php namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model {
	protected $table      = 'admin';
	protected $primaryKey = 'idAdmin';

	protected $returnType = 'object';
	protected $useSoftDeletes = false;

	protected $allowedFields = [
		'idAdmin', 'kataSandi'
	];

	protected $useTimestamps = false;
	protected $createdField  = '';
	protected $updatedField  = '';
	protected $deletedField  = '';

	protected $validationRules    = [];
	protected $validationMessages = [];
	protected $skipValidation     = false;
}
