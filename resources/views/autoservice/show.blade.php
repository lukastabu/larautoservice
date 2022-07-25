@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2>{{ $autoservice->office }}</h2>
                    </div>

                    <div class="card-body list-group">
                        <li class="list-group-item">
                            <span>Address: {{ $autoservice->address }}</span>
                            <br>
                            <span>Phone: {{ $autoservice->phone }}</span>

                        </li>
                        @if (Auth::user()->role > 3)
                        <li class="list-group-item">
                            <a class="btn btn-outline-success"
                                href="{{ route('autoservice-edit', $autoservice) }}">Edit</a>
                            <form class="" action="{{ route('autoservice-delete', $autoservice) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-outline-danger" type="submit">Delete</button>
                            </form>
                        </li>
                        @endif
                        <li class="list-group-item">
                            <h3>Mechanics:</h3>
                            <div name="">
                                @foreach ($mechanics as $mechanic)
                                    @if ($mechanic->autoservice_id == $autoservice->id)
                                        <div class="">
                                            <h5>{{ $mechanic->name }}</h5>
                                            <img src="{{ $mechanic->photo }}">
                                            <br>
                                            <span>Rating: {{ $mechanic->rating }}</span>
                                            <br>
                                            <a class="btn btn-outline-primary"
                                                href="{{ route('mechanic-show', $mechanic->id) }}">Learn more</a>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </li>
                        <li class="list-group-item">
                            <h3>Repair services:</h3>
                            @foreach ($repairs as $repair)
                                @if ($repair->autoservice_id == $autoservice->id)
                                    <div class="">
                                        <h5>{{ $repair->repair }}</h5>
                                        <span>Price: {{ $repair->price }} eur</span>
                                        <br>
                                        <span>Duration: {{ $repair->duration }} days</span>
                                        <br>
                                        <a class="btn btn-outline-primary"
                                            href="{{ route('repair-show', $repair->id) }}">Learn more</a>
                                    </div>
                                @endif
                            @endforeach
                        </li>
                        <a class="btn btn-outline-warning" href="{{ route('autoservice-index') }}">Back to List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
