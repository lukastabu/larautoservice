@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">All Orders</div>

                    <div class="card-body">
                        @forelse($orders as $order)
                            <li class="list-group-item">
                                <div class="">
                                    <h3>Order ID: {{ $order->id }}</h3>
                                    <span>:Autoservice: {{ $order->autoservice_id }}</span>
                                    <br>
                                    <span>:Mechanic: {{ $order->mechanic_id }}</span>
                                    <br>
                                    <span>:Repair: {{ $order->repair_id }}</span>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="">
                                    <a class="btn btn-outline-primary" href="{{ route('order-show', $order->id) }}">Learn more</a>
                                    <a class="btn btn-outline-warning"href="{{ route('order-edit', $order) }}">Edit</a>
                                    <form class="" action="{{ route('order-delete', $order) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-outline-danger" type="submit">Cancel Order</button>
                                    </form>
                                    @if (Auth::user()->role > 3)
                                        <form class="" action="{{ route('order-show', $order->id) }}" method="POST">
                                            @csrf
                                            <button class="btn btn-outline-success" type="submit">Approve Order</button>
                                        </form>
                                    @endif
                                </div>
                            </li>
                        @empty
                            <li class="list-group-item">Nothing to show :/</li>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
