<h1>Edit {{ $dashboard->label }}</h1>

<a href="{{ $dashboard->route('index') }}">Back</a>

<br>
<br>

<form action="{{ $dashboard->route('update', $resource) }}" method="post">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    @foreach ($dashboard->formAttributes() as $attribute)
        {!! $dashboard->field($attribute)->render($resource) !!}
    @endforeach

    <br>

    <button type="submit">Update</button>
</form>

<a href="{{ $dashboard->route('destroy', $resource) }}/delete" onclick="event.preventDefault();if (confirm('Do you want to delete {{ $dashboard->label }} with id {{ $resource->id }}?')) {document.getElementById('resource-delete-form-{{ $resource->id }}').submit();}">delete</a>

<form id="resource-delete-form-{{ $resource->id }}" action="{{ $dashboard->route('destroy', $resource) }}" method="POST" style="display: none;">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
</form>
