<?php
namespace Aknife\Ip;

use MaxMind\Db\Reader;

/**
 *
 */
define("IP_DATABASE_DIR", dirname(__DIR__).'/src');

/**
 * Class IpInfo
 * @package Ip\IpInfo
 */
class IpInfo {
    private static $databasePath;
    /**
     * set ip database default path
     * @param $path
     */
    public static function setDatabasePath($path) {
        self::$databasePath = $path;
    }

    /**
     * @param $ip
     * @param $language default language
     * @return array
     */
    public static function find($ip,$language='zh-CN') {
        $reader = new Reader(self::dataPath());
        $location = $reader->get($ip);
        $reader->close();

        if( $language && $location['continent'][$language] ){
            $location = [
                'continent' => [
                    'code'  =>  $location['continent']['code'],
                    'name'  =>  $location['continent'][$language]
                ],
                'country'   => [
                    'code'  =>  $location['country']['code'],
                    'name'  =>  $location['country'][$language]
                ],
                'region'    => $location['region'][$language] ?: $location['region']['en'],
                'city'      => $location['city'][$language] ?: $location['city']['en'],
            ];
        }else{
            $location = [
                'continent' => $location['continent'],
                'country'   => $location['country'],
                'region'    => $location['region'],
                'city'      => $location['city'],
            ];
        }
        
        return $location;
    }

    // get ip database path
    private static function dataPath() {
        return self::$databasePath ?: IP_DATABASE_DIR . '/data.mmdb';
    }
}