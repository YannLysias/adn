@if ( Auth::user()->type == "Administrateur" || Auth::user()->type == "Coordonnateur")

<div class="navbar nav_title" style="border: 0;">
  <a href="/dashboard" class="site_title"><i class="fa fa-paw"></i> <span>ADN</span></a>
</div><br><br><br>

<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
  <div class="menu_section">

    <ul class="nav side-menu">
      <li><a href="/dashboard"><i class="fa fa-home"></i> Home</a>
      </li>
      @else
      <div class="navbar nav_title" style="border: 0;">
        <a href="/dashboard" class="site_title"><i class="fa fa-paw"></i></a>
      </div>
      <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
        <div class="menu_section">
          <h3>General</h3>
          <ul class="nav side-menu">
            <li><a href="/dashboard"><i class="fa fa-home"></i> Acceuil</a>
            </li>
            @endif


            @if ( Auth::user()->type == "Administrateur" )

            <li><a href="/adherant"><i class="fa fa-user"></i> Coordonnateurs</a>

            </li>

            @endif

            @if ( Auth::user()->type == "Coordonnateur")

            <li><a href="/adherant"><i class="fa fa-user"></i> Adhérants</a>
            <li><a href="/titre"><i class="fa fa-table"></i> Titres </a>
              {{--
            <li><a href="/commentaire"><i class="fa fa-table"></i> Commentaire </a> --}}

            </li>

            @endif

          </ul>
        </div>

      </div>
      <!-- /sidebar menu -->

      <!-- /menu footer buttons -->
      <div class="sidebar-footer hidden-small">
        <a data-toggle="tooltip" data-placement="top" title="Settings">
          <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
          <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="Lock">
          <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
          <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
        </a>
      </div>
      <!-- /menu footer buttons -->
  </div>
</div>


<!-- top navigation -->
<div class="top_nav">
  <div class="nav_menu">
    <div class="nav toggle">
      <a id="menu_toggle"><i class="fa fa-bars"></i></a>
    </div>
    <nav class="nav navbar-nav">
      <ul class=" navbar-right">
        <li class="nav-item dropdown open">
          <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown"
            data-toggle="dropdown" aria-expanded="false">
            <div class="user-info">
              <img src="/storage/photos/{{Auth::user()->photo}}" alt="">
              <div class="user-details">
                <h6>{{ Auth::user()->prenom }}</h6>
                <div>{{ Auth::user()->type }}</div>
              </div>
            </div>
          </a>

          <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item"
              href="{{ route('users-profile.show', ['users_profile' => Auth::id()]) }}">Profile</a>
            <a class="dropdown-item">
              <form action="/logout" method="POST">
                @csrf
                <button type="submit" class="logout-button">
                  <i class=" "></i>
                  <span>Se déconnecter</span>
                </button>
              </form>
            </a>
          </div>
        </li>
      </ul>
    </nav>
  </div>
</div>
<!-- /top navigation -->
<style>
  .logout-button {
    background: none;
    border: none;
    padding: 0;
    cursor: pointer;
    font-size: inherit;
    color: inherit;
    text-decoration: none;
    display: block;
    width: 100%;
    text-align: left;
  }

  .logout-button:hover {
    background-color: transparent;
  }


  .user-info {
    display: flex;
    align-items: center;
  }

  .user-details {
    margin-left: 10px;
    /* Ajustez la marge selon vos besoins */
  }

  .user-details h6 {
    margin: 0;
  }

  .user-details div {
    font-size: 14px;
    /* Ajustez la taille de la police selon vos besoins */
    color: #888;
    /* Couleur du texte */
  }
</style>