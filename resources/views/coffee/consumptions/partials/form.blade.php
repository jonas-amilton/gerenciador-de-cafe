<div class="mb-3">
    <label for="user_id" class="form-label">Consumidor</label>
    <select name="user_id" id="user_id" class="form-select" required>
        <option value="">Selecionar consumidor</option>
        @foreach ($users as $user)
            <option value="{{ $user->id }}"
                {{ old('user_id', $consumption->user_id ?? null) == $user->id ? 'selected' : '' }}>
                {{ $user->name }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="consumed_at" class="form-label">Data de consumo</label>
    <input type="date" name="consumed_at" id="consumed_at" class="form-control"
        value="{{ old('consumed_at', isset($consumption->consumed_at) ? \Carbon\Carbon::parse($consumption->consumed_at)->format('Y-m-d') : '') }}"
        required>
</div>

<button type="submit" class="btn btn-success">Enviar</button>
<a href="{{ route('coffee.consumptions.index') }}" class="btn btn-secondary">Voltar</a>
