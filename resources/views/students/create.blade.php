@extends('admin.dashboard')     
@section('content')
     		<div class="row">
				<div class="col-md-12">
					<!-- BEGIN VALIDATION STATES-->
					<div class="portlet box purple">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i>إضافة طالب جديد
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="#portlet-config" data-toggle="modal" class="config">
								</a>
								<a href="javascript:;" class="reload">
								</a>
								<a href="javascript:;" class="remove">
								</a>
							</div>
						</div>
						<div class="portlet-body form">
							<!-- BEGIN FORM-->
							<form action="{{ route('students.store') }}" method="POST" id="form_sample_1" class="form-horizontal">
								@CSRF
								@method('post')
								<div class="form-body">
									<div class="alert alert-danger display-hide">
										<button class="close" data-close="alert"></button>
										You have some form errors. Please check below.
									</div>
									<div class="alert alert-success display-hide">
										<button class="close" data-close="alert"></button>
										Your form validation is successful!
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">إسم الطالب <span class="required">
										* </span>
										</label>
										<div class="col-md-2">
											<input type="text" name="fname" placeholder="الإسم الإول " data-required="1" class="form-control"/>
										</div>
											<div class="col-md-2">
											<input type="text" name="sname" placeholder="إسم الإب" data-required="1" class="form-control"/>
										</div>
										<div class="col-md-2">
											<input type="text" name="tname" placeholder="إسم الجد" data-required="1" class="form-control"/>
										</div>
											<div class="col-md-2">
											<input type="text" name="lname" placeholder="إسم العائلة" data-required="1" class="form-control"/>
										</div>
										
									</div>
							
									<div class="form-group">
										<label class="control-label col-md-3">رقم الهوية <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<input name="number" type="number" class="form-control"/>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">الصف <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<select class="form-control" name="class">
												<option value="">Select...</option>
												<option value="Category 1">Category 1</option>
												<option value="Category 2">Category 2</option>
												<option value="Category 3">Category 5</option>
												<option value="Category 4">Category 4</option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">المدرسة <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<select class="form-control" name="school">
												<option value="">Select...</option>
												<option value="Category 1">Category 1</option>
												<option value="Category 2">Category 2</option>
												<option value="Category 3">Category 5</option>
												<option value="Category 4">Category 4</option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">الحالة <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<select class="form-control" name="status">
												<option value="">Select...</option>
												<option value="Category 1">Category 1</option>
												<option value="Category 2">Category 2</option>
												<option value="Category 3">Category 5</option>
												<option value="Category 4">Category 4</option>
											</select>
										</div>
									</div>
										<div class="form-group">
										<label class="control-label col-md-3">البريد الإلكتروني <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<div class="input-icon">
												<i class="fa fa-envelope"></i>
												<input type="email" name="email" class="form-control" id="inputEmail12" placeholder="Email">
											</div>
										</div>
									</div>
										<div class="form-group">
										<label class="control-label col-md-3">رقم الجوال <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<input name="mobile" type="text" class="form-control"/>
										</div>
									</div>
										<div class="form-group">
										<label class="control-label col-md-3">كلمة السر <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<div class="input-icon right">
												<i class="fa fa-user"></i>
												<input type="password" name="password" class="form-control" id="inputPassword1" placeholder="Password">
											</div>
										</div>
									</div>
									
								</div>
								<div class="form-actions">
									<div class="row">
										<div class="col-md-offset-3 col-md-9">
											<button type="submit" class="btn green">Submit</button>
											<button type="button" class="btn default">Cancel</button>
										</div>
									</div>
								</div>
							</form>
							<!-- END FORM-->
						</div>
					</div>
					<!-- END VALIDATION STATES-->
				</div>
			</div> 
 @endsection       
  