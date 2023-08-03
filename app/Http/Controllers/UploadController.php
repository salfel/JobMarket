<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function __invoke(Request $request)
    {
        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('public/logos');
            $path = '/'.str_replace('public', 'storage', $path);

            return response()->json(['path' => $path]);
        }
    }
}
