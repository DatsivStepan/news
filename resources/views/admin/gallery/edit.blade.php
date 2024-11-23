 @extends('layouts.adminMenu')

@section('template_title')
    {{ __('Update') }} Галереї
@endsection
 <link rel="stylesheet" href="/css/dropzone.css">
 <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <br><div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Редагування галереї</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.gallery.update', $gallery->id) }}" role="form"
                              enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('admin.gallery.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
