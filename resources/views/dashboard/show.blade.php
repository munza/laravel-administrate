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
