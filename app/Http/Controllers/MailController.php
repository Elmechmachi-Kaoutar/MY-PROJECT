<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

use App\Mail\RecruteureMail;
use App\Mail\CandidatMail;


use App\Models\Offre;

class MailController extends Controller
{
    public function index($id){

        $offre=Offre::where('id',$id)->first();
        $mailData=[
            // candidat data ********************
                'logo'=>$offre->user->logo,
                'offre_title'=>$offre->title,
                'recruteure'=>$offre->user->nom_societe,

            // recruteure data ********************
            'nom_candidat'=>auth()->user()->nom,

            ];

        Mail::to($offre->user->email)->send(new RecruteureMail($mailData) );
        Mail::to(auth()->user()->email)->send(new CandidatMail($mailData) );

        return redirect('/home/offre/'.$id.'/candidature')->with('success', 'vous avez postuler a cette offre avec succe');
    }

}
