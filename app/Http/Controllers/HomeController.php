<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Withdraw;
use Illuminate\Http\Request;
use Session;
use Auth;
class HomeController extends Controller
{
    public function index()
    {

    }

    public function login1()
    {
        if(!Auth::check()){
            return view('login');
        }
        return view('home');
    }

    public function checklogin(Request $request)
    {
          $request->validate([
            'contact' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('contact', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('home')
                        ->withSuccess('Signed in');
        }
        else
        {
            return redirect()->intended('login')
                           ->withSuccess('Username Password Wrong...');
        }

    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('login');
    }

  public function home()
    {
         if(Auth::check()){
            $lims=User::get();
            return view('home',compact('lims'));
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function withdraw()
    {
        if(Auth::check()){
            $lims=withdraw::get();
            return view('withdraw',compact('lims'));
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function updatewithdraw(Request $r)
    {
        $post = Withdraw::find($r->id);
        $post->ref_number = $r->uref;
        $post->status = $r->status;
        $post->save();

        $lims=withdraw::get();
        return view('withdraw',compact('lims'));
    }
  }
