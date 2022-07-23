@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Selected office</div>

               <div class="card-body">
                            <li class="list-group-item">
                                <div class="">
                                    <h3>{{ $autoservice->office }}</h3>
                                    <br>
                                    Address: <span>{{ $autoservice->address }}</span>
                                    <br>
                                    Phone: <span>{{ $autoservice->phone }}</span>
                                </div>
                            </li>
                            @if (Auth::user()->role > 3)
                                <a class="btn btn-outline-success"
                                    href="{{ route('autoservice-edit', $autoservice) }}">Edit</a>
                                <form class="" action="{{ route('autoservice-delete', $autoservice) }}"
                                    method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-outline-danger" type="submit">Delete</button>
                                </form>
                            @endif
               </div>
           </div>
       </div>
   </div>
</div>
@endsection
