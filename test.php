<?php
    include "./vendor/autoload.php";
    use Aknife\Ip\IpInfo;
    print_r(ipInfo::find('159.75.190.197'));
    print_r(ipInfo::find('159.75.190.197',"en"));
    print_r(IpInfo::find('2402:4e00:1013:e500:0:940e:29d7:3443','full'));
