<form action="{{ $action ?? '' }}" method="POST">
    @csrf
    @method($verb ?? 'POST')
    <input type="text" name="name" value="{{ $name ?? '' }}" />
    <textarea name="description">{{ $description ?? '' }}</textarea>
    <input type="number" name="price" value="{{ $price ?? '' }}" />
    <input type="submit" value="{{ $submit ?? 'Enregistrer l\'annonce' }}" />
</form>
