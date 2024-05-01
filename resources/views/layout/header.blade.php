<div class="banner">
    <div id="left">
        <a href="{{ route("index") }}">
            <img src="/assets/img/logofcsm.png" alt="Logo FCSM" width="60" height="70">
        </a>
    </div>

    <div id="center">
        <ul>
            <li>
              <div class="content">
                <a href="{{ route("vehicule.show") }}">VEHICULE</a>
                <a href="{{ route("vehicule.show") }}">VEHICULE</a>
              </div>
            </li>
            <li>
              <div class="content">
                <a href="{{ route("lieux.show") }}">LIEUX</a>
                <a href="{{ route("lieux.show") }}">LIEUX</a>
              </div>
            </li>
            <li>
              <div class="content">
                <a href="{{ route("equipage.show") }}">EQUIPAGE</a>
                <a href="{{ route("equipage.show") }}">EQUIPAGE</a>
              </div>
            </li>
            
            <li>
              <div class="content">
                <a href="{{ route("deplacement.show") }}">DEPLACEMENTS</a>
                <a href="{{ route("deplacement.show") }}">DEPLACEMENTS</a>
              </div>
            </li>
            
            <li>
              <div class="content">
                <a href="{{ route("recommendation.show") }}">RECOMMENDATION</a>
                <a href="{{ route("recommendation.show") }}">RECOMMENDATION</a>
              </div>
            </li>
              
            @if(session() -> has("is_admin") && session("is_admin") === 1)
              <li>
                  <div class="content">
                    <a href="{{ route("auth.admin") }}">ADMIN</a>
                    <a href="{{ route("auth.admin") }}">ADMIN</a>
                  </div>
              </li>
            @endif

        </ul>
    </div>
  
    <div class="right">
            <i class='img2 bx bx-user'></i>
            <select id="choix" name="choix">
                @if(session() -> has('id'))
                  <option value="default">{{ session("nom") }}</option>
                  <option value="edt">Emploi du temps</option>
                  <option value="profile">Mon profil</option>
                  <option value="logout">Déconnexion</option>
                @else
                  <option value="default">Auth</option>
                  <option value="login">Connexion</option>
                  <option value="signup">Inscription</option>
                @endif
            </select>
    </div>
</div>
