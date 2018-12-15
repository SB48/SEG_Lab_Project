<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $title = 'The Gaming Rental Society';
        return view('pages.index')->with('title', $title);
    }
}
