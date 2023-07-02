<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offre;
use App\Models\User;
class SearchBarController extends Controller
{


    public function rechercher(Request $request){

     
        
    $cities = [ 'Casablanca' , 'Rabat', 'Fes', 'Marrakech',
    'Agadir', 'Tangier', 'Meknes', 'Oujda', 'Kenitra',
    'Tetouan', 'Safi', 'El Jadida', 'Nador', 'Beni Mellal',
    'Khouribga', 'Taza', 'Essaouira', 'Taounate', 'Khemisset', 
    'Ouarzazate', 'Larache', 'Taroudant', 'Guelmim', 'Ksar El Kebir', 
    'Dakhla', 'Tiznit', 'Berrechid', 'Sidi Slimane', 'Asilah', 'Chefchaouen','casablanca'];

    $secteurs = [ '','Industrie métallurgique', 'Industrie minière', 'Industrie automobile',
    'Fabrication de machines, équipements, matériels', 'Industrie pétrolière / Pétrochimie', 'Franchise', 'Grande distribution', 'Immobilier',
    'Centres d appels', 'Comptabilité / Gestion / Audit', 'El Conseil / Consulting', 'Eau (production, distribution, traitement...)', 'Edition / Imprimerie / Reproduction',
    'Assurance', 'Audiovisuel / Presse', 'Agriculture / Chasse', 'Artisanat', 'Santé', 
    'Sports / Loisirs', 'Autres'];

    $contrats = ['','CDD','CDI','STAGAIRE','FREELANCE'];
    $toute_offres = Offre::get();
    $offres = Offre::orderBy('created_at', 'desc')->take(4)->get();
    $societes = User::where('role_id','3')->get();

    if ($request->ville && $request->secteur && $request->type_contrat) {
        
        $result = collect();
        foreach ($request->ville as $ville) {
            foreach ($request->type_contrat as $type) {
                foreach ($request->secteur as $secteur) {
                    $offres = Offre::where('type_contrat', 'like', '%' . $type . '%')
                        ->where('ville', 'like', '%' . $ville . '%')
                        ->where('secteur', 'like', '%' . $secteur . '%')
                        ->get();
                    $result = $result->concat($offres);
                }
            }
        }
        
    
    }

    elseif($request->ville && $request->secteur ){    
        $result = collect();
        foreach ($request->ville as $ville) {
            foreach ($request->secteur as $secteur) {
            $offres= Offre::where('ville', 'like','%'.$ville.'%')
                            ->where('secteur','like','%'.$secteur.'%')
                            ->get();

            $result = $result->concat($offres);
        }
    }
    
    }

    elseif($request->ville && $request->type_contrat ){
        $result = collect();
        foreach ($request->ville as $ville){
            $offres= Offre::where('ville', 'like','%'.$ville.'%')->where('type_contrat',$request->type_contrat)->get();
            $result = $result->concat($offres);
        }
        
    
    }

    elseif($request->type_contrat && $request->secteur ){
        $result = collect();
        foreach ($request->type_contrat as $type){
            foreach ($request->secteur as $secteur) {
            $offres= Offre::where('type_contrat', 'like','%'.$type.'%')->where('secteur','like','%'.$secteur.'%')->get();
            $result = $result->concat($offres);
        }
    }
        
    
    }

    elseif($request->secteur){
        $result = collect();
        foreach ($request->secteur as $secteur) {
        $offres=Offre::where('secteur','like','%'.$secteur.'%')->get();
        $result = $result->concat($offres);
    }
    }

    elseif($request->ville){
        $result = collect();
        foreach ($request->ville as $ville) {
            $offres= Offre::where('ville', 'like','%'.$ville.'%')->get();
            $result = $result->concat($offres);
        }
        
    
    }

    elseif($request->type_contrat){

        $result = collect();
        foreach ($request->type_contrat as $type){
            $offres= Offre::where('type_contrat', 'like','%'.$type.'%')->get();
            $result = $result->concat($offres);
        }
        
    
    } else{

        return redirect()->back()->with('msg','jjj');
    } 
    $result = $result->unique();
    return view('offre.rechercher', compact('result', 'contrats', 'cities', 'toute_offres','secteurs'));
    }
    
}
