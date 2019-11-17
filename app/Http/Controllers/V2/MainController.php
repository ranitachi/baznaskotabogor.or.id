<?php

namespace App\Http\Controllers\V2;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contact;
class MainController extends Controller
{
    public function index()
    {
        return view('depan.pages.index');
    }
}
