{{!! $user->id !!}}
@if (Auth::user()->id != $user->id) 
    @if (Auth::user()->is_liking($micropost->id))
        {!! Form::open(['route' => ['user.unlike', $micropost->id], 'method' => 'delete']) !!}
            {!! Form::submit('UnLike', ['class' => "btn btn-danger btn-xs"]) !!}
        {!! Form::close() !!}
    @else
        {{!! $micropost->id !!}}
        {!! Form::open(['route' => ['user.like', $micropost->id]]) !!}
            {!! Form::submit('Like', ['class' => "btn btn-primary btn-xs"]) !!}
        {!! Form::close() !!}
    @endif
@endif