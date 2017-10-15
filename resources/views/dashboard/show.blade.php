<h1>Show {{ $dashboard->label }}</h1>

<a href="{{ $dashboard->route('index') }}">Back</a>

<ul>
    @foreach ($dashboard->showAttributes() as $attribute)
        <li>
            <strong>{{ $dashboard->field($attribute)->label }}</strong>:
            {{ $dashboard->field($attribute)->render($resource) }}
        </li>
    @endforeach
</ul>

<a href="{{ $dashboard->route('edit', $resource) }}">edit</a>


<a href="{{ $dashboard->route('destroy', $resource) }}/delete" onclick="event.preventDefault();if (confirm('Do you want to delete {{ $dashboard->label }} with id {{ $resource->id }}?')) {document.getElementById('resource-delete-form-{{ $resource->id }}').submit();}">delete</a>

<form id="resource-delete-form-{{ $resource->id }}" action="{{ $dashboard->route('destroy', $resource) }}" method="POST" style="display: none;">
  {{ csrf_field() }}
  {{ method_field('DELETE') }}
</form>
