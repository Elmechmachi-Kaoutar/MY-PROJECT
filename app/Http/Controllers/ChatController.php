<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    


        if(auth()->user()->role_id==3){

            $contacts=Contact::where('recruteure_id',auth()->user()->id)->get();
                foreach($contacts as $contact){
                    $users_id[]=$contact->candidat_id;
                }
                
        }elseif(auth()->user()->role_id==2){
            
            $contacts=Contact::where('candidat_id',auth()->user()->id)->get();
                foreach($contacts as $contact){
                    $users_id[]=$contact->recruteure_id;
                }
        }

    // *************************************************************

        if(isset($users_id)){
            foreach($users_id as $user_id){
                $users[]=User::where('id',$user_id)->first();
            }
        }else{
            $users=NULL;
        }


        return view('chat',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request,$id)
    {
        
        if(auth()->user()->role_id==3){

            $contacts=Contact::where('recruteure_id',auth()->user()->id)->get();
                foreach($contacts as $contact){
                    $users_id[]=$contact->candidat_id;
                }
                
        }elseif(auth()->user()->role_id==2){
            
            $contacts=Contact::where('candidat_id',auth()->user()->id)->get();
                foreach($contacts as $contact){
                    $users_id[]=$contact->recruteure_id;
                }
        }

        if(isset($users_id)){
            foreach($users_id as $user_id){
                $users[]=User::where('id',$user_id)->first();
            }
        }else{
            $users=NULL;
        }


        // $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$


        $user=User::where('id',$id)->first();
        
        $chats=Chat::where('sender_id',auth()->user()->id)
                    ->where('receiver_id',$id)
                    ->get();

        $sends=Chat::where('receiver_id',auth()->user()->id)
                    ->where('sender_id',$id)
                    ->get();

        $mergeds = $chats->concat($sends)->sortBy('created_at');


        return view('chat2',compact('mergeds','id','user','users'));
    }
  

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Chat::create([
            
            'message'=>$request->message,
            'sender_id'=>auth()->user()->id,
            'receiver_id'=>$request->send,

        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Chat $chat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chat $chat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chat $chat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chat $chat)
    {
        //
    }
}
