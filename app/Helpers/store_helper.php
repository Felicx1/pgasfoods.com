<?php

function _session($key, $value = false){

    if(! $value){

        return session()->get($key) ?? '';
    }

    session()->put($key, $value);
    session()->save();
}

function products(){

    if(! $products = (new \Store\Manager\Services\Products\ProductService())->all()){
        return null;
    }

    return $products;

    //if no products in session,
    // load it from server
}

function two_sort_products($products = null, $num = 2)
{

    try
    {
        if(! $products)
        {
            return null;
        }


        $counter = 0;

        $array = []; // placeholder for main list
        $list = []; // placeholder for column list

        foreach($products as $product){

            if($counter == $num){

                $array[] = $list; //set list to the array
                $list = []; // reset to empty the list array
                $counter = 0; // reset counter
            }

            if($counter < $num)
            {
                $list[] = $product; // add product to list array placeholder
                $counter++; //counter to increment the list of columns
            }

        }

        return $array;

    }catch(\Exception $e){

        return null;
    }
}

/**
 * STORE HELPER FUNCTION FOR GENERIC PAGES
 * ====================================================================== */

function store_token(){

    return (new Store\Manager\Services\Token\TokenService())->token() ?? '';
}

function store_keys(){

    return (object)[
        'companyid' => env('APP_COMPANY_ID'),
        'outletid'  => env('APP_OUTLET_ID'),
    ];
}

//function _session($key, $value = false){
//
//    if(! $value){
//
//        return session()->get($key) ?? '';
//    }
//
//    session()->put($key, $value);
//    session()->save();
//}

/**
 * GET PAYMENT DATA
 */
function _payment(){

//    return (new Carts\Cart\Services\PaymentService())->payData();
}

/**
 * This method should load category only once
 * into the session to prevent repeated request to server
 */
function _category()
{

    try{
        // if in session, return it
        if($category = _session('category')){
            return $category;
        }

        $response = (new Store\Manager\Services\Products\CategoryService())->all();

        $category = _parser($response->category);

        session()->put('category', $category);
        session()->save();

        return _session('category');

    }catch(\Exception $e){

        return null;
    }
}


/**
 * This parse all response from server
 */
function _parser($response){

    try{

        $data = json_decode($response);

        return $data->data;

    }catch(\Exception $e){

        return null;
    }
}

/**
 *
 */
function _products(){

    try{

        $response = (new Store\Manager\Services\Products\ProductService())->all();

        $products =  _parser($response->products);

        return $products->data;

    }catch(\Exception $e){
        return null;
    }
}

/**
 *
 */
function _deals(){

    return false; // (new Store\Manager\Services\Sales\DealsService())->deals();
}

/**
 *
 */
function _sales($search)
{
    try{

        $products = (new Store\Manager\Services\Products\ProductService())->sales($search);
        return $products->products->data ?? null;

    }catch(\Exception $e){
        return null;
    }
}

/**
 *
 */
function _related(string $search = null)
{
    if(!$search){ return false; }
    try{

        $products = (new Store\Manager\Services\Products\ProductService())->related($search);
        return $products->products->data ?? null;

    }catch(\Exception $e){
        return null;
    }
}

/**
 *
 */
function _latest()
{
    return false; // (new Store\Manager\Services\Products\ProductService())->latest();
}

/**
 *
 */
function _views()
{
    return false; // (new Store\Manager\Services\Products\ProductService())->views();
}