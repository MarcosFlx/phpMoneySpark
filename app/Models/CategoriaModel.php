<?php

namespace App\Models;



class CategoriaModel extends BaseModel
{
    protected $table = 'categorias';

    protected $primaryKey = 'chave';

    protected $useSoftDeletes = true;
    protected $deletedField = 'deleted_at';

    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $beforeDelete = 'checaPropriedade';
    

    protected $useTimestamps = true;

    protected $beforeInsert = ['vinculaIdUsuario', 'geraChave'];

    protected $allowedFields = [
        'usuarios_id',
        'chave',
        'tipo',
        'descricao'
    ];

    protected $validationRules = [
        'descricao' => [
            'label' => 'Descrição',
            'rules' => 'required'
        ],

        'tipo' => [
            'label' => 'tipo',
            'rules' => 'required'
        ]
    ];

}