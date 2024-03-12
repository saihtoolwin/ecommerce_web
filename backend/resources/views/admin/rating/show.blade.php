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
                            {{ trans('cruds.rating.fields.id') }}
                        </th>
                        <td>
                            {{ $rating->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rating.fields.user') }}
                        </th>
                        <td>
                            {{ $rating->user->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rating.fields.product') }}
                        </th>
                        <td>
                            {{ $rating->product->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rating.fields.rating_value') }}
                        </th>
                        <td>
                            {{ $rating->rating_value }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rating.fields.review_text') }}
                        </th>
                        <td>
                            {{ $rating->review_text }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rating.fields.rating_date') }}
                        </th>
                        <td>
                            {{ $rating->rating_date ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-secondary mt-3" href="{{ route('admin.rating.index') }}">
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
