@extends('layouts.app')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger" id="id1">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if(Session::has('Book_removed'))
        <div class="alert alert-success" id="id1" role="alert">
            {{Session::get('Book_removed')}}
        </div>
    @endif
    <section style="padding-top:60px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            Issued Books 
                        </div>
                        <div class="card-body">
                            
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
                                        <tr>
                                            <td>{{$form->title}}</td>
                                            <td><img src="{{asset('images')}}/{{$form->profilephoto}}" style="max-width:60px;"/></td>
                                            <td>{{$form->author}}</td>
                                            
                                            <td>
                                                <a href="{{$form->link}}" class="btn btn-success" target="_blank">Read</a>
                                                <a href="/remove-book/{{$form->id}}" class="btn btn-danger" >Remove</a>
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