@extends('layouts.admin')
@section('styles')
<style>
    td img{
        height: 300px;
    }
</style>
    
@endsection
@section('content')

<div class="card">
    {{-- <div class="card-header mb-5">
        {{ trans('global.show') }} {{ trans('cruds.category.title') }}
    </div> --}}
    <h6 class="font-weight-bold card-header mb-5">
        {{ trans('global.show') }} {{ trans('cruds.category.title') }}
    </h6>

    <div class="card-body">
        <div class="form-group">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.category.fields.id') }}
                        </th>
                        <td>
                            {{ $category->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.category.fields.name') }}
                        </th>
                        <td>
                            {{ $category->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.category.fields.parent_id') }}
                        </th>
                        <td>
                            {{ $category->parent_id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.category.fields.image') }}
                        </th>
                        <td>
                            {{ $category->image }}
                        </td>
                    </tr>
                    
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-secondary mt-3" href="{{ route('admin.category.index') }}">
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
            @includeIf('admin.categorys.relationships.servicePersonServiceAssigns', ['serviceAssigns' => $category->servicePersonServiceAssigns])
        </div>
    </div>
</div> --}}

@endsection
