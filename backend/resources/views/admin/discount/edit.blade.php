@extends('layouts.admin')
@section('styles')
    
@endsection
@section('content')
    <div class="card">
        <h5 class="card-header font-weight-bold mb-4"> {{ trans('global.edit') }} {{ trans('cruds.discount.title_singular') }}</h5>
        {{-- <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.discount.title_singular') }}
        </div> --}}

        <div class="card-body">
            <form method="POST" action="{{ route('admin.discount.update', [$discount->id]) }}" enctype="multipart/form-data"
                id="myForm">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="form-group mb-3">
                            <label class="required" for="product_id">{{ trans('cruds.discount.fields.product_id') }}</label>
                            
                                <select name="product_id" class="form-control {{$errors->has('product_id') ? 'is-invalid' : ''}}" id="">
                                    <option value="">Please Select Product</option>
                                    @foreach ($products as $product)
                                        <option value="{{$product->id}}" {{old('product_id',$discount->product_id)==$product->id ? 'selected' : ' '}}>{{$product->name}}</option>
                                    @endforeach
                                </select>
                            @if ($errors->has('product_id'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('product_id') }}
                                </div>
                            @endif
                            
                        </div>
                    </div>
                    {{-- <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="form-group mb-3">
                            <div class="form-group mb-3">
                                <label class="required" for="product_id">{{ trans('cruds.discount.fields.product') }}</label>
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
                    </div> --}}
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="form-group mb-3">
                            <label class="required" for="name">{{ trans('cruds.discount.fields.name') }}</label>
                            <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text"
                                name="name" id="name" value="{{ old('name',$discount->name) }}" >
                            @if ($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="form-group mb-3">
                            <label class="required" for="percentage">{{ trans('cruds.discount.fields.percentage') }}</label>
                            <input class="form-control {{ $errors->has('percentage') ? 'is-invalid' : '' }}" type="number"
                                name="percentage" id="percentage" value="{{ old('percentage',$discount->percentage) }}" >
                            @if ($errors->has('percentage'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('percentage') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="form-group mb-3">
                            <label class="required" for="start_date">{{ trans('cruds.discount.fields.start_date') }}</label>
                            {{-- @php
                                $discountDate=$discount->start_date ? date('Y-m-d', strtotime($discount->start_date)) : ' ';
                            @endphp --}}
                           <input type="date" class="form-control  {{$errors->has('start_date') ? 'is-invalid' : ' '}}" name="start_date" value="{{old('start_date',$discount->start_date)}}" id="">
                            @if ($errors->has('start_date'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('start_date') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="form-group mb-3">
                            <label class="required" for="end_date">{{ trans('cruds.discount.fields.end_date') }}</label>
                            {{-- @php
                                $discountDate=$discount->end_date ? date('Y-m-d', strtotime($discount->end_date)) : ' ';
                            @endphp --}}
                           <input type="date" class="form-control  {{$errors->has('end_date') ? 'is-invalid' : ' '}}" name="end_date" value="{{old('end_date',$discount->end_date)}}" id="">
                            @if ($errors->has('end_date'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('end_date') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 d-flex">
                        <div class="form-group mb-3 mr-3 mt-2">
                            <button class="btn btn-success" type="submit" id="save">
                                {{ trans('global.update') }}
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
            let role = $('#roles').find(':selected').val();
            let arr = [];
            if (name == '') {
                $('.name_error').html('Name must be filled');
                arr.push('name');
            } else {
                $('.name_error').html('');
                if (arr.includes("name")) {
                    arr.splice(arr.indexOf('name'), 1);
                }
            }

            if (email == '') {
                $('.email_error').html('Email must be filled');
                arr.push('email');
            } else {
                $('.email_error').html('');
                if (arr.includes("email")) {
                    arr.splice(arr.indexOf('email'), 1);
                }
            }

            if (password == '') {
                $('.password_error').html('Password must be filled');
                arr.push('password');
            } else {
                $('.password_error').html('');
                if (arr.includes("password")) {
                    arr.splice(arr.indexOf('password'), 1);
                }
            }

            if (arr.length == 0) {
                document.getElementById("myForm").submit();
            }
        }
    </script>
@endsection --}}
