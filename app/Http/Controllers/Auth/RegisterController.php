<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Offre;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
       

        return Validator::make($data, [    
            'role_id' => ['string'],    
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:25'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'nom_societe'=>['required', 'string', 'max:255'],
            'siege_social'=>['required', 'string', 'max:255'],
            'description'=>['required', 'string'],
            'pays'=>['required', 'string', 'max:255'],
            'ville'=>['required'],
            't_contact'=>['required','string', 'max:255'],
            'telephone'=>['required','string', 'max:255'],
            'logo'=>['required'],
            'image'=>['required'],
            'code_postal'=>['required', 'string', 'max:255'],
        ]);
    }
    
    
    protected function create(array $data)
    {  
    
       
    
        if( $data['logo']!='NULL' ){
            
            $newImageName = uniqid().'-recruteure.jpg';
            $data['logo']->move(public_path('images/recruteure'), $newImageName);

            $logo=$newImageName;
            $image=$data['image'];

        $selectedVille= $data['ville'];
        $ville = implode(',', $selectedVille);

        }else{

            $newImageName = uniqid().'-candidat.jpg';
            $data['image']->move(public_path('images/candidat'), $newImageName);


                $logo=$data['logo'];
                $image=$newImageName;
                $ville = $data['ville'];;
        }

        return User::create([
        
            'role_id' => $data['role_id'],
            'nom' => $data['nom'],
            'prenom' => $data['prenom'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'nom_societe'=>$data['nom_societe'],
            'siege_social'=>$data['siege_social'],
            'description'=>$data['description'],
            'pays'=>$data['pays'],
            'ville'=>$ville ,
            't_contact'=>$data['t_contact'],
            'telephone'=>$data['telephone'],
            'logo'=>$logo,
            'image'=>$image,
            'code_postal'=>$data['code_postal'],
            'package_id'=>$data['package_id']
        
        ]);

    }

    
    public function showRegistrationForm1(){

        $cities = ['Casablanca', 'Rabat', 'Fes', 'Marrakech',
        'Agadir', 'Tangier', 'Meknes', 'Oujda', 'Kenitra',
        'Tetouan', 'Safi', 'El Jadida', 'Nador', 'Beni Mellal',
        'Khouribga', 'Taza', 'Essaouira', 'Taounate', 'Khemisset', 
        'Ouarzazate', 'Larache', 'Taroudant', 'Guelmim', 'Ksar El Kebir', 
        'Dakhla', 'Tiznit', 'Berrechid', 'Sidi Slimane', 'Asilah', 'Chefchaouen'];

        return view('auth.registerr',compact('cities'));
    }

    public function showRegistrationForm2(){
        $cities = ['Casablanca', 'Rabat', 'Fes', 'Marrakech',
        'Agadir', 'Tangier', 'Meknes', 'Oujda', 'Kenitra',
        'Tetouan', 'Safi', 'El Jadida', 'Nador', 'Beni Mellal',
        'Khouribga', 'Taza', 'Essaouira', 'Taounate', 'Khemisset', 
        'Ouarzazate', 'Larache', 'Taroudant', 'Guelmim', 'Ksar El Kebir', 
        'Dakhla', 'Tiznit', 'Berrechid', 'Sidi Slimane', 'Asilah', 'Chefchaouen'];
        return view('auth.register',compact('cities'));
    }


}
