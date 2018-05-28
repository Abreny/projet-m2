<div class="row justify-content-center">
  <div class="col-sm-11 col-xs-12 col-md-10 col-lg-9 col-xl-8">
    <div class="card">
      <div class="card-header">
        <b>{{$form_title}}</b>
      </div>

      <div class="card-body">
        <form novalidate method="POST"  autocomplete="off" action="@if(isset($matiere)) {{ route($form_url,['id'=>$matiere->id]) }} @else {{ route($form_url) }} @endif">
              {{ csrf_field() }}
          <div class="form-group">
            <label for="libelle_matiere">Libelle</label>
            <input type="text" name="libelle" class="form-control @if($errors->has('libelle'))is-invalid @endif" id="libelle_matiere" value="@if(old('libelle')){{ old('libelle') }}@elseif(isset($matiere)){{ $matiere->libelle }}@endif ">
            @if($errors->has('libelle'))
                  <div class="invalid-feedback">
                    @foreach ($errors->get('libelle') as $error)
                        <li>{!! $error !!}</li>
                    @endforeach
                  </div>
              @endif
          </div>

          <div class="form-group">
            <label for="coefficient_matiere">Coefficient</label>
            <input type="text" name="coefficient" class="form-control @if($errors->has('coefficient'))is-invalid @endif" id="coefficient_matiere" value="@if(old('coefficient')){{ old('coefficient') }}@elseif(isset($matiere)){{ $matiere->coefficient }}@endif ">
            @if($errors->has('coefficient'))
                  <div class="invalid-feedback">
                    @foreach ($errors->get('coefficient') as $error)
                        <li>{!! $error !!}</li>
                    @endforeach
                  </div>
            @endif
          </div>



          <div class="text-center">
            <a href="{{ route('index_matiere') }}" class="btn btn-info"><i class="fa fa-times-circle mr-2"></i>Annuler</a>
            <button type="submit" class="btn btn-info ml-3"><i class="fa fa-save mr-2"></i>Enregistrer</button>
          </div>
      </form>
      </div>
    </div>
  </div>
</div>