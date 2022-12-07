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
        L'erreur de l'annonce
    </p>
@enderror
