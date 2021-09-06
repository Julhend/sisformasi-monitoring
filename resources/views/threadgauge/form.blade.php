<style> 
 .colum {
      display:flex;
      justify-content:space-around;
      flex-direction:row;
      flex-wrap:wrap;
      line-height: 0.5;
      }
      .colum div {
      width:48%;
      }
      .text {
       text-align:center;
      }
      /* .test {
          border-style: solid;
          margin: 5px;
        } */
    </style>
<div class="modal fade" id="modal-form" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <form  id="form-item" method="post" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data" >
                {{ csrf_field() }} {{ method_field('POST') }}
            <meta name="csrf-token" content="{{ csrf_token() }}">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title"></h3>
                </div>


                <div class="modal-body">
                    <input type="hidden" id="id" name="id">
                    <input type="hidden" id="users_id" name="users_id" value="{{Auth::id()}}">
                    <input type="hidden" id="calibrated_by" name="calibrated_by" value="{{auth()->user()->name}}">
                   
                    <div class="box-body">
                        <div class="colum"> 
                        <div class="form-group">
                            <label >Tool Name</label>
                            <input type="text" class="form-control" id="tool_name" name="tool_name" value="Thread Gauge" autofocus required>
                            <span class="help-block with-errors"></span>
                        </div>
                        <div class="form-group">
                            <label >Serial No</label>
                            <input type="text" class="form-control" id="serial_number" name="serial_number"  autofocus required>
                            <span class="help-block with-errors"></span>
                        </div>
                        <div class="form-group">
                            <label >Measuring Range</label>
                            <input type="text" class="form-control" id="measuring_range" name="measuring_range" value="M3 x 0.5 - 6H" autofocus required>
                            <span class="help-block with-errors"></span>
                        </div>
                        <div class="form-group">
                            <label >Report No</label>
                            <input type="text" class="form-control" id="report_no" name="report_no"  autofocus required>
                            <span class="help-block with-errors"></span>
                        </div>
                        <div class="form-group">
                            <label >Date</label>
                            <input type="Date" class="form-control" id="date_cal" name="date_cal"  autofocus required>
                            <span class="help-block with-errors"></span>
                        </div>
                        <div class="form-group">
                            <label >Next Cal Date</label>
                            <input type="Date" class="form-control" id="next_cal" name="next_cal"  autofocus required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                  <p>  <label >Ambient Temperature : 20 ± 1° C</label></P>
                  <p> <label >Relative Humidity   : 55 ± 10% r.h</label> </p> 

                  <div class="colum">
                      <div class="form-group">
                            <label >Wire Gauge Set S/No :</label>
                            <input type="text" class="form-control" id="wire_gauge_set_no" name="wire_gauge_set_no" autofocus required>
                            <span class="help-block with-errors"></span>
                        </div>
                        <div class="form-group">
                            <label >Traceable to MD(singapore) via Report No:</label>
                            <input type="text" class="form-control" id="traceable_report_no" name="traceable_report_no"  autofocus required>
                            <span class="help-block with-errors"></span>
                        </div>
                  </div>
                    {{-- ------------------------------------------------------------------------------ --}}

                   <div class="border">
					<div id="example_wrapper" class="dataTables_wrapper"><div class="dataTables_length" id="example_length">
                        <div class="test"> 
                        <table id="example" class="display dataTable" style="width: 100%;" aria-describedby="example_info">
						
                            <thead>
                           
							<tr>
                                <th class="sorting_disabled" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 100px;"><strong>GO</strong></th>
                                <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Age" style="width: 159px;">Featured Inspected (mm)</th>
                                <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Position" style="width: 159px;">Allowable Tollerance</th>
                                <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Office" style="width: 101px;">Measured Value</th>
                                <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Office" style="width: 101px;">Deviation</th>
                            </tr>
						</thead>
						<tbody>
						<tr class="odd">
								<td>Pitch Dia</td>
								<td>2.681</td>
								<td>± 0.0045</td>
								<td><input type="number" id="measured_value1" name="measured_value1" value="0"></td>
								<td><input type="number" id="deviation1" name="deviation1" value="0"></td>
							</tr>
						<tr class="even">
								<td>Major Dia</td>
								<td>3.006</td>
								<td>± 0.0090</td>
								<td><input type="number" id="measured_value2" name="measured_value2" value="0"></td>
								<td><input type="number" id="deviation2" name="deviation2" value="0"></td>
							</tr>
						

                            </tbody>
						<tfoot>

						</tfoot>
					</table>
				</div>
                </div>
                    <div class="border">
					<div id="example_wrapper" class="dataTables_wrapper"><div class="dataTables_length" id="example_length">
                        
                        <table id="example" class="display dataTable" style="width: 100%;" aria-describedby="example_info">
						<thead>
                            <div class="text">
                            </div>
							<tr>
                               <th class="sorting_disabled" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Age" style="width: 100px;"><strong>NO GO</strong></th>
                                <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Age" style="width: 159px;">Featured Inspected (mm)</th>
                                <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Position" style="width: 159px;">Allowable Tollerance</th>
                                <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Office" style="width: 101px;">Measured Value</th>
                                <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Office" style="width: 101px;">Deviation</th>
                            </tr>
						</thead>
						<tbody>
						<tr class="odd">
								<td>Pitch Dia</td>
								<td>2.7795</td>
								<td>± 0.0045</td>
								<td><input type="number" id="measured_value3" name="measured_value3" value="0"></td>
								<td><input type="number" id="deviation3" name="deviation3"  value="0"></td>
							</tr>
						<tr class="even">
                                <td>Major Dia</td>
								<td>2.8795</td>
								<td>± 0.0090</td>
								<td><input type="number" id="measured_value4" name="measured_value4" value="60"></td>
								<td><input type="number" id="deviation4" name="deviation4" value="0"></td>
							</tr>
                            </tbody>
						<tfoot>
						</tfoot>
					</table>
				</div> 

                    {{-- ------------------------------------------------------------------------------ --}}
                      
                    </div>
                    <!-- /.box-body -->

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
