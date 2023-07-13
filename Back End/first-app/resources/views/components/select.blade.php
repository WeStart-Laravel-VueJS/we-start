@props(['text', 'name', 'options', 'placeholder'])

<div class="mb-3">
    <label>{{ $text }}</label>
    <select class="form-select @error($name) is-invalid @enderror" name="{{ $name }}">
        @isset($placeholder)
            <option value="" disabled selected hidden>{{ $placeholder }}</option>
        @endisset
        @foreach ($options as $key => $option)
            <option @selected(old($name) == $key) value="{{ $key }}">{{ $option }}</option>
        @endforeach
    </select>

    @error($name)
        <small class="invalid-feedback">{{ $message }}</small>
    @enderror
</div>
