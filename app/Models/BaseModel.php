<?php

namespace App\Models;

use CodeIgniter\Model;

class BaseModel extends Model
{


    /**
     * vincula o id_usuario do usuário logado no momento no campo usuario_id da tabela.
     *
     * @param [type] $data
     * @return void
     */
    protected function vinculaIdUsuario($data)
    {
        $data['data']['usuarios_id'] = session()->id_usuario;
        return $data;
    }



    /**
     * Gera uma chave randômica e vincula ao campo chave da tabela.
     */

    protected function geraChave($data)
    {
        $data['data']['chave'] = md5(uniqid(rand(), true));
        return $data;
    }



    /**
     * Verifica se o registro excluido pertence ou não ao usuario ou subordinados.
     *
     * @param [type] $data
     * @return void
     */
    protected function checaPropriedade($data)
    {
        return $data;
    }



    ####################################################################
    ##   MÉTODOS PUBLICOS
    ####################################################################

    /**
     * Injeta a busca por chave dentro da query.
     *
     * @param string|null $chave
     * @return mixed
     */
    public function getByChave(string $chave = null)
    {
        if (!is_null($chave)) {
            return $this->find($chave);
            //$this->where('chave', $chave);
        }
    }



    /**
     * Retorna todos os registros da categoria.
     *
     * @param array|null $order
     * @return array
     */
    public function getAll(array $order = null): array
    {
        return $this->doFindAll();
    }




    /**
     * Injeta o campo order na query.
     *
     * @param array|null $order
     * @return object
     */
    public function addOrder(array $order = null): object
    {
        if (!is_null($order)) {
            if (key_exists('order', $order)) {
                foreach ($order['order'] as $ordem) {
                    $this->orderBy($ordem['campo'], $ordem['sentido']);
                }
            } else {
                $this->orderBy($order['campo'], $order['sentido']);
            }
        }
        return $this;
    }




    /**
     * Injeta o campo id_usuario na query.
     *
     * @param [type] $id_usuario
     * @return object
     */
    public function addUserId(int $id_usuario = null): object
    {
        if (!is_null($id_usuario)) {
            $this->where('usuarios_id', $id_usuario);
        }
        return $this;
    }




    /**
     * Injeta o campo search na query e retorna um objeto.
     *
     * @param string $search
     * @return object
     */
    public function addSearch(string $search = null): object
    {
        if (!is_null($search)) {
            $this->like('descricao', $search);
        }
        return $this;
    }
}
