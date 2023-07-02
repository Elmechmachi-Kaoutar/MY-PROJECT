<?php

namespace App\Http\Controllers;

use App\Models\candidat;
use App\Models\InfoCandidat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CandidatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {  
        if(isset(auth()->user()->info)){
            
            $a= auth()->user()->info->remuneration_actuelle;
            $b= auth()->user()->info->secteur_actuel;
            $c= auth()->user()->info->niveau_experience;
            $d= auth()->user()->info->niveau_etude;

        }else{
            
            $a= '---';
            $b=  '---';
            $c=  '---';
            $d= '---';

        }
     
        $cities = [ auth()->user()->ville , 'Rabat', 'Fes', 'Marrakech',
        'Agadir', 'Tangier', 'Meknes', 'Oujda', 'Kenitra',
        'Tetouan', 'Safi', 'El Jadida', 'Nador', 'Beni Mellal',
        'Khouribga', 'Taza', 'Essaouira', 'Taounate', 'Khemisset', 
        'Ouarzazate', 'Larache', 'Taroudant', 'Guelmim', 'Ksar El Kebir', 
        'Dakhla', 'Tiznit', 'Berrechid', 'Sidi Slimane', 'Asilah', 'Chefchaouen','casablanca'];

        $moneys= [ $a,'- de 2000 dh', 'de 2000 dh à 4000 dh', 'de 4000 dh à 6000 dh',
        'de 6000 dh à 8000 dh', 'de 8000 dh à 10 000 dh', 'de 10 000 dh à 15 000 dh',
        'de 15 000 dh à 20 000 dh', 'de 20 000 dh à 30 000 dh', '+ de 30 000 dh', 'A négocier'];
                
        $secteurs = [$b, 'Industrie métallurgique', 'Industrie minière', 'Industrie automobile',
        'Fabrication de machines, équipements, matériels', 'Industrie pétrolière / Pétrochimie', 'Franchise', 'Grande distribution', 'Immobilier',
        'Centres d appels', 'Comptabilité / Gestion / Audit', 'El Conseil / Consulting', 'Eau (production, distribution, traitement...)', 'Edition / Imprimerie / Reproduction',
        'Assurance', 'Audiovisuel / Presse', 'Agriculture / Chasse', 'Artisanat', 'Santé', 
        'Sports / Loisirs', 'Autres'];
        
        $etuds = [$d,'Bac', 'Bac+1', 'Bac+2',
        'Bac+3', 'Bac+5', 'Bac+5'];

        $experiences = [ $c,'Fraichement diplômé', 'Débutant (de 1 à 3 ans)', 'Junior (de 3 à 5 ans)',
        'Senior (de 5 à 7 ans)', 'Confirmé (de 7 à 10 ans)', '+ 10 ans'];



                    return view('dashboard.profile_candidat',compact('cities','moneys','secteurs','etuds','experiences'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(candidat $candidat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(candidat $candidat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $profile=User::findorFail($id);

        if(auth()->user()->role_id==1){
            if(isset($request->unsuspend)){
                
                $profile->update([
                    'suspend'=>false,
                ]);
                return redirect()->back()->with('success','vous avez unsuspende ce compte avec success');
            }

        }else{
        if(($request->image)!=NULL){

                $oldImageName = auth()->user()->image;
                $oldImageUniqueId = explode('-', $oldImageName)[0];

                $newImageName =  $oldImageUniqueId.'-candidat.jpg';
                $request->image->move(public_path('images/candidat'), $newImageName);
                
                $profile->update([
                    'email'=>$request->email,
                    'nom'=>$request->nom,
                    'prenom'=>$request->prenom,
                    't_contact'=>$request->t_contact,
                    'code_postal'=>$request->code_postal,
                    'ville'=>$request->ville,
                    'image'=>$newImageName,
        
                ]);

        }
        else{

            $profile->update([
                'email'=>$request->email,
                'nom'=>$request->nom,
                'prenom'=>$request->prenom,
                't_contact'=>$request->t_contact,
                'code_postal'=>$request->code_postal,
                'ville'=>$request->ville,
            ]);



    }


      
        return redirect('home/profile_candidat');

        }
        
    }

    /**
     * Remove the specified resource from storage.
        */
    


        
        public function destroy(Request $request,$id)
        {
            
            $user = auth()->user(); // get the currently authenticated user
    
            if (Hash::check($request->password, $user->password)) {
                // the user has entered their correct password, delete the account

                $user->delete();
                return redirect('/login')->with('error', 'Votre compte a été supprimé.');
            } else {
                // the user has entered an incorrect password, redirect back with an error message
                return back()->withErrors(['password' => 'Mot de passe incorrect.']);
            }
        }
}
