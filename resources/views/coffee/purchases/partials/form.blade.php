<div class="mb-3">
    <label for="user_id" class="form-label">Comprador</label>
    <select name="user_id" id="user_id" class="form-select" required>
        <option value="">Selecionar comprador</option>
        @foreach ($users as $user)
            <option value="{{ $user->id }}"
                {{ old('user_id', $purchase->user_id ?? null) == $user->id ? 'selected' : '' }}>
                {{ $user->name }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="purchased_at" class="form-label">Data da compra</label>
    <input type="date"
        value="{{ old('purchased_at', isset($purchase->purchased_at) ? $purchase->purchased_at : '') }}"
        name="purchased_at" id="purchased_at" class="form-control" required>
</div>

<div class="mb-3">
    <label for="quantity" class="form-label">Quantidade (unidade)</label>
    <input type="number" name="quantity" id="quantity" class="form-control"
        value="{{ old('quantity', $purchase->quantity ?? null) }}" required min="1">
</div>

<button type="submit" class="btn btn-success">Enviar</button>
<a href="{{ route('coffee.purchases.index') }}" class="btn btn-secondary">Voltar</a>
