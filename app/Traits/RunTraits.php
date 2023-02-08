<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;

trait RunTraits {

    public static function __create($model, $params) {

        try {

            //dd((array) $params);
            return $model::create((array) $params)->id;

        } catch(QueryException $ex){
            \Log::error($ex->getMessage());
            return false;
        } catch (ModelNotFoundException $ex){
            \Log::error($ex->getMessage());
            return false;
        }
    }

    public static function __createMany($model, $params) {

        try {

            return $model::insert($params);

        } catch(QueryException $ex){
            \Log::error($ex->getMessage());
            return false;
        } catch (ModelNotFoundException $ex){
            \Log::error($ex->getMessage());
            return false;
        }
    }

    public static function __updateOne($model, $params, $target) {

        try {

            return $model::where($target)->update($params);

        } catch(QueryException $ex){
            \Log::error($ex->getMessage());
            return false;
        } catch (ModelNotFoundException $ex){
            \Log::error($ex->getMessage());
            return false;
        }
    }


    public static function __updateOrCreate($model, $params, $target) {

        try {

            return $model::updateOrCreate($target, $params)->id;

        } catch(QueryException $ex){
            \Log::error($ex->getMessage());
            return false;
        } catch (ModelNotFoundException $ex){
            \Log::error($ex->getMessage());
            return false;
        }
    }

    public static function __delete($model, $target) {

        try {

            return $model::where($target)->delete();

        } catch(QueryException $ex){
            \Log::error($ex->getMessage());
            return false;
        } catch (ModelNotFoundException $ex){
            \Log::error($ex->getMessage());
            return false;
        }
    }

}
