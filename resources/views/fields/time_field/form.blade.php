<label for="{{ $field->attribute }}">{{ $field->label }}</label>
<input type="time"
       name="{{ $field->attribute }}"
       id="{{ $field->attribute }}"
       value="{{ $field->rawValue }}"
>
<br>
