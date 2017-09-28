<h1>New {{ $dashboard->label }}</h1>

<a href="{{ $dashboard->route('index') }}">Back</a>

<br>
<br>

<form action="{{ $dashboard->route('store') }}" method="post">
    {{ csrf_field() }}
    @foreach ($dashboard->formAttributes() as $attribute)
        {!! $dashboard->field($attribute)->render() !!}
    @endforeach

    <br>

    <button type="submit">Create</button>
</form>
