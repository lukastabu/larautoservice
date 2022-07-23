@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Editing Repair service</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('repair-update', $repair) }}" method="POST">
                            <li>Repair service: <input type="text" name="repair" value={{ $repair->repair }}></li>
                            <li>Price in euros: <input type="number" name="price" value={{ $repair->price }}></li>
                            <li>Duration in days: <input type="number" name="duration" value={{ $repair->duration }}></li>
                            <li>Offered at:
                                <select name="autoservice_id">
                                    @foreach ($autoservices as $autoservice)
                                        <option value="{{ $autoservice->id }}"
                                            @if ($autoservice->id == $repair->autoservice_id) selected @endif>>
                                            {{ $autoservice->office }}
                                        </option>
                                    @endforeach
                                </select>
                            </li>
                            @csrf
                            @method('put')
                            <button class="btn btn-outline-success" type="submit">Save Changes</button>
                            <a class="btn btn-outline-danger ml-3" href="{{ route('repair-index') }}">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
