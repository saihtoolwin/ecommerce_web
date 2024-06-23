@extends('layouts.admin')
@section('content')
    <div class="card">
        {{-- <div class="card-header mb-5">
        {{ trans('global.show') }} {{ trans('cruds.product.title') }}
    </div> --}}
        <h6 class="font-weight-bold card-header mb-5">
            {{ trans('global.show') }} {{ trans('cruds.product.title') }}
        </h6>

        <div class="card-body">
            <div class="form-group">
                {{-- <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.products.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div> --}}
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th>
                                {{ trans('cruds.product.fields.id') }}
                            </th>
                            <td>
                                {{ $product->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.product.fields.name') }}
                            </th>
                            <td>
                                {{ $product->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.product.fields.price') }}
                            </th>
                            <td>
                                {{ $product->price }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.product.fields.qty') }}
                            </th>
                            <td>
                                {{ $product->qty }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.product.fields.discount') }}
                            </th>
                            <td>
                                {{ $product->discount }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.product.fields.category_id') }}
                            </th>
                            <td>
                                {{ $product->category_id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.product.fields.rating_id') }}
                            </th>
                            <td>
                                {{ $product->rating_id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.product.fields.image') }}
                            </th>
                            <td>
                                @if ($product->image)
                                {{-- @dd($product->image) --}}
                                <img src="{{ $product->image->getUrl('preview') }}" class="img-thumbnail" alt="Product Image">
                            @else
                                    No image available
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-secondary mt-3" href="{{ route('admin.product.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#service_person_service_assigns" role="tab" data-toggle="tab">
                {{ trans('cruds.serviceAssign.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="service_person_service_assigns">
            @includeIf('admin.products.relationships.servicePersonServiceAssigns', ['serviceAssigns' => $product->servicePersonServiceAssigns])
        </div>
    </div>
</div> --}}
@endsection
