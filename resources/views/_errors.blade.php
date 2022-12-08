@error('name')
    {{-- UN COMMENTAIRE --}}
    {{-- <p class="alert-danger"> --}}
    <p @class([
        'alert-danger'
    ])>
        Une erreur est sûrvenue dans la complétion du champ 'Nom'
    </p>
@enderror

@error('description')
    {{-- UN COMMENTAIRE --}}
    {{-- <p class="alert-danger"> --}}
    <p @class([
        'alert-danger'
    ])>
        Une erreur est sûrvenue dans la complétion du champ 'Description'
    </p>
@enderror

@error('price')
{{-- UN COMMENTAIRE --}}
{{-- <p class="alert-danger"> --}}
<p @class([
    'alert-danger'
])>
    Une erreur est sûrvenue dans la complétion du champ 'Prix'
</p>
@enderror

@error('annonce')
    {{-- UN COMMENTAIRE --}}
    {{-- <p class="alert-danger"> --}}
    <p @class([
        'alert-danger'
    ])>
        {{ $errors->first('annonce') }}
    </p>
@enderror

@if($errors->any())
    @foreach($errors->all() as $error)
        <p class="alert alert-danger">{{ $error }}</p>
    @endforeach
@endif
