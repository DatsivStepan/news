
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" rel="stylesheet" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js"></script>
{{--<script src="https://cdn.tiny.cloud/1/y26a029ydyylmsnf30o7fgdvjj6kudbynz7ukktszbvev5r6/tinymce/5-stable/tinymce.min.js" referrerpolicy="origin"></script>--}}
<script src="https://cdn.tiny.cloud/1/y26a029ydyylmsnf30o7fgdvjj6kudbynz7ukktszbvev5r6/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col-sm-8">
                <div class="mb-3">
                    {{ Form::label(__('main.title')) }}
                    {{ Form::text('title', $news->title, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => __('main.title') ]) }}
                    {!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="mb-3">
                    {{ Form::label( __('main.captionToPhoto')) }}
                    {{ Form::text('subtitle', $news->subtitle, ['class' => 'form-control' . ($errors->has('subtitle') ? ' is-invalid' : ''), 'placeholder' =>  __('main.captionToPhoto')]) }}
                    {!! $errors->first('subtitle', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="mb-3">
                    {{ Form::label(__('main.miniDescription')) }}
                    {{ Form::textarea('mini_description', $news->mini_description, ['class' => 'form-control' . ($errors->has('mini_description') ? ' is-invalid' : ''), 'rows' => '3', 'placeholder' => __('main.miniDescription') ]) }}
                    {!! $errors->first('mini_description', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="mb-3">
                    {{ Form::label(__('main.description')) }}
                    {{ Form::textarea('description', $news->description, ['class' => 'description form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => __('main.description') ]) }}
                    {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="mb-3">
                    {{ Form::text('tags', $tags, ['class' => 'form-control' . ($errors->has('tags') ? ' is-invalid' : ''), 'placeholder' => 'Тег...', 'data-role' => 'tagsinput']) }}
                    {!! $errors->first('tags', '<div class="invalid-feedback">Поле тегів є обов’язковим для заповнення.</div>') !!}
                </div>
            </div>
            <div class="col-sm-4">
                <div class="mb-3">
                    {{ Form::label('text',  __('main.image'), ['class' => 'form-label']) }}
                    {{ Form::file('image', [
                        'accept' => "image/*",
                        'class' => 'form-control' . ($errors->has('image') ? ' is-invalid' : ''),
                        'onchange'=> "getImagePreview(event)",
                        "public/image/planes/Fh2pmleVODSftbdH0gctY01sr6FH4iQHUkDXxDCd.png",
                        "id" => "selectImage"]) }}
                    {!! $errors->first('image', '<div class="invalid-feedback">:message</div>') !!}
                    <img id="preview" width="50%" src="{{ Storage::url($image) }}" alt="/" class="mt-3" style="{{$image ? '' : 'display:none'}}"/>
                </div>

                <div class="mb-3">

                    <div class="form-group">
                        <label for="categories">Категорії</label>
                        <select id="categories" name="categories[]" class="form-control" multiple="multiple" required>
                            {!! buildCategoryOptions($categories, $selectedCategories ?? []) !!}
                        </select>
                    </div>

{{--                    {{ Form::label( __('main.category')) }}--}}
{{--                    {{ Form::select('category_id', $categories, $news->category, ['class' => 'form-select' . ($errors->has('category_id') ? ' is-invalid' : '')]) }}--}}
{{--                    {!! $errors->first('category_id', '<div class="invalid-feedback">:message</div>') !!}--}}
                </div>
                <div class="mb-3">
                    {{ Form::label( __('main.author')) }}
                    {{ Form::select('author_id', $authors, $news->author, ['class' => 'form-select' . ($errors->has('author_id') ? ' is-invalid' : '')]) }}
                    {!! $errors->first('author_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="mb-3">
                    {{ Form::label('Вивід автора') }}
                    {{ Form::checkbox('show_author', 1, $news->show_author) }}
                    {!! $errors->first('show_author', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <hr>
                <div class="mb-3">
                    <div class="form-check form-check-inline">
                        {{ Form::label(__('main.publish')) }}
                        {{ Form::radio('type_publication', 1, $news->type_publication == 1 ? true : false, ['checked' => 'checked']) }}
                        {!! $errors->first('type_publication', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    <div class="form-check form-check-inline">
                        {{ Form::label(__('main.draft')) }}
                        {{ Form::radio('type_publication', 2, $news->type_publication == 2 ? true : false) }}
                        {!! $errors->first('type_publication', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
                <div class="form-check form-check-inline">
                    {{ Form::label(__('main.simpleNews')) }}
                    {{ Form::radio('type', 1, $news->type == 1 ? true : false, ['checked' => 'checked']) }}
                    {!! $errors->first('type', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-check form-check-inline">
                    {{ Form::label(__('main.importantNews')) }}
                    {{ Form::radio('type', 2, $news->type == 2 ? true : false) }}
                    {!! $errors->first('type', '<div class="invalid-feedback">:message</div>') !!}
                </div>

                <br> <br>
                <div class="form-check form-check-inline">
                    {{ Form::label(__('Текст')) }}
                    {{ Form::radio('show_type', \App\Models\News::SHOW_TYPE_TEXT, $news->show_type == \App\Models\News::SHOW_TYPE_TEXT, ['checked' => 'checked']) }}
                    {!! $errors->first('show_type', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-check form-check-inline">
                    {{ Form::label(__('Фото')) }}
                    {{ Form::radio('show_type', \App\Models\News::SHOW_TYPE_IMAGE, $news->show_type == \App\Models\News::SHOW_TYPE_IMAGE) }}
                    {!! $errors->first('show_type', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-check form-check-inline">
                    {{ Form::label(__('Відео')) }}
                    {{ Form::radio('show_type', \App\Models\News::SHOW_TYPE_VIDEO, $news->show_type == \App\Models\News::SHOW_TYPE_VIDEO) }}
                    {!! $errors->first('show_type', '<div class="invalid-feedback">:message</div>') !!}
                </div>

                <br><br>
                <div class="mb-3">
                    {{ Form::label(__('main.dateOfPublication')) }}
                    {{ Form::dateTimelocal('date_of_publication', date('Y-m-d H:i', strtotime($news->date_of_publication ? date('Y-m-d H:i', strtotime($news->date_of_publication)) : now())), ['class' => 'form-control' . ($errors->has('date_of_publication') ? ' is-invalid' : ''), 'placeholder' => 'Date Of Publication']) }}
                    {!! $errors->first('date_of_publication', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>


        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Зберегти') }}</button>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#categories').select2({
            placeholder: "Виберіть категорії",
            allowClear: true
        });
    });

    // Функція для отримання оновленого конфігураційного об'єкта для діалога відповідно до введеного тексту
    function getUpdatedDialogConfig(inputText, editorlink, selectValue) {
        // Реалізуйте ваш логіку для генерації оновленого конфігураційного об'єкта
        // на основі введеного тексту та поточного стану панелі

        // Приклад: змініть items у селектбоксі відповідно до введеного тексту
        const updatedItems = getUpdatedSelectItems(inputText);

        // Поверніть новий конфігураційний об'єкт для діалога з оновленими items
        return {
            initialData: {
                custom_data: inputText,
                selected_style: selectValue,
            },
            id: 'customPanel',  // Ідентифікатор панелі повинен бути такий же, як і раніше
            title: 'Додавання галереї',
            body: {
                id: 'customPanel',
                type: 'panel',
                items: [{
                    type: 'input',
                    name: 'custom_data',
                    label: 'Пошук',
                    flex: true,
                },{
                    type: 'selectbox',
                    name: 'selected_style',
                    label: 'Виберіть галерею',
                    items: updatedItems,  // Оновлені елементи для селектбоксу
                    flex: true
                }],
            },

            onChange: function (api, details) {
                // Отримайте введені дані з інпуту
                const inputText = api.getData().custom_data;
                const selectValue = api.getData().selected_style;

                // Створіть новий конфігураційний об'єкт для діалога з оновленими елементами
                const newDialogConfig = getUpdatedDialogConfig(inputText, editorlink, selectValue);
                //
                // // Викличте redial з новим конфігураційним об'єктом
                api.redial(newDialogConfig);
            },

            onSubmit: function (api) {
                console.log(api);
                // insert markup
                let data = api.getData();

                let foundItem = updatedItems.find(item => item.value === data.selected_style);

                let textValue = foundItem.text;
                let content =
                    '<table style="height:100px;min-height:100px;max-height:100px;background-color: #8080806b;min-width:100%;width:100%;" class="nonedit gallery-block" data-gallery="' + data.selected_style + '">' +
                        '<tr>' +
                            '<td style="text-align: center"> ' + textValue + ' #' +
                                data.selected_style +
                            '</td>';
                        '</tr>';
                    '</table>';
                editorlink.insertContent(content);

                // close the dialog
                api.close();
            },
            buttons: [
                {
                    text: 'Відмінити',
                    type: 'cancel',
                    onclick: 'close'
                },
                {
                    text: 'Додати',
                    type: 'submit',
                    primary: true,
                    enabled: true
                }
            ]
        };
    }

    // Функція для отримання оновлених елементів у селектбоксі відповідно до введеного тексту
    function getUpdatedSelectItems(inputText = '') {
        const initialItems = {!! $galleries !!};
        console.log(initialItems);

        const filteredItems = initialItems.filter(item => item.text.toLowerCase().includes(inputText.toLowerCase()));
        const limitedItems = filteredItems.slice(0, 10);

        return limitedItems;
    }

    const updatedItems = getUpdatedSelectItems();

    tinymce.init({
        selector: 'textarea.description',
        plugins: 'example anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount code preview ',
        toolbar: 'example undo redo | custom_dialog blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat code preview',
        noneditable_class: 'nonedit',
        height: 600,
        setup: function (editor) {
            editor.ui.registry.addButton('custom_dialog', {
                text: 'Галерея',
                onAction: function() {
                    // Open a Dialog
                    editor.windowManager.open({
                        initialData: {
                            custom_data: ''
                        },
                        id: 'customPanel',
                        title: 'Додавання галереї',
                        body: {
                            type: 'panel',
                            id: 'customPanel',  // Додайте ідентифікатор панелі
                            items: [{
                                type: 'input',
                                name: 'custom_data',
                                label: 'Пошук',
                                flex: true,
                            },{
                                type: 'selectbox',
                                name: 'selected_style',
                                label: 'Виберіть галерею',
                                items: updatedItems,
                                flex: true
                            }]
                        },
                        onChange: function (api, details) {
                            // Отримайте введені дані з інпуту
                            const inputText = api.getData().custom_data;
                            const selectValue = api.getData().selected_style;
                            // Створіть новий конфігураційний об'єкт для діалога з оновленими елементами
                            const newDialogConfig = getUpdatedDialogConfig(inputText, editor, selectValue);
                            //
                            // // Викличте redial з новим конфігураційним об'єктом
                            api.redial(newDialogConfig);
                        },
                        onSubmit: function (api, test) {
                            // insert markup
                            let data = api.getData();

                            let foundItem = updatedItems.find(item => item.value === data.selected_style);

                            let textValue = foundItem.text;
                            let content =
                                '<table style="height:100px;min-height:100px;max-height:100px;background-color: #8080806b;min-width:100%;width:100%;" class="nonedit gallery-block" data-gallery="' + data.selected_style + '">' +
                                '<tr>' +
                                '<td style="text-align: center"> ' + textValue + ' #' +
                                data.selected_style +
                                '</td>';
                            '</tr>';
                            '</table>';
                            editor.insertContent(content);

                            // close the dialog
                            api.close();
                        },
                        buttons: [
                            {
                                text: 'Відмінити',
                                type: 'cancel',
                                onclick: 'close'
                            },
                            {
                                text: 'Додати',
                                type: 'submit',
                                primary: true,
                                enabled: true
                            }
                        ]
                    });
                }
            });
        },

        tinycomments_mode: 'embedded',
        rel_list: [
            {title: 'Включити "nofollow"', value: 'nofollow'},
            {title: 'Пусто', value: ''}
        ],

        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px } script[src*="telegram"] { display:block;width:100%;height:350px; background:url("https://futurenow.com.ua/wp-content/uploads/2023/09/image-29-840x480.png"); background-repeat: no-repeat; background-position: center;} iframe ~ script[src*="telegram"] {display:none;} table:has(iframe){ border: 0px; }  td:has(iframe){ border: 0px !important; } ',

        /* enable automatic uploads of images represented by blob or data URIs*/
        automatic_uploads: true,
        /*
          URL of our upload handler (for more details check: https://www.tiny.cloud/docs/configure/file-image-upload/#images_upload_url)
          images_upload_url: 'postAcceptor.php',
          here we add custom filepicker only to Image dialog
        */
        images_upload_url: '{{ route('admin.news.upload') }}',
        file_picker_types: 'image',
        /* and here's our custom image picker*/
        file_picker_callback: function (cb, value, meta) {
            var input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.setAttribute('accept', 'image/*');

            /*
              Note: In modern browsers input[type="file"] is functional without
              even adding it to the DOM, but that might not be the case in some older
              or quirky browsers like IE, so you might want to add it to the DOM
              just in case, and visually hide it. And do not forget do remove it
              once you do not need it anymore.
            */

            input.onchange = function () {
                var file = this.files[0];

                var reader = new FileReader();
                reader.onload = function () {
                    /*
                      Note: Now we need to register the blob in TinyMCEs image blob
                      registry. In the next release this part hopefully won't be
                      necessary, as we are looking to handle it internally.
                    */
                    var id = 'blobid' + (new Date()).getTime();
                    var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                    var base64 = reader.result.split(',')[1];
                    var blobInfo = blobCache.create(id, file, base64);
                    blobCache.add(blobInfo);

                    /* call the callback and populate the Title field with the file name */
                    cb(blobInfo.blobUri(), { title: file.name });
                };
                reader.readAsDataURL(file);
            };

            input.click();
        },
        extended_valid_elements : "script[charset|defer|language|src|type]"

    });

    {{--tinymce.init({--}}
    {{--    selector: 'textarea.description',--}}
    {{--    plugins: 'example anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount code preview ',--}}
    {{--    toolbar: 'example undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat code preview',--}}
    {{--    tinycomments_mode: 'embedded',--}}
    {{--    rel_list: [--}}
    {{--        {title: 'Включити "nofollow"', value: 'nofollow'},--}}
    {{--        {title: 'Пусто', value: ''}--}}
    {{--    ],--}}

    {{--    content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px } script[src*="telegram"] { display:block;width:100%;height:350px; background:url("https://futurenow.com.ua/wp-content/uploads/2023/09/image-29-840x480.png"); background-repeat: no-repeat; background-position: center;} iframe ~ script[src*="telegram"] {display:none;} table:has(iframe){ border: 0px; }  td:has(iframe){ border: 0px !important; } ',--}}

    {{--    /* enable automatic uploads of images represented by blob or data URIs*/--}}
    {{--    automatic_uploads: true,--}}
    {{--    /*--}}
    {{--      URL of our upload handler (for more details check: https://www.tiny.cloud/docs/configure/file-image-upload/#images_upload_url)--}}
    {{--      images_upload_url: 'postAcceptor.php',--}}
    {{--      here we add custom filepicker only to Image dialog--}}
    {{--    */--}}
    {{--    images_upload_url: '{{ route('admin.news.upload') }}',--}}
    {{--    file_picker_types: 'image',--}}
    {{--    /* and here's our custom image picker*/--}}
    {{--    file_picker_callback: function (cb, value, meta) {--}}
    {{--        var input = document.createElement('input');--}}
    {{--        input.setAttribute('type', 'file');--}}
    {{--        input.setAttribute('accept', 'image/*');--}}

    {{--        /*--}}
    {{--          Note: In modern browsers input[type="file"] is functional without--}}
    {{--          even adding it to the DOM, but that might not be the case in some older--}}
    {{--          or quirky browsers like IE, so you might want to add it to the DOM--}}
    {{--          just in case, and visually hide it. And do not forget do remove it--}}
    {{--          once you do not need it anymore.--}}
    {{--        */--}}

    {{--        input.onchange = function () {--}}
    {{--            var file = this.files[0];--}}

    {{--            var reader = new FileReader();--}}
    {{--            reader.onload = function () {--}}
    {{--                /*--}}
    {{--                  Note: Now we need to register the blob in TinyMCEs image blob--}}
    {{--                  registry. In the next release this part hopefully won't be--}}
    {{--                  necessary, as we are looking to handle it internally.--}}
    {{--                */--}}
    {{--                var id = 'blobid' + (new Date()).getTime();--}}
    {{--                var blobCache =  tinymce.activeEditor.editorUpload.blobCache;--}}
    {{--                var base64 = reader.result.split(',')[1];--}}
    {{--                var blobInfo = blobCache.create(id, file, base64);--}}
    {{--                blobCache.add(blobInfo);--}}

    {{--                /* call the callback and populate the Title field with the file name */--}}
    {{--                cb(blobInfo.blobUri(), { title: file.name });--}}
    {{--            };--}}
    {{--            reader.readAsDataURL(file);--}}
    {{--        };--}}

    {{--        input.click();--}}
    {{--    },--}}
    {{--    extended_valid_elements : "script[charset|defer|language|src|type]"--}}
    {{--});--}}
</script>
