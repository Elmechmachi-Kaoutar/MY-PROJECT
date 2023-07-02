


@extends('layouts.app')

@section('content')
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

    <style>

        .chat-history {
            height: 400px; /* Set a fixed height */
         
        }
        .list-chat{
            height: 330px; /* Set a fixed height */
            overflow-y: scroll; /* Enable scrolling */
        }
    
     
    

    </style>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

<div class="container  mt-5 " >
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card chat-app">
        <div id="plist" class="people-list">
                <div class="input-group mb-3  ">
                    <div class="input-group-prepend "  >
                  <span class="input-group-text"><span class="input-group-text"><i class="fa fa-search"></i></span>
                    </div>
                    <input type="text" class="form-control " placeholder="Search...">
                </div>

      <div class="list-chat">
      <ul class="list-unstyled chat-list mt-2 mb-0">

@if($users)

    @foreach($users as $user)
    <a href="{{route('send.create',$user->id)}}">

            @php
                $chats=App\Models\Chat::where('sender_id',auth()->user()->id)
                        ->where('receiver_id',$user->id)
                        ->get();
                $sends=App\Models\Chat::where('receiver_id',auth()->user()->id)
                        ->where('sender_id',$user->id)
                        ->get();
                $mergeds = $chats->concat($sends)->sortBy('created_at');
            @endphp
            @foreach($mergeds as $chat)
            @endforeach

    <li class="clearfix">
        @if(Auth::user()->role_id==3)
        <img src="{{asset('images/candidat/'.$user->image)}}"  alt="avatar">
        <div class="about">
            @php
            $nom_prenom=$user->nom.' '.$user->prenom;
            @endphp
            <div class="name">{{\Illuminate\Support\Str::limit($nom_prenom, $limit = 13, $end = '...')}}</div>

           
      

            <div class="status"> <i class="fa fa-circle offline"></i> {{\Illuminate\Support\Str::limit($chat->message, $limit = 12, $end = '...')}} </div>                                            
        </div>
        @elseif(Auth::user()->role_id==2)
        <img src="{{asset('images/recruteure/'.$user->logo)}}"  alt="avatar">
        <div class="about">
            <div class="name">{{$user->nom_societe}}</div>
            <div class="status"> <i class="fa fa-circle offline"></i> {{\Illuminate\Support\Str::limit($chat->message, $limit = 12, $end = '...')}} </div>                                            
        </div>

        @endif
        
    </li>
    </a>
    @endforeach
@endif
</ul>
</div>
</div>

    
        <div class="chat">
            <div class="chat-header clearfix"> 
                <div class="row">
                    <div class="col-lg-6">
                    </div>
                </div>
                <div class="chat-history">

                    <ul class=" d-flex justify-content-center mb-2 mt-5   ">
                    <img class="image-chat " src="{{asset('images/home/chat.webp')}}"  alt="avatar">
                    </ul>
                  
                    <ul class="m-b-0 text-center textt">  <h1 class="mb-3">CHAT</h1>
                    Notre fonctionnalité de chat intégrée est un outil puissant qui facilite la communication instantanée entre les candidats et les recruteurs sur notre site d'emploi. Grâce à notre chat, les utilisateurs peuvent échanger en temps réel, permettant aux candidats de déposer leurs qualifications et aux recruteurs d'interagir directement avec les talents potentiels. En simplifiant le processus d'embauche, notre conversation favorise une communication transparente et efficace pour une expérience optimale pour chacun.                    </ul>

                    

                    
                </div>    
            </div>
        </div>

    </div>
</div>
</div>

<script>
        window.onload = function() {
        // get the chat history element
        var chatHistory = document.querySelector(".chat-history");

        // scroll to the bottom of the chat history
        chatHistory.scrollTop = chatHistory.scrollHeight;
        };
    </script>


@endsection

