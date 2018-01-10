<label for="{{ $field->attribute }}">{{ $field->label }}</label>
<input type="number"
       {{ !is_null($min = $field->getOption('min')) ? " min={$min}" : '' }}
       {{ !is_null($min = $field->getOption('max')) ? " max={$max}" : '' }}
       {{ !is_null($step = $field->getOption('precision')) ? ' step='.(1/pow(10, $step)) : '' }}
       name="{{ $field->attribute }}"
       id="{{ $field->attribute }}"
       value="{{ $field->value }}"
>
<br>
