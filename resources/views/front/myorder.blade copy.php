@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">All Autoservices</div>

                    <div class="card-body list-group">
                        @forelse($autoservices as $autoservice)
                            <li class="list-group-item">
                                <div class="">
                                    <h3>{{ $autoservice->office }}</h3>
                                    <br>
                                    Address: <span>{{ $autoservice->address }}</span>
                                    <br>
                                    Phone: <span>{{ $autoservice->phone }}</span>
                                </div>
                            </li>
                            <a class="btn btn-outline-primary" href="{{ route('autoservice-show', $autoservice->id) }}">Learn more</a>
                        @empty
                            <li class="list-group-item">Nothing to show :/</li>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
