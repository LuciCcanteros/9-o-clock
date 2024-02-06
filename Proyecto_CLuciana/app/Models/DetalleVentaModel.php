<?php

namespace App\Models;

use CodeIgniter\Model;

class DetalleVentaModel extends Model{

    protected $table      = 'detalle_venta';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['venta_id', 'id_producto', 'detalle_cantidad', 'detalle_precio'	];

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

    public function obtenerDetalles($id=null){
        if($id==NULL){
           $query = $this->findAll();
           return $query;
        }else{
           $query = $this->where('venta_id', $id)->findAll();
           return $query;
        }  
    }

}