<label for="{{ $field->attribute }}">{{ $field->label }}</label>
<input type="hidden" name="is_admin" value="0">
<input type="checkbox"
       name="{{ $field->attribute }}"
       id="{{ $field->attribute }}"
       value="{{ $field->value }}"
       {{ $field->value ? 'checked' : '' }}
>
<br>
