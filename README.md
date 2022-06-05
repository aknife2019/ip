## 概述

IP地理位置获取。支持获取IPv4、IPv6地址信息。包括：国家、省份、城市。  

国内数据使用纯真IPV4库，结合淘宝,ipip 补齐城市数据，并打包为mmdb格式

## 安装


```shell
composer require aknife/ip
```

## 快速入门

示例代码

```php

// 获取IP信息
use Aknife\Ip\IpInfo;

// IPv4
IpInfo::find('159.75.190.197');
/*
[
    'continent' => [
            'code' => 'AS',
            'name' => '亚洲',
    ],
    'country' => [
            'code' => 'CN',
            'name' => '中国',
    ],
    'region' => '广东省',
    'city' => '广州市',
]
*/
// IPv4 en
IpInfo::find('159.75.190.197','en');
/*
[
    [continent] => [
            [code] => 'AS',
            [name] => 'Asia',
    ],
    [country] => [
            [code] => 'CN',
            [name] => 'China',
    ],
    [region] => 'Guangdong',
    [city] => 'Guangzhou'
]
*/

// IPv6
IpInfo::find('2402:4e00:1013:e500:0:940e:29d7:3443','full');
/*
[
    
    'continent' => [
            'code' => 'AS',
            'en' => 'Asia',
            'zh-CN' => '亚洲'
    ],
    'country' => [
            'code' => 'CN',
            'en' => 'China',
            'zh-CN' => '中国'
    ],
    'region' => [
            'en' => 'Guangdong',
            'zh-CN' => '广东省'
    ],
    'city' => [
            'en' => 'Guangzhou',
            'zh-CN' => '广州市'
    ]
]
*/


```

## IP库来源

- 国内IPv4地址来自(qqwry.dat - 2022-06-01) [cz88.net](https://cz88.net/)
- 国内IPv6地址来自(ipv6wry.db - 2021-07-21) [ZX-Inc/zxipdb-python](https://github.com/ZX-Inc/zxipdb-python)
- 国外IP城市信息来自(GeoLite2-City.mmdb - 2022-06-03)  [maxmind.com](https://www.maxmind.com/)