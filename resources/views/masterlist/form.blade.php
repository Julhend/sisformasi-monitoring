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
                    <input type="hidden" id="checked_by" name="checked_by" value="{{auth()->user()->name}}">
                   
                    <div class="box-body">
                        <div class="colum"> 
                        <div class="form-group">
                            <label >Tool Name</label>
                            <input type="text" class="form-control" id="tool_name" name="tool_name" value="Outside Dial Micrometer" autofocus required>
                            <span class="help-block with-errors"></span>
                        </div>
                        <div class="form-group">
                            <label >Serial No</label>
                            <input type="text" class="form-control" id="serial_number" name="serial_number"  autofocus required>
                            <span class="help-block with-errors"></span>
                        </div>
                        <div class="form-group">
                            <label >Measuring Range</label>
                            <input type="text" class="form-control" id="measuring_range" name="measuring_range" value="0 - 25 mm" autofocus required>
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

                    {{-- ------------------------------------------------------------------------------ --}}

                   <div class="border">
					<div id="example_wrapper" class="dataTables_wrapper"><div class="dataTables_length" id="example_length">
                        <div class="test"> 
                        <table id="example" class="display dataTable" style="width: 100%;" aria-describedby="example_info">
						
                            <thead>
                           
							<tr>
                              
                                <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Age" style="width: 159px;">Preset Values</th>
                                <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Position" style="width: 159px;">Measured Values</th>
                                <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Office" style="width: 101px;">Deviation</th>
                            </tr>
						</thead>
						<tbody>
						<tr class="odd">
								<td>0.000</td>
								<td><input type="number" id="measured_value1" name="measured_value1" value="0.000"></td>
								<td><input type="number" id="deviation1" name="deviation1" value="0"></td>
							</tr>
						<tr class="even">
								<td>2.500</td>
								<td><input type="number" id="measured_value2" name="measured_value2" value="2.500"></td>
								<td><input type="number" id="deviation2" name="deviation2" value="0"></td>
							</tr>
						<tr class="odd">
								<td>6.000</td>
								<td><input type="number" id="measured_value3" name="measured_value3" value="6.000"></td>
								<td><input type="number" id="deviation3" name="deviation3" value="0"></td>
							</tr>
						<tr class="even">
								<td>7.500</td>
								<td><input type="number" id="measured_value4" name="measured_value4" value="7.500"></td>
								<td><input type="number" id="deviation4" name="deviation4" value="0"></td>
							</tr>
						<tr class="odd">
								<td>10.000</td>
								<td><input type="number" id="measured_value5" name="measured_value5" value="10.000"></td>
								<td><input type="number" id="deviation5" name="deviation5" value="0"></td>
							</tr>
						<tr class="even">
								<td>12.500</td>
								<td><input type="number" id="measured_value6" name="measured_value6" value="12.500"></td>
								<td><input type="number" id="deviation6" name="deviation6" value="0"></td>
							</tr>
						<tr class="odd">
								<td>15.000</td>
								<td><input type="number" id="measured_value7" name="measured_value7" value="15.000"></td>
								<td><input type="number" id="deviation7" name="deviation7" value="0"></td>
							</tr>
						<tr class="even">
								<td>17.500</td>
								<td><input type="number" id="measured_value8" name="measured_value8" value="17.500"></td>
								<td><input type="number" id="deviation8" name="deviation8" value="0"></td>
							</tr>
						<tr class="odd">
								<td>20.000</td>
								<td><input type="number" id="measured_value9" name="measured_value9" value="20.000"></td>
								<td><input type="number" id="deviation9" name="deviation9" value="0"></td>
							</tr>
						<tr class="even">
								<td>22.500</td>
								<td><input type="number" id="measured_value10" name="measured_value10" value="22.500"></td>
								<td><input type="number" id="deviation10" name="deviation10" value="0"></td>
							</tr>
						<tr class="odd">
								<td>25.000</td>
								<td><input type="number" id="measured_value11" name="measured_value11" value="25.000"></td>
								<td><input type="number" id="deviation11" name="deviation11" value="0"></td>
							</tr>
                            </tbody>
						<tfoot>

						</tfoot>
					</table>
				</div>
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
