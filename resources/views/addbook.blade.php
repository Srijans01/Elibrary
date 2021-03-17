@extends('layouts.app')

@section('content')
    <section style="padding-top:60px;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-header">
                            Add New Book
                        </div>
                        <div class="card-body">
                        @if(Session::has('Book_added'))
                        <div class="alert alert-success" id="id1" role="alert">
                            {{Session::get('Book_added')}}
                        </div>
                        @endif
                            <form method="POST" action="{{route('form.store')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="title">Title: </label>
                                    <input type="text" name="title" class="form-control" />
                                </div>
                                
                                <div class="form-group">
                                    <label for="name">Author: </label>
                                    <input type="text" name="author" class="form-control" />
                                </div>

                                <div class="form-group">    
                                    <label for="description">Description: </label>
                                    <input type="text" name="description" class="form-control" />
                                </div>

                                <div class="form-group">    
                                    <label for="link">Book Link: </label>
                                    <input type="text" name="link" class="form-control" />
                                </div>

                                <div class="form-group">
                                    <label for="file">Chose Cover Image: </label>
                                    <input type="file" name="file" class="form-control" onchange="previewFile(this)" />

                                </div>
                                <button type="submit" style="margin-top:20px;" class="btn btn-success">Submit</button>
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
        setTimeout(function() {
    $('#id1').fadeOut('fast');
}, 3000);
       
    </script>
 @endsection