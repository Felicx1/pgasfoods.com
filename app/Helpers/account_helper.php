<?php

/**
 * FORM DATA
 * ====================================================================== */

/**
 * Account Token set or get method : helper
 */
function auth_account_data($value = false){

    if(! $value){

        return session()->get("xlm_account_vars") ?? '';
    }

    // set token to session
    session()->put("xlm_account_vars", $value);
    session()->save();
}

function user_account_data($value = false){

    if(! $value){

        return session()->get("app_acc_detials") ?? '';
    }

    // set token to session
    session()->put("app_acc_detials", $value);
    session()->save();
}

function clear_auth_account_data()
{

    // set token to session
    session()->forget('xlm_account_vars');
    session()->forget('app_acc_detials');
    session()->save();
}

function app_session(string $key, $value = null)
{

    if(! $value){
        return session()->get($key);
    }

    session()->put($key, $value);
    session()->save();
}

//
//function input($key, $type = 'text', $value = '', $class = '', $isrequired = true, $placeholder = false, $is_label = true, $size = ''): object
//{
//
//    $sign = $isrequired ? ' *' : '' ;
//
//    $input = [];
//    $input['name']          = $key;
//    $input['type']          = $type;
//    $input['value']         = $value;
//    $input['class']         = 'fn ' . str_replace(' ', '', $key) . ' ' . $class;
//    $input['is_label']      = $is_label;
//    $input['size']          = $size;
//
//    $input['placeholder']   = 'Enter ' . ucwords(str_replace('_', ' ', $key)) . $sign;
//    if($placeholder){
//        $input['placeholder'] = $placeholder;
//    }
//
//    (!$isrequired) ? : $input['required'] = 'required';
//
//    return (object) $input;
//}
//
//function select(string $key, array $values, $selected = '', $class = '', $isrequired = true): object
//{
//
//    $sign = $isrequired ? ' *' : '' ;
//
//    $input = [];
//    $input['name']          = $key;
//    $input['values']        = $values;
//    $input['selected']      = $selected;
//    $input['class']         = 'fn ' . str_replace(' ', '', $key) . ' ' . $class;
//    $input['placeholder']   = 'Enter ' . ucwords(str_replace('_', ' ', $key)) . $sign;
//    (!$isrequired) ? : $input['required'] = 'required';
//
//    return (object) $input;
//}
//
//function textarea($key, $label = '', $data = '', $class = '', $isrequired = true): object
//{
//
//    $sign = $isrequired ? ' *' : '' ;
//
//    $input = [];
//    $input['name']          = $key;
//    $input['label']         = $label;
//    $input['value']         = $data;
//    $input['type']          = 'textarea';
//    $input['class']         = 'fn ' . str_replace(' ', '', $key) . ' ' . $class;
//    $input['placeholder']   = 'Enter ' . ucwords($key) . $sign;
//    (!$isrequired) ? : $input['required'] = 'required';
//
//    return (object) $input;
//}
//
//function _date($date)
//{
//    $date = date('Y-m-d', strtotime($date));
//    if($date === '1970-01-01')
//    {
//        return '';
//    }
//    return $date;
//}




//
///**
// * Captcha for Form Control -------------------------------------------------------- */
//
//function captcha($value = false)
//{
//
//    $key = "xx_captcha_key";
//
//    // if there is value added to key, then add to session
//    if($value){
//
//        session()->put($key, $value);
//        session()->save();
//        return false;
//    }
//
//    // if session found return true
//    if($captcha = session()->get($key))
//    {
//        session()->forget($key);
//        session()->save();
//        return $captcha;
//    }
//
//    return false;
//}
//
//function captcha_is_valid($captcha = false){
//
//    if(!$captcha){
//        return false;
//    }
//
//    if($captcha == captcha()){
//        return true;
//    }
//    return false;
//}
//
//function view_captcha(){
//
//    return session()->get("xx_captcha_key");
//}
//
//function captcha_code($digits = 15){
//
//    $random_hash = bin2hex(random_bytes($digits));
//    return substr($random_hash, 0, $digits);
//}