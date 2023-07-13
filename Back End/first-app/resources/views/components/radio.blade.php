@props(['text', 'type', 'name'])
<label>
    <input
        @checked(old($name) == $text)
        type="radio"
        name="{{ $name }}"
        value="{{ $text }}"
    />
    {{ $text }}
</label>
