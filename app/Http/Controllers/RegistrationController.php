<?php

namespace App\Http\Controllers;

use App\Models\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class RegistrationController extends Controller
{


    public function add_user(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:8',
                'isPublisher' => 'required|boolean'
            ]
        );

        if (!$validator->passes()) {
            return response()->json($validator->errors());
        }

        users::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'isPublisher' => $request->isPublisher,

        ]);


        return Response::noContent();
    }
}
