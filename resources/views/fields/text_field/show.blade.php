@if ($field->getOption('limit'))
    {{ substr($field->value, 0, $field->getOption('limit')) }}...
@else
    {{ $field->value }}
@endif
