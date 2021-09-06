@extends('layouts.master')


@section('top')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('content')
    <div class="box">

        <div class="box-header">
            <h3 class="box-title">Data Alat Ukur Digital Caliper</h3>

            <a onclick="addForm()" class="btn btn-primary pull-right" style="margin-top: -8px;">Add Digital Caliper</a>
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
                    <th>Approved By</th>
                    <th>Checked By</th>
                    <th></th>
                </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>

    @include('digitalcaliper.form')

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
            ajax: "{{ route('api.digitalcaliper') }}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'tool_name', name: 'tool_name'},
                {data: 'serial_number', name: 'serial_number'},
                {data: 'measuring_range', name: 'measuring_range'},
                {data: 'report_no', name: 'report_no'},
                {data: 'date_cal', name: 'date_cal'},
                {data: 'next_cal', name: 'next_cal'},
                {data: 'disposition', name: 'disposition'},
                {data: 'approved_by', name: 'approved_by'},
                {data: 'checked_by', name: 'checked_by'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });

        function addForm() {
            save_method = "add";
            $('input[name=_method]').val('POST');
            $('#modal-form').modal('show');
            $('#modal-form form')[0].reset();
            $('.modal-title').text('Add Digital Calipers');
        }

        function editForm(id) {
            save_method = 'edit';
            $('input[name=_method]').val('PATCH');
            $('#modal-form form')[0].reset();
            $.ajax({
                url: "{{ url('digitalcaliper') }}" + '/' + id + "/edit",
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    $('#modal-form').modal('show');
                    $('.modal-title').text('Edit Digital Calipers');
                    $('#id').val(data.id);
                    $('#tool_name').val(data.tool_name);
                    $('#serial_number').val(data.serial_number);
                    $('#measuring_range').val(data.measuring_range);
                    $('#report_no').val(data.report_no);
                    $('#tool_name').val(data.tool_name);
                    $('#date_cal').val(data.date_cal);
                    $('#next_cal').val(data.next_cal);
                    $('#measured_value1').val(data.measured_value1);
                    $('#measured_value2').val(data.measured_value2);
                    $('#measured_value3').val(data.measured_value3);
                    $('#measured_value4').val(data.measured_value4);
                    $('#measured_value5').val(data.measured_value5);
                    $('#measured_value6').val(data.measured_value6);
                    $('#measured_value7').val(data.measured_value7);
                    $('#measured_value8').val(data.measured_value8);
                    $('#measured_value9').val(data.measured_value9);
                    $('#measured_value10').val(data.measured_value10);
                    $('#measured_value11').val(data.measured_value11);
                    $('#measured_value12').val(data.measured_value12);
                    $('#error1').val(data.error1);
                    $('#error2').val(data.error2);
                    $('#error3').val(data.error3);
                    $('#error4').val(data.error4);
                    $('#error5').val(data.error5);
                    $('#error6').val(data.error6);
                    $('#error7').val(data.error7);
                    $('#error8').val(data.error8);
                    $('#error9').val(data.error9);
                    $('#error10').val(data.error10);
                    $('#error11').val(data.error12);
                    $('#error12').val(data.error12);
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
                    url : "{{ url('digitalcaliper') }}" + '/' + id,
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
                    if (save_method == 'add') url = "{{ url('digitalcaliper') }}";
                    else url = "{{ url('digitalcaliper') . '/' }}" + id;
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
