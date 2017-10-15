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
