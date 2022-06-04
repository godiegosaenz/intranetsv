<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Establishments;


class HomeController extends Controller
{
    public function index()
    {

        return view('welcome');
    }

    public function home()
    {
        $totalEstablishment = Establishments::count();
        $totalAbiertosEstablishment = Establishments::where('status',1)->count();
        $totalcerradosEstablishment = Establishments::where('status',2)->count();
        //return $totalcerradosEstablishment;
        return view('home',compact('totalEstablishment','totalAbiertosEstablishment','totalcerradosEstablishment'));
    }
}
