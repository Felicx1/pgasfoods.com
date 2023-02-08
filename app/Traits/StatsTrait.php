<?php

namespace App\Traits;

use Browser;

trait StatsTrait {

    

    public static function logStat(array $request){

        $info = [
            'agent'     => self::getAgent(),
            'os'        => self::getOS(),
            'device'    => self::getDevice(),
            'device_type' => self::getDeviceType(),
            'ip'        => self::getIP(),
            'counter'   => 1,
            // 'server'    => self::getServer(),
            // 'path'      => self::getPath(),
            // 'url'       => self::getURL(),
        ];
        $data = self::parseInfo((object) $request);
        return array_merge($info, $data);
    }

    public static function getAgent(){

        try{

            return Browser::browserFamily();
        }catch(\Exception $e){

            return request()->userAgent();
        }
        
    }
    public static function getOS(){

        return Browser::platformFamily();
    }
    public static function getDevice(){

        if(Browser::isMobile()){
            return 'mobile';
        }elseif(Browser::isTablet()){
            return 'tablet';
        }elseif(Browser::isDesktop()){
            return 'desktop';
        }
        return 'bot';
    }

    public static function getDeviceType(){

        return Browser::deviceFamily();
    }
  
    public static function getIP(){
        
        return request()->ip();
    }

    public static function getServer(){

        return request()->server('SERVER_ADDR');
    }

    public static function getPath(){

        return request()->path();
    }

    public static function getURL(){

        return request()->url();
    }

    public static function parseInfo(object $request){

        return [
             "country"          => $request->country,
            //  "countryCode"      => $request->countryCode,
             "region"           => $request->region,
             "regionName"       => $request->regionName,
             "city"            => $request->city,
             "zip"              => $request->zip,
             "lat"              => $request->lat,
             "lon"              => $request->lon,
             "timezone"         => $request->timezone,
             "query"            => $request->query,
             'referrer'         => $request->referrer,
             'page'             => $request->page,
        ];
    }
}
