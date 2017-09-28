<label for="{{ $field->attribute }}">{{ $field->label }}</label>
<input type="text"
       name="{{ $field->attribute }}"
       id="{{ $field->attribute }}"
>
@if ($field->getOption('confirmation'))
    <br>
    <label for="{{ $field->attribute }}_confirmation">{{ $field->label }} Confirmation</label>
    <input type="text"
           name="{{ $field->attribute }}_confirmation"
           id="{{ $field->attribute }}_confirmation"
    >
@endif
<br>
