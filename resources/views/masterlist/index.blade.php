@extends('layouts.master')


@section('top')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('content')
    <div class="box">

        <div class="box-header">
            <h3 class="box-title">MASTERLIST</h3>

            {{-- <a onclick="addForm()" class="btn btn-primary pull-right" style="margin-top: -8px;">Add Outside Dial Micrometer</a> --}}
        </div>


        <!-- /.box-header -->
        <div class="box-body">
            <table id="products-table" class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Equipment Description</th>
                        <th>Range</th>
                        <th>Equip Control No</th>
                        <th>Inspection Method</th>
                        <th>Aceptance Criteria</th>
                        <th>Frequency</th>
                        <th>Date Cal</th>
                        <th>Next Cal</th>
                        <th>Dept</th>
                        <th>Instrument Serial No</th>
                        <th>Remark</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>

    @include('outsidedial.form')
@endsection

@section('bot')
    <!-- DataTables -->
    <script src=" {{ asset('assets/bower_components/datatables.net/js/jquery.dataTables.min.js') }} "></script>
    <script src="{{ asset('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }} "></script>

    {{-- Validator --}}
    <script src="{{ asset('assets/validator/validator.min.js') }}"></script>
    <script type="text/javascript">
        var table = $('#products-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('api.masterlist') }}",
            columns: [{
                    data: null,
                    name: 'sequence',
                    orderable: false,
                    render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {
                    data: 'equipment_description',
                    name: 'equipment_description'
                },
                {
                    data: 'range',
                    name: 'range'
                },
                {
                    data: 'equip_control_no',
                    name: 'equip_control_no'
                },
                {
                    data: 'inspection_method',
                    name: 'inspection_method'
                },
                {
                    data: 'acceptance_kriteria',
                    name: 'acceptance_kriteria'
                },
                {
                    data: 'frequency',
                    name: 'frequency'
                },
                {
                    data: 'date_cal',
                    name: 'date_cal'
                },
                {
                    data: 'next_cal',
                    name: 'next_cal'
                },
                {
                    data: 'dept',
                    name: 'dept'
                },
                {
                    data: 'instrument_serial_number',
                    name: 'instrument_serial_number'
                },
                {
                    data: 'remark',
                    name: 'remark'
                },
                {
                    data: 'status',
                    name: 'status'
                },
                // {data: 'action', name: 'action', orderable: false, searchable: false}
            ]

        });
    </script>
@endsection
