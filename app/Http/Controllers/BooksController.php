<?php

namespace App\Http\Controllers;

use App\Models\books;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Response;

class BooksController extends Controller
{
    public function add_book(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'book_name' => 'required|string|max:255',
                'publisher_id' => 'required|integer',
            ]
        );

        if (!$validator->passes()) {
            return response()->json($validator->errors());
        }

        books::insert([
            'book_name' => $request->book_name,
            'publisher_id' => $request->publisher_id

        ]);


        return Response::noContent();
    }
}
