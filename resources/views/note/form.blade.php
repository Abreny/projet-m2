<div class="row justify-content-center">
  <div class="col-sm-11 col-xs-12 col-md-10 col-lg-9 col-xl-8">
    <div class="card">
      <div class="card-header">
        <b>{{$form_title}}</b>
      </div>

      <div class="card-body">
        <form novalidate method="POST"  autocomplete="off" action="@if(isset($note)) {{ route($form_url,['id'=>$note->id]) }} @else {{ route($form_url) }} @endif">
              {{ csrf_field() }}
          <div class="form-group">
            <label for="etudiant_note">Etudiant</label>
            <select name="matricule" class="form-control @if($errors->has('matricule'))is-invalid @endif" id="etudiant_note">
                <option value="">__Etudiant__</option>
                @foreach($etudiants as $etudiant)
                  <option value="{{ $etudiant->matricule }}" @if((old('matricule') && $etudiant->matricule == old('matricule')) || (isset($note) && $note->etudiant->matricule == $etudiant->matricule)) selected @endif>{{ $etudiant->nom }} {{ $etudiant->prenom }}</option>
                @endforeach
            </select>
            @if($errors->has('matricule'))
                  <div class="invalid-feedback">
                    @foreach ($errors->get('matricule') as $error)
                        <li>{!! $error !!}</li>
                    @endforeach
                  </div>
              @endif
          </div>

          <div class="form-group">
            <label for="matiere_note">Matiere</label>
            <select name="matiere_id" class="form-control @if($errors->has('matiere_id'))is-invalid @endif" id="matiere_note">
                <option value="">__Matiere__</option>
                @foreach($matieres as $matiere)
                  <option value="{{ $matiere->id }}" @if((old('matiere_id') && $matiere->id == old('matiere_id')) || (isset($note) && $note->matiere->id == $matiere->id)) selected @endif>{{ $matiere->libelle }}</option>
                @endforeach
            </select>
            @if($errors->has('matiere_id'))
                  <div class="invalid-feedback">
                    @foreach ($errors->get('matiere_id') as $error)
                        <li>{!! $error !!}</li>
                    @endforeach
                  </div>
              @endif
          </div>
          <div class="form-group">
            <label for="note_note">Note</label>
            <input type="text" name="note" class="form-control @if($errors->has('note'))is-invalid @endif" id="note_note" value="@if(old('note')){{ old('note') }}@elseif(isset($note)){{ $note->note }}@endif ">
            @if($errors->has('note'))
                  <div class="invalid-feedback">
                    @foreach ($errors->get('note') as $error)
                        <li>{!! $error !!}</li>
                    @endforeach
                  </div>
            @endif
          </div>

          <div class="text-center">
            <a href="{{ route('index_note') }}" class="btn btn-info"><i class="fa fa-times-circle mr-2"></i>Annuler</a>
            <button type="submit" class="btn btn-info ml-3"><i class="fa fa-save mr-2"></i>Enregistrer</button>
          </div>
      </form>
      </div>
    </div>
  </div>
</div>