@extends('layouts.admin')
@section('styles')
    <style>
        .drop-zone {
            // layout.css Style
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            height: 200px;
            border-width: 2px;
            margin-bottom: 20px;

            // Style
            color: #646C7F;
            border-style: dashed;
            border-color: #0087F7;
            border-radius: 5px;
            /* line-height: 200px; */
            cursor: pointer;

            &.is-dragover {
                color: #999;
                border-style: solid;
            }

            &.has-images {
                justify-content: flex-start;

                .msg {
                    display: none;
                }
            }


            input.has-image {
                opacity: 1;
                width: 0px;
                heigth: 0px;
            }

            input.receiver {
                /* position: absolute; */
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                opacity: 0;
                background-color: red;
                cursor: pointer;
            }

            .preview {
                display: flex;
                align-items: center;
                position: relative;
                cursor: default;
                margin: 0 5px;
                height: 180px;
                width: 300px !important;
                border-radius: 5px;

                &:hover {
                    .details {
                        display: flex;
                    }
                }

                img {
                    max-width: 300px;
                    max-height: 180px;
                    border-radius: 5px;
                }

                .details {
                    position: absolute;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    display: none; // flex on hover .image
                    align-items: center;
                    justify-content: center;
                }

                .remove {
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    height: 30px;
                    width: 30px;
                    border-radius: 50%;
                    background-color: #e40000;
                    cursor: pointer;

                    .fa {
                        font-size: 20px;
                        color: white;
                    }
                }
            }
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
                        <div class="form-group">
                            <label class="required" for="parent_id">{{ trans('cruds.category.fields.parent_id') }}</label>
                            <input class="form-control {{ $errors->has('parent_id') ? 'is-invalid' : ' ' }}" type="text"
                                name="parent_id" id="parent_id" value="{{ old('parent_id', '') }}">
                            <span class="parent_id_error"></span>
                            @if ($errors->has('parent_id'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('parent_id') }}
                                </div>
                            @endif
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
                        <div class="form-group drop-zone">
                            {{-- <label class="required" for="file">{{ trans('cruds.category.fields.image') }}</label> --}}
                            <div class="msg">Just drag and drop files here</div>
                            <input type="file" class="receiver" />

                        </div>
                    </div>
                    {{-- <div class="container">
                        <div class="">
                            <div class="msg">Just drag and drop files here</div>
                            <input type="file" class="receiver" />
                        </div>
                    </div> --}}

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
        class DropZone {
            constructor() {
                this.dropZone = $('.drop-zone');
                this.setupListeners();
            }

            setupListeners() {
                this.dropZone.on('dragover dragenter', () => this.dropZone.addClass('is-dragover'));
                this.dropZone.on('dragleave dragend drop', () => this.dropZone.removeClass('is-dragover'));
                this.dropZone.on('change', (e) => this.onchange(e));
                this.dropZone.on('click', '.remove', (e) => this.removeImage(e));
            }

            onchange(e) {
                this.dropZone.addClass('has-images');
                let $receiver = $(e.target);
                $receiver.removeClass('receiver').addClass('has-image');

                $('<input type="file" class="receiver">').prependTo(this.dropZone);

                let file = $receiver[0].files[0];
                if (file) {
                    this.displayPreview(file);
                }
            }

            // displayPreview(files) {
            //     for (let file of files) {
            //         let reader = new FileReader();
            //         reader.onload = (e) => {
            //             let url = e.currentTarget.result;
            //             this.template(url).appendTo(this.dropZone);
            //         };
            //         reader.readAsDataURL(file);
            //     }
            // }

            displayPreview(file) {
                let fileName = file.name;
                let $preview = this.dropZone.find('.preview').remove();
                $preview.empty();
                this.template(fileName).appendTo(this.dropZone);
            }

            template(fileName) {
                return $("<div class='preview'><div class='image'><img src='" + fileName +
                    "'></div><div class='details'><div class='remove'><span class='fa fa-trash'></span></div></div></div>"
                );
            }

            removeImage(e) {
                $(e.target).closest('.preview').remove();
            }
        }

        $(document).ready(function() {
            new DropZone();
        });
    </script>
@endsection
