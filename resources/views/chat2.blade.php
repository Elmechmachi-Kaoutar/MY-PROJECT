


@extends('layouts.app')

@section('content')


    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <style>

.chat-history {
    height: 400px; /* Set a fixed height */
    overflow-y: scroll; /* Enable scrolling */
}
.list-chat{
            height: 400px; /* Set a fixed height */
            overflow-y: scroll; /* Enable scrolling */
        }

</style>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />




<div class="container mt-5 " >
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

    @foreach($users as $userr)

    @php
                $chats=App\Models\Chat::where('sender_id',auth()->user()->id)
                        ->where('receiver_id',$userr->id)
                        ->get();
                $sends=App\Models\Chat::where('receiver_id',auth()->user()->id)
                        ->where('sender_id',$userr->id)
                        ->get();
                $table = $chats->concat($sends)->sortBy('created_at');
    @endphp
    @foreach($table as $last_message)
    @endforeach


        <a href="{{route('send.create',$userr->id)}}">
        <li class="clearfix">
            
            @if(Auth::user()->role_id==3)
                <img src="{{asset('images/candidat/'.$userr->image)}}"  alt="avatar">
                <div class="about">
                @php
                $nom_prenom=$userr->nom.' '.$userr->prenom;
                @endphp
                <div class="name">{{\Illuminate\Support\Str::limit($nom_prenom, $limit = 13, $end = '...')}}</div>
                    <div class="status"> <i class="fa fa-circle offline"></i> {{\Illuminate\Support\Str::limit($last_message->message, $limit = 7, $end = '...')}}</div>                                            
                </div>
            @elseif(Auth::user()->role_id==2)
                <img src="{{asset('images/recruteure/'.$userr->logo)}}"  alt="avatar">
                <div class="about">
                    <div class="name">{{$userr->nom_societe}}</div>
                    <div class="status"> <i class="fa fa-circle offline"></i>{{\Illuminate\Support\Str::limit($last_message->message, $limit = 7, $end = '...')}}</div>                                            
                </div>
            @endif
    @endforeach    
            </li>
        </a> 
@endif

</ul>
                </div>

               
            </div>
    
            <div class="chat">
                <div class="chat-header  clearfix">
                    <div class="row  ">
                        <div class="col-lg-6  ">
                    
                    

                        @if(Auth::user()->role_id==3)
                        <img src="{{asset('images/candidat/'.$user->image)}}"  alt="avatar">
                        <div class="chat-about">
                                <h6 class="m-b-0">{{$user->nom}} {{$user->prenom}}</h6>
                                <small></small>
                            </div>
                        @elseif(Auth::user()->role_id==2)
                        <img src="{{asset('images/recruteure/'.$user->logo)}}"  alt="avatar">

                        <div class="chat-about">
                                <h6 class="m-b-0">{{$user->nom_societe}}</h6>
                                <small></small>
                            </div>
                        @endif

                        </div>
                    
                    </div>
                </div>
                <div class="chat-history">
    <ul class="m-b-0">
        @foreach($mergeds as $chat)
            @if(($chat->sender_id) == (Auth::user()->id))
                <li class="clearfix">
                    <div class="message bg-info float-right">
                        {!! nl2br(wordwrap($chat->message, 60, "<br>", true)) !!}
                    </div>
                </li>
            @else
                <li class="clearfix">
                    <div class="message-data">
                        <span class="message-data-time">{{ \Carbon\Carbon::parse($chat->created_at)->format('H:s') }}</span>
                    </div>
                    <div class="message my-message">
                        <p class="container">
                            {!! nl2br(wordwrap($chat->message, 60, "<br>", true)) !!}
                        </p>
                    </div>
                </li>
            @endif
        @endforeach
    </ul>
</div>

                <form action="{{route('chat.store')}}" method="post">
                    @csrf
                    <div class="chat-message clearfix">
                        <div class="input-group ">

                            <button type="submit"  name="sub"><span class="input-group-text"><i class="fa fa-send"></i></span></button>
                            <input type="text" class="form-control" placeholder="Enter text here..." name="message"> 
                            <input type="hidden" value={{$id}}  name="send"> 
                        </div>
                    </div>
                </form>     
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
        
        $(document).ready(function() {
            $('form').submit(function() {
                location.reload();
            });
        });
    </script>
    
@endsection