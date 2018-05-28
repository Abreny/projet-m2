<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
        <a class="navbar-brand" href="#">E-note</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li @if ($active == "accueil") class="nav-item active" @else class="nav-item" @endif>
              <a class="nav-link" href="#"><i class="fa fa-home mr-2" aria-hidden="true"></i>Accueil</a>
            </li>
            <li @if ($active == "etudiant") class="nav-item active" @else class="nav-item" @endif>
              <a class="nav-link" href="{{ route('index_etudiant') }}"><i class="fa fa-university mr-2" aria-hidden="true"></i>Etudiant</a>
            </li>
            <li @if ($active == "matiere") class="nav-item active" @else class="nav-item" @endif>
              <a class="nav-link" href="{{ route('index_matiere') }}"><i class="fa fa-book mr-2" aria-hidden="true"></i>Matière</a>
            </li>
            <li @if ($active == "note") class="nav-item active" @else class="nav-item" @endif>
              <a class="nav-link" href="{{ route('index_note') }}"><i class="fa fa-briefcase mr-2" aria-hidden="true"></i>Note</a>
            </li>
          </ul>
    </div>

</nav>