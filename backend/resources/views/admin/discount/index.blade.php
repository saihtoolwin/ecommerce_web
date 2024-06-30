@extends('layouts.admin')
@section('content')
    <div class="card ">
        <div class="custom-header  d-flex justify-content-between px-3">
            <p class="mt-3" style="font-size: 20px">{{ trans('cruds.discount.title_singular') }} {{ trans('global.list') }}</p>
            <div>
                <a class="mt-3 btn btn-success" href="{{ route('admin.discount.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.discount.title_singular') }}
                </a>
            </div>


        </div>

        <div class="card-body text-center">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-discount">
                    <thead>
                        <tr>
                            <th>
                                {{ trans('cruds.discount.fields.no') }}
                            </th>
                            <th>
                                {{ trans('cruds.discount.fields.product_id') }}
                            </th>
                            <th>
                                {{ trans('cruds.discount.fields.name') }}
                            </th>
                            <th>
                                {{ trans('cruds.discount.fields.percentage') }}
                            </th>
                            <th>
                                {{ trans('cruds.discount.fields.start_date') }}
                            </th>
                            <th>
                                {{ trans('cruds.discount.fields.end_date') }}
                            </th>
                            <th>
                                {{ trans('global.actions') }}
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($discounts as $key => $discount)
                            <tr data-entry-id="{{ $discount->id }}">
                                <td>
                                    {{ $loop->iteration ?? '' }}
                                </td>
                                <td>
                                    {{ $discount->product->name ?? '' }}
                                </td>
                                <td>
                                    {{ $discount->name ?? '' }}
                                </td>
                                <td>
                                    {{ $discount->percentage ?? '' }}
                                </td>
                                <td>
                                    {{ $discount->start_date ?? '' }}
                                </td>
                                <td>
                                    {{ $discount->end_date ?? '' }}
                                </td>
                                <td>
                                    <a class="p-0 glow text-white btn btn-primary"
                                        style="width: 60px;display: inline-block;line-height: 36px;color:grey;"
                                        title="view" href="{{ route('admin.discount.show', $discount->id) }}">
                                        Show
                                    </a>

                                    <a class="p-0 glow text-white btn btn-success"
                                        style="width: 60px;display: inline-block;line-height: 36px;color:grey;"
                                        title="edit" href="{{ route('admin.discount.edit', $discount->id) }}">
                                        Edit
                                    </a>

                                    <form id="orderDelete-{{ $discount->id }}"
                                        action="{{ route('admin.discount.destroy', $discount->id) }}" method="POST"
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
                    {{-- {{ $discounts->links() }} --}}
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
            @can('discount_delete')
                let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
                let deleteButton = {
                    text: deleteButtonTrans,
                    url: "{{ route('admin.discounts.massDestroy') }}",
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
            let table = $('.datatable-discount:not(.ajaxTable)').DataTable({
                buttons: dtButtons
            })
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        })
    </script>
@endsection
