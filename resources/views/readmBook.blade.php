@extends('layouts.app')

@section('content')
    <section style="padding-top:60px;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-header">
                            BOOK DETAILS
                        </div>
                        <div class="card-body">
                        @if(Session::has('Book_updated'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('Book_updated')}}
                        </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-sm table-borderless mb-0">
                            <tbody>
                                <th class="pl-0 w-25" scope="row"><strong>Cover Image:</strong></th>
                                <td class="d-flex justify-content-center"><img src="{{asset('images')}}/{{$forme->profilephoto}}" /></td>
                                </tr>
                                <tr>
                                <tr>
                                <th class="pl-0 w-25" scope="row"><strong>Name:</strong></th>
                                <td>{{$forme->title}}</td>
                                </tr>
                                <tr>
                                <th class="pl-0 w-25" scope="row"><strong>Author:</strong></th>
                                <td>{{$forme->author}}</td>
                                </tr>
                                <tr>
                                <th class="pl-0 w-25" scope="row"><strong>Description</strong></th>
                                <td>{{$forme->description}}</td>
                                </tr>
                            </tbody>
                            
                            </table>
                        </div>
                        <a href="{{$forme->link}}" class="btn btn-success" target="_blank">Read</a>

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