@props(['text', 'type', 'name'])
<div class="mb-3">
    <label>{{ $text }}</label>
    <input
        type="{{ $type }}"
        name="{{ $name }}"
        placeholder="{{ $text }}"
        class="form-control @error($name) is-invalid @enderror"
        value="{{ old($name) }}"
    />
    @error($name)
        <small class="invalid-feedback">{{ $message }}</small>
    @enderror
</div>
