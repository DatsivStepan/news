@extends('layouts.adminMenu')

@section('template_title')
    {{ __('Create') }} Gallery
@endsection

<link rel="stylesheet" href="/css/dropzone.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <br><div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Створення галереї</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.gallery.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('admin/gallery/form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
