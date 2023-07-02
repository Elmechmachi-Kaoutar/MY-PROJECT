<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\ValideMail;
use App\Models\User;
use App\Models\Candidature;

class ValideMailController extends Controller
{
    
    public function index($id){
        
        $candidateure=Candidature::where('id',$id)->first();
        $user_id=$candidateure->user_id;
        $user=User::findorFail($user_id);

        $mailData=[
            'recruteure'=>auth()->user()->nom_societe,
        ];

        Mail::to($user->email)->send(new ValideMail($mailData) );

    return redirect('/home/offre/show_candidature/'.$candidateure->offre_id)->with('message','nous avons envoyons un email a ce candidat !! ');  


  }

}
