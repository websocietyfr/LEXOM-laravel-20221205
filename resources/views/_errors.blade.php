@error('name')
    {{-- UN COMMENTAIRE --}}
    {{-- <p class="alert-danger"> --}}
    <p @class([
        'alert-danger'
    ])>
        Une erreur est sûrvenue dans la complétion du champ 'Nom'
    </p>
@enderror
