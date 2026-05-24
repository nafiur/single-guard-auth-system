<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class CaseController extends Controller
{
    public function index()
    {
        return view('frontend.pages.cases.index');
    }
}
