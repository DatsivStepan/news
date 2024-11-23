@extends('layouts.adminMenu')

@section('content')
    <div class="container-fluid" style="padding-top: 15px">

{{--        <div class="card text-center">--}}
{{--            <div class="card-header">--}}
{{--                Аналітика--}}
{{--            </div>--}}
{{--            <div class="card-body">--}}
{{--                <h5 class="card-title">В розробці</h5>--}}
{{--            </div>--}}
{{--        </div>--}}

        <div class="row" style="margin-top: 20px">
            <div class="col-md-6 col-xl-3">
                <div class="card card-stats card-warning">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5" style="padding-top: 20px">
                                <div class="icon-big text-center">
                                    <i class="fas fa-users fa-2xl"></i>
                                </div>
                            </div>
                            <div class="col-7 d-flex align-items-center">
                                <div class="numbers">
                                    <p class="card-category">Весь час</p>
                                    <h4 class="card-title">{{ $responseView['site_all'] . ' / ' . $responseView['site_unique'] }} </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card card-stats card-success">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5" style="padding-top: 20px">
                                <div class="icon-big text-center">
                                    <i class="fas fa-users fa-2xl"></i>
                                </div>
                            </div>
                            <div class="col-7 d-flex align-items-center">
                                <div class="numbers">
                                    <p class="card-category">Сьогодні</p>
                                    <h4 class="card-title">{{ $responseView['site_all_day'] . ' / ' . $responseView['site_unique_day'] }} </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="card card-stats card-danger">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5" style="padding-top: 20px">
                                <div class="icon-big text-center">
                                    <i class="fas fa-list fa-2xl"></i>
                                </div>
                            </div>
                            <div class="col-7 d-flex align-items-center">
                                <div class="numbers">
                                    <p class="card-category">Категорії</p>
                                    <h4 class="card-title">{{ $responseView['category_all'] . ' / ' . $responseView['category_unique'] }} </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card card-stats card-primary">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5" style="padding-top: 20px">
                                <div class="icon-big text-center">
                                    <i class="fas fa-columns fa-2xl"></i>
                                </div>
                            </div>
                            <div class="col-7 d-flex align-items-center">
                                <div class="numbers">
                                    <p class="card-category">Новини</p>
                                    <h4 class="card-title">{{ $responseView['news_all'] . ' / ' . $responseView['news_unique'] }} </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" style="margin-top:20px">

            @foreach ($categories as $category)

                <div class="col-sm-6">
                    <div class="card" style="margin-top:10px;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $category->getName() }}</h5>
                            <p class="card-text">{{ $category->getShortDescription() }}</p>
                            <a href="{{ $category->getAdminUrl() }}" class="btn btn-primary">Перейти</a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>


    </div>

@endsection()
