<div class="row justify-content-center">
  <div class="col-sm-11 col-xs-12 col-md-10 col-lg-9 col-xl-8">
    <div class="card">
      <div class="card-header">
        <b>{{$form_title}}</b>
      </div>

      <div class="card-body">
        <form novalidate method="POST"  autocomplete="off" action="@if(isset($etudiant)) {{ route($form_url,['id'=>$etudiant->matricule]) }} @else {{ route($form_url) }} @endif">
              {{ csrf_field() }}
            <div class="form-group">
                <label for="im_etudiant">Matricule</label>
                <input type="text" 
                      name="matricule" class="form-control @if($errors->has('matricule'))is-invalid @endif" 
                      id="im_etudiant" 
                      value="@if(old('matricule')){{ old('matricule') }}@elseif(isset($etudiant)){{ $etudiant->matricule }}@endif">
                @if($errors->has('matricule'))
                  <div class="invalid-feedback">
                    @foreach ($errors->get('matricule') as $error)
                        <li>{!! $error !!}</li>
                    @endforeach
                  </div>
                @endif
              </div>
          <div class="form-group">
            <label for="nom_etudiant">Nom</label>
            <input type="text" name="nom" class="form-control @if($errors->has('nom'))is-invalid @endif" id="nom_etudiant" value="@if(old('nom')){{ old('nom') }}@elseif(isset($etudiant)){{ $etudiant->nom }}@endif ">
            @if($errors->has('nom'))
                  <div class="invalid-feedback">
                    @foreach ($errors->get('nom') as $error)
                        <li>{!! $error !!}</li>
                    @endforeach
                  </div>
              @endif
          </div>
          <div class="form-group">
            <label for="prenom_etudiant">Prénom</label>
            <input type="text" name="prenom" class="form-control @if($errors->has('prenom'))is-invalid @endif" id="prenom_etudiant" value="@if(old('prenom')){{ old('prenom') }}@elseif(isset($etudiant)){{ $etudiant->prenom }}@endif ">
            @if($errors->has('prenom'))
                  <div class="invalid-feedback">
                    @foreach ($errors->get('prenom') as $error)
                        <li>{!! $error !!}</li>
                    @endforeach
                  </div>
                @endif
          </div>

          <div class="form-group">
            <label for="adresse_etudiant">Adresse</label>
            <input type="text" name="adresse" class="form-control @if($errors->has('adresse'))is-invalid @endif" id="adresse_etudiant" value="@if(old('adresse')){{ old('adresse') }}@elseif(isset($etudiant)){{ $etudiant->adresse }}@endif ">
            @if($errors->has('adresse'))
                  <div class="invalid-feedback">
                    @foreach ($errors->get('adresse') as $error)
                        <li>{!! $error !!}</li>
                    @endforeach
                  </div>
            @endif
          </div>



          <div class="text-center">
            <a href="{{ route('index_etudiant') }}" class="btn btn-info"><i class="fa fa-times-circle mr-2"></i>Annuler</a>
            <button type="submit" class="btn btn-info ml-3"><i class="fa fa-save mr-2"></i>Enregistrer</button>
          </div>
      </form>
      </div>
    </div>
  </div>
</div>