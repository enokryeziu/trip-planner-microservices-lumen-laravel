<?php

namespace App\Http\Controllers;

use App\Type;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index()
    {
        $type = Type::all();
        return response()->json($type);
    }
}
