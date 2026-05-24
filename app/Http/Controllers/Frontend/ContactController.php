<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function contact()
    {
        return view('frontend.pages.contact.index');
    }
}
