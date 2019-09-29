<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Auth;

class UserController extends Controller
{


    
    public function orders()
    {
         
        $orders = Auth::guard()->user()->orders;
        return view('frontend.users.dashboard', ['orders' => $orders]);

    }

}
