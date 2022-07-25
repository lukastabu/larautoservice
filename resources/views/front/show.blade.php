@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h2>{{ $autoservice->office }}</h2></div>

                    <div class="card-body list-group">
                        <li class="list-group-item">
                            <div class="">
                                <span>Address: {{ $autoservice->address }}</span>
                                <br>
                                <span>Phone: {{ $autoservice->phone }}</span>
                            </div>
                        </li>
                        <h3>Check out our Mechanics and Repair services</h3>
                        <li class="list-group-item">
                            <h4>Our dedicated Mechanics:</h4>
                            <div name="">
                                @foreach ($mechanics as $mechanic)
                                    @if($mechanic->autoservice_id == $autoservice->id)
                                    <div class="">
                                        <h5>{{ $mechanic->name }}</h5>
                                        <img src="{{ $mechanic->photo }}">
                                        <br>
                                        <span>Rating: {{ $mechanic->rating }}</span>
                                    </div>
                                    @endif
                                @endforeach
                            </div>
                        </li>
                        <li class="list-group-item">
                            <h4>Our offered Repair services:</h4>
                            @foreach ($repairs as $repair)
                            @if($repair->autoservice_id == $autoservice->id)
                                <div class="">
                                    <h5>{{ $repair->repair }}</h5>
                                    <span>Price: {{ $repair->price }} eur</span>
                                    <br>
                                    Duration: <span>{{ $repair->duration }} days</span>
                                </div>
                            @endif
                            @endforeach
                        </li>
                    </div>
                        <a class="btn btn-outline-primary ml-1" href="{{ route('order-submit', $autoservice, $repair, $mechanic) }}">Book service</a>
                    <div class="card-body list-group">
                        <a class="btn btn-outline-warning" href="{{ route('front-index') }}">Back to List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
