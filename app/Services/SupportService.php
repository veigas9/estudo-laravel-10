<?php 

namespace App\Services;
use stdClass;

class SupportService
{
    protected $repository;

    public function __construct()
    {

    }    

    /**
     * Function retorna todos registros
     *
     * @param string|null $filter
     * @return array
     */
    public function getAll(string $filter = null) : array
    {
        return $this->repository->getAll($filter);
    }

    /**
     * function retorna apenas um registro
     *
     * @param string $id
     * @return stdClass|null
     */
    public function findOne(string $id) : stdClass|null
    {
        return $this->repository->findOne($id);
    }

    /**
     * function insere novo registro
     *
     * @param string $subject
     * @param string $status
     * @param string $body
     * @return stdClass
     */
    public function new(string $subject, string $status, string $body) : stdClass
    {
       return $this->repository->new($subject, $status, $body);
    }

    /**
     * function atualiza registro
     *
     * @param string $id
     * @param string $subject
     * @param string $status
     * @param string $body
     * @return stdClass
     */
    public function update(string $id, string $subject, string $status, string $body) : stdClass|null
    {
       return $this->repository->new($id, $subject, $status, $body);
    }

    /**
     * Function apaga um registro
     *
     * @param string $id
     * @return void
     */
    public function delete(string $id) : void
    {
         return $this->repository->delete($id);
    }
}