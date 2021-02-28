@extends('admin.dashboard')     
@section('content')
 
<form action="{{ $route }}" method="post" enctype="multipart/form-data" role="form" class="portlet box purple">
	@csrf
	@method('POST')
						<!-- START PORTLET-->
							<div class="portlet-title">
								<div class="caption">
									<i class="fa fa-gift"></i> تصميم قالب
								</div>
							</div>
							<div class="portlet-body form">
								<div class="form-horizontal">
								
									@if(isset($file))
									<input type="hidden" value="{{ $file }}" name="file">
									@endif
									@if(isset($path))
									<input type="hidden" value="{{ $path }}" name="path">
									@endif
									
										<div class="form-body">
										@if(!isset($file))
										<div class="form-group">
											<label class="col-md-3 control-label">إختار ملف</label>
											<div class="col-md-6">
												<input id="file" name="file" type="file" class="form-control input-lg" placeholder="Large Input">
											</div>
										</div>
										@endif
										<div class="form-group">
											<label class="col-md-3 control-label">العنوان</label>
											<div class="col-md-6">
												<input id="title" name="title" value="{{ request('title') }}" type="text" class="form-control input-lg" placeholder="Large Input">
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">لغة القالب</label>
											<div class="col-md-6">
												<select name="Option1" i class="form-control input-lg">
													<option value="Option1" {{ request('Option1') == 'Option1' ? 'selected' : '' }}>Option 1</option>
													<option value="Option1">Option 2</option>
												
												</select>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">خيارات العرض</label>
											<div class="col-md-6">
												<select class="form-control input-lg">
													<option value="Option2" >Option 1</option>
													<option value="Option2">Option 2</option>
												
												</select>
											</div>
										</div>
									<div class="form-actions right1">
									<button type="submit" class="btn btn-circle green-meadow">تحميل الملف</button>
									</div>
							
								  <div class="form-group" id="preview">
										<h2>عرض تقريبي:</h2>
										@if(isset($file))
											<div style="width: 100%; height: 700px;border: 1px #ff1c1c dotted;padding: 5px;">
													<embed
														src="{{ isset($path) ? $path : $file }}"
														type="application/pdf"
														frameBorder="0"
														scrolling="initial"
														height="100%"
														width="100%"
													></embed>
											</div>
										@endif
						     </div>
			               </div>
 					<!-- BEGIN PORTLET-->

			     
			
					<!-- BEGIN PORTLET-->
					<div class="portlet box yellow">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i>إعدادت النص
							</div>
						</div>
						<div class="portlet-body form">
							<!-- BEGIN FORM-->
							<div class="form-horizontal form-row-seperated">
								<div class="form-body">
									 <div class="form-group"> 
										<label class="col-md-3 control-label">النص</label>
										<div class="col-md-6">
									       <input type="text" name="wr" class="form-control" id="wr" value="{{ isset($write) ? $write : "" }}" placeholder="أدخل هنا">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">الطول</label>
										<div class="col-md-6">
									       <input type="text" name="x" value="{{ isset($x) ? $x : "" }}" class="form-control" id="" placeholder="أدخل هنا">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">العرض</label>
										<div class="col-md-6">
									       <input type="text" name="y" value="{{ isset($y) ? $y : "" }}" class="form-control" id="" placeholder="أدخل هنا">
										</div>
                                    </div>
								
								   <div class="form-group">
										<label class="control-label col-md-3">Default</label>
										<div class="col-md-4">
											<select class="bs-select form-control">
												<option>Mustard</option>
												<option>Ketchup</option>
												<option>Relish</option>
											</select>
										</div>
									</div>
									<div class="form-group last">
										<label class="control-label col-md-3"></label>
										<div class="col-md-4">
											<button type="submit" name="view" value="view" class="btn yellow" href="#form_modal11" data-toggle="modal">
											عرض <i class="fa fa-share"></i>
											</button>
										</div>
									</div>
								</div>
								<div class="form-actions">
									<div class="row">
										<div class="col-md-offset-3 col-md-9">
											<button type="submit" class="btn green"><i class="fa fa-check"></i> حفظ</button>
											<button type="button" class="btn red">إلغاء</button>
										</div>
									</div>
								</div>
							</div>
							<!-- END FORM-->
						
						</div>
					</div>
					<!-- END PORTLET-->
				
         
</form>		
	<!-- END CONTENT -->
                    
@endsection