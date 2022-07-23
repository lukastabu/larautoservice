@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">All Repair services</div>

                    <div class="card-body">
                        @forelse($repairs as $repair)
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
                            <a class="btn btn-outline-primary" href="{{ route('repair-show', $repair->id) }}">Learn more</a>
                            @if (Auth::user()->role > 3)
                                <a class="btn btn-outline-success" href="{{ route('repair-edit', $repair) }}">Edit</a>
                                <form class="" action="{{ route('repair-delete', $repair) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-outline-danger" type="submit">Delete</button>
                                </form>
                            @endif

                        @empty
                            <li class="list-group-item">Nothing to show :/</li>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
