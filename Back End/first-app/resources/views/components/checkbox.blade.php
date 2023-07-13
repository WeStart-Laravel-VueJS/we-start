@props(['text', 'type', 'name'])
<label>
    @php
        $old = str_replace('[]', '', $name)
    @endphp
    <input
        @checked(!is_null(old($old)) && in_array($text, old($old)))
        type="checkbox"
        name="{{ $name }}"
        value="{{ $text }}"
    />
    {{ $text }}
</label>
