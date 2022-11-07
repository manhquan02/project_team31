<?php
namespace  App\Http\Utility;

class PackageUtility {
 
    const PACKAGE_ONE_TO_ONE=1;
    const PACKAGE_ONE_TO_TWO=2;
    const PACKAGE_ONE_TO_THREE=3;

    public static  $arrayPackage=[
        self::PACKAGE_ONE_TO_ONE=>'1:1',
        self::PACKAGE_ONE_TO_TWO=>'1:2',
        self::PACKAGE_ONE_TO_THREE=>'1:3'
    ];
    

}