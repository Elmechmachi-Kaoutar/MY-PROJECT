

@if(Auth::check())

<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
<div class="sidebar close d-none mt-4 d-lg-block d-md-block">
    <div class="logo-details mt-5">
    <i class='bx bx-menu' ></i>
    
      
    </div>
    <ul class="nav-links">
      <li>
        <a href="/home">
          <i class='bx bx-grid-alt' ></i>
          <span class="link_name">tableau de bord</span> 
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="/home">tableau de bord</a></li>
        </ul>
</li>     
      <li>
        <a href="{{route('profile_candidat.index')}}">
        <i class='bx bx-user-circle'></i>
          <span class="link_name">Profil</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="{{route('profile_candidat.index')}}">Profil</a></li>
        </ul>
      </li>
      @php
        $id = auth()->user()->id;
      $cvExists = \App\Models\InfoCandidat::where('user_id', $id)->exists();
    @endphp

    @if($cvExists)
      <li>
        <a href="{{route('deposer-mon-cv.edit',Auth::user()->id)}}">
        <i class='bx bx-id-card'></i>
          <span class="link_name">Mon CV</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="{{route('deposer-mon-cv.edit',Auth::user()->id)}}">Mon CV</a></li>
        </ul>
      </li>
      @else
      <li>
        <a href="{{route('deposer-mon-cv.edit',Auth::user()->id)}}">
        <i class='bx bx-id-card'></i>
          <span class="link_name">deposer CV</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="{{route('deposer-mon-cv.edit',Auth::user()->id)}}">deposer CV</a></li>
        </ul>
      </li>
      @endif


      <li>
        <a href="{{route('show_candidature.show',Auth::user()->id)}}">
        <i class='bx bx-briefcase-alt'></i>
          <span class="link_name">Mes candidateures</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="{{route('show_candidature.show',Auth::user()->id)}}">Mes candidateures</a></li>
        </ul>
      </li>
      <li>
        <a href="{{route('offre.index')}}">
        <i class='bx bx-book-content'></i>
          <span class="link_name">Tout les Offres</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="{{route('offre.index')}}">Tout les Offres</a></li>
        </ul>
      </li>
      
      <li>
        <a href="{{route('chat.index')}}">
        <i class='bx bx-chat'></i>
          <span class="link_name">Chat</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="{{route('chat.index')}}">Chat</a></li>
        </ul>
      </li>
      

      <li>
    <div class="profile-details">
      <div class="profile-content">
        <a href="{{route('profile_candidat.index')}}"><img src="{{ asset('images/candidat/'. Auth::user()->image) }}" alt="profileImg"></a>
      </div>
      <div class="name-job">
        <div class="profile_name">{{ Auth::user()->nom }}</div>
        
      </div>

      <a class="dropdown-item text text-primary" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        <i class='bx bx-log-out' ></i>
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
     
    </div>
  </li>
</ul>
  </div>
  <script>
  let arrow = document.querySelectorAll(".arrow");
  for (var i = 0; i < arrow.length; i++) {
    arrow[i].addEventListener("click", (e)=>{
   let arrowParent = e.target.parentElement.parentElement;//selecting main parent of arrow
   arrowParent.classList.toggle("showMenu");
    });
  }
  let sidebar = document.querySelector(".sidebar");
  let sidebarBtn = document.querySelector(".bx-menu");
  console.log(sidebarBtn);
  sidebarBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("close");
  });
  </script>
    @endif