
@extends('admin.dashboard')     
@section('content')
		<!-- BEGIN SAMPLE FORM PORTLET-->
					<div class="portlet box purple ">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i> تصميم قالب
							</div>
							<div class="tools">
								<a href="" class="collapse">
								</a>
								<a href="#portlet-config" data-toggle="modal" class="config">
								</a>
								<a href="" class="reload">
								</a>
								<a href="" class="remove">
								</a>
							</div>
						</div>
						<div class="portlet-body form">
							<form class="form-horizontal"action="store" enctype="multipart/form-data" role="form">
								<div class="form-body">
									<div class="form-group">
										<label class="col-md-3 control-label">إختار ملف</label>
										<div class="col-md-6">
                                            <input id="image" name="image" type="file" class="form-control input-lg" placeholder="Large Input">
										</div>
                                    </div>
									<div class="form-group">
										<label class="col-md-3 control-label">لغة القالب</label>
										<div class="col-md-6">
											<select class="form-control input-lg">
												<option>Option 1</option>
												<option>Option 2</option>
												<option>Option 3</option>
												<option>Option 4</option>
												<option>Option 5</option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">خيارات العرض</label>
										<div class="col-md-6">
											<select class="form-control input-lg">
												<option>Option 1</option>
												<option>Option 2</option>
												<option>Option 3</option>
												<option>Option 4</option>
												<option>Option 5</option>
											</select>
										</div>
									</div>
								 <div class="form-actions right1">
                                    <button type="submit" class="btn green">تحميل الملف</button>
								</div>
							</form>
                        </div>
                        
                          <div class="form-group" id="preview">
                        <h2>عرض تقريبي:</h2>
                        <div style="width: 100%; height: 700px;border: 1px #ff1c1c dotted;padding: 5px;">
                        </div>
                    </div>
					</div>
					<!-- END SAMPLE FORM PORTLET-->
@endsection
