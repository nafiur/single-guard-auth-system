@extends('admin.layouts.app')

@section('header_title', 'Activity Logs')

@section('content')
    <div class="card mb-4">
        <div class="card-header border-bottom">
            <h5 class="card-title mb-0">System Activity Logs Filters</h5>
        </div>
        <div class="card-body">
            <form id="filter-form" class="row g-3 mt-1">
                <div class="col-md-4">
                    <label class="form-label" for="log_name">Log Type</label>
                    <select name="log_name" id="log_name" class="form-select select2">
                        <option value="">All Types</option>
                        @foreach ($logNames as $name)
                            <option value="{{ $name }}" {{ request('log_name') == $name ? 'selected' : '' }}>
                                {{ ucfirst($name) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="event">Event</label>
                    <select name="event" id="event" class="form-select select2">
                        <option value="">All Events</option>
                        @foreach ($events as $event)
                            <option value="{{ $event }}" {{ request('event') == $event ? 'selected' : '' }}>
                                {{ ucfirst($event) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 d-flex align-items-end">
                    <div class="btn-group">
                        <button type="submit" class="btn btn-primary"><i class="bx bx-filter-alt me-1"></i> Filter</button>
                        <a href="{{ route('admin.activity-logs.index') }}" class="btn btn-label-secondary"><i
                                class="bx bx-reset me-1"></i> Reset</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-datatable table-responsive">
            <table class="datatables-logs table border-top">
                <thead>
                    <tr>
                        <th>Log Name</th>
                        <th>Event</th>
                        <th>Description</th>
                        <th>Causer</th>
                        <th>Subject</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            if ($('.select2').length) {
                $('.select2').select2();
            }

            var dt_logs = $('.datatables-logs').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('admin.activity-logs.index') }}",
                    data: function(d) {
                        d.log_name = $('#log_name').val();
                        d.event = $('#event').val();
                    }
                },
                columns: [{
                        data: 'log_name',
                        name: 'log_name'
                    },
                    {
                        data: 'event',
                        name: 'event'
                    },
                    {
                        data: 'description',
                        name: 'description'
                    },
                    {
                        data: 'causer',
                        name: 'causer',
                        orderable: false
                    },
                    {
                        data: 'subject',
                        name: 'subject',
                        orderable: false
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ],
                order: [
                    [5, 'desc']
                ],
                dom: '<"row mx-2"<"col-md-2"<"me-3"l>><"col-md-10"<"dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-row flex-column mb-3 mb-md-0"fB>>>t<"row mx-2"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                buttons: [{
                    extend: 'collection',
                    className: 'btn btn-label-secondary dropdown-toggle mx-3',
                    text: '<i class="bx bx-export me-1"></i>Export',
                    buttons: [{
                            extend: 'print',
                            text: '<i class="bx bx-printer me-2" ></i>Print',
                            className: 'dropdown-item',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5]
                            }
                        },
                        {
                            extend: 'csv',
                            text: '<i class="bx bx-file me-2" ></i>Csv',
                            className: 'dropdown-item',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5]
                            }
                        },
                        {
                            extend: 'excel',
                            text: '<i class="bx bxs-file-export me-2"></i>Excel',
                            className: 'dropdown-item',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5]
                            }
                        },
                        {
                            extend: 'pdf',
                            text: '<i class="bx bxs-file-pdf me-2"></i>Pdf',
                            className: 'dropdown-item',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5]
                            }
                        },
                        {
                            extend: 'copy',
                            text: '<i class="bx bx-copy me-2" ></i>Copy',
                            className: 'dropdown-item',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5]
                            }
                        }
                    ]
                }],
                language: {
                    sLengthMenu: '_MENU_',
                    search: '',
                    searchPlaceholder: 'Search Log'
                }
            });

            $('#filter-form').on('submit', function(e) {
                e.preventDefault();
                dt_logs.draw();
            });
        });
    </script>
@endpush
