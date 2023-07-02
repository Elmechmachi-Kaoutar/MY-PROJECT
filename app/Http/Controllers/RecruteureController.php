<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\InfoCandidat;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class RecruteureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {  
       

        $selectedville=explode(',', auth()->user()->ville);
        
        $cities = ['Casablanca', 'Rabat', 'Fes', 'Marrakech',
        'Agadir', 'Tangier', 'Meknes', 'Oujda', 'Kenitra',
        'Tetouan', 'Safi', 'El Jadida', 'Nador', 'Beni Mellal',
        'Khouribga', 'Taza', 'Essaouira', 'Taounate', 'Khemisset', 
        'Ouarzazate', 'Larache', 'Taroudant', 'Guelmim', 'Ksar El Kebir', 
        'Dakhla', 'Tiznit', 'Berrechid', 'Sidi Slimane', 'Asilah', 'Chefchaouen'];

        return view('dashboard.profile_recruteure',compact('cities','selectedville'));

 
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('account.delete');
        return 'ghhhhh';
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
    public function show($id)
    {
     
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
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
            if(isset($request->hidden)){
                $profile->update([
                    'iscolaborate'=>false,
                ]);
                return redirect()->back()->with('error','vous avez annuler la collaboration avec cette entreprise');

            }elseif(isset($request->valide)){ 
                
                $profile->update([
                    'valide'=>true,
                ]);
                
                return redirect()->back()->with('success','vous avez accepter la demand d-inscription cette entreprise');  
            
            }elseif(isset($request->suspend)&&$request->suspend=='suspend'){

                $profile->update([
                    'suspend'=>true
                ]);
                return redirect()->back()->with('success','vous avez suspende ce compte');

            }elseif(isset($request->suspend)&&$request->suspend=='unsuspend'){

                $profile->update([
                    'suspend'=>false
                ]);
                return redirect()->back()->with('success','vous avez unsuspende ce compte');

            }
            else{
                $profile->update([
                    'iscolaborate'=>true,
                ]);
                return redirect()->back()->with('success','vous avez collaboré avec cette entreprise');
            }


            
        }else{
            
        
            if(($request->logo)!=NULL){
    
                    $oldImageName = auth()->user()->logo;
                    $oldImageUniqueId = explode('-', $oldImageName)[0];

                    $selectedVille= $request->input('ville',[]);
                    $ville = implode(',', $selectedVille);
    
    
    
                    $newImageName = $oldImageUniqueId.'-recruteure.jpg';
                    $request->logo->move(public_path('images/recruteure'), $newImageName);
                    
                    $profile->update([
    
                        'nom_societe'=>$request->nom_societe,
                        'siege_social'=>$request->siege_social,
                        'telephone'=>$request->telephone,
                        'code_postal'=>$request->code_postal,
                        'ville'=>$ville,
                        'description'=>$request->description,
    
                        'logo'=>$newImageName,
    
                        'nom'=>$request->nom,
                        'prenom'=>$request->prenom,
                        't_contact'=>$request->t_contact,
    
                    ]);
    
            }
            else{
    

                
                $selectedVille= $request->input('ville',[]);
                $ville = implode(',', $selectedVille);

                $profile->update([
    
                    'nom_societe'=>$request->nom_societe,
                    'siege_social'=>$request->siege_social,
                    'telephone'=>$request->telephone,
                    'code_postal'=>$request->code_postal,
                    'ville'=>$ville,
                    'description'=>$request->description,
    
                    'nom'=>$request->nom,
                    'prenom'=>$request->prenom,
                    't_contact'=>$request->t_contact,
    
                ]);
    
    
    
        }          
            return redirect('home/profile_recruteure');

        }
    
    }


    /**
     * Remove the specified resource from storage.
     */
 
    public function destroy(Request $request,$id)
    {

        $user = User::findorFail($id); // get the currently authenticated user

            if((auth()->user()->role_id)==1){

                if ( Hash::check($request->password, auth()->user()->password)  ) {
                    // the user has entered their correct password, delete the account
                    $user->delete();
                    if($user->role_id==3){
                        return redirect('/home/admin/recruteurs')->with('success', 'le compte a été supprimé.');
                    } return redirect('/home/admin/candidats')->with('success', 'le compte a été supprimé.');
                } else {
                    // the user has entered an incorrect password, redirect back with an error message
                    return back()->withErrors(['password' => 'Mot de passe incorrect']);
                }

            }else{ 

               

                if (Hash::check($request->password, $user->password) ) {

                    $profilePictureFullPath=$user->logo;
                    if (File::exists($profilePictureFullPath)) {
                        File::delete($profilePictureFullPath);
                    }
    
                    // the user has entered their correct password, delete the account
                    $user->delete();
                    return redirect('/login')->with('error', 'Your account has been deleted.');
                } else {
                    // the user has entered an incorrect password, redirect back with an error message
                    return back()->withErrors(['password' => 'Incorrect password.']);
                }
            }
                

    }
}
