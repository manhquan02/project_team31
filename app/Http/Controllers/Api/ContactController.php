<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use http\Env\Response;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $new_contact = new Contact();
        $new_contact->name = $request->name;
        $new_contact->email = $request->email;
        $new_contact->phone = $request->phone;
        $new_contact->description = $request->description;
        $new_contact->save();
        return response()->json([
            'status' => 200,
            'message' => 'Nội dung của bạn đã được gửi. Hãy check gmail chúng tôi sẽ liên hệ sớm nhất !'
        ]);
    }
}
