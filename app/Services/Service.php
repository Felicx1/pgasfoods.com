<?php

namespace App\Services;

abstract class Service {

    protected $repository;

    /**
     * @param $request
     * @return mixed
     */
    public function set($request){

        return $this->repository->set($request);
    }

    //check if data exists
    public function exists($request){

        return $this->repository->exists($request);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function get($id){

        return $this->repository->get($id);
    }

    /**
     * @param array|null $where
     * @return mixed
     */
    public function all(array $where = null){

        return $this->repository->all($where);
    }

    public function fetchWithWhere(array $where, string $column, string $search, string $target_relation, ...$relations){

        return $this->repository->fetchWithWhere($where, $column, $search, $target_relation, $relations);
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function findOneToday(array $params, string $column = "created_at"){

        return $this->repository->findOneToday($params, $column);
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function findOne(array $params){

        return $this->repository->findOne($params);
    }

    /**
     * @param array $params
     * @param bool $is_asc
     * @return mixed
     */
    // public function find(array $params, bool $is_asc = true){

    //     return $this->repository->find($params, $is_asc);
    // }

    public function find(string $key, string $value)
    {
        return $this->repository->find([$key => $value]);
    }

    /**
     * @param array $params
     * @param array $target
     * @return mixed
     */
    public function update(array $params, array $target){

        return $this->repository->update($params, $target);
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function delete(array $params){

        return $this->repository->delete($params);
    }

    /**
     * @param array $owner
     * @param string $column
     * @param string $operator
     * @param string|null $value
     * @return mixed
     */
    public function query(array $owner = [], string $column = "id", string $operator = "=", string $value = null, ...$relations){

        return $this->repository->query( $owner, $column, $operator, $value, $relations);
    }


    /**
     * @param array $where
     * @param array $search
     * @param ...$relations
     * @return mixed
     */
    public function search(array $where = [], array $search = [] ,...$relations){

        return $this->repository->search( $where, $search , $relations);
    }

    /**
     * @param array $where
     * @param int $num
     * @return mixed
     */
    public function takeWhere(array $where, int $num){

        return $this->repository->takeWhere($where, $num);
    }

    /**
     * @param array $where
     * @param int $num
     * @param string $order
     * @return mixed
     */
    public function take(array $where, int $num = 100, string $order = "desc"){

        return $this->repository->take($where, $num, $order);
    }

    /**
     * @param array $where
     * @param string $date
     * @param bool $asc
     * @return mixed
     */
    public function findWithDate(array $where, string $date, bool $asc = true){

        return $this->repository->findWithDate($where, $date, $asc);
    }

    /**
     * @param array $params
     * @param string $date_from
     * @param string $date_to
     * @param null $search_by
     * @return mixed
     */
    public function searchWithDate(array $params, string $date_from, string $date_to, $search_by = null){

        return $this->repository->searchWithDate($params, $date_from, $date_to, $search_by);
    }

    /**
     * @param string $column
     * @param array $where
     * @return mixed
     */
    public function whereIn(string $column, array $where, ...$relations){

        return $this->repository->whereIn($column, $where, $relations);
    }

    /**
     * @param string $column
     * @param array $where
     * @return mixed
     */
    public function whereOneIn(string $column, array $where, ...$relations){

        return $this->repository->whereOneIn($column, $where, $relations);
    }

    /**
     * @param array $where
     * @param string $column
     * @param array $params
     * @return mixed
     */
    public function withWhereIn(array $where, string $column, array $params){

        return $this->repository->withWhereIn( $where,  $column, $params);
    }


    /**
     * ------------------- WITH RELATIONSHIP -------------------------- */
    public function fetchOne(array $params, ...$relations){

        return $this->repository->fetchOne($params, $relations);
    }

    public function fetch(array $params, ...$relations){

        return $this->repository->fetch($params, $relations);
    }



    /**
     * ------------------- EXTRA MODIFIER -------------------------- */

    /**
     * @param $request
     * @param false $return_array
     * @return array|\Illuminate\Http\Request
     */
    public function prepare($request, $return_array = false, $add_filler = false)
    {

        $fillables = $this->repository->fillables();

        $payload = [];

        foreach ($fillables as $field)
        {
            if(in_array($field, ['created_at', 'updated_at'])){
                continue;
            }
            $payload[$field] = self::filler($request->get($field), $add_filler);
        }

        if($return_array){

            return $payload;
        }

        return map_request($payload);
    }

    private static function filler($data, $filler){

        if( $filler ){
            return $data ?? $filler;
        }

        return $data;
    }

}
