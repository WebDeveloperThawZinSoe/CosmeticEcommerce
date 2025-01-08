<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UpdateCodeController extends Controller
{
    //index
    public function index(){
        return view("admin.codeUpdate.index");
    }
}
