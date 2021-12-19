@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-4">
                @if($psychics)
                    @foreach($psychics as $name => $psychic)
                        <div>
                            <span><b>Имя Экстрасенса :</b> {{$name}}</span><br>
                            <span><b>Рейтинг :</b> {{$psychic['rating']}}</span>
                            <br>
                            <hr>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="col-4">
                <h3><b>Загадайте двухзначное число</b></h3>

                <a type="button" href="{{route('confirm.thought.number')}}">если загадали число нажмите </a>
            </div>

            <div class="col-4">
                @if($psychics)
                    <h3>last number</h3>
                    <hr>
                    @foreach($psychics as $name => $psychic)
                        <div>
                            <span><b>Имя Экстрасенса :</b> {{$name}}</span><br>
                            <b>все догадки экстрасенса за сессию :</b>
                            @foreach($psychic['generate_number'] as $generateNumber)
                                <div>
                                    <span>{{$generateNumber}}</span>
                                </div>
                            @endforeach
                            <hr>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection
