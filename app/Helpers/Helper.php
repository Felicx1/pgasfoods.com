<?php

    /**
     * GENERAL HELPER FUNCTION FOR GENERIC PAGES
     * ====================================================================== */

    /**
     *
     * @param $data
     * @return page status
     *
     */
    function lockdown($data = false){

        try{

            if(request()->getHost()!='localhost'){

                return env('APP_LIVE') ?'' : abort('222');
            }

            if($data->status == 0)
            {
                return abort('404');
            }

        }catch(\Exception $e){
            return abort('404');
        }
    }

    /**
     * Treat URL and return actual path
     */
    function get_request_path($url){

        try{

            $segments = request()->segments();

            if(count($segments ?? []) != 0){

                return end($segments);
            }
            return false;
        }catch(\Exception $e){
            return false;
        }
    }

    /**
     * This helps to control cookies notice display
     */
    function cookies(){

        return session()->get('policy')??false;
    }

    /**
     *
     * Remove special characters
     * @param string $string, $search, $replace
     * @return formated string
     *
     */
    function strip_chars($string, $search = ' ', $replace = '-'){

        return str_replace($search, $replace, preg_replace('~[^A-Za-z\d\s-]+~u', $replace, $string));
    }

    /**
     *
     * This shorten string length and append ...
     * @param string $string, int $length
     * @return $string
     *
     */
    function string_limit($string, $length){

        return substr(strip_tags($string), 0, $length) . '...';
    }


    /**
     *
     * This extract string between the start and end specified
     * in second and third arguments
     * @param string $string, $start, $end
     * @return string $string
     *
     */
    function get_string_between($string, $start, $end)
    {
        $string = ' ' . $string;
        $ini = strpos($string, $start);
        if ($ini == 0) return '';
        $ini += strlen($start);
        $len = strpos($string, $end, $ini) - $ini;

        return substr($string, $ini, $len);
    }

    function strip_base64($file){

        return preg_replace('#data:image/[^;]+;base64,#', '', $file);
    }

    /**
     * PARSE DATE TO MONTH, DAY AND YEAR OBJECT
     * @param string $date
     * @return object $date
     */
    function parseDate($date = false, $position = 'day'){

        if(!$date){ return false; }

        try{
            $d = explode('-', date_format($date,'d-M-Y'));
            $data = (object)['day'=>$d[0], 'month'=>$d[1], 'year'=>$d[2]];
            return $data->$position;

        }catch(\Exception $e){
            //log what the issue is here
            return false;
        }
    }

    /**
     * HELPER FUNCTIONS FOR PAGE PROPERTIES
     * ====================================================================== */
    /**
     *
     * This get page header
     * @param $data
     * @return string page title
     *
     */
    function page_header($data = false){

        try{

            $label = $data->title . ' - ';
            if($data->url == "home"){
                $label = env('APP_NAME');
            }
            return $label . env('APP_NAME');

        }catch(\Exception $e){

            return env('APP_NAME');
        }
    }

    function _value($data, $key, $return = '')
    {
        try{
            return $data->$key;
        }catch(\Exception $e){
            return $return;
        }
    }

    function _value2($data, $source, $key)
    {
        try{
            return $data->$source->$key;
        }catch(\Exception $e){
            return '';
        }
    }


    /**
     * REPLACEMENT TAG FUNCTIONS
     * ====================================================================== */

     function replace($data, $tag){

        return str_replace('[[-','<'.$tag.'>',str_replace('-]]','</'.$tag.'>', $data));
     }



    /**
     * FORM DATA
     * ====================================================================== */

     function input($key, $type = 'text', $value = '', $class = '', $isrequired = true, $placeholder = false, $is_label = true, $size = ''): object
     {

        $sign = $isrequired ? ' *' : '' ;

        $input = [];
        $input['name']          = $key;
        $input['type']          = $type;
        $input['value']         = $value;
        $input['class']         = 'fn ' . str_replace(' ', '', $key) . ' ' . $class;
        $input['is_label']      = $is_label;
        $input['size']          = $size;

        $input['placeholder']   = 'Enter ' . ucwords(str_replace('_', ' ', $key)) . $sign;
        if($placeholder){
            $input['placeholder'] = $placeholder;
        }

        (!$isrequired) ? : $input['required'] = 'required';

        return (object) $input;
     }

     function select(string $key, array $values, $selected = '', $class = '', $isrequired = true): object
     {

        $sign = $isrequired ? ' *' : '' ;

        $input = [];
        $input['name']          = $key;
        $input['values']        = $values;
        $input['selected']      = $selected;
        $input['class']         = 'fn ' . str_replace(' ', '', $key) . ' ' . $class;
        $input['placeholder']   = 'Enter ' . ucwords(str_replace('_', ' ', $key)) . $sign;
        (!$isrequired) ? : $input['required'] = 'required';

        return (object) $input;
     }

     function textarea($key, $label = '', $data = '', $class = '', $isrequired = true, $placeholder = ''): object
     {

        $sign = $isrequired ? ' *' : '' ;

        $input = [];
        $input['name']          = $key;
        $input['label']         = $label;
        $input['value']         = $data;
        $input['type']          = 'textarea';
        $input['class']         = 'fn ' . str_replace(' ', '', $key) . ' ' . $class;
        $input['placeholder']   = $placeholder ?? 'Enter ' . ucwords($key) . $sign;
        (!$isrequired) ? : $input['required'] = 'required';

        return (object) $input;
     }

     function _date($date)
     {
         $date = date('Y-m-d', strtotime($date));
         if($date === '1970-01-01')
         {
             return '';
         }
         return $date;
     }

     /**
     * New Blade Helpers
     * ===================================================== */

    function _image($string = false, $key = 'Image')
    {
        return asset($string->$key->value ?? '');
    }

    function _text($string, $key, $type = false)
    {
        return $string->$key->value ?? '';
    }

    function _link($string, $key = 'Link', $alt = '#')
    {
        return url($string->$key->value ?? $alt);
    }

    function active($key)
    {
        return request()->is($key) ? 'active' : '';
    }


     /**
     * Blade Helper : Form Processing methods
     * ===================================================== */



    function pin($digits = 3)
    {
        return rand(pow(10, $digits-1), pow(10, $digits)-1);
    }

    function code($digits = 15){

        $random_hash = bin2hex(random_bytes($digits));
        return substr($random_hash, 0, 8);
    }

    function uniqueNumber(){

        return rand(10,20).time();
    }

    /**
    * Calculate and return monitary value
    */
    function money($value)
    {
        return number_format((float)$value, 2, '.', '');
    }

    function map_request(array $data){

        return new \Illuminate\Http\Request($data);
    }


    /**
    * Captcha for Form Control -------------------------------------------------------- */

    // function captcha($value = false)
    // {

    //     $key = "xx_captcha_key";

    //     // if there is value added to key, then add to session
    //     if($value){

    //         session()->put($key, $value);
    //         session()->save();
    //         return false;
    //     }

    //     // if session found return true
    //     if($captcha = session()->get($key))
    //     {
    //         session()->forget($key);
    //         session()->save();
    //         return $captcha;
    //     }

    //     return false;
    // }

    function captcha_is_valid($captcha = false){

        if(!$captcha){
            return false;
        }

        if($captcha == captcha()){
            return true;
        }
        return false;
    }

    function view_captcha(){

        return session()->get("xx_captcha_key");
    }

    function captcha_code($digits = 15){

        $random_hash = bin2hex(random_bytes($digits));
        return substr($random_hash, 0, $digits);
    }

    /** Returns a random alphanumeric token or number
     * @param int length
     * @param bool  type
     * @return String token
     */
    function getRandomToken($length, $typeInt = false)
    {
        $token = "";
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codeAlphabet .= "abcdefghijklmnopqrstuvwxyz";
        $codeAlphabet .= "0123456789";
        $max = strlen($codeAlphabet);

        if ($typeInt == true) {
            for ($i = 0; $i < $length; $i++) {
                $token .= rand(0, 9);
            }
            $token = intval($token);
        } else {
            for ($i = 0; $i < $length; $i++) {
                $token .= $codeAlphabet[random_int(0, $max - 1)];
            }
        }

        return $token;
    }
