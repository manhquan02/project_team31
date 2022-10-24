<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\Translation;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function index(){
        $languages = Language::all();
        return view('screens.backend.configuration.language.index', compact('languages'));
    }

    public function create(){
        return view('screens.backend.configuration.language.create');
    }

    public function store(Request $request){
        $new_lang = new Language();
        $new_lang->name = $request->name;
        if($request->flag){
            $image = $request->flag;
            $imageName = $image->hashName();
            $new_lang->flag = $image->storeAs('images/flags', $imageName);
        }
        $new_lang->code = $request->code;
        if($request->status && $request->status == 'on'){
            $default = Language::where('status', 1)->first();
            if($default != null){
                $default->status = 0;
                $default->save();
            }
            $new_lang->status = 1;
        }
        $new_lang->save();
        return redirect()->route('admin.language.index')->with('success','Add language successfully !');
    }

    public function delete($id){
        $lang = Language::where('id', $id)->first();
        if($lang != null){
            $lang->delete();
            return redirect()->route('admin.subject.index')->with('success', 'Delete language successfully !');
        }
        return redirect()->route('admin.language.index');
    }

    public function translate($lang)
    {
        $translations = Translation::where('lang', $lang)->get();
        return view('screens.backend.configuration.language.translation', compact('translations'));
    }
}
