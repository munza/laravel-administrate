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
                    <td>{{ $dashboard->field($attribute)->render($resource) }}</td>
                @endforeach
                <td>
                    <a href="{{ $dashboard->route('show', $resource) }}">view</a>
                    <a href="{{ $dashboard->route('edit', $resource) }}">edit</a>
                    <a href="{{ $dashboard->route('destroy', $resource) }}">delete</a>
                </td>
            </tr>
        @endforeach
    </thead>
</table>
