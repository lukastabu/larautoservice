@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add a new Repair service</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('repair-store') }}">
                            <li>Repair service: <input type="text" name="repair"></li>
                            <li>Price in euros: <input type="number" name="price"></li>
                            <li>Duration in days: <input type="number" name="duration"></li>
                            <li>Offered at: 
                            <select name="autoservice_id">
                                @foreach ($autoservices as $autoservice)
                                    <option value="{{ $autoservice->id }}">{{ $autoservice->office }}</option>
                                @endforeach
                            </select>
                            </li>
                            @csrf
                            <button type="submit">Add Repair</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
