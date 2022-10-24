<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    use HasFactory;

    protected $table = 'translations';

    function translate($keyword, $default_lang = null)
    {
        $result = $keyword;

        $default_lang = Language::where('status', 1)->first();
        $lang_key = preg_replace('/[^A-Za-z0-9\_]/', '', str_replace(' ', '_', strtolower($keyword)));
        if ($default_lang == null) {
            $new_lang = new Language();
            $new_lang->name = 'English';
            $new_lang->code = 'en';
            $new_lang->app_lang_code = 'en';
            $new_lang->status = 1;
            $new_lang->save();
        } else {
            $translate_current = Translation::where('lang_key', $lang_key)->where('lang', $default_lang->code)->first();
        }


        $translations = Translation::all();

        if ($translations != null) {
            foreach ($translations as $item) {
                if ($item->lang_key == $keyword) {
                    $result = $result;
                }
            }
        }

        $languages = Language::all();

        foreach ($languages as $lang) {
            $new_translation = new Translation();
            $ex_translate = Translation::where('lang', $lang->code)->where('lang_key', $lang_key)->exists();
            if ($ex_translate == false) {
                $new_translation->lang = $lang->code;
                if ($lang->code == env('DEFAULT_LANGUAGE')) {
                    $new_translation->lang_value = $keyword;
                }
                $new_translation->lang_key = $lang_key;
                $new_translation->save();
            }

        }

        $translate_default = Translation::where('lang_key', $lang_key)->where('lang', env('DEFAULT_LANGUAGE'))->first();
        if (isset($translate_current) && $translate_current != null) {
            $result = $translate_current->lang_value;
        } elseif (isset($translate_default) && $translate_default != null) {
            $result = $translate_default->lang_value;
        } else {
            $result = $result;
        }

        return $result;
    }

}
