<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Mail\ContactEmail;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'        => 'required|string|max:255',
            'email'       => 'required|email',
            'location'     => 'required|string',
            'phone'       => 'nullable|string|max:15',
        ]);
        if($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ], 422);
        }
        $mailData = [
            'name'    => $request->name,
            'email'   => $request->email,
            'location' => $request->location,
            'phone'   => $request->phone,
        ];
        Mail::to('rakshithg189@gmail.com')->send(new ContactEmail($mailData));
        return response()->json([
            'status' => true,
            'message' => 'Your email has been sent successfully.'
        ]);
    }
}
