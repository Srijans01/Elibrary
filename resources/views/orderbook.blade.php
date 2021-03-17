@extends('layouts.app')

@section('content')
    <section style="padding-top:60px;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-header">
                            Issue Book
                        </div>
                        <div class="card-body">
                        @if(Session::has('Book_issued'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('Book_issued')}}
                        </div>
                        @endif
                            <form method="POST" action="{{route('form.update')}}" enctype="multipart/form-data">
                                @csrf 
                                <input type="hidden" name="id" value="{{$forme->id}}" /> 
                                <div class="form-group">
                                    <label for="title">Title: </label>
                                    <input type="text" name="title" value="{{$forme->title}}" class="form-control" />
                                </div>
                                
                                <div class="form-group">
                                    <label for="name">Author: </label>
                                    <input type="text" name="author" value="{{$forme->author}}" class="form-control" />
                                </div>

                                <div class="form-group">    
                                    <label for="description">Description: </label>
                                    <input type="text" name="description" value="{{$forme->description}}" class="form-control" />
                                </div>

                                <div class="form-group">    
                                    <label for="link">Link: </label>
                                    <input type="text" name="link" value="{{$forme->link}}" class="form-control" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script>
        function previewFile(input)
        {
            var file=$("input[type=file]").get(0).files[0];
            if(file)
            {
                var reader=new FileReader();
                reader.onload=function()
                {
                    $('#previewImg').attr("src",reader.result);
                }
                reader.readAsDataURL(file);
            }
        }   
    </script>
 @endsection