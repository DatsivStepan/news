<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label(__('Назва')) }}
            {{ Form::text('name', $gallery->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => __('Назва')]) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="card mb-4" style="margin-top: 20px">
            <input type="hidden" name="files" value="{{ $gallery->files_array }}" />
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0 card-title">Медіа</h5>
{{--                <a href="javascript:void(0);" class="fw-medium">Додати медіа через URL</a>--}}
            </div>
            <div class="card-body">
                <div class="dropzone needsclick" id="dropzone-media">
                    <div class="dz-message needsclick my-5">
                        <p class="fs-4 note needsclick my-2">Перетягніть сюди свій медіафайл</p>
                        <small class="text-muted d-block fs-6 my-2">or</small>
                        <span class="note needsclick btn bg-label-primary d-inline" id="btnBrowse">Перегляньте зображення</span>
                    </div>
                    <div class="fallback">
                        <input name="file" type="file" />
                    </div>
                </div>
            </div>
        </div>

        <div class="table table-striped files" id="previews">
            <div id="template" class="file-row dz-image-preview">
                <!-- This is used as the file preview template -->
                <div>
                    <span class="preview"><img style="max-width: 120px" data-dz-thumbnail></span>
                </div>
                <div>
                    <p class="name" data-dz-name></p>
                    <strong class="error text-danger" data-dz-errormessage></strong>
                </div>
                <div>
{{--                    <p class="size" data-dz-size></p>--}}
                    <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                        <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
                    </div>
                </div>
                <div>
                    <button data-dz-remove class="btn btn-danger delete dz-remove">
                        <i class="glyphicon glyphicon-trash"></i>
                        <span>Delete</span>
                    </button>
                </div>
            </div>
        </div>

{{--        <div class="card mb-4">--}}
{{--            @foreach($gallery->files as $file)--}}
{{--                <div class="dz-preview dz-processing dz-image-preview dz-success dz-complete">--}}
{{--                    <div class="dz-details">--}}
{{--                        <div class="dz-thumbnail">--}}
{{--                            <img data-dz-thumbnail="" alt="{{ $file->getFileName() }}" src="{{ $file->getFileUrl() }}">--}}
{{--                            <span class="dz-nopreview">No preview</span>--}}
{{--                            <div class="dz-success-mark"></div>--}}
{{--                            <div class="dz-error-mark"></div>--}}
{{--                            <div class="dz-error-message"><span data-dz-errormessage=""></span></div>--}}
{{--                            <div class="progress">--}}
{{--                                <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuemin="0" aria-valuemax="100" data-dz-uploadprogress="" style="width: 100%;"></div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="dz-filename" data-dz-name="">{{ $file->getFileName() }}</div>--}}
{{--                        <div class="dz-size" data-dz-size=""><strong>74.4</strong> KB</div>--}}
{{--                    </div>--}}
{{--                    <a class="dz-remove" href="javascript:undefined;" data-dz-remove="">Remove file</a>--}}
{{--                </div>--}}
{{--            @endforeach--}}
{{--        </div>--}}

    </div>
    <br><div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('main.add') }}</button>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    var previewNode = document.querySelector("#template");
    previewNode.id = "";
    var previewTemplate = previewNode.parentNode.innerHTML;
    previewNode.parentNode.removeChild(previewNode);

    Dropzone.options.dropzoneMedia = {
        maxFilesize: 12,
        url: '/admin/gallery/upload',
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        },
        renameFile: function(file) {
            var dt = new Date();
            var time = dt.getTime();
            return time+file.name;
        },
        acceptedFiles: ".jpeg,.jpg,.png,.gif",
        addRemoveLinks: false,
        timeout: 50000,
        previewTemplate: previewTemplate,
        previewsContainer: "#previews",
        removedfile: function(file) {
            console.log(file)
            let name = typeof file.upload != "undefined" ? file.upload.filename : file.name;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                type: 'POST',
                url: '{{ url("/admin/gallery/destroy") }}',
                data: {filename: name},
                success: function (data) {
                    console.log("File has been successfully removed!!");
                    // $('.dropzone').addClass('dz-started')
                },
                error: function(e) {
                    console.log(e);
                }
            });

            let files =  $('[name=files]').val() ? jQuery.parseJSON($('[name=files]').val()) : [];
            files = $.grep(files, function(value) {
                return value != name;
            });
            $('[name=files]').val(JSON.stringify(files))

            var fileRef;
            return (fileRef = file.previewElement) != null ?
                fileRef.parentNode.removeChild(file.previewElement) : void 0;
        },

        init: function() {
            let files =  $('[name=files]').val() ? jQuery.parseJSON($('[name=files]').val()) : null;

            let thisDropzone = this;
            if (files) {
                for (let fil in files) {
                    let mockFile = { name: files[fil] };
                    thisDropzone.emit("addedfile", mockFile);
                    thisDropzone.emit("success", mockFile);
                    thisDropzone.emit("thumbnail", mockFile, "/images/galleries/" + files[fil])
                }
            }
        },

        success: function(file, response) {

            console.log(file)
            if (response) {
                let files =  $('[name=files]').val() ? jQuery.parseJSON($('[name=files]').val()) : [];
                files.push(response.success)
                $('[name=files]').val(JSON.stringify(files))

                if (response.success) {
                    file.previewElement.classList.add("dz-success")
                } else {
                    file.previewElement.classList.add("dz-error")
                }
            }
        },
        error: function(file, response) {
            return false;
        }
    };
</script>
