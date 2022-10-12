@if(session()->has('success'))
<div class="alert alert-success w-3/4 mx-auto">
    @if(is_array(session()->get('success')))
    <ul>
        @foreach (session()->get('success') as $message)
        <li>{!! $message !!}</li>
        @endforeach
    </ul>
    @else
    {!! session()->get('success') !!}
    @endif
</div>
@endif

@if($errors->any())
<div class="alert alert-danger w-3/4 mx-auto">
    @foreach ($errors->all() as $item)
    <div>{!! $item !!}</div>
    @endforeach
</div>
@endif
