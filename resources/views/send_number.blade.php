@extends('layouts.app')
@section('content')
    <div>
        @if($psychics)
            <h3>last number</h3>
            <hr>
            @foreach($psychics as $name => $psychic)
                <div>
                    <span><b>Имя Экстрасенса :</b> {{$name}}</span>

                        <div>
                            <span><b>догадок экстрасенса  :</b> {{$psychic['generate_number'][array_key_last($psychic['generate_number'])]}}</span>
                        </div>

                </div>
                <hr>
            @endforeach
        @endif
    </div>
    <div>
        <form action="{{route('send.number')}}" method="POST">
            @csrf
            <input type="number" name="number">
            <button type="submit">send number</button>
        </form>
    </div>
@endsection
