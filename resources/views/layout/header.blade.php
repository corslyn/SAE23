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
                  <a href="equipage.html">EQUIPAGE</a>
                  <a href="equipage.html">EQUIPAGE</a>
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
                  <a href="{{ route("vehicule.show") }}">VEHICULE</a>
                  <a href="{{ route("vehicule.show") }}">VEHICULE</a>
                </div>
              </li>
              <li>
                <div class="content">
                  <a href="{{ route("app.edt") }}">EDT</a>
                  <a href="{{ route("app.edt") }}">EDT</a>
                </div>
              </li>

              <li>
                <div class="content">
                  <a href="{{ route("auth.admin") }}">ADMIN</a>
                  <a href="{{ route("auth.admin") }}">ADMIN</a>
                </div>
              </li>
        </ul>
    </div>
  
    <div class="right">
            <i class='img2 bx bx-user'></i>
            <select id="choix" name="choix">
                <option value="default">Auth</option>
                @if(session() -> has('id'))
                  <option value="profile">Mon profil</option>
                  <option value="logout">Déconnexion</option>
                @else
                  <option value="signup">Inscription</option>
                  <option value="login">Connexion</option>
                @endif
            </select>
    </div>
</div>
