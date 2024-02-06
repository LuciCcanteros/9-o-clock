<?php

namespace App\Models;

use CodeIgniter\Model;

class VentaModel extends Model{

    protected $table      = 'venta';
    protected $primaryKey = 'venta_id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['usuario_id', 'venta_fecha', 'venta_total'];

    // Dates
    protected $useTimestamps = false;
    protected $createdField  = '';
    protected $updatedField  = '';
    protected $deletedField  = '';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function obtenerVentas() {
        $query = $this->findAll();
      return $query;
    }

    public function obtenerVentasUsuario($id=null) {
      $query = $this->where('usuario_id',$id)->findAll();
    
      return $query;
    }

}