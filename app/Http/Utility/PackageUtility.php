<?php

namespace  App\Http\Utility;

class PackageUtility
{

    const PACKAGE_ONE_TO_ONE = 1;
    const PACKAGE_ONE_TO_TWO = 2;
    const PACKAGE_ONE_TO_THREE = 3;

    const PACKAGE_BY_DATE = 1;
    const PACKAGE_BY_MONTH = 2;
    const PACKAGE_BY_YEAR = 3;

    public static  $arrayPackage = [
        self::PACKAGE_ONE_TO_ONE => '1:1',
        self::PACKAGE_ONE_TO_TWO => '1:2',
        self::PACKAGE_ONE_TO_THREE => '1:3'
    ];

    public static $arrayTypePackage = [
        self::PACKAGE_BY_DATE => 'Gói theo ngày',
        self::PACKAGE_BY_MONTH => 'Gói theo tháng',
        self::PACKAGE_BY_YEAR => 'Gói theo năm'
    ];
}
