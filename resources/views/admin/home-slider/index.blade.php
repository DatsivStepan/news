@extends('layouts.adminMenu')

@section('template_title')
    Home Slider
@endsection

@section('content')
    <br><div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                {{ __('main.HomeSlider') }}
                            </span>
                             <div class="float-right">
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>@lang('main.no')</th>
                                        <th>@lang('main.title')</th>
                                        <th>@lang('main.miniDescription')</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($homeSliders as $homeSlider)
                                        <tr>
                                            <td>{{ $homeSlider->id }}</td>
											<td>{{ $homeSlider->news->title }}</td>
											<td>{{ $homeSlider->news->mini_description }}</td>
                                            <td>
                                                <form action="{{ route('admin.sliders.destroy',$homeSlider->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
{{--                {!! $homeSliders->links() !!}--}}
            </div>
        </div>
    </div>
@endsection
