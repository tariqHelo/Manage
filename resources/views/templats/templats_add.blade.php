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
                            <form class="form-horizontal"action="{{ route('store_temp') }}" method="post" enctype="multipart/form-data" role="form">
                                @csrf
                                @method('POST');
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
                                            <input id="title" name="title" type="text" class="form-control input-lg" placeholder="Large Input">
										</div>
                                    </div>
									<div class="form-group">
										<label class="col-md-3 control-label">لغة القالب</label>
										<div class="col-md-6">
											<select name="Option1" i class="form-control input-lg">
												<option value="Option1">Option 1</option>
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
                                    <button type="submit" class="btn green">تحميل الملف</button>
								</div>
							</form>
                         </div>
                        
                            <div class="form-group" id="preview">
                            <h2>عرض تقريبي:</h2>
                            <div style="width: 100%; height: 700px;border: 1px #ff1c1c dotted;padding: 5px;">
                                @if(isset($file))
                                    <img height="200" width="200" src="{{ asset('storage/imgaes/'.$file) }}" alt="">
                                @endif
                            </div>
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
									<input type="text" class="form-control" id="exampleInputEmail2" placeholder="أدخل هنا">
                                </div>
                                <div class="form-group">
									<label class="sr-only" for="exampleInputEmail2">الطول</label>
									<input type="text" class="form-control" id="exampleInputEmail2" placeholder="أدخل هنا">
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