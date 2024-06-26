@extends('layouts.admin')
@section('styles')
    <style>
        .wrapper {
            background: #39E2B6;
            height: 100%;
            width: 100%;
            position: fixed;
            top: 0;
            z-index: 9999;
            text-align: center;
            left: 0;
            font-size: 100px;
            font-family: calibri;
            color: white;
            line-height: 100vh;
        }

        .dropzone {
            width: 100%;
            margin: 1%;
            border: 2px dashed #3498db !important;
            border-radius: 5px;
        }
    </style>
@endsection
@section('content')
    <div class="card">
        <h5 class="card-header font-weight-bold "> {{ trans('global.create') }} {{ trans('cruds.category.title_singular') }}
        </h5>
        <div class="card-body mt-4">
            <form method="POST" action="{{ route('admin.category.store') }}" enctype="multipart/form-data" id="myForm">
                @csrf
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                        {{-- <div class="form-group">
                            <label class="required" for="parent_id">{{ trans('cruds.category.fields.parent_id') }}</label>
                            <input class="form-control {{ $errors->has('parent_id') ? 'is-invalid' : ' ' }}" type="text"
                                name="parent_id" id="parent_id" value="{{ old('parent_id', '') }}">
                            <span class="parent_id_error"></span>
                            @if ($errors->has('parent_id'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('parent_id') }}
                                </div>
                            @endif
                        </div> --}}
                        <div class="k-d-flex k-justify-content-center">
                            <div class="k-w-300">
                                <label for="dropdowntree-single">Single Selection:</label>
                                <input id="dropdowntree-single" />
                                <input type="hidden" name="parent_id" id="parent_id" />
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="form-group">
                            <label class="" for="name">{{ trans('cruds.category.fields.name') }}</label>
                            <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="name"
                                name="name" id="name" value="{{ old('name', '') }}">
                            <span class="name_error"></span>
                            @if ($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-xl-4 col-4 col-lg-4 col-md-6 col-sm-12">
                        <label for="image" class="form-label">Image</label>
                        <div id="image-upload" class="dropzone">
                        </div>
                    </div>

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 d-flex">
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
    <script>
        $(document).ready(function() {
            // Initialize Dropzone
            new Dropzone('#image-upload', {
                url: '{{ route('admin.category.storeMedia') }}',
                maxFilesize: 2, // MB
                acceptedFiles: '.jpeg,.jpg,.png,.gif',
                maxFiles: 1,
                addRemoveLinks: true,
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                params: {
                    size: 2,
                    width: 4096,
                    height: 4096
                },
                success: function(file, response) {
                    console.log({
                        file
                    }, {
                        response
                    });
                    $('form').find('input[name="image"]').remove();
                    $('form').append('<input type="hidden" name="image" class="d-none" value="' +
                        response.name +
                        '">');
                },
                removedfile: function(file) {

                    $('form').find('input[name="image"]').remove();

                    file.previewElement.remove();

                    this.options.maxFiles = this.options.maxFiles + 1;
                },
                init: function() {
                    // If there's an existing image, initialize Dropzone with it
                    @if (isset($productCategory) && $productCategory->image)
                        var file = {!! json_encode($productCategory->image) !!};
                        this.options.addedfile.call(this, file);
                        this.options.thumbnail.call(this, file, file.preview ?? file.preview_url);
                        file.previewElement.classList.add('dz-complete');
                        $('form').append('<input type="file" name="image" value="' + file.file_name +
                            '">');
                        this.options.maxFiles = this.options.maxFiles - 1;
                    @endif
                },
                error: function(file, response) {
                    var message = ($.type(response) === 'string') ? response : response.errors.file;
                    file.previewElement.classList.add('dz-error');
                    _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]');
                    _results = [];
                    for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                        node = _ref[_i];
                        _results.push(node.textContent = message);
                    }
                    return _results;
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            var categories = @json($categories);
            console.log(categories);

            function buildTree(categories, parentId = null) {
                let result = [];
                categories.forEach(category => {
                    if (category.parent_id === parentId) {
                        console.log(category.parent_id)
                        let children = buildTree(categories, category.id);
                        console.log(children)

                        let node = {
                            text: category.name,
                            id: category.id
                        };
                        if (children.length) {
                            node.items = children;
                        }
                        result.push(node);
                    }
                });
                return result;
            }

            var treeData = buildTree(categories);
            var ddtSingle = $("#dropdowntree-single").kendoDropDownTree({
                placeholder: "Select a category...",
                dataSource: treeData,
                dataTextField: "text",
                dataValueField: "id",
                select: function(e) {
                    var dataItem = this.dataItem(e.node);
                    $("#parent_id").val(dataItem.id); // Update hidden input with selected category ID
                }
            }).data("kendoDropDownTree");


            function onChange(e) {
                var sizeValue = size.value();
                var roundedValue = rounded.value();
                var fillValue = fill.value();
                // var selectedValues = ddtMultiple.value();
                ddtSingle.setOptions({
                    size: sizeValue,
                    rounded: roundedValue,
                    fillMode: fillValue
                })
                // ddtMultiple.value([]);
                // ddtMultiple.setOptions({
                //     size: sizeValue,
                //     rounded: roundedValue,
                //     fillMode: fillValue
                // })
                // ddtMultiple.value(selectedValues);
            }
        });
    </script>
@endsection
