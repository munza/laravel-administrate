<label for="{{ $field->attribute }}">{{ $field->label }}</label>
<select name="{{ $field->attribute }}">
    <option value="">---</option>
    @foreach ($field->list() as $key => $label)
        <option value="{{ $key }}"{{ $field->key == $key ? ' selected' : '' }}>
            {{ $label }}
        </option>
    @endforeach
</select>
<br>
