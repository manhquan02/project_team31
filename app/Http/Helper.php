<?php

use App\Models\Language;
use App\Models\Translation;


function translate($keyword)
{
    $result = $keyword;

    $default_lang = Language::where('status', 1)->first();

    $lang_key = preg_replace('/[^A-Za-z0-9\_]/', '', str_replace(' ', '_', strtolower($keyword)));
    if ($default_lang != null ) {
        $translate_current = Translation::where('lang_key', $lang_key)->where('lang', $default_lang->code)->where('lang_value', '!=' , null)->first();
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
?>
