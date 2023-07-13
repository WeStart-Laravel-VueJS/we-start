@props(['text', 'class', 'name'])
<div class="mb-3">
    <label>{{ $text }}</label>
    <textarea name="{{ $name }}" class="{{ $class }} @error($name) is-invalid @enderror" placeholder="{{ $text }}" rows="4" >{{ old($name) }}</textarea>

    @error($name)
        <small class="invalid-feedback">{{ $message }}</small>
    @enderror
</div>
