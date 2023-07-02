<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use App\Models\InfoCandidat;
use App\Models\Candidature;
use App\Models\User;
use Illuminate\Http\Request;



class InfoCandidatController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    

    public function index()
    {
        $cvs=InfoCandidat::get();
        return view('offre.show_cv',compact('cvs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){ 

        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([

            
            'secteur_actuel'=>'required',
            'niveau_etude'=>'required',
            'niveau_experience'=>'required',
            'remuneration_actuelle'=>'required',

            'cv'=>'required|mimes:docx,doc',
            'lettre_motivation'=>'required|mimes:docx,doc'
        ]);


        if(isset($request->cv) && isset($request->lettre_motivation)){
            
            $newcvName = uniqid().'-cv.doc';
            $request->cv->move(public_path('images/candidat/cv'), $newcvName);

            
            $newFileName = uniqid().'-lettre_motivation.doc';
            $request->lettre_motivation->move(public_path('images/candidat/lettre_motivation'), $newFileName);
            
            InfoCandidat::create([

                'secteur_actuel'=>$request->secteur_actuel,
                'niveau_etude'=>$request->niveau_etude,
                'niveau_experience'=>$request->niveau_experience,
                'remuneration_actuelle'=>$request->remuneration_actuelle,

                'cv'=> $newcvName,
                'lettre_motivation'=> $newFileName,
               
                'user_id'=>auth()->user()->id,

            ]);


                return redirect('/home/deposer-mon-cv/'. auth()->user()->id.'/edit');
            
        }

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $candidature=Candidature::where('id',$id)->first();
        $user_id=$candidature->user_id;
        $user=User::findorFail($user_id);
        $CV=$user->info;

        return view('dashboard.cv',compact('CV','id'));
    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($idCandidat)
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
        
        $user=User::where('id',$idCandidat)->first();
        if(isset($user->info)){
            $info=$user->info->id;
            return view('dashboard.info',compact('info','moneys','secteurs','etuds','experiences'));

        }else{
            $info='NULL';
            return view('dashboard.info',compact('info','moneys','secteurs','etuds','experiences'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

            $oldcvName = auth()->user()->info->cv;
            $oldLMName = auth()->user()->info->lettre_motivation;

            $oldcvUniqueId = explode('-', $oldcvName)[0];
            $oldLMUniqueId = explode('-', $oldLMName)[0];
            
            if(isset($request->cv) && isset($request->lettre_motivation)){
                $cvName =  $oldcvUniqueId.'-cv.doc';
                $request->cv->move(public_path('images/candidat/cv'), $cvName);

                $FileName = $oldLMUniqueId.'-lettre_motivation.doc';
                $request->lettre_motivation->move(public_path('images/candidat/lettre_motivation'), $FileName);
            
            $cv = InfoCandidat::where('user_id', $id);
            $cv ->update([


 
                'secteur_actuel'=>$request->secteur_actuel,
                'niveau_etude'=>$request->niveau_etude,
                'niveau_experience'=>$request->niveau_experience,
                'remuneration_actuelle'=>$request->remuneration_actuelle,

                'cv'=>$cvName,
                'lettre_motivation'=>$FileName

    
            ]);

            }elseif(isset($request->cv)){
                $cvName =  $oldcvUniqueId.'-cv.doc';
                $request->cv->move(public_path('images/candidat/cv'), $cvName);

            
            
            $cv = InfoCandidat::where('user_id', $id);
            $cv ->update([


 
                'secteur_actuel'=>$request->secteur_actuel,
                'niveau_etude'=>$request->niveau_etude,
                'niveau_experience'=>$request->niveau_experience,
                'remuneration_actuelle'=>$request->remuneration_actuelle,

                'cv'=>$cvName,
               

    
            ]);
            }elseif(isset($request->lettre_motivation)){
            

                $FileName = $oldLMUniqueId.'-lettre_motivation.doc';
                $request->lettre_motivation->move(public_path('images/candidat/lettre_motivation'), $FileName);
            
            $cv = InfoCandidat::where('user_id', $id);
            $cv ->update([



                'secteur_actuel'=>$request->secteur_actuel,
                'niveau_etude'=>$request->niveau_etude,
                'niveau_experience'=>$request->niveau_experience,
                'remuneration_actuelle'=>$request->remuneration_actuelle,

    
                'lettre_motivation'=>$FileName

    
            ]);
            }else{
                $cv = InfoCandidat::where('user_id', $id);
                $cv ->update([

                    'secteur_actuel'=>$request->secteur_actuel,
                    'niveau_etude'=>$request->niveau_etude,
                    'niveau_experience'=>$request->niveau_experience,
                    'remuneration_actuelle'=>$request->remuneration_actuelle,
    
                ]);
            }

            return redirect('home/deposer-mon-cv/'.auth()->user()->id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     */
 

    public function destroy($id)
    { 
        $info = InfoCandidat::where('user_id', $id)->first();

        $cvname = $info->cv;
        $lmname = $info->lettre_motivation;
    
        $cvPath = public_path('images/candidat/cv/' . $cvname);
        $lmPath = public_path('images/candidat/lettre_motivation/' . $lmname);

        if (File::exists($cvPath) && File::exists($lmPath)) {
            File::delete($cvPath,$lmPath);
        }

    
        $info->delete();
        return redirect('/home/profile_candidat') ;            
    }
}
