@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Selected Repair service</div>

                    <div class="card-body">
                        <li class="list-group-item">
                            <div class="">
                                <h3>{{ $repair->repair }}</h3>
                                <br>
                                Price: <span>{{ $repair->price }} eur</span>
                                <br>
                                Duration: <span>{{ $repair->duration }} days</span>
                                <br>
                                Offered at: <span>{{ $repair->repair_autoservice->office }}</span>
                            </div>
                        </li>
                        @if (Auth::user()->role > 3)
                            <a class="btn btn-outline-success" href="{{ route('repair-edit', $repair) }}">Edit</a>
                            <form class="" action="{{ route('repair-delete', $repair) }}" method="POST">
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
