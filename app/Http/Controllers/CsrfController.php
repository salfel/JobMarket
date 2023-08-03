<?php

namespace App\Http\Controllers;

class CsrfController extends Controller
{
    public function __invoke()
    {
        return response()->json(['token', csrf_token()]);
    }
}
