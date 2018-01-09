<h1>All {{ str_plural($dashboard->label) }}</h1>

<a href="{{ $dashboard->route('create') }}">New {{ $dashboard->label }}</a>

<table>
    <thead>
        <tr>
            @foreach ($dashboard->listAttributes() as $attribute)
                <th>{{ $dashboard->field($attribute)->label }}</th>
            @endforeach
            <td></td>
        </tr>
    </thead>
    <thead>
        @foreach ($collection as $resource)
            <tr>
                @foreach ($dashboard->listAttributes() as $attribute)
                    <td>{!! $dashboard->field($attribute)->render($resource) !!}</td>
                @endforeach
                <td>
                    <a href="{{ $dashboard->route('show', $resource) }}">view</a>
                    <a href="{{ $dashboard->route('edit', $resource) }}">edit</a>

                    <a href="{{ $dashboard->route('destroy', $resource) }}/delete" onclick="event.preventDefault();if (confirm('Do you want to delete {{ $dashboard->label }} with id {{ $resource->id }}?')) {document.getElementById('resource-delete-form-{{ $resource->id }}').submit();}">delete</a>

                    <form id="resource-delete-form-{{ $resource->id }}" action="{{ $dashboard->route('destroy', $resource) }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                    </form>
                </td>
            </tr>
        @endforeach
    </thead>
</table>
