<?php

namespace App\Repositories;


use App\Traits\RunTraits;
use Illuminate\Http\Request;

abstract class CoreRepository
{
    use RunTraits;

    protected $model;

    protected $max_rows = 1000;

    public function set(Request $request){

        return RunTraits::__create($this->model, $request->all());
    }

    public function setMany(array $params){

        return RunTraits::__createMany($this->model, $params);
    }

    public function get($id){

        return $this->model::whereId($id)->first();
    }

    public function all(array $where = null){

        if($where){
            return $this->model::where($where)->take($this->max_rows)->get();
        }
        return $this->model::all();
    }

    public function paginate(array $where, int $num = 10, bool $is_asc = true){

        if($where){
            $query = $this->model::where($where);
            return $is_asc ? $query->paginate($num) : $query->orderBy('created_at', 'desc')->paginate($num);
        }

        return $is_asc ? $this->model::paginate($num) : $this->model::orderBy('created_at', 'desc')->paginate($num);
    }

    public function findOneToday(array $where, $column = "created_at"){

        return $this->model::where(self::status_filter($where))->whereDate($column, \Carbon\Carbon::today())->first();
    }

    public function findOne(array $where){

        return $this->model::where(self::status_filter($where))->first();
    }

    public function findLastOne(array $where){

        return $this->model::where(self::status_filter($where))->orderBy('created_at', 'desc')->first();
    }

    public function find(array $where, bool $is_asc = true){

        $query = $this->model::where(self::status_filter($where))->take($this->max_rows);

        return $is_asc ? $query->get() : $query->orderBy('created_at', 'desc')->get();
    }

    public function update(array $params, array $where){

        return RunTraits::__updateOne($this->model, $params, $where);
    }

    public function updateOrCreate(array $params, array $where){

        return RunTraits::__updateOrCreate($this->model, $params, $where);
    }

    public function whereIn(string $column, array $params, ...$relations){

        $query = $this->model::whereIn($column, $params);

        if(count($relations) > 0){
            foreach ($relations as $relation){
                $query->with($relation);
            }
        }

        return $query->get();
    }

    public function whereOneIn(string $column, array $params, ...$relations){

        $query = $this->model::whereIn($column, $params);

        if(count($relations) > 0){
            foreach ($relations as $relation){
                $query->with($relation);
            }
        }

        return $query->first();
    }

    public function withWhereIn(array $where, string $column, array $params){

        return $this->model::where($where)->whereIn($column, $params)->get();
    }

    public function delete(array $params){

        return RunTraits::__delete($this->model, $params);
    }

    /**
     * @param array $where
     * @param array $search
     * @param ...$relations
     * @return false
     */
    public function search(array $where = [], array $search = [] ,...$relations){

        $query = $this->model::where(self::status_filter($where));

        if(count($search) == 0){
            return false;
        }

        foreach ($search as $index => $params){

            if(array_key_exists("column", $params) && array_key_exists("operator", $params) && array_key_exists("value", $params)){

                $value = $params["value"];

                if($params["operator"] == "LIKE") {

                    $value = "%{$value}%";
                }

                if($index == 0){
                    $query->where($params["column"], $params["operator"], $value);
                    continue;
                }
                $query->orWhere($params["column"], $params["operator"], $value);

            }
        }

        foreach ($relations as $relation){

            $query->with($relation);
        }

        $query->take($this->max_rows);

        return $query->get();
    }

    public function query(array $where = [], string $column = null, string $operator = null, string $value = null,...$relations){

        $query = $this->model::where(self::status_filter($where))->where($column, $operator, $value);

        foreach ($relations as $relation){
            $query->with($relation);
        }

        $query->take($this->max_rows);

        return $query->get();
    }

    public function takeWhere(array $where, int $num){

        return $this->model::where($where)->take($num)->get();
    }

    public function take(array $where, int $num, string $order = "desc"){

        return $this->model::where($where)->take($num)->orderBy("created_at", $order)->get();
    }

    public function fetch(array $where, ...$relations){

        $query = $this->model::where(self::status_filter($where));

        foreach ($relations as $relation){

            $query->with($relation);
        }

        return $query->get();
    }

    /**
     * @param array $where
     * @param string $column
     * @param string $search
     * @param int $position
     * @param ...$relations
     * @return null
     */
    public function fetchWithWhere(array $where, string $column, string $search, string $target_relation, ...$relations)
    {

        try {

            $query = $this->model::where(self::status_filter($where));

            foreach ($relations as $relation) {

                $query->with($relation);
            }

            $query->with([$target_relation => function($query) use ($column, $search) {

                $query->where($column, $search);
            }]);

            $query->whereHas($target_relation, function ($q) use ($column, $search) {

                $q->where($column, "=", $search); // '=' is optional
            });

            return $query->orderBy("start_date", "desc")->get();

        }catch(\Exception $e){

            \Log::error("Payload:: Request - " . $e->getMessage());

            return null;
        }
    }

    public function fetchOne(array $where, ...$relations){

        $query = $this->model::where(self::status_filter($where));

        foreach ($relations as $relation){

            $query->with($relation);
        }

        return $query->first();
    }

    public function pullMany(array $where, array $relations){

        $query = $this->model::with($relations);

        $query->where($where);

        return $query->get();
    }

    public function pullOne(array $where, array $relations){

        $query = $this->model::with($relations);

        $query->where($where);

        return $query->first();
    }

    /**
     * -------------------- FILLABLES --------------------- */

    public function fillables(){

        return $this->model->getFillable();
    }

    public static function status_filter(array $params = []): array
    {
        $filter = [
            "status" => 1
        ];

        if (array_key_exists("status", $params)){
            return $params;
        }

        return array_merge($params, $filter);
    }


}
