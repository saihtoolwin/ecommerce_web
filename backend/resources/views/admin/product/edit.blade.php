@extends('layouts.admin')
@section('styles')
    <style>
        .dropzone .dz-preview .dz-image img {
            object-fit: cover;
            width: 100%;
            /* Ensure the image takes the full width of the container */
            height: 100%;
            /* Ensure the image takes the full height of the container */
        }

        .dz-error-message {
            display: none !important;
        }
    </style>
@endsection
@section('content')
    <div class="card">
        <h5 class="card-header font-weight-bold mb-4"> {{ trans('global.edit') }} {{ trans('cruds.user.title_singular') }}
        </h5>
        {{-- <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.user.title_singular') }}
        </div> --}}

        <div class="card-body">
            <form method="POST" action="{{ route('admin.product.update', [$product->id]) }}" enctype="multipart/form-data"
                id="myForm">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 mt-2">
                        <div class="form-group">
                            <label class="required" for="name">{{ trans('cruds.product.fields.name') }}</label>
                            <input class="form-control {{ $errors->has('name') ? 'is-invalid' : ' ' }}" type="text"
                                name="name" id="name" value="{{ old('name', $product->name) }}">
                            <span class="name_error"></span>
                            @if ($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 mt-2">
                        <div class="form-group">
                            <label class="" for="price">{{ trans('cruds.product.fields.price') }}</label>
                            <input class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" type="number"
                                name="price" id="price" value="{{ old('price', $product->price) }}">
                            <span class="price_error"></span>
                            @if ($errors->has('price'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('price') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 mt-2">
                        <div class="form-group">
                            <label class="required" for="qty">{{ trans('cruds.product.fields.qty') }}</label>
                            <input class="form-control {{ $errors->has('qty') ? 'is-invalid' : '' }}"
                                value="{{ old('qty', $product->qty) }}" type="number" name="qty" id="qty">
                            <span class="qty_error"></span>
                            @if ($errors->has('qty'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('qty') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 mt-2">
                        <div class="form-group">
                            <label class="required" for="discount">{{ trans('cruds.product.fields.discount') }}</label>
                            <input class="form-control {{ $errors->has('discount') ? 'is-invalid' : '' }}"
                                value="{{ old('discount', $product->discount) }}" type="number" name="discount"
                                id="discount">
                            <span class="discount_error"></span>
                            @if ($errors->has('discount'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('discount') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 mt-2">
                        <div class="form-group">
                            <label class="required"
                                for="category_id">{{ trans('cruds.product.fields.category_id') }}</label>
                            <select name="category_id" id="category_id" class="form-select">
                                <option value="">Please Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @if ($category->id == $product->category_id) selected @endif>
                                        {{ $category->name }}</option>
                                @endforeach
                            </select>
                            <span class="category_id_error"></span>
                            @if ($errors->has('category_id'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('category_id') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 mt-3">
                        <div class="form-group">
                            <label class="required" for="image">{{ trans('cruds.product.fields.image') }}</label>
                            <div id="image-upload" class="dropzone">
                            </div>
                            <span class="image_error"></span>
                            @if ($errors->has('image'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('image') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 mt-3">
                        <div class="form-group">
                            <label class="required"
                                for="description">{{ trans('cruds.product.fields.description') }}</label>
                            <textarea name="description" class="form-control">{{ $product->description }}</textarea>
                            <span class="description_error"></span>
                            @if ($errors->has('description'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('description') }}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 d-flex mt-3">
                        <div class="form-group mt-2 mr-3">
                            <button class="btn btn-success" type="submit" id="save">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                        <div class="form-group mt-2 ms-2">
                            <a onclick=history.back() class="btn btn-secondary text-white">
                                {{ trans('global.cancel') }}
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    {{-- DropZone for image  --}}
    <script>
        var product = {!! json_encode($product) !!};
        var maxFilesAlertShown = false;
        // let product_length = 0;
        let total_image = 0;
        console.log(total_image + " it is original length");

        $(document).ready(function() {
            // Initialize Dropzone
            new Dropzone('#image-upload', {
                url: '{{ route('admin.category.storeMedia') }}',
                maxFilesize: 1, // MB
                acceptedFiles: '.jpeg,.jpg,.png,.gif',
                maxFiles: 1,
                addRemoveLinks: true,
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                params: {
                    size: 1,
                    width: 4096,
                    height: 4096
                },
                success: function(file, response) {
                    console.log(this.files.length+"it work success!");
                    total_image += this.files.length;
                    console.log(total_image + "this is from success")
                    if (total_image > 1) {
                    total_image -= this.files.length;
                        this.removeFile(file);
                        if (!maxFilesAlertShown) {
                            alert("You can only upload one image.");
                            maxFilesAlertShown = true;
                        }
                        
                        return;
                    }
                    $('form').find('input[name="image"]').remove();
                    $('form').append('<input type="hidden" name="image" class="d-none" value="' +
                        response.name +
                        '">');
                    this.options.maxFiles = 1;
                },
                removedfile: function(file) {
                    console.log(this.files.length +"it is from remove");
                    if(this.files.length == 0)
                    {
                        console.log("it is 0")
                        total_image -= 1;
                    }else{
                        total_image -= this.files.length;

                    }
                    console.log(total_image );
                    // console.log(total_image);
                    $('form').find('input[name="image"]').remove();
                    file.previewElement.remove();
                    this.options.maxFiles = this.options.maxFiles + 1;
                    maxFilesAlertShown = false;
                },
                init: function() {
                    total_image =product.media.length;
                    console.log(total_image + "it is from init");
                    if (product && product.media.length > 1) {
                        console.log("it is from init");

                    } else {
                        product.media.forEach(productImg => {
                            file = productImg;
                            this.options.addedfile.call(this, file);
                            this.options.thumbnail.call(this, file, file.preview || file
                                .preview_url);
                            $(file.previewElement).find('img').attr('src', file.url || file
                                .preview || file
                                .preview_url);
                            file.previewElement.classList.add('dz-complete');
                            $('form').append('<input type="hidden"  name="image" value="' + file
                                .file_name +
                                '">');
                            this.options.maxFiles = this.options.maxFiles - 1;
                        });
                        $('.dz-message').addClass('d-none');
                    }

                    

                },
                error: function(file, response) {
                    total_image += this.files.length;
                    console.log(total_image + "this is from error")
                    if (total_image > 1) {
                        console.log(this.files.length+ 'pppp')
                        total_image -=this.files.length;
                        this.removeFile(file);
                        console.log(total_image + "this is from error in side if")

                        if (!maxFilesAlertShown) {
                            alert("You can only upload one image.");

                            maxFilesAlertShown = true;
                        }
                        return;
                    }
                    file.previewElement.remove();

                    this.options.maxFiles = this.options.maxFiles + 1;
                    maxFilesAlertShown = false;
                },
            });
        });
    </script>
@endsection
