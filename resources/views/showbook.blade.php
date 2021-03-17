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
                            All Books @if(Auth::user()->role=="admin")<a href="/add-book" class="btn btn-success">Add New</a>
                            <a href="/show-user" class="btn btn-success">User List</a>
                        </div>
                        @endif
                        <div class="card-body">
                            @if(Session::has('Book_deleted'))
                            <div class="alert alert-success" role="alert">
                                {{Session::get('Book_deleted')}}
                            </div>
                            @endif
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Cover Image</th>
                                        <th>Author</th>
                                        
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($forms as $form)
                                        <tr class="tm">
                                            <td>{{$form->title}}</td>
                                            <td><img src="{{asset('images')}}/{{$form->profilephoto}}" style="max-width:60px;"/></td>
                                            <td>{{$form->author}}</td>
                                            
                                            <td>
                                            <div class="dropdown">
                                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Actions
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a href="{{$form->link}}" class="dropdown-item" target="_blank">Read</a>
                                                <a href="/add-book-order/{{$form->id}}" class="dropdown-item ">Issue</a>
                                                <a href="/add-book-wish/{{$form->id}}" class="dropdown-item">Wishlist</a>
                                                @if(Auth::user()->role=="admin")
                                                <a href="/edit-book/{{$form->id}}" class="dropdown-item">Edit</a>
                                                <a href="/readmore-book/{{$form->id}}" class="dropdown-item">Read More</a>
                                                <a href="/delete-book/{{$form->id}}" class="dropdown-item">Delete</a>
                                                @endif
                                                </div>
                                                </div>
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