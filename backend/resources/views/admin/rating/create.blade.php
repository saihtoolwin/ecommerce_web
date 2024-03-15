@extends('layouts.admin')
@section('styles')
    <style>
         .title_error {
            color: red;
            font-size: 13px;
            font-style: italic;
        }

        .required:after {
            content: " *";
            color: red;
        }
    </style>
@endsection

@section('content')
    <div class="card">
        <h5 class="card-header font-weight-bold ">  {{ trans('global.create') }} {{ trans('cruds.rating.title_singular') }}</h5>
        <div class="card-body mt-4">
            <form method="POST" action="{{ route('admin.rating.store') }}" enctype="multipart/form-data" id="myForm">
                @csrf
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="form-group mb-3">
                            <label class="required" for="user_id">{{ trans('cruds.rating.fields.user') }}</label>
                            
                                <select name="user_id" class="form-control {{$errors->has('user_id') ? 'is-invalid' : ''}}" id="">
                                    <option value="">Please Select User</option>
                                    @foreach ($users as $user)
                                        <option value="{{$user->id}}" {{old('user_id')==$user->id ? 'selected' : ' '}}>{{$user->name}}</option>
                                    @endforeach
                                </select>
                            @if ($errors->has('user_id'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('user_id') }}
                                </div>
                            @endif
                            
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="form-group mb-3">
                            <div class="form-group mb-3">
                                <label class="required" for="product_id">{{ trans('cruds.rating.fields.product') }}</label>
                                    <select name="product_id" class="form-control {{$errors->has('product_id') ? 'is-invalid' : ' '}}" id="">
                                        <option value="">Please Select Product</option>
                                        @foreach ($products as $product)
                                            <option value="{{$product->id}}" {{old('product_id')==$product->id ? 'selected' : ' '}}>{{$product->name}}</option>
                                        @endforeach
                                    </select>
                                @if ($errors->has('product_id'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('product_id') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="form-group mb-3">
                            <label class="required" for="rating_value">{{ trans('cruds.rating.fields.rating_value') }}</label>
                            <input class="form-control {{ $errors->has('rating_value') ? 'is-invalid' : '' }}" type="number"
                                name="rating_value" id="rating_value" value="{{ old('rating_value') }}" >
                            @if ($errors->has('rating_value'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('rating_value') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="form-group mb-3">
                            <label class="required" for="rating_date">{{ trans('cruds.rating.fields.rating_date') }}</label>
                            {{-- @php
                                $ratingDate=$rating->rating_date ? date('Y-m-d', strtotime($rating->rating_date)) : ' ';
                            @endphp --}}
                           <input type="date" class="form-control  {{$errors->has('rating_date') ? 'is-invalid' : ' '}}" name="rating_date" value="{{old('rating_date')}}" id="">
                            @if ($errors->has('rating_date'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('rating_date') }}
                                </div>
                            @endif
                           
                        </div>
                    </div>
                    
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="form-group mb-3">
                            <label class="required" for="review_text">{{ trans('cruds.rating.fields.review_text') }}</label>
                            <textarea name="review_text" id="" class="form-control {{$errors->has('review_text') ? 'is-invalid' : ' '}}" cols="30" rows="10">{{old('review_text')}}</textarea>
                            @if ($errors->has('review_text'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('review_text') }}
                                </div>
                            @endif
                           
                        </div>
                    </div>
                    
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 d-flex">
                        <div class="form-group mb-3 mr-3 mt-2">
                            <button class="btn btn-success" type="submit" id="save">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                        <div class="form-group mb-3 mt-2 ms-2">
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
{{-- @section('scripts')
    <script>
        $('#save').on('click', function(e) {
            e.preventDefault();
            formValidation();
        })

        var formValidation = () => {
            let name = $('#name').val();
            let email = $('#email').val();
            let password = $('#password').val();
            let roles = $('#roles').val();
            let arr = [];
            if (name == '') {
                $('.name_error').html('{{ trans('cruds.rating.fields.name') }} {{ trans('global.must_be_filled') }}');
                arr.push('name');
            } else {
                $('.name_error').html('');
                if (arr.includes("name")) {
                    arr.splice(arr.indexOf('name'), 1);
                }
            }

            if (email == '') {
                $('.email_error').html('{{ trans('cruds.rating.fields.email') }} {{ trans('global.must_be_filled') }}');
                arr.push('email');
            } else {
                $('.email_error').html('');
                if (arr.includes("email")) {
                    arr.splice(arr.indexOf('email'), 1);
                }
            }

            if (password == '') {
                $('.password_error').html(
                    '{{ trans('cruds.rating.fields.password') }} {{ trans('global.must_be_filled') }}');
                arr.push('password');
            } else {
                $('.password_error').html('');
                if (arr.includes("password")) {
                    arr.splice(arr.indexOf('password'), 1);
                }
            }

            if (roles == '') {
                $('.role_error').html(
                    'Role must be filled');
                arr.push('role');
            } else {
                $('.role_error').html('');
                if (arr.includes("role")) {
                    arr.splice(arr.indexOf('role'), 1);
                }
            }

            if (arr.length == 0) {
                document.getElementById("myForm").submit();
            }
        }
    </script>
@endsection --}}
