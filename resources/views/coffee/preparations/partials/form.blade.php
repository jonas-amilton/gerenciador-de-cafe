<div class="mb-3">
    <label for="user_id" class="form-label">Quem está preparando?</label>
    <select name="user_id" id="user_id" class="form-select" required>
        <option value="">Selecionar preparador</option>
        @foreach ($users as $user)
            <option value="{{ $user->id }}"
                {{ old('user_id', isset($preparation->user_id) ? $preparation->user_id : null) == $user->id ? 'selected' : '' }}>
                {{ $user->name }}</option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="prepared_at" class="form-label">Data da preparação</label>
    <input type="date"
        value="{{ old('prepared_at', isset($preparation->prepared_at) ? $preparation->prepared_at : '') }}"
        name="prepared_at" id="prepared_at" class="form-control" required>
</div>

<div class="mb-3">
    <label for="cups_estimated" class="form-label">Rendeu quantas xícaras? (unidades)</label>
    <input type="number" name="cups_estimated" id="cups_estimated" class="form-control"
        value="{{ old('cups_estimated', $preparation->cups_estimated ?? 1) }}" required min="1">
</div>

<button type="submit" class="btn btn-success">Enviar</button>
<a href="{{ route('coffee.preparations.index') }}" class="btn btn-secondary">Voltar</a>
