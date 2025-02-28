<?php

namespace App\Http\Controllers;
use app\Models\Pakan;

use Illuminate\Http\Request;

class PakanController extends Controller
{
    public function index(){
        try{
            $pakans = Pakan::all();
            return view("pages.pakan.list",compact("pakans"));
        }catch(\Throwable $th) {
            return redirect()->route('login')->with('error','Something went wrong');
        }
    }
}
