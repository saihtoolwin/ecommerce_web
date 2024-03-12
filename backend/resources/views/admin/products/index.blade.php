@extends('layouts.admin')
@section('content')
    <div class="card ">
        <div class="custom-header  d-flex justify-content-between px-3">


            <p class="mt-3" style="font-size: 20px">{{ trans('cruds.user.title_singular') }} {{ trans('global.list') }}</p>



            <div>
                <a class="mt-3 btn btn-success" href="{{ route('admin.user.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.user.title_singular') }}
                </a>
            </div>


        </div>

        <div class="card-body text-center">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-User">
                    <thead>
                        <tr>
                            <th>
                                {{ trans('cruds.user.fields.name') }}
                            </th>
                            <th>
                                {{ trans('cruds.user.fields.email') }}
                            </th>

                            <th>
                                {{ trans('cruds.user.fields.phone_no') }}
                            </th>
                            <th>
                                {{ trans('global.actions') }}
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $key => $user)
                            <tr data-entry-id="{{ $user->id }}">
                                <td>
                                    {{ $user->name ?? '' }}
                                </td>
                                <td>
                                    {{ $user->email ?? '' }}
                                </td>
                                <td>
                                    {{ $user->phone_no ?? '' }}
                                </td>
                                <td>
                                    <a class="p-0 glow text-white btn btn-primary"
                                        style="width: 60px;display: inline-block;line-height: 36px;color:grey;"
                                        title="view" href="{{ route('admin.user.show', $user->id) }}">
                                        Show
                                    </a>

                                    <a class="p-0 glow text-white btn btn-success"
                                        style="width: 60px;display: inline-block;line-height: 36px;color:grey;"
                                        title="edit" href="{{ route('admin.user.edit', $user->id) }}">
                                        Edit
                                    </a>

                                    <form id="orderDelete-{{ $user->id }}"
                                        action="{{ route('admin.user.destroy', $user->id) }}" method="POST"
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
                    {{-- {{ $users->links() }} --}}
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
            @can('user_delete')
                let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
                let deleteButton = {
                    text: deleteButtonTrans,
                    url: "{{ route('admin.users.massDestroy') }}",
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
            let table = $('.datatable-User:not(.ajaxTable)').DataTable({
                buttons: dtButtons
            })
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        })
    </script>
@endsection
