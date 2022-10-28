<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        if ($request->start_date && $request->end_date && strtotime($request->start_date) < strtotime($request->end_date)) {
            if($request->status){
                $contacts = Contact::select('contacts.*')
                    ->where('status', $request->status)
                    ->where('created_at', '>=', $request->start_date)
                    ->where('created_at', '<=', $request->end_date)
                    ->paginate(12);
            }else{
                $contacts = Contact::select('contacts.*')
                    ->where('created_at', '>=', $request->start_date)
                    ->where('created_at', '<=', $request->end_date)
                    ->paginate(12);
            }
        } else {
            if($request->status){
                $contacts = Contact::select('contacts.*')
                    ->where('status', $request->status)
                    ->paginate(12);
            }else{
                $contacts = Contact::where('id', '>', 0)->paginate(12);
            }
        }
        return view('screens.backend.contact.index', compact('contacts'));
    }

    public function change_status($id){
        $contact = Contact::where('id', $id)->first();
        if($contact != null && $contact->status == 0){
            $contact ->status =1;
            $contact->save();
            Toastr::success(translate('Update contact status successfully !'));
            return redirect()->route('admin.contact.index');
        }
        return redirect()->route('admin.contact.index');
    }
}
