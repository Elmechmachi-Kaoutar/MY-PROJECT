<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Offre;
use Illuminate\Http\Request;

class AdminController extends Controller
{


    public function index_candidats(){
        $users=User::where('role_id','2')->get();
        return view('admin.candidat',compact('users'));
    }
    

    public function index_recruteurs(){
        $users=User::where('role_id','3')->get();
        return view('admin.recruteure',compact('users'));
    }




    public function show_recruteure_offres($id){
        $user=User::findorFail($id);
        $offres=Offre::where('user_id',$id)->get();
        return view('admin.recruteure_offres',compact('user','offres'));
    }


    public function show_candidat($id){
        $user=User::findorFail($id);
        return view('admin.user_info',compact('user'));
    }


    public function show_recruteure($id){
        $user=User::findorFail($id);
        $offres=Offre::where('user_id',$id)->get();
        return view('admin.user_info',compact('user','offres'));
    }

    public function colaboration(){

        $users=User::where('iscolaborate',1)->get();
        return view('admin.colaboration',compact('users'));
    }
    
    public function demands(){

        $users=User::where('role_id','3')->get();
        return view('admin.demands',compact('users'));
    }
    public function suspend_recruteure(){

        $users=User::where('role_id','3')->where('suspend',true)->get();
        return view('admin.suspend.recruteure',compact('users'));
    }
    public function suspend_candidat(){

        $users=User::where('role_id','2')->where('suspend',true)->get();
        return view('admin.suspend.candidat',compact('users'));
    }

    

    


}
