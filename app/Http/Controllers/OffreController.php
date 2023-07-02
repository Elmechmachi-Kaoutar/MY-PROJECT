<?php

namespace App\Http\Controllers;

use App\Models\Candidature;
use App\Models\Offre;
use Illuminate\Http\Request;

class OffreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
            $cities = ['Rabat', 'Fes', 'Marrakech',
            'Agadir', 'Tangier', 'Meknes', 'Oujda', 'Kenitra',
            'Tetouan', 'Safi', 'El Jadida', 'Nador', 'Beni Mellal',
            'Khouribga', 'Taza', 'Essaouira', 'Taounate', 'Khemisset', 
            'Ouarzazate', 'Larache', 'Taroudant', 'Guelmim', 'Ksar El Kebir', 
            'Dakhla', 'Tiznit', 'Berrechid', 'Sidi Slimane', 'Asilah', 'Chefchaouen','casablanca'];
    
            $contrats = ['CDD','CDI','STAGAIRE','FREELANCE'];
            $toute_offres = Offre::get();

            $secteurs = [ '','Industrie métallurgique', 'Industrie minière', 'Industrie automobile',
            'Fabrication de machines, équipements, matériels', 'Industrie pétrolière / Pétrochimie', 'Franchise', 'Grande distribution', 'Immobilier',
            'Centres d appels', 'Comptabilité / Gestion / Audit', 'El Conseil / Consulting', 'Eau (production, distribution, traitement...)', 'Edition / Imprimerie / Reproduction',
            'Assurance', 'Audiovisuel / Presse', 'Agriculture / Chasse', 'Artisanat', 'Santé', 
            'Sports / Loisirs', 'Autres'];

            

            if((auth()->user()->role_id)==3){

            $offres=Offre::where('user_id',(auth()->user()->id))->get();
            $candidatures=Candidature::get();

        
            return view('offre.show_offre',compact('offres','candidatures'));
            



        }elseif((auth()->user()->role_id)==2){
            
            $offres=Offre::get();
            return view('offre.show_offre',compact('offres','cities','contrats','toute_offres','secteurs'));
    

        }
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {  

        $cities = ['Rabat', 'Fes', 'Marrakech',
        'Agadir', 'Tangier', 'Meknes', 'Oujda', 'Kenitra',
        'Tetouan', 'Safi', 'El Jadida', 'Nador', 'Beni Mellal',
        'Khouribga', 'Taza', 'Essaouira', 'Taounate', 'Khemisset', 
        'Ouarzazate', 'Larache', 'Taroudant', 'Guelmim', 'Ksar El Kebir', 
        'Dakhla', 'Tiznit', 'Berrechid', 'Sidi Slimane', 'Asilah', 'Chefchaouen','casablanca'];

        $salaires= ['', '- de 2000 dh', 'de 2000 dh à 4000 dh', 'de 4000 dh à 6000 dh',
        'de 6000 dh à 8000 dh', 'de 8000 dh à 10 000 dh', 'de 10 000 dh à 15 000 dh',
        'de 15 000 dh à 20 000 dh', 'de 20 000 dh à 30 000 dh', '+ de 30 000 dh', 'A négocier'];
                
        $secteurs = [ '','Industrie métallurgique', 'Industrie minière', 'Industrie automobile',
        'Fabrication de machines, équipements, matériels', 'Industrie pétrolière / Pétrochimie', 'Franchise', 'Grande distribution', 'Immobilier',
        'Centres d appels', 'Comptabilité / Gestion / Audit', 'El Conseil / Consulting', 'Eau (production, distribution, traitement...)', 'Edition / Imprimerie / Reproduction',
        'Assurance', 'Audiovisuel / Presse', 'Agriculture / Chasse', 'Artisanat', 'Santé', 
        'Sports / Loisirs', 'Autres'];
        
        $etuds = ['','Bac', 'Bac+1', 'Bac+2',
        'Bac+3', 'Bac+5', 'Bac+8'];

        $experiences = ['','Fraichement diplômé', 'Débutant (de 1 à 3 ans)', 'Junior (de 3 à 5 ans)',
        'Senior (de 5 à 7 ans)', 'Confirmé (de 7 à 10 ans)', '+ 10 ans'];

        $type_contrats=['','CDD','CDI','STAGAIRE','FREELANCE'];

        $langues=['','francais','anglais','arabe','espagnol'];

        return view('offre.create_offre',compact('cities','salaires','secteurs','etuds','experiences','type_contrats','langues'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
          
        

        $selectedLangue= $request->input('cities',[]);
        $langue = implode(',', $selectedLangue);

        $selectedVille= $request->input('ville',[]);
        $ville = implode(',', $selectedVille);
 
            Offre::create([
    
                'ville'=>$ville,
                'secteur'=>$request->input('secteur'),
    
                'title'=>$request->input('title'),
                'description'=>$request->input('description'),
                'salaire'=>$request->input('salaire'),
                'type_contrat'=>$request->input('type_contrat'),
                'niveau_etude'=>$request->input('niveau_etude'),
                'niveau_experience'=>$request->input('niveau_experience'),
                'langue'=>  $langue,
                'user_id'=>auth()->user()->id
    
            ]);
            
        
        

        $lastCreatedAt = Offre::where('user_id',(auth()->user()->id))->orderBy('created_at', 'desc')->first();
    $msg='loffre a été enregistré avec succés';
  
        return  view('dashboard.recruteure',compact('lastCreatedAt','msg'));

    }

    /**
     * Display the specified resource.
     */
    public function show(Offre $offre)
    {
        return view('dashboard.offre',compact('offre'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($offre_id)
    {
        $offre=Offre::findorFail($offre_id);

        $selectedville=explode(',', $offre->ville);
        $selectedlangue=explode(',', $offre->langue);

//  *****************************************************************************

        $salaires= [$offre->salaire, '- de 2000 dh', 'de 2000 dh à 4000 dh', 'de 4000 dh à 6000 dh',
        'de 6000 dh à 8000 dh', 'de 8000 dh à 10 000 dh', 'de 10 000 dh à 15 000 dh',
        'de 15 000 dh à 20 000 dh', 'de 20 000 dh à 30 000 dh', '+ de 30 000 dh', 'A négocier'];
                
        $secteurs = [ $offre->secteur,'Industrie métallurgique', 'Industrie minière', 'Industrie automobile',
        'Fabrication de machines, équipements, matériels', 'Industrie pétrolière / Pétrochimie', 'Franchise', 'Grande distribution', 'Immobilier',
        'Centres d appels', 'Comptabilité / Gestion / Audit', 'El Conseil / Consulting', 'Eau (production, distribution, traitement...)', 'Edition / Imprimerie / Reproduction',
        'Assurance', 'Audiovisuel / Presse', 'Agriculture / Chasse', 'Artisanat', 'Santé', 
        'Sports / Loisirs', 'Autres'];
        
        $etuds = [ $offre->niveau_etude,'Bac', 'Bac+1', 'Bac+2',
        'Bac+3', 'Bac+5', 'Bac+8'];

        $experiences = [ $offre->niveau_experience,'Fraichement diplômé', 'Débutant (de 1 à 3 ans)', 'Junior (de 3 à 5 ans)',
        'Senior (de 5 à 7 ans)', 'Confirmé (de 7 à 10 ans)', '+ 10 ans'];

        $type_contrats=[ $offre->type_contrat,'CDD','CDI','STAGAIRE','FREELANCE'];

//  *****************************************************************************
        $cities = ['Rabat', 'Fes', 'Marrakech',
        'Agadir', 'Tangier', 'Meknes', 'Oujda', 'Kenitra',
        'Tetouan', 'Safi', 'El Jadida', 'Nador', 'Beni Mellal',
        'Khouribga', 'Taza', 'Essaouira', 'Taounate', 'Khemisset', 
        'Ouarzazate', 'Larache', 'Taroudant', 'Guelmim', 'Ksar El Kebir', 
        'Dakhla', 'Tiznit', 'Berrechid', 'Sidi Slimane', 'Asilah', 'Chefchaouen','casablanca'];
        $langues=['francais','anglais','arabe','espagnol'];

        return view('offre.edit',compact('offre','cities','salaires','secteurs','etuds','experiences','type_contrats','langues','selectedville','selectedlangue'));

    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $offre_id)
    {
        $offre=Offre::findorFail($offre_id);

        $selectedLangue= $request->input('cities',[]);
        $langue = implode(',', $selectedLangue);

        $selectedVille= $request->input('ville',[]);
        $ville = implode(',', $selectedVille);
 

        $offre->update([

            'title'=>$request->title,
            'description'=>$request->description,
            'langue'=>$request->langue,
            'niveau_etude'=>$request->niveau_etude,
            'type_contrat'=>$request->type_contrat,
            'niveau_experience'=>$request->niveau_experience,
            'salaire'=>$request->salaire,
            'ville'=>$ville,
            'secteur'=>$request->input('secteur'),
            'langue'=>  $langue,

        ]);
        return redirect('/home/offre/'.$offre_id.'/edit')->with('message','l offre a été modifié avec succes !');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,$offre_id)
    {
        $offre=Offre::findorFail($offre_id)->delete();

        if($request->submit==2){
            return redirect('home/offre')->with('message',"l'offre a été supprimée avec succés");

        }elseif($request->submit==1){
            return redirect('home')->with('message',"l'offre a été supprimée avec succés");
        }

    }
}
