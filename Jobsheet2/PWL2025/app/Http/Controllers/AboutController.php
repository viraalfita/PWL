<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function __invoke(Request $request)
    {
        return 'Nama: Vira Alfita, NIM: 2341720055';
    }
}
