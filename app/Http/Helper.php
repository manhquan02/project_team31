<?php

use App\Models\Language;
use App\Models\Translation;


function translate($keyword)
{
    $result = $keyword;

    $default_lang = Language::where('status', 1)->first();

    $lang_key = preg_replace('/[^A-Za-z0-9\_]/', '', str_replace(' ', '_', strtolower($keyword)));
    if ($default_lang != null) {
        $translate_current = Translation::where('lang_key', $lang_key)->where('lang', $default_lang->code)->where('lang_value', '!=', null)->first();
    }

    $languages = Language::all();

    foreach ($languages as $lang) {
        $new_translation = new Translation();
        $ex_translate = Translation::where('lang', $lang->code)->where('lang_key', $lang_key)->exists();
        if ($ex_translate == false) {
            $new_translation->lang = $lang->code;
            $new_translation->lang_in = $keyword;
            if ($lang->code == env('DEFAULT_LANG_CODE')) {
                $new_translation->lang_value = $keyword;
            }
            $new_translation->lang_key = $lang_key;
            $new_translation->save();
        }

    }

    if (isset($translate_current) && $translate_current != null) {
        $result = $translate_current->lang_value;
    } else {
        $result = $result;
    }

    return $result;
}

function test_bmi($bmi)
{
    $health = 0;
    if ($bmi < 16) {
        $health = 1;
    } else if ($bmi < 17) {
        $health = 2;
    } else if ($bmi < 18.5) {
        $health = 3;
    } else if ($bmi < 25) {
        $health = 4;
    } else if ($bmi < 30) {
        $health = 5;
    } else if ($bmi < 35) {
        $health = 6;
    } else if ($bmi < 40) {
        $health = 7;
    } else {
        $health = 8;
    }
    return $health;
}

function upload_image($name = 'image', $request, $new, $folder)
{
    $image = $request;
    $imageName = $image->hashName();
    $new->$name = $image->storeAs($folder, $imageName);
}

function config_encode($text)
{
    $data = strtoupper(md5(rand(0, 1000)) . "gym") . base64_encode($text);
    return $data;
}

function config_decode($text)
{
    $result = substr($text, 35);
    return (int)base64_decode($result);
}

const PACKAGE_ONE_TO_ONE = 1;
const PACKAGE_ONE_TO_TWO = 2;
const PACKAGE_ONE_TO_THREE = 3;
$arrayPackage = [

    PACKAGE_ONE_TO_ONE => '1:1',
    PACKAGE_ONE_TO_TWO => '1:2',
    PACKAGE_ONE_TO_THREE => '1:3'
]

// USER
// LIST DANH -> pACKAGE_ID=PACKAGE_TYPE CLASS::arrayPackage[PACKAGE_TYPE]


?>
