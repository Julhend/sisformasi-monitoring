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
    </style>
<div class="modal fade" id="modal-form" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <form  id="form-item" method="post" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data" >
                {{ csrf_field() }} {{ method_field('POST') }}

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title"></h3>
                </div>


                <div class="modal-body">
                    <input type="hidden" id="id" name="id">
                    <div class="box-body">
                        <div class="colum"> 
                        <div class="form-group">
                            <label >Tool Name</label>
                            <input type="text" class="form-control" id="toolname" name="toolname"  autofocus required>
                            <span class="help-block with-errors"></span>
                        </div>
                        <div class="form-group">
                            <label >Serial No</label>
                            <input type="text" class="form-control" id="toolname" name="toolname"  autofocus required>
                            <span class="help-block with-errors"></span>
                        </div>
                        <div class="form-group">
                            <label >Measuring Range</label>
                            <input type="text" class="form-control" id="toolname" name="toolname"  autofocus required>
                            <span class="help-block with-errors"></span>
                        </div>
                        <div class="form-group">
                            <label >Report No</label>
                            <input type="text" class="form-control" id="toolname" name="toolname"  autofocus required>
                            <span class="help-block with-errors"></span>
                        </div>
                        <div class="form-group">
                            <label >Date</label>
                            <input type="text" class="form-control" id="toolname" name="toolname"  autofocus required>
                            <span class="help-block with-errors"></span>
                        </div>
                        <div class="form-group">
                            <label >Next Cal Date</label>
                            <input type="text" class="form-control" id="toolname" name="toolname"  autofocus required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                  <p>  <label >Ambient Temperature : 20 ± 1° C</label></P>
                  <p> <label >Relative Humidity   : 55 ± 10% r.h</label> </p> 

                    {{-- ------------------------------------------------------------------------------ --}}

                    <div class="demo-html">
					<div id="example_wrapper" class="dataTables_wrapper"><div class="dataTables_length" id="example_length">
                        
                        <table id="example" class="display dataTable" style="width: 100%;" aria-describedby="example_info">
						<thead>
                            <div class="text">
                            <label >INSTRUMENT ERROR OF EXTERNAL MEASUREMENT</label> 
                            </div>
							<tr>
                                <th class="sorting_disabled" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 50px;">Nominal (mm)</th>
                                <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Age" style="width: 159px;">Permissible Error (mm)</th>
                                <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Position" style="width: 159px;">Measured Value (mm)</th>
                                <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Office" style="width: 101px;">Error (mm)</th>
                            </tr>
						</thead>
						<tbody>
						<tr class="odd">
								<td>0.00</td>
								<td>± 0.02</td>
								<td><input type="number" id="row-5-position" name="measured_value1" value="0.00"></td>
								<td><input type="number" id="row-25-office" name="error1" value="0"></td>
							</tr>
						<tr class="even">
								<td>6.00</td>
								<td>± 0.02</td>
								<td><input type="number" id="row-5-position" name="measured_value2" value="6.00"></td>
								<td><input type="number" id="row-25-office" name="error2" value="0"></td>
							</tr>
						<tr class="odd">
								<td>10.00</td>
								<td>± 0.02</td>
								<td><input type="number" id="row-5-position" name="measured_value3" value="10.00"></td>
								<td><input type="number" id="row-25-office" name="error3" value="0"></td>
							</tr>
						<tr class="even">
								<td>20.00</td>
								<td>± 0.02</td>
								<td><input type="number" id="row-5-position" name="measured_value4" value="20.00"></td>
								<td><input type="number" id="row-25-office" name="error4" value="0"></td>
							</tr>
						<tr class="odd">
								<td>25.00</td>
								<td>± 0.02</td>
								<td><input type="number" id="row-5-position" name="measured_value5" value="25.00"></td>
								<td><input type="number" id="row-25-office" name="error5" value="0"></td>
							</tr>
						<tr class="even">
								<td>50.00</td>
								<td>± 0.02</td>
								<td><input type="number" id="row-5-position" name="measured_value6" value="50.00"></td>
								<td><input type="number" id="row-25-office" name="error6" value="0"></td>
							</tr>
						<tr class="odd">
								<td>75.00</td>
								<td>± 0.02</td>
								<td><input type="number" id="row-5-position" name="measured_value7" value="75.00"></td>
								<td><input type="number" id="row-25-office" name="error7" value="0"></td>
							</tr>
						<tr class="even">
								<td>100.00</td>
								<td>± 0.02</td>
								<td><input type="number" id="row-5-position" name="measured_value8" value="100.00"></td>
								<td><input type="number" id="row-25-office" name="error8" value="0"></td>
							</tr>
						<tr class="odd">
								<td>150.00</td>
								<td>± 0.02</td>
								<td><input type="number" id="row-5-position" name="measured_value9" value="150.00"></td>
								<td><input type="number" id="row-25-office" name="error9" value="0"></td>
							</tr>

                            </tbody>
						<tfoot>

						</tfoot>
					</table>
				</div>
                    <div class="demo-html">
					<div id="example_wrapper" class="dataTables_wrapper"><div class="dataTables_length" id="example_length">
                        
                        <table id="example" class="display dataTable" style="width: 100%;" aria-describedby="example_info">
						<thead>
                            <div class="text">
                            <label >INSTRUMENT ERROR OF INTERNAL MEASUREMENT</label> 
                            </div>
							<tr>
                                <th class="sorting_disabled" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 50px;">Nominal (mm)</th>
                                <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Age" style="width: 159px;">Permissible Error (mm)</th>
                                <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Position" style="width: 159px;">Measured Value (mm)</th>
                                <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Office" style="width: 101px;">Error (mm)</th>
                            </tr>
						</thead>
						<tbody>
						<tr class="odd">
								<td>45.00</td>
								<td>± 0.02</td>
								<td><input type="number" id="row-5-position" name="measured_value10" value="45.00"></td>
								<td><input type="number" id="row-25-office" name="error10"  value="0"></td>
							</tr>
						<tr class="even">
								<td>60.00</td>
								<td>± 0.02</td>
								<td><input type="number" id="row-5-position" name="measured_value11" value="60.00"></td>
								<td><input type="number" id="row-25-office" name="error11" value="0"></td>
							</tr>
						<tr class="odd">
								<td>90.00</td>
								<td>± 0.02</td>
								<td><input type="number" id="row-5-position" name="measured_value12" value="90.00"></td>
								<td><input type="number" id="row-25-office" name="error12"  value="0"></td>
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
