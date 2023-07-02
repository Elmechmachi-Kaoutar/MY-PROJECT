
@php
  $valide=Auth::user()->valide
@endphp

<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
<div class="sidebar mt-5 close d-none d-lg-block d-md-block">
    <div class="logo-details mt-4">
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
        <a href="{{route('profile_recruteure.index')}}">
        <i class='bx bx-user-circle'></i>
          <span class="link_name">Profil</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="{{route('profile_recruteure.index')}}">Profil</a></li>
        </ul>
      </li>
      
     
      
      <li>
        <a href="{{route('deposer-mon-cv.index')}}"  @if(!$valide) onclick="return false;" style="background-color :gray;important!" @endif>
        <i class='bx bx-id-card'></i>
          <span class="link_name">Les CV</span>
        </a>
        <ul class="sub-menu blank" @if(!$valide) style="background-color :#C3CCCF;important!" @endif>
          <li><a class="link_name" href="{{route('deposer-mon-cv.index')}}">Les CV</a></li>
        </ul>
      </li>
    
      <li>
        <a href="{{route('offre.create')}}" @if(!$valide) onclick="return false;" style="background-color :gray;important!" @endif>
        <i class='bx bx-briefcase-alt'></i>
          <span class="link_name">Poster un offer</span>
        </a>
        <ul class="sub-menu blank" @if(!$valide) style="background-color :#c3cccf;important!" @endif>
          <li><a class="link_name" href="{{route('offre.create')}}">Poster un offer</a></li>
        </ul>
      </li>
      <li>
        <a href="{{route('offre.index')}}"  @if(!$valide) onclick="return false;" style="background-color :gray;important!" @endif>
        <i class='bx bx-book-content'></i>
          <span class="link_name">Mes offre</span>
        </a>
        <ul class="sub-menu blank" @if(!$valide) style="background-color :#C3CCCF;important!" @endif>
          <li><a class="link_name" href="{{route('offre.index')}}" >Mes offre</a></li>
        </ul>
      </li>

      <li>
        <a href="{{route('chat.index')}}"  @if(!$valide) onclick="return false;" style="background-color :gray;important!" @endif>
        <i class='bx bx-chat'></i>
          <span class="link_name">Chat</span>
        </a>
        <ul class="sub-menu blank" @if(!$valide) style="background-color :#C3CCCF;important!" @endif>
          <li><a class="link_name" href="{{route('chat.index')}}">Chat</a></li>
        </ul>
      </li>

      <li>
    <div class="profile-details">
      <div><a  href="{{route('profile_recruteure.index')}}">
      <div class="profile-content">
        <img src="{{ asset('images/recruteure/'. Auth::user()->logo) }}" alt="profileImg">
      </div>
      <div class="name-job">
        <div class="profile_name">{{ Auth::user()->nom }}</div>
        
      </div>
      </div></a>
      <a class="dropdown-item text text-primary" href="{{ route('logout') }}"
          onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
          <i class='bx bx-log-out' ></i>
      </a>

     
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
