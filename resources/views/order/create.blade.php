@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">New Order</div>

                    <div class="card-body list-group">
                        <li class="list-group-item">
                            <h4>Pick Autoservice, Mechanic, Repair service and proceed with Order</h4>
                            Autoservice:
                            @foreach ($autoservices as $autoservice)
                        <li class="list-group-item">
                            <div class="">
                                <h3>{{ $autoservice->office }}</h3>
                                <br>
                                Address: <span>{{ $autoservice->address }}</span>
                                <br>
                                Phone: <span>{{ $autoservice->phone }}</span>
                            </div>
                        </li>
                        <a class="btn btn-outline-primary" href="{{ route('order-submit', $autoservice->id) }}">Book here</a>
                        @endforeach
                    </div>
                    <div class="card-body list-group">
                        <a class="btn btn-outline-warning" href="{{ route('front-index') }}">Back to List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
