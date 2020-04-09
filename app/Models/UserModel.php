<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model {
	protected $table      = 'user';
	protected $primaryKey = 'idUser';

	protected $returnType = 'object';
	protected $useSoftDeletes = false;

	protected $allowedFields = [
		'idUser', 'namaUser', 'noHP', 'kataSandi', 'statusUser', 'statusLogin'
	];

	protected $useTimestamps = false;
	protected $createdField  = '';
	protected $updatedField  = '';
	protected $deletedField  = '';

	protected $validationRules    = [];
	protected $validationMessages = [];
	protected $skipValidation     = false;
}
