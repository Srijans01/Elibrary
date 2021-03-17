@extends('layouts.app')

@section('content')
    @if(Session::has('Book_issued'))
        <div class="alert alert-success" id="id1" role="alert">
            {{Session::get('Book_issued')}}
        </div>
    @endif
    @if(Session::has('Book_wish'))
        <div class="alert alert-success" id="id1" role="alert">
            {{Session::get('Book_wish')}}
        </div>
    @endif
    <section style="padding-top:60px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            User List
                        </div>
                        
                        <div class="card-body">
                            @if(Session::has('Book_deleted'))
                            <div class="alert alert-success" role="alert">
                                {{Session::get('Book_deleted')}}
                            </div>
                            @endif
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($forms as $form)
                                        <tr class="tm">
                                            <td>{{$form->name}}</td>
                                            <td>{{$form->email}}</td>
                                            <td>{{$form->role}}</td>
                                            <td>

                                                <a href="/make-admin/{{$form->id}}" class="btn btn-success">Make Admin</a>
                                                <a href="/remove-admin/{{$form->id}}" class="btn btn-danger">Remove Admin</a>
                                                
                                            </td>
                                        </tr>
                                    @endforeach 
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script>
        setTimeout(function() {
    $('#id1').fadeOut('fast');
}, 3000);
    </script>
    @endsection