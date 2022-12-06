<form action="" method="">
    <input type="text" name="name" value="{{ $name ?? '' }}" />
    <textarea name="description">{{ $description ?? '' }}</textarea>
    <input type="submit" value="Enregistrer l'annonce" />
</form>
