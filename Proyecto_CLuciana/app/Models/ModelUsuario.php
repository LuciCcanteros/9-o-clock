<?php
use CodeIgniter\Model;
use App\Entities\User;

class ModelUsuario extends Model
{
    protected $table      = 'usuarios';
    protected $primaryKey = 'usuario_id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
                                'usuario_nombre',
                                'usuario_apellido', 
                                'usuario_email',
                                'usuario_usuario',
                                'usuario_contrasenia',
                                'perfil_id',
                                'usuario_estado'];

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
}

?>