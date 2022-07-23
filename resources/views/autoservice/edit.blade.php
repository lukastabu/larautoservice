@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Editing Autoservice</div>

                    <div class="card-body">
                        <form action="{{ route('autoservice-update', $autoservice) }}" method="POST">
                            Autoservice: <input type="text" name="office" value={{ $autoservice->office }}>
                            Address: <input type="text" name="address" value={{ $autoservice->address }}>
                            Phone: <input type="text" name="phone" value={{ $autoservice->phone }}>
                            @csrf
                            @method('put')
                            <button class="btn btn-outline-success" type="submit">Save Changes</button>
                            <a class="btn btn-outline-danger ml-3" href="{{ route('autoservice-index') }}">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
