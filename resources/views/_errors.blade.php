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

@if(session('success'))
    <p class="alert alert-success">{{ session('success') }}</p>
@endif
@if(session('infos'))
    <p class="alert alert-infos">{{ session('infos') }}</p>
@endif
@if(session('default'))
    <p class="alert alert-default">{{ session('default') }}</p>
@endif
@if(session('warning'))
    <p class="alert alert-warning">{{ session('warning') }}</p>
@endif
