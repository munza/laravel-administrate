<label for="{{ $field->attribute }}">{{ $field->label }}</label>
<input type="checkbox"
       name="{{ $field->attribute }}"
       id="{{ $field->attribute }}"
       value="1"
       {{ $field->value ? 'checked' : '' }}
>
<br>
