<?php


function translate($keyword)
{
    $default_lang = Language::where('status', 1)->first();
    if ($default_lang == null) {
        $new_lang = new Language();
        $new_lang->name = 'English';
        $new_lang->code = 'en';
        $new_lang->app_lang_code = 'en';
        $new_lang->status = 1;
        $new_lang->save();
    }

    $lang_key = preg_replace('/[^A-Za-z0-9\_]/', '', str_replace(' ', '_', strtolower($keyword)));

    $translations = Translation::all();

    if ($translations != null) {
        foreach ($translations as $item) {
            if ($item->lang_key == $keyword) {
                return false;
            }
        }
    }

    $languages = Language::all();
    $new_translation = new Translation();
    foreach ($languages as $lang) {
        $new_translation->lang = $lang->code;
        $new_translation->lang_key = $lang_key;
        if ($lang->code == env('DEFAULT_LANGUAGE')) {
            $new_translation->lang_value = $keyword;
        }
        $new_translation->save();
    }

    $translate_current = Translation::where('lang_key', $lang_key)->where('lang', $default_lang)->first();
    $translate_default = Translation::where('lang_key', $lang_key)->where('lang', env('DEFAULT_LANGUAGE'))->first();
    if ($translate_current != null || $translate_current->lang_value != null) {
        return $translate_current->lang_value;
    }

    return $translate_default->lang_value;
}

?>
