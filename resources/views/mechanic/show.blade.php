@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Selected Mechanic</div>

                    <div class="card-body">
                        <li class="list-group-item">
                            <div class="">
                                <h3>{{ $mechanic->name }}</h3>
                                <br>
                                <img src="{{ $mechanic->photo }}">
                                <br>
                                Rating: <span>{{ $mechanic->rating }}</span>
                                <br>
                                Located at: <span>{{ $mechanic->mechanic_autoservice->office }}</span>
                            </div>
                        </li>
                        @if (Auth::user()->role > 3)
                            <a class="btn btn-outline-success" href="{{ route('mechanic-edit', $mechanic) }}">Edit</a>
                            <form class="" action="{{ route('mechanic-delete', $mechanic) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-outline-danger" type="submit">Delete</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
