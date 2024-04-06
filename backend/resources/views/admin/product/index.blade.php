@extends('layouts.admin')
@section('content')
    <div class="card ">
        <div class="custom-header  d-flex justify-content-between px-3">


            <p class="mt-3" style="font-size: 20px">{{ trans('cruds.product.title_singular') }} {{ trans('global.list') }}</p>



            <div>
                <a class="mt-3 btn btn-success" href="{{ route('admin.product.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.product.title_singular') }}
                </a>
            </div>


        </div>

        <div class="card-body text-center">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-product">
                    <thead>
                        <tr>
                            <th>
                                {{ trans('cruds.product.fields.no') }}
                            </th>
                            <th>
                                {{ trans('cruds.product.fields.name') }}
                            </th>
                            <th>
                                {{ trans('cruds.product.fields.price') }}
                            </th>

                            <th>
                                {{ trans('cruds.product.fields.qty') }}
                            </th>
                            <th>
                                {{ trans('cruds.product.fields.discount') }}
                            </th>
                            <th>
                                {{ trans('cruds.product.fields.category_id') }}
                            </th>
                            <th>
                                {{ trans('cruds.product.fields.rating_id') }}
                            </th>
                            <th>
                                {{ trans('cruds.product.fields.description') }}
                            </th>
                            <th>
                                {{ trans('global.actions') }}
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $key => $product)
                            <tr data-entry-id="{{ $product->id }}">
                                <td>
                                    {{ $loop->iteration ?? '' }}
                                </td>
                                <td>
                                    {{ $product->name ?? '' }}
                                </td>
                                <td>
                                    {{ $product->price ?? '' }}
                                </td>
                                <td>
                                    {{ $product->qty ?? '' }}
                                </td>
                                <td>
                                    {{ $product->discount ?? '' }}
                                </td>
                                <td>
                                    {{ $product->category_id ?? '' }}
                                </td>
                                <td>
                                    {{ $product->rating_id ?? '' }}
                                </td>
                                <td>
                                    {{ $product->description ?? '' }}
                                </td>
                                <td>
                                    <a class="p-0 glow text-white btn btn-primary"
                                        style="width: 60px;display: inline-block;line-height: 36px;color:grey;"
                                        title="view" href="{{ route('admin.product.show', $product->id) }}">
                                        Show
                                    </a>

                                    <a class="p-0 glow text-white btn btn-success"
                                        style="width: 60px;display: inline-block;line-height: 36px;color:grey;"
                                        title="edit" href="{{ route('admin.product.edit', $product->id) }}">
                                        Edit
                                    </a>

                                    <form id="orderDelete-{{ $product->id }}"
                                        action="{{ route('admin.product.destroy', $product->id) }}" method="POST"
                                        style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" style="width: 60px;display: inline-block;line-height: 36px;"
                                            class=" p-0 glow text-white " value="{{ trans('global.delete') }}">
                                        <button
                                            style="width: 60px;display: inline-block;line-height: 36px;border:none;color:grey;"
                                            class=" p-0 glow text-white btn btn-danger" title="delete"
                                            onclick="return confirm('{{ trans('global.areYouSure') }}');">
                                            Delete
                                        </button>
                                    </form>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-3" style="float: right;">
                    {{-- {{ $products->links() }} --}}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @parent
    <script>
        $(function() {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
            @can('product_delete')
                let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
                let deleteButton = {
                    text: deleteButtonTrans,
                    url: "{{ route('admin.products.massDestroy') }}",
                    className: 'btn-danger',
                    action: function(e, dt, node, config) {
                        var ids = $.map(dt.rows({
                            selected: true
                        }).nodes(), function(entry) {
                            return $(entry).data('entry-id')
                        });

                        if (ids.length === 0) {
                            alert('{{ trans('global.datatables.zero_selected') }}')

                            return
                        }

                        if (confirm('{{ trans('global.areYouSure') }}')) {
                            $.ajax({
                                    headers: {
                                        'x-csrf-token': _token
                                    },
                                    method: 'POST',
                                    url: config.url,
                                    data: {
                                        ids: ids,
                                        _method: 'DELETE'
                                    }
                                })
                                .done(function() {
                                    location.reload()
                                })
                        }
                    }
                }
                dtButtons.push(deleteButton)
            @endcan

            $.extend(true, $.fn.dataTable.defaults, {
                orderCellsTop: true,
                order: [
                    //[1, 'desc']
                ],
                pageLength: 100,
                bPaginate: false,
                info: false,
            });
            let table = $('.datatable-product:not(.ajaxTable)').DataTable({
                buttons: dtButtons
            })
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        })
    </script>
@endsection
