@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Editing Mechanic's profile</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('mechanic-update', $mechanic) }}" method="POST">
                            <li>Mechanic's Full Name: <input type="text" name="name" value={{ $mechanic->name }}></li>
                            <li>Mechanic's Prifile photo: <input type="text" name="photo" value={{ $mechanic->photo }}></li>
                            <li>Mechanic's Rating: <input type="number" name="rating" value={{ $mechanic->rating }}></li>
                            <li>Mechanic's Location: 
                            <select name="autoservice_id">
                                @foreach ($autoservices as $autoservice)
                                    <option value="{{ $autoservice->id }}"  @if ($autoservice->id == $mechanic->autoservice_id) selected @endif>>
                                        {{ $autoservice->office }}
                                    </option>
                                @endforeach
                            </select>
                            </li>
                            @csrf
                            @method('put')
                            <button class="btn btn-outline-success" type="submit">Save Changes</button>
                            <a class="btn btn-outline-danger ml-3" href="{{ route('mechanic-index') }}">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
