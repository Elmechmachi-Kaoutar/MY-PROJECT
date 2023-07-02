<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offre;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    
    public function index()
    {
        if((auth()->user()->role_id)==3){  
            if((auth()->user()->suspend)==true){
                return  view('account.suspend');
            }else{
                $lastCreatedAt = Offre::where('user_id',(auth()->user()->id))->orderBy('created_at', 'desc')->first();
                return  view('dashboard.recruteure',compact('lastCreatedAt'));
            }
    

            



        }elseif((auth()->user()->role_id)==2){
            if((auth()->user()->suspend)==true){
                return  view('account.suspend');
            }else{
            
            return view('dashboard.candidat')
            ->with('lastFiveCreatedAt',Offre::orderBy('created_at', 'desc')->take(3)->get());
            }

        }else{


            $users=User::get();
            return view('dashboard.admin',compact('users'));
        
        }
    
    
    }


    public function show($id) {

        $user=User::findorFail($id);
        return view('account.delete',compact('user'));
    }
    
    
}
