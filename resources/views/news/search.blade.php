@extends('layouts.app')

@section('template_title')

@endsection

@section('content')

    @include('layouts.filterMenu')

    <div class="container">
        <br>
        <div class="row">
            <form action="{{ route('search')  }}" method="get" style="float: right">
                <div  class="input-group">
                    <input name="query" value="{{ isset($_GET['query']) ? $_GET['query'] : '' }}" class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="submit"><i class="fas fa-search"></i></button>
                </div><br>
            </form>
            <div class="col-sm-9">
                <div class="news row">
                    @include('news._list-news')
                </div>
            </div>
        </div>
    </div>
    @if($news->hasMorePages())
        <div class="more text-center">
            <button class="btn btn-success load-more-data">Переглянути більше</button>
        </div>
    @endif

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>

        var ENDPOINT = "{{ route('search') }}";
        var page = 1;
        var type = '{{$_GET['type'] ?? ''}}'

        $(".load-more-data").click(function(){
            page++;
            infinteLoadMore(page);
        });

        function infinteLoadMore(page) {

            $.ajax({
                url: ENDPOINT + "?page=" + page,
                data:{
                    type: type,
                    "_token": "{{ csrf_token() }}"
                },
                datatype: "html",
                type: "get",
                beforeSend: function () {
                    $('.auto-load').show();
                }
            })
                .done(function (response) {
                    if (!response.pagin) {
                        $('.more').remove();
                    }
                    $('.auto-load').hide();
                    $(".news").append(response.html);
                })
                .fail(function (jqXHR, ajaxOptions, thrownError) {
                    console.log('Server error occured');
                });
        }
    </script>

@endsection

