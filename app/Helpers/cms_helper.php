<?php

function _cookie($key, $value = null)
{

    if ($value) {
        setcookie($key, $value, time() + (12 * 60 * 24 * 3600));
        return null;
    }

    if (array_key_exists($key, $_COOKIE)) {
        return $_COOKIE[$key];
    }
    return null;
}

/**
 * @param $key
 *
 * If there are no cart in session, check cookies and update session
 */
function check_cart($key){

    try {
        /**
         * Update session data from cookies if there is value in it
         */
        if (!session()->get($key)) {
            if ($cart = _cookie($key)) {
                session()->put($key, json_decode($cart));
            }
        }

        /**
         * Store data in session if found
         */
        _cookie($key, json_encode(session()->get($key)));

    }catch(\Exception $e){
        // return info
    }
}

function headline($string = 'JR Farms Africa'){

    $prefix = preg_replace('/\W\w+\s*(\W*)$/', '$1', $string);

    $last_word_start = strrpos($string, ' ') + 1; // +1 so we don't include the space in our result
    $last_word = substr($string, $last_word_start);
    return "{$prefix} <span class='main-color'> {$last_word}</span>";
}

function elements($data = null){

    try
    {
        if(! $data ){ return null; }

    } catch (\Exception $e){

    }
}

function groups( $data ){

    try
    {
        if(! $data ){ return null; }

        $groups = _value($data, "groups");

        $group_holder = [];

        foreach ($groups as $group){

            if( $g_key = _value($group, "group_name")){

                $group_holder[$g_key] = _value($group, "elements");
            }
        }

        return $group_holder;

    } catch (\Exception $e){

        \Log::info("Error Occurred in blocks" . $e->getMessage());
        return null;
    }
}

function pagedata($data = null, $returnObject = false, $index = -1 )
{
    try
    {

        if(is_array($data)){
            $data = (object) $data;
        }
        if($index > -1){ return $data->blocks[$index];  }

        $blocks = (object) $data->blocks;

        $blocks_data = [];

        foreach ($blocks as $block){

            if( $b_key = _value((object)$block, "block_name")){

                $groups = _value((object)$block, "groups");
                $blocks_data[$b_key] = sort_keys(array_column($groups, "elements"));
            }
        }
        if($returnObject){
            return (object) json_decode(json_encode($blocks_data));
        }
        return $blocks_data;
    } catch (\Exception $e){

        \Log::info("Error Occurred in pagedata " . $e->getMessage());
        return null;
    }
}

function sort_keys(array $data){

    $holder = [];
    foreach ($data as $v){

        foreach ($v as $k){
            $holder[$k["name"]] = $k;
        }
    }
    return $holder;
}