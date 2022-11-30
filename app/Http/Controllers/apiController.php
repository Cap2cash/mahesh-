<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Withdraw;
use Auth;
use Illuminate\Support\Str;

class apiController extends Controller
{
    public function register(Request $r)
    {
        $r_data=$r->all();

                $r_data['password']=bcrypt($r_data['password']);
                $r_data['remember_token']=Str::random(60);

                 $lid=User::create($r_data)->id;
                if($lid)
                {
                    $array=array('response'=>'Success','data'=>array('id'=>$lid,'token'=>$r_data['remember_token']));
                    return response(json_encode($array),200);
                }
                else{
                        $array=array('response'=>'Internal Server Error','data'=>array());
                        return response(json_encode($array),500);
                }

    }

    public function login(Request $r)
    {
     if(auth()->attempt(array('contact' => $r['contact'], 'password' => $r['password'],'remember_token'=>$r['token'])))
        {
                $lid=Auth::user()->id;
                 $array=array('response'=>'Success','data'=>array('id'=>$lid));
                 return response(json_encode($array),200);
        }
        else{
               $array=array('response'=>'User Name Password Not Found','data'=>array());
                        return response(json_encode($array),500);
        }
    }

     public function forgotpassword(Request $r)
    {
        $email=$r->email;
        $token=$r->token;
        $lims=User::where('email',$email)->where('remember_token',$token)->first();
        if($lims)
        {
                 $lid=$lims->email;
                 $array=array('response'=>'Password sent to your email','data'=>array('id'=>$lid));
                 return response(json_encode($array),200);
        }
        else{
               $array=array('response'=>'User Name Password Not Found','data'=>array());
                        return response(json_encode($array),500);
        }
    }

     public function withdraw(Request $r)
    {
        $data=$r->all();
        // Verificate ie: Token,Userid
        $is_token=User::where('remember_token',$data['token'])->first();
        if($is_token)
        {
                $id=Withdraw::create($data)->id;
                if($id)
                {
                        $array=array('response'=>'OKAY','data'=>array());
                        return response(json_encode($array),200);
                }
                else{
                      $array=array('response'=>'User Name Password Not Found','data'=>array());
                        return response(json_encode($array),500);
                }
        }
        else{
              $array=array('response'=>'User Name Password Not Found','data'=>array());
                        return response(json_encode($array),500);
        }

        }

}
