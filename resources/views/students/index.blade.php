@extends('admin.dashboard')     
@section('content')
	<form action="{{ route('receve') }}" method="post" class="row">
		@csrf
				<div class="col-md-12">
				   @include("shared.msg")
					<!-- BEGIN PORTLET-->
					<div class="portlet box yellow">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i>إختيار الملف المرسل
							</div>
						</div>
						<div class="portlet-body form">
							<!-- BEGIN FORM-->
							<div class="form-horizontal form-row-seperated">
								<div class="form-group">
										<label class="control-label col-md-3"> إسم الملف</label>
										<div class="col-md-4">
											<select class="form-control input-medium select2me"  name="sm" data-placeholder="Select...">
												@foreach($files as $file)
													<option value="{{ $file->id }}">{{ $file->title }}</option>
												@endforeach
											</select>
										
										</div>
									</div>
							 </div>
    	
		    	<div  class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box grey-cascade">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-globe"></i>كل الطلاب
							</div>
						
						</div>
						<div class="portlet-body">
							<div class="table-toolbar">
								<div class="row">
									<div class="col-md-6">
										<div class="btn-group">
											<a href="{{ route('add_student') }}" id="sample_editable_1_new" class="btn green">
											إضافة<i class="fa fa-plus"></i>
										</a>
										</div>
									</div>
									<div class="col-md-6">
										<div class="btn-group pull-right">
											<button class="btn dropdown-toggle" data-toggle="dropdown">إرسال  <i class="fa fa-angle-down"></i>
											</button>
											<ul class="dropdown-menu pull-right">
												<li>
													<button type="submit" name="sms">
													الرسالة النصية   </button>
												</li>
												<li>
													<button type="submit" name="Email" >
													البريد الإلكتروني </button>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<table class="table table-striped table-bordered table-hover" id="sample_1">
							<thead>
							<tr>
								<th class="table-checkbox">
									<input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes"/>
								</th>
								<th>
									 إسم الطالب
								</th>
								<th>
									 الإيميل
								</th>
								<th>
									 رقم الجوال
								</th>
								<th>
									 المدرسة
								</th>
								<th>
									 Status
								</th>
							</tr>
							</thead>
							<tbody>
								
								@foreach($students as  $student)
									<tr class="odd gradeX">
										<td>
											<input type="checkbox" class="checkboxes" name="users[]" value="{{ $student->id }}"/>
										</td>
										
										<td>
											{{ $student->fname }}
										</td>
										<td>
											<a href="mailto:{{ $student->email }}">
											{{ $student->email }} </a>
										</td>
										<td>
											{{ $student->mobile}}
										</td>
										<td class="center">
											{{ $student->school }}
										</td>
										<td>
											<span class="label label-sm label-success">
											{{ $student->status }} </span>
										</td>
									</tr>
								@endforeach
						
							
							</tbody>
							</table>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>
	</form>

@endsection



{{-- 
	<div action="{{ route('receve') }}" method="post" class="row">
			@csrf
				<div class="col-md-12">
					<!-- BEGIN PORTLET-->
					<div class="portlet box yellow">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i>إختيار الملف
							</div>
						</div>
						<div class="portlet-body form">
							<!-- BEGIN FORM-->
							<div class="form-horizontal form-row-seperated">
								<div class="form-group">
										<label class="control-label col-md-3"> إسم الملف</label>
										<div class="col-md-4">
											<select class="form-control input-medium select2me"  name="sm" data-placeholder="Select...">
												@foreach($files as $file)
													<option value="{{ $file->id }}">{{ $file->title }}</option>
												@endforeach
											</select>
										
										</div>
									</div>
							 </div> --}}