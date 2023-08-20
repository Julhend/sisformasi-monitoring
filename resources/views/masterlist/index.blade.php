@extends('layouts.master')


@section('top')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('content')
    <div class="box">

        <div class="box-header">
            <h3 class="box-title">MASTERLIST</h3>

            @if (auth()->user()->role == 'admin')
                <a id="sendNotificationButton" class="btn btn-primary pull-right" style="margin-top: -8px;">Kirim
                    Notifikasi</a>
            @endif

            {{-- <a href="{{ route('exportPDF.masterlistAll') }}" class="btn btn-danger pull-right"
                style="margin-top: -8px;">Cetak</a> --}}
        </div>

        <div class="box-body pull-right">
            <div class="form-inline">
                <div class="form-group">
                    <label for="start_date">Start Date:</label>
                    <input type="date" class="form-control" id="start_date" name="start_date" required>
                </div>
                <div class="form-group">
                    <label for="end_date">End Date:</label>
                    <input type="date" class="form-control" id="end_date" name="end_date" required>
                </div>
                <button id="printButton" class="btn btn-danger" style="margin-left: 10px;">Cetak</button>
            </div>
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
        // Function to construct the URL with start and end dates
        function constructUrl(startDate, endDate) {
            return "{{ route('exportPDF.masterlistPeriod') }}?startDate=" + startDate + "&endDate=" + endDate;
        }

        // Add click event listener to the "Cetak" button
        $('#printButton').on('click', function() {
            var startDate = $('#start_date').val();
            var endDate = $('#end_date').val();
            var url = constructUrl(startDate, endDate);

            // Trigger the download by redirecting to the constructed URL
            window.location.href = url;
        });

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

    <script>
        // Wait for the page to load
        document.addEventListener('DOMContentLoaded', function() {
            // Select the button by its ID
            const sendButton = document.getElementById('sendNotificationButton');

            // Add a click event listener
            sendButton.addEventListener('click', function() {
                // Disable the button or show a loading spinner (optional)
                sendButton.disabled = true; // Disable the button

                // Send an AJAX request to trigger the notification
                fetch('/send-notifications', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}', // Include the CSRF token if you're using it
                            'Content-Type': 'application/json',
                        },
                    })
                    .then((response) => response.json())
                    .then((data) => {
                        // Handle the response here, you can show a success message or perform any other action
                        alert(data
                            .message); // Show an alert with the response message (you can modify this)
                    })
                    .catch((error) => {
                        console.error('Error:', error);
                    })
                    .finally(() => {
                        // Re-enable the button after the request is complete (optional)
                        sendButton.disabled = false; // Re-enable the button
                    });
            });
        });
    </script>
@endsection
