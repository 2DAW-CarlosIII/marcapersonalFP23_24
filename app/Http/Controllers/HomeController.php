<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function getHome(){
        //Por que patata
        return redirect()->action([CatalogController::class, 'getIndex']);
    }
}
