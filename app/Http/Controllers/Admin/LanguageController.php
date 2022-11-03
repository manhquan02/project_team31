<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\Translation;
use Brian2694\Toastr\Facades\Toastr;
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
        $ex_lang = Language::where('code', $request->code)->exists();
        if ($ex_lang == false) {
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
            Toastr::success(translate('Add language successfully'));
            return redirect()->route('admin.language.index');
        }else
        {
            Toastr::error(translate('Language already exists'));
            return redirect()->route('admin.language.index');
        }


    }

    public function delete($id)
    {
        $lang = Language::where('id', $id)->first();
        if ($lang != null) {
            if ($lang->status == 1) {
                Toastr::error(translate('Default language cannot be deleted'));
                return redirect()->back();
            }
            $lang->delete();
            Toastr::success(translate('Delete language successfully'));
            return redirect()->back();
        }
        return redirect()->route('admin.language.index');
    }

    public function translate(Request $request, $lang)
    {
        if ($request->keyword) {
            $translations = Translation::where('lang', $lang)->where('lang_in', 'like', '%' . $request->keyword . '%')->paginate(10);
        } else {
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
        Toastr::success(translate('Translate successfully'));
        return redirect()->back();
    }


    public function delete_translation($translation)
    {
        $translation = Translation::where('id', $translation)->first();
        if ($translation != null) {
            $translation->delete();
            Toastr::success(translate('Delete translation successfully'));
            return redirect()->back();
        }
        return redirect()->back();
    }

    public function edit($id){
        $lang = Language::where('id', $id)->first();
        if ($lang != null) {
            return view('screens.backend.configuration.language.edit', compact('lang'));
        }
        return redirect()->route('admin.language.index');
    }

    public function update(Request $request, $id){
        $lang = Language::where('id', $id)->first();
        $lang->name = $request->name;
        $ex_lang = Language::where('code', $request->code)->exists();
        if ($request->flag) {
            $image = $request->flag;
            $imageName = $image->hashName();
            $lang->flag = $image->storeAs('images/flags', $imageName);
        }
        if($ex_lang == false){
            $lang->code = $request->code;
        }
        $lang->save();
        Toastr::success(translate('Update language successfully'));
        return redirect()->back();
    }
}
