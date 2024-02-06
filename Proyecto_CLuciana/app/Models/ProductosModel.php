<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Entities\User;

class ProductosModel extends Model
{
    protected $table      = 'producto';
    protected $primaryKey = 'producto_id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['producto_nombre', 'producto_color', 'producto_descrip', 'producto_stock', 'producto_precio', 'producto_imagen', 'producto_categoria', 'producto_estado'];

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

    // public function obtenerProductos() {
    //     $query = $this->findAll();
    //   return $query;
    // }
    
    // public function obtenerProductosDisponibles() {
    //   $builder = $this->builder();
    //   $builder->where('producto_estado', 1)
    //           ->where('producto_stock >', 0);
      
    //   $query = $builder->get();
    //   return $query->getResult();
    // }

}

