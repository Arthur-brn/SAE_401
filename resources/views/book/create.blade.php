<form action="{{ route('book.store') }}" method="POST">
    @csrf

    <div>
        <label for="title">Titre :</label>
        <input type="text" id="title" name="title" value="{{ old('title') }}">
    </div>

    <div>
        <label for="author_id">ID de l'auteur :</label>
        <input type="text" id="author_id" name="author_id" value="{{ old('author_id') }}">
    </div>

    <div>
        <label for="editor">Éditeur :</label>
        <input type="text" id="editor" name="editor" value="{{ old('editor') }}">
    </div>

    <div class="form-group">
        <label for="style">Style :</label>
        <input type="text" id="style" name="style" class="form-control" value="{{ old('style') }}">
    </div>

    <div class="form-group">
        <label for="page_number">Nombre de pages :</label>
        <input type="number" id="page_number" name="page_number" class="form-control" value="{{ old('page_number') }}">
    </div>

    <div class="form-group">
        <label for="edition_date">Date d'édition :</label>
        <input type="date" id="edition_date" name="edition_date" class="form-control" value="{{ old('edition_date') }}">
    </div>

    <div class="form-group">
        <label for="loan_number">Nombre de prêts :</label>
        <input type="number" id="loan_number" name="loan_number" class="form-control" value="{{ old('loan_number') }}">
    </div>

    <div class="form-group">
        <label for="type">Type :</label>
        <input type="text" id="type" name="type" class="form-control" value="{{ old('type') }}">
    </div>

    <div class="form-group">
        <label for="summary">Résumé :</label>
        <input type="number" id="summary" name="summary" class="form-control" value="{{ old('summary') }}">
    </div>

    <button type="submit">Ajouter le livre</button>
</form>