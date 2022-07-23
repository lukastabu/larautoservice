@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add a new Autoservice</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('autoservice-store') }}">
                            Autoservice: <input type="text" name="office">
                            Address: <input type="text" name="address">
                            Phone: <input type="text" name="phone">
                            @csrf
                            <button type="submit">Add Autoservice</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
