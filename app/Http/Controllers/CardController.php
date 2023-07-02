<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Package;
use App\Models\User;
use Illuminate\Http\Request;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
       
      
        
        if($request->card=='payment'){ 
           $package=Package::findorFail($id);
           $card=Card::where('user_id',auth()->user()->id);
            $user=User::findorFail(auth()->user()->id);
            
            $montant=auth()->user()->card->montant-$package->prix;
            if($montant>=0){

                $card->update([
                    'montant'=>$montant
                ]);
                $user->update([
                    'package_id'=>$package->id,
                ]);

                return view('package.packages')->with('success','payment success !!!!!');

            }else{
                return redirect()->back()->with('error','votre montant n est pas suffisant !!!');
            }
        }else{
        
        Card::create([
            'holder'=>$request->holder,
            'card_number'=>$request->card_number,
            'expire'=>$request->expire,
            'cvv'=>$request->cvv,
            'user_id'=>auth()->user()->id
        ]);
        
        if($id==0){
            return redirect()->back();
        }
        $package=Package::findorFail($id);
        return view('package.payment',compact('package'));
        }

 
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
    public function edit($id)
    {
      
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {  

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $card=Card::findorFail($id);

        $card->delete();

        return redirect()->back()->with('msg','delete with success !!!!!!');
    }
}
