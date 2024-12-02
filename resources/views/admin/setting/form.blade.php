<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel 8 Tags System Example</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js"></script>
    <link rel="stylesheet" href="{{ asset("/css/css.css") }}">
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
</head>

<div class="box box-info padding-1">

    <ul class="nav nav-tabs" id="myTab" role="tablist">
        @foreach($settingsCategories as $key => $settingsCategory)
            <li class="nav-item" role="presentation">
                <button class="nav-link {{ $key == \App\Models\Setting::CATEGORY_HEADER ? 'active' : '' }}" id="{{$key}}-tab" data-bs-toggle="tab" data-bs-target="#s-{{$key}}"
                        type="button" role="tab" aria-controls="s-{{$key}}" aria-selected="true">
                    {{\App\Models\Setting::getSettingsCategory($key)}}
                </button>
            </li>
        @endforeach
    </ul>

    <div class="tab-content" id="myTabContent">
        @foreach($settingsCategories as $key => $settingsCategory)
            <div class="tab-pane fade show {{ $key == \App\Models\Setting::CATEGORY_HEADER ? 'active' : '' }}" id="s-{{ $key }}" role="tabpanel" aria-labelledby="{{ $key }}-tab">
                <div class="row" style="padding-top: 10px">
                    @foreach($settingsCategory as $setting)
                        @switch($setting->type)
                            @case(\App\Models\Setting::TYPE_IMAGE)
                                <div class="col-sm-6">
                                    {{ Form::label('text',  $setting->name, ['class' => 'form-label']) }}
                                    {{ Form::file($setting->key, [ 'class' => 'form-control' . ($errors->has('$setting->key') ? ' is-invalid' : ''), 'onchange'=> "getImagePreview(event)", "id" => "selectImage"]) }}
                                    {!! $errors->first('image', '<div class="invalid-feedback">:message</div>') !!}
                                    <img id="preview" width="270" height="100" src="{{ $setting->image ? Storage::url($setting->image->name) : '' }}" alt="/" class="mt-3" style="{{$setting->image ? 'display:none' : ''}}" />
                                </div>
                            @break

                            @case(\App\Models\Setting::TYPE_INPUT)
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        {{ Form::label($setting->name) }}
                                        {{ Form::text($setting->key, $setting->value, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => '' ]) }}
                                        {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                </div>
                            @break

                            @case(\App\Models\Setting::TYPE_CHECKBOX)
                                <div class="form-group">
                                    {{ Form::label($setting->name) }}
                                    {{ Form::checkbox($setting->key, '', ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => '']) }}
                                    {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                                @break

                            @case(\App\Models\Setting::TYPE_TEXTAREA)
                            @case(\App\Models\Setting::TYPE_EDITOR)
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        {{ Form::label($setting->name) }}
                                        {{ Form::textArea($setting->key, $setting->value, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => '']) }}
                                        {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                                        <small class="form-text text-muted">{{ $setting->description }}</small>
                                    </div>
                                </div>
                                @break

                            @case(\App\Models\Setting::TYPE_SELECT)
                                 <div class="col-sm-12">
                                    <div class="form-group">
                                        {{ Form::label($setting->name) }}
                                        {{ Form::select($setting->key, $setting->getParams(), $setting->value, ['class' => 'form-select' . ($errors->has('name') ? ' is-invalid' : '')]) }}
                                        {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                </div>
                                @break

                            @case(\App\Models\Setting::TYPE_MULTIPLE)
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        {{ Form::label($setting->name) }}
                                        {{ Form::select($setting->key.'[]', $setting->getParams(), explode(',', $setting->value), ['class' => "form-select" . ($errors->has('name') ? ' is-invalid' : ''), 'multiple'=>'multiple']) }}
                                        {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                </div>
                                @break

                            @case(\App\Models\Setting::TYPE_TAGS)
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        {{ Form::label($setting->name) }}
                                        {{ Form::text($setting->key, $setting->value, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => '', 'data-role' => 'tagsinput']) }}
                                        {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                </div>
                                @break
                        @endswitch
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>

    <div class="box-footer mt20">
        <br><button type="submit" class="btn btn-primary">{{ __('Зберегти') }}</button>
    </div>
</div>
<style>
    .form-group label {
        font-weight: 600;
    }
    .form-group {
        margin-bottom: 20px;
    }
</style>
<script>
    selectImage.onchange = evt => {
        preview = document.getElementById('preview');
        preview.style.display = 'block';
        const [file] = selectImage.files
        if (file) {
            preview.src = URL.createObjectURL(file)
        }
    }

</script>
