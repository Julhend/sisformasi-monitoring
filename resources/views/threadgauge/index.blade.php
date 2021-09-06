@extends('layouts.master')


@section('top')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('content')
    <div class="box">

        <div class="box-header">
            <h3 class="box-title">Data Alat Ukur Thread Gauge</h3>

            <a onclick="addForm()" class="btn btn-primary pull-right" style="margin-top: -8px;">Add Thread Gauge</a>
        </div>


        <!-- /.box-header -->
        <div class="box-body">
            <table id="products-table" class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Tool Name</th>
                    <th>Serial No</th>
                    <th>Measuring Range</th>
                    <th>Report No</th>
                    <th>Date Cal</th>
                    <th>Next Cal</th>
                    <th>Disposition</th>
                    <th>Calibrated By</th>
                    <th>Approved By</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>

    @include('threadgauge.form')

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
            ajax: "{{ route('api.threadgauge') }}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'tool_name', name: 'tool_name'},
                {data: 'serial_number', name: 'serial_number'},
                {data: 'measuring_range', name: 'measuring_range'},
                {data: 'report_no', name: 'report_no'},
                {data: 'date_cal', name: 'date_cal'},
                {data: 'next_cal', name: 'next_cal'},
                {data: 'disposition', name: 'disposition'},
                {data: 'calibrated_by', name: 'calibrated_by'},
                {data: 'approved_by', name: 'approved_by'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });

        function addForm() {
            save_method = "add";
            $('input[name=_method]').val('POST');
            $('#modal-form').modal('show');
            $('#modal-form form')[0].reset();
            $('.modal-title').text('Add Thread Gauge');
        }

        function editForm(id) {
            save_method = 'edit';
            $('input[name=_method]').val('PATCH');
            $('#modal-form form')[0].reset();
            $.ajax({
                url: "{{ url('threadgauge') }}" + '/' + id + "/edit",
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    $('#modal-form').modal('show');
                    $('.modal-title').text('Edit Thread Gauge');
                    $('#id').val(data.id);
                    $('#tool_name').val(data.tool_name);
                    $('#serial_number').val(data.serial_number);
                    $('#measuring_range').val(data.measuring_range);
                    $('#report_no').val(data.report_no);
                    $('#tool_name').val(data.tool_name);
                    $('#date_cal').val(data.date_cal);
                    $('#next_cal').val(data.next_cal);
                    $('#wire_gauge_set_no').val(data.wire_gauge_set_no);
                    $('#traceable_report_no').val(data.traceable_report_no);

                    $('#measured_value1').val(data.measured_value1);
                    $('#measured_value2').val(data.measured_value2);
                    $('#measured_value3').val(data.measured_value3);
                    $('#measured_value4').val(data.measured_value4);
                    $('#deviation1').val(data.deviation1);
                    $('#deviation2').val(data.deviation2);
                    $('#deviation3').val(data.deviation3);
                    $('#deviation4').val(data.deviation4);
                    
                },
                error : function() {
                    alert("Nothing Data");
                }
            });
        }

        function deleteData(id){
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                cancelButtonColor: '#d33',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then(function () {
                $.ajax({
                    url : "{{ url('threadgauge') }}" + '/' + id,
                    type : "POST",
                    data : {'_method' : 'DELETE', '_token' : csrf_token},
                    success : function(data) {
                        table.ajax.reload();
                        swal({
                            title: 'Success!',
                            text: data.message,
                            type: 'success',
                            timer: '1500'
                        })
                    },
                    error : function () {
                        swal({
                            title: 'Oops...',
                            text: data.message,
                            type: 'error',
                            timer: '1500'
                        })
                    }
                });
            });
        }

        $(function(){
            $('#modal-form form').validator().on('submit', function (e) {
                if (!e.isDefaultPrevented()){
                    var id = $('#id').val();
                    if (save_method == 'add') url = "{{ url('threadgauge') }}";
                    else url = "{{ url('threadgauge') . '/' }}" + id;
                    $.ajaxSetup({
                                    headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });
   
                    $.ajax({
                        url : url,
                        type : "POST",
                        data: new FormData($("#modal-form form")[0]),
                        contentType: false,
                        processData: false,
                        success : function(data) {
                            $('#modal-form').modal('hide');
                            table.ajax.reload();
                            swal({
                                title: 'Success!',
                                text: data.message,
                                type: 'success',
                                timer: '2000'
                            })
                        },
                        error : function(data){
                            swal({
                                title: 'Oops...',
                                text: data.message,
                                type: 'error',
                                timer: '2000'
                            })
                        }
                    });
                    return false;
                }
            });
        });
    </script>

@endsection
