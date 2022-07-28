@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">New Order</div>

                    <div class="card-body list-group">
                        <li class="list-group-item">
                            <h4>Pick Mechanic, Repair service and proceed with Order</h4>
                            <form class="" action="{{ route('order-store') }}" method="POST">
                                <input type="text" name="autoservice_id" value={{ $autoservice->id }} hidden/>
                                Mechanic:
                                <select name="mechanic_id">
                                    @foreach ($mechanics as $mechanic)
                                    @if($mechanic->autoservice_id == $autoservice->id)
                                        <option value="{{ $mechanic->id }}">{{ $mechanic->name }}Rating:{{ $mechanic->rating }}</option>
                                    @endif
                                    @endforeach
                                </select><br>
                                Repair services:
                                <select name="repair_id">
                                    @foreach ($repairs as $repair)
                                    @if($repair->autoservice_id == $autoservice->id)
                                        <option value="{{ $repair->id }}">{{ $repair->repair }}
                                            Price:{{ $repair->price }}eur Duration:{{ $repair->duration }} day</option>
                                    @endif
                                    @endforeach
                                </select>
                                @csrf
                                <button class="btn btn-outline-success ml-1" type="submit">Submit Order</button>
                                <a class="btn btn-outline-danger" href="{{ route('front-index') }}">Cancel</a>
                            </form>
                        </li>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
