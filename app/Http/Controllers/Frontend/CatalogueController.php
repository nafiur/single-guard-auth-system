<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class CatalogueController extends Controller
{
    public function index()
    {
        return view('frontend.pages.catalogue-download.index');
    }
}
