<?php
 namespace App\Http\Controllers;

 use Illuminate\Http\Request;
 use Auth;
 use App\Models\User;


 class StaticPagesController extends Controller
 {
    public function home()
    {
        $feed_items = array();
        if(Auth::check()){
            $feed_items = Auth::user()->feed()->paginate(15);
        }
        return view('static_pages/home',compact('feed_items'));
    }

    public function about(User $user)
    {
        return view('static_pages/about');
    }

    public function help()
    {
        return view('static_pages/help');
    }
 }


