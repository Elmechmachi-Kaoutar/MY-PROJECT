<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidature;
class ShowCandidateureController extends Controller
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
    public function show( $id)
    {   
        $role_id=auth()->user()->role_id;
        $user_id=auth()->user()->id;

        if($role_id==3){
            $candidatures=Candidature::where('offre_id',$id)->get();
            return view('candidature.show_candidature',compact('candidatures','id'));
        }
        if($role_id==2){
            $candidatures=Candidature::where('user_id',$user_id)->get();
            return view('candidature.show_candidature',compact('candidatures'));
        }
        }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return $id;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {

        $candidateure=Candidature::findorFail($id);
        $candidateure->update([
                'valider'=>TRUE,
        ]);  
        
        return redirect('/home/offre/show_candidature/'.$id.'/send');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $candidature=Candidature::findorFail($id);

        if($candidature){
            $candidature->delete();
        }

        return redirect('/home/offre/show_candidature/'.auth()->user()->id);
    }
}
