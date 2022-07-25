@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add a new Mechanic</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('mechanic-store') }}">
                            <li>Mechanic's Full Name: <input type="text" name="name"></li>
                            <li>Link to Mechanic's Prifile photo: <input type="text" name="photo"></li>
                            <li>Mechanic's Rating: <input type="text" name="rating"></li>
                            <li>Mechanic's Location: 
                            <select name="autoservice_id">
                                @foreach ($autoservices as $autoservice)
                                    <option value="{{ $autoservice->id }}">{{ $autoservice->office }}</option>
                                @endforeach
                            </select>
                            </li>
                            @csrf
                            <button type="submit">Add Mechanic</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
