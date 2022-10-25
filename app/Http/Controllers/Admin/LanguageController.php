<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\Translation;
use Illuminate\Http\Request;


class LanguageController extends Controller
{
    public function index()
    {
        $languages = Language::all();
        return view('screens.backend.configuration.language.index', compact('languages'));
    }

    public function create()
    {
        return view('screens.backend.configuration.language.create');
    }

    public function store(Request $request)
    {
        $new_lang = new Language();
        $new_lang->name = $request->name;
        if ($request->flag) {
            $image = $request->flag;
            $imageName = $image->hashName();
            $new_lang->flag = $image->storeAs('images/flags', $imageName);
        }
        $new_lang->code = $request->code;
        if ($request->status && $request->status == 'on') {
            $default = Language::where('status', 1)->first();
            if ($default != null) {
                $default->status = 0;
                $default->save();
            }
            $new_lang->status = 1;
        }
        $new_lang->save();
        return redirect()->route('admin.language.index')->with('success', 'Add language successfully !');
    }

    public function delete($id)
    {
        $lang = Language::where('id', $id)->first();
        if ($lang != null) {
            $lang->delete();
            return redirect()->route('admin.subject.index')->with('success', 'Delete language successfully !');
        }
        return redirect()->route('admin.language.index');
    }

    public function translate(Request $request,$lang)
    {
        if($request->keyword){
            $translations = Translation::where('lang', $lang)->where('lang_in', 'like', '%'.$request->keyword.'%')->paginate(10);
        }else{
            $translations = Translation::where('lang', $lang)->paginate(10);
        }
        return view('screens.backend.configuration.language.translation', compact('translations', 'lang'));
    }

    public function store_translate(Request $request)
    {
        if ($request->lang_value) {
            foreach ($request->lang_value as $key => $item) {
                $translation = Translation::where('id', $key)->first();
                $translation->lang_value = $item;
                $translation->save();
            }
        }
        return redirect()->back();
    }


    public function delete_translation($translation)
    {
        $translation = Translation::where('id', $translation);
        if ($translation != null) {
            $translation->delete();
            return redirect()->back()->with('Delete translation successfully !');
        }
        return redirect()->back();
    }
}
