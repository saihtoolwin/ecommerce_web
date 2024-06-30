@extends('layouts.admin')
@section('content')

<div class="card">
    {{-- <div class="card-header mb-5">
        {{ trans('global.show') }} {{ trans('cruds.rating.title') }}
    </div> --}}
    <h6 class="font-weight-bold card-header mb-5">
        {{ trans('global.show') }} {{ trans('cruds.rating.title') }}
    </h6>

    <div class="card-body">
        <div class="form-group">
            {{-- <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.ratings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div> --}}
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.discount.fields.id') }}
                        </th>
                        <td>
                            {{ $discount->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.discount.fields.name') }}
                        </th>
                        <td>
                            {{ $discount->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.discount.fields.percentage') }}
                        </th>
                        <td>
                            {{ $discount->percentage }}%
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.discount.fields.start_date') }}
                        </th>
                        <td>
                            {{ $discount->start_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.discount.fields.end_date') }}
                        </th>
                        <td>
                            {{ $discount->end_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.discount.fields.product_id') }}
                        </th>
                        <td>
                            {{ $discount->product->name ?? 'N/A' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.discount.fields.start_date') }}
                        </th>
                        <td>
                            {{ $discount->start_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.discount.fields.end_date') }}
                        </th>
                        <td>
                            {{ $discount->end_date }}
                        </td>
                    </tr>
                   
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-secondary mt-3" href="{{ route('admin.discount.index') }}">
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
            @includeIf('admin.ratings.relationships.servicePersonServiceAssigns', ['serviceAssigns' => $rating->servicePersonServiceAssigns])
        </div>
    </div>
</div> --}}

@endsection
