@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">All Mechanics</div>

                    <div class="card-body list-group">
                        @forelse($mechanics as $mechanic)
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
                            <a class="btn btn-outline-primary" href="{{ route('mechanic-show', $mechanic->id) }}">Learn more</a>
                            @if (Auth::user()->role > 3)
                                <a class="btn btn-outline-success" href="{{ route('mechanic-edit', $mechanic) }}">Edit</a>
                                <form class="" action="{{ route('mechanic-delete', $mechanic) }}"
                                    method="POST">
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
