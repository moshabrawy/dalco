@extends('dashboard.layout')

@section('content')
@foreach ($datas as $data)
    <ul>
        <li>{{ $data->title }}</li>
    </ul>
@endforeach

    
@endsection