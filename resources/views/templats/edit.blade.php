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
                            <form class="form-horizontal"action="{{ $route }}" method="post" enctype="multipart/form-data" role="form">
                                @csrf
								@method('POST');
								@if(isset($file))
								<input type="hidden" value="{{ $file }}" name="file">
								@endif
								<div class="form-body">
									<div class="form-group">
										<label class="col-md-3 control-label">إختار ملف</label>
										<div class="col-md-6">
                                            <input id="file" name="file" type="file" class="form-control input-lg" placeholder="Large Input">
										</div>
                                    </div>
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
									 <div class="form-group">
										<label class="col-md-3 control-label">النص</label>
										<div class="col-md-6">
									       <input type="text" name="wr" class="form-control" id="exampleInputEmail2" placeholder="أدخل هنا">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">الطول</label>
										<div class="col-md-6">
									       <input type="text" name="x" class="form-control" id="exampleInputEmail2" placeholder="أدخل هنا">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">العرض</label>
										<div class="col-md-6">
									       <input type="text" name="y" class="form-control" id="exampleInputEmail2" placeholder="أدخل هنا">
										</div>
                                    </div>
								 <div class="form-actions right1">
                                    <button type="submit" class="btn green">تحميل الملف</button>
								</div>
							</form>
                         </div>
                        
                            <div class="form-group" id="preview">
							<h2>عرض تقريبي:</h2>
							@if(isset($file))
								<div style="width: 100%; height: 700px;border: 1px #ff1c1c dotted;padding: 5px;">
										<embed
											src="{{ $file }}"
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
             </div>               
                  <!-- END SAMPLE FORM PORTLET-->


            <div class="row ">
				<div class="col-md-12">
					<!-- BEGIN SAMPLE FORM PORTLET-->
					<div class="portlet box yellow">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i> إعدادت النص
							</div>
							
						</div>
						<div class="portlet-body">
							<h4>النص المكتوب</h4>
							<form class="form-inline" role="form">
								<div class="form-group">
									<label class="sr-only" for="exampleInputEmail2">النص</label>
									<input type="text" name="wr" class="form-control" id="exampleInputEmail2" placeholder="أدخل هنا">
                                </div>
                                <div class="form-group">
									<label class="sr-only" for="exampleInputEmail2">الطول</label>
									<input type="text" name="wh" class="form-control" id="exampleInputEmail2" placeholder="أدخل هنا">
                                </div>
                                <div class="form-group">
                                    <label>العرض</label>
                                    <select class="form-control">
                                        <option>Option 1</option>
                                        <option>Option 2</option>
                                        <option>Option 3</option>
                                        <option>Option 4</option>
                                        <option>Option 5</option>
                                    </select>
								</div>
								
								{{-- <input type="hidden" name="template_id" value="{{ $ImageD ? $ImageD->id : "" }}"> --}}
	                           <div class="form-actions right1">
									<button type="submit" class="btn green" name="setaction" value="save"> حفظ</button>
									<button type="submit" class="btn green" name="setaction" value="preview"> عر</button>
								</div>
							</form>
							<hr>
						</div>
					</div>
					<!-- END SAMPLE FORM PORTLET-->
				</div>
			</div>
			<!-- END PAGE CONTENT-->
		</div>
	</div>
	<!-- END CONTENT -->
                    
@endsection