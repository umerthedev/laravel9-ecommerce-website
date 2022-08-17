<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\product;

class HomeController extends Controller
{
    // index
    public function index()
    {
        $product = product::paginate(6);
        return view('home.userpage', compact('product'));
    }


    // user role 
    public function redirect()
    {
        $usertype = Auth::user()->usertype;
        if ($usertype == '1') {
            return view('admin.home');
        } else {
            $product = product::paginate(6);
            return view('home.userpage', compact('product'));
        }
    }
}
