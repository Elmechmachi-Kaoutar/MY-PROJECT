<?php

namespace App\Http\Controllers;
use App\Models\Candidature;
use App\Models\InfoCandidat;
use App\Models\User;
use Illuminate\Http\Request;

class CandidatureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id){
        
        $moneys= [ '----','- de 2000 dh', 'de 2000 dh à 4000 dh', 'de 4000 dh à 6000 dh',
        'de 6000 dh à 8000 dh', 'de 8000 dh à 10 000 dh', 'de 10 000 dh à 15 000 dh',
        'de 15 000 dh à 20 000 dh', 'de 20 000 dh à 30 000 dh', '+ de 30 000 dh', 'A négocier'];
                
        $secteurs = ['----','Industrie métallurgique', 'Industrie minière', 'Industrie automobile',
        'Fabrication de machines, équipements, matériels', 'Industrie pétrolière / Pétrochimie', 'Franchise', 'Grande distribution', 'Immobilier',
        'Centres d appels', 'Comptabilité / Gestion / Audit', 'El Conseil / Consulting', 'Eau (production, distribution, traitement...)', 'Edition / Imprimerie / Reproduction',
        'Assurance', 'Audiovisuel / Presse', 'Agriculture / Chasse', 'Artisanat', 'Santé', 
        'Sports / Loisirs', 'Autres'];
        
        $etuds = ['----','Bac', 'Bac+1', 'Bac+2',
        'Bac+3', 'Bac+5', 'Bac+5'];

        $experiences = ['----','Fraichement diplômé', 'Débutant (de 1 à 3 ans)', 'Junior (de 3 à 5 ans)',
        'Senior (de 5 à 7 ans)', 'Confirmé (de 7 à 10 ans)', '+ 10 ans'];
        
        if(isset(auth()->user()->info)){
            return redirect('home/offre/'.$id)->with('success', 'vous avez postuler a cette offre avec succe');

        }
        return view('candidature.form',compact('id','moneys','secteurs','etuds','experiences'));

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
    public function store(Request $request,$id)
    {
      
        Candidature::create([
            'info_candidat_id'=> auth()->user()->info->id ,
            'user_id'=> auth()->user()->id,
            'offre_id'=> $id,

        ]);

        return redirect('/home/offre/'.$id.'/send');


        
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Candidature $candidature)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update()
    {
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Candidature $candidature)
    {
        //
    }
}
