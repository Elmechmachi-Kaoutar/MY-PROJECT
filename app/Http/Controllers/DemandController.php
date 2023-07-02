<?php

namespace App\Http\Controllers;

use App\Models\Demand;
use App\Models\Package;
use Illuminate\Http\Request;

class DemandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { if(auth()->user()->role_id==3){ 
        $package=Package::findorFail((auth()->user()->package_id));
        $demands=Demand::where('user_id',(auth()->user()->id))->get();
        return view('demand.show_offre',compact('demands','package'));
    }
    elseif(auth()->user()->role_id==1){

        $etats=['treatment de CVS','les entretiens','envoi le candidat'];
        $demands=Demand::get();
        return view('admin.demand.show_demand',compact('demands','etats'));
    }
       


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cities = [  'Rabat', 'Fes', 'Marrakech',
        'Agadir', 'Tangier', 'Meknes', 'Oujda', 'Kenitra',
        'Tetouan', 'Safi', 'El Jadida', 'Nador', 'Beni Mellal',
        'Khouribga', 'Taza', 'Essaouira', 'Taounate', 'Khemisset', 
        'Ouarzazate', 'Larache', 'Taroudant', 'Guelmim', 'Ksar El Kebir', 
        'Dakhla', 'Tiznit', 'Berrechid', 'Sidi Slimane', 'Asilah', 'Chefchaouen','casablanca'];

        $salaires= [ '- de 2000 dh', 'de 2000 dh à 4000 dh', 'de 4000 dh à 6000 dh',
        'de 6000 dh à 8000 dh', 'de 8000 dh à 10 000 dh', 'de 10 000 dh à 15 000 dh',
        'de 15 000 dh à 20 000 dh', 'de 20 000 dh à 30 000 dh', '+ de 30 000 dh', 'A négocier'];
                
        $secteurs = [ 'Industrie métallurgique', 'Industrie minière', 'Industrie automobile',
        'Fabrication de machines, équipements, matériels', 'Industrie pétrolière / Pétrochimie', 'Franchise', 'Grande distribution', 'Immobilier',
        'Centres d appels', 'Comptabilité / Gestion / Audit', 'El Conseil / Consulting', 'Eau (production, distribution, traitement...)', 'Edition / Imprimerie / Reproduction',
        'Assurance', 'Audiovisuel / Presse', 'Agriculture / Chasse', 'Artisanat', 'Santé', 
        'Sports / Loisirs', 'Autres'];
        
        $etuds = ['Bac', 'Bac+1', 'Bac+2',
        'Bac+3', 'Bac+5', 'Bac+8'];

        $experiences = ['Fraichement diplômé', 'Débutant (de 1 à 3 ans)', 'Junior (de 3 à 5 ans)',
        'Senior (de 5 à 7 ans)', 'Confirmé (de 7 à 10 ans)', '+ 10 ans'];

        $type_contrats=['CDD','CDI','STAGAIRE','FREELANCE'];

        $langues=['francais','anglais','arabe','espagnol'];
        $demands=Demand::where('user_id',(auth()->user()->id))->get();
        $package=Package::findorFail((auth()->user()->package_id));
        $nb_demand=count($demands);
        return view('demand.create_offre',compact('cities','package','nb_demand','salaires','secteurs','etuds','experiences','type_contrats','langues'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $selectedLangue= $request->input('langues',[]);
        $langue = implode(',', $selectedLangue);

        $selectedVille= $request->input('ville',[]);
        $ville = implode(',', $selectedVille);
 
            Demand::create([
    
                'ville'=>$ville,
                'secteur'=>$request->input('secteur'),
    
                'title'=>$request->input('title'),
                'description'=>$request->input('description'),
                'salaire'=>$request->input('salaire'),
                'type_contrat'=>$request->input('type_contrat'),
                'niveau_etude'=>$request->input('niveau_etude'),
                'niveau_experience'=>$request->input('niveau_experience'),
                'langue'=>  $langue,
                'etat'=>'',
                'user_id'=>auth()->user()->id
    
            ]);
            $demands=Demand::where('user_id',(auth()->user()->id))->get();
       
            return redirect('home/demand')->with('demands')->with('message', 'votre demande a été ajouté avec succès !');    }

    /**
     * Display the specified resource.
     */
    public function show(Demand $demand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($offre_id)
    {  $offre=Demand::findorFail($offre_id);
        if(auth()->user()->role_id==3){
           
        $selectedville=explode(',', $offre->ville);
        $selectedlangue=explode(',', $offre->langue);
        $cities = ['Rabat', 'Fes', 'Marrakech',
        'Agadir', 'Tangier', 'Meknes', 'Oujda', 'Kenitra',
        'Tetouan', 'Safi', 'El Jadida', 'Nador', 'Beni Mellal',
        'Khouribga', 'Taza', 'Essaouira', 'Taounate', 'Khemisset', 
        'Ouarzazate', 'Larache', 'Taroudant', 'Guelmim', 'Ksar El Kebir', 
        'Dakhla', 'Tiznit', 'Berrechid', 'Sidi Slimane', 'Asilah', 'Chefchaouen','casablanca'];

        $salaires= [ $offre->salaire,'- de 2000 dh', 'de 2000 dh à 4000 dh', 'de 4000 dh à 6000 dh',
        'de 6000 dh à 8000 dh', 'de 8000 dh à 10 000 dh', 'de 10 000 dh à 15 000 dh',
        'de 15 000 dh à 20 000 dh', 'de 20 000 dh à 30 000 dh', '+ de 30 000 dh', 'A négocier'];
                
        $secteurs = [ $offre->secteur, 'Industrie métallurgique', 'Industrie minière', 'Industrie automobile',
        'Fabrication de machines, équipements, matériels', 'Industrie pétrolière / Pétrochimie', 'Franchise', 'Grande distribution', 'Immobilier',
        'Centres d appels', 'Comptabilité / Gestion / Audit', 'El Conseil / Consulting', 'Eau (production, distribution, traitement...)', 'Edition / Imprimerie / Reproduction',
        'Assurance', 'Audiovisuel / Presse', 'Agriculture / Chasse', 'Artisanat', 'Santé', 
        'Sports / Loisirs', 'Autres'];
        
        $etuds = [ $offre->niveau_etude ,'Bac', 'Bac+1', 'Bac+2',
        'Bac+3', 'Bac+5', 'Bac+8'];

        $experiences = [ $offre->niveau_experience,'Fraichement diplômé', 'Débutant (de 1 à 3 ans)', 'Junior (de 3 à 5 ans)',
        'Senior (de 5 à 7 ans)', 'Confirmé (de 7 à 10 ans)', '+ 10 ans'];

        $type_contrats=[ $offre->type_contrat,'CDD','CDI','STAGAIRE','FREELANCE'];

        $langues=['francais','anglais','arabe','espagnol'];

        return view('demand.edit',compact('offre','cities','salaires','secteurs','etuds','experiences','type_contrats','langues','selectedville','selectedlangue'));
    }
    elseif(auth()->user()->role_id==1){
        return view('admin.demand.edit',compact('offre'));
    }
        }
        

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$offre_id)
    {
        $demand=Demand::findorFail($offre_id);
        if(auth()->user()->role_id==3){
            $selectedLangue= $request->input('langues',[]);
            $langue = implode(',', $selectedLangue);
    
            $selectedVille= $request->input('ville',[]);
            $ville = implode(',', $selectedVille);
    
            $demand->update([
                'ville'=>$ville,
                'secteur'=>$request->secteur,
                'title'=>$request->title,
                'description'=>$request->description,
                'langue'=>$langue,
                'niveau_etude'=>$request->niveau_etude,
                'type_contrat'=>$request->type_contrat,
                'niveau_experience'=>$request->niveau_experience,
                'salaire'=>$request->salaire
    
            ]);
            $demands=Demand::where('user_id',(auth()->user()->id))->get();
           
            return redirect('home/demand')->with('demands')->with('message', 'votre demande a été modifié avec succès !');    
    
        }
        elseif(auth()->user()->role_id==1){


            $demand = Demand::findOrFail($offre_id);
    
    $demand->etat = $request->etat;
    $demand->save();

    $demands = Demand::get();

    return redirect('home/demand')->with('demands', $demands)->with('message', 'Votre demande a été modifiée avec succès!');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($offre_id)
    {
        $demand=Demand::findorFail($offre_id)->delete();
        $demands=Demand::where('user_id',(auth()->user()->id))->get();
       
        return redirect('home/demand')->with('demands')->with('message', 'votre demande a été supprimé avec succès !');    }

    
}