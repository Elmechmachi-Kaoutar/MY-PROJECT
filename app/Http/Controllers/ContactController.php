<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Chat;
use Illuminate\Http\Request;

class ContactController extends Controller
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
    public function store(Request $request,$candidat_id)
    {
        Contact::create([
            'candidat_id'=>$candidat_id,
            'recruteure_id'=>auth()->user()->id,
        ]);

        Chat::create([
            'message'=>'Votre profil nous intéresse vivement pour un poste dans notre entreprise. Nous souhaitons vous inviter à une entrevue afin de discuter de votre candidature en détail.

            Nous vous contacterons rapidement pour fixer une date d entrevue. Si vous avez des questions, n hésitez pas à nous contacter.
            
            Cordialement,',
            'sender_id'=>auth()->user()->id,
            'receiver_id'=>$candidat_id,
        ]);

        return redirect('/home/chat');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
