@extends('admin.dashboard') 
@section('css')

@endsection
@section('content')
 <div>
	@include("shared.msg")

	<!-- BEGIN SAMPLE FORM PORTLET-->
	<div class="portlet box red">
		<div class="portlet-title">
			<div class="caption">
				<i class="fa fa-gift"></i> تحميل ملف إكسل
			</div>
		</div>
		<div class="portlet-body form">
			<form role="form" method="POST" action="{{ route('import_excel') }}" enctype="multipart/form-data">
				@csrf
				@method('post')
				<div class="form-body">
					<div class="form-group">
						<label>Excel File</label>
						<input type="file"  name="select_file" class="form-control input-lg" placeholder="input-lg">
					</div>
				<div class="form-actions left">
						<button type="submit" class="btn btn-circle btn-lg blue m-icon-big">
						Submit <i class="m-icon-big-swapdown m-icon-white"></i>
						</button>
				</div>
				<div class="tab-pane " id="buttons_metro_circle">
					<div class="clearfix">
					
					
					</div>
			</form>
		</div>
	</div>
	<!-- END SAMPLE FORM PORTLET-->
	 <form action="{{ route('receve') }}" method="POST" class="row">
			@csrf
			@method('POST')
			<div class="col-md-12">
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
											<a data-target="#stack1" data-toggle="modal" class="btn green">
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
									 رقم الهوية
								</th>
								{{-- <th>
									الصف
								</th> 
								<th>
									 المدرسة
								</th>--}}
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
											{{ $student->name }}
										</td>
										<td>
											<a href="mailto:{{ $student->email }}">
											{{ $student->email }} </a>
										</td>
										<td>
											{{ $student->mobile}}
										</td>
										<td class="center">
											{{ $student->numberId}}
										</td>
											{{-- <td class="center">
											{{ $student->class ?? ""}}
										</td>
											<td class="center">
											{{ $student->school ?? ""}}
										</td> --}}
										<td>   
												<a href="{{ route('student-update' , $student->id) }}" data-target="#stack2{{ $student->id }}" data-toggle="modal" class="btn btn-primary btn-sm"><i class='fa fa-edit'></i></a>
											     <a href="{{ route("student-delete", $student->id) }}" onclick='return confirm("Are you sure dude?")' class="btn btn-warning btn-sm"><i class='fa fa-trash'></i></a>
									
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
	<!-- /.modal -->
				{{--Start Add New --}}
					 <form action="{{ route('student-store') }}" method="POST" id="stack1" class="modal fade" tabindex="-1" data-width="400">
						@csrf
						@method('POST')

						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
									<h4 class="modal-title">إضافة طالب جديد</h4>
								</div>
								<div class="modal-body">
								<!-- form add -->
										
											<div class="modal-body">
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">الإسم</label>
													<div class="col-sm-9">
														<input type="text"name="name" value="{{ old('name') }}" class="form-control" placeholder="الإسم">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">الإيميل</label>
													<div class="col-sm-9">
														<input type="text" name="email" value="{{ old('email') }}" class="form-control" placeholder="أدخل الإيميل ">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">رقم الجوال</label>
													<div class="col-sm-9">
														<input type="text" name="mobile" value="{{ old('mobile') }}" class="form-control" placeholder="رقم الجوال ">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">رقم الهوية</label>
													<div class="col-sm-9">
														<input type="text" name="numberId" value="{{ old('numberId') }}" class="form-control" placeholder="رقم الهوية">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">الصف</label>
													<div class="col-sm-9">
														<input type="text" name="class" value="{{ old('class') }}" class="form-control" placeholder="الصف">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">المدرسة</label>
													<div class="col-sm-9">
														<input type="text" name="school" value="{{ old('school') }}" class="form-control" placeholder="المدرسة">
													</div>
												</div>
											</div>
								</div>
								<div class="modal-footer">
									<button type="button" data-dismiss="modal" class="btn">إلغاء</button>
									<button type="submit" class="btn red">حفظ</button>
								</div>
							</div>
						</div>
					</form>
				{{--End Add New --}}
				{{--Start Edit --}}
		         @foreach($students as  $student)
					<form action="{{ route('student-update',$student->id) }}" method="POST"  id="stack2{{ $student->id }}" class="modal fade" tabindex="-1" data-width="400">
						@csrf
						@method('POST')
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
									<h4 class="modal-title">تعديل طالب</h4>
								</div>
								<div class="modal-body">
									
											<div class="modal-body">
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">الإسم</label>
													<div class="col-sm-9">
														<input type="text"  name="name" value="{{ $student->name }}" class="form-control" placeholder="Enter Name">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">الإيميل</label>
													<div class="col-sm-9">
														<input type="text" name="email" class="form-control" value="{{ $student->email }}" placeholder="Enter Age">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">رقم الجوال</label>
													<div class="col-sm-9">
														<input type="text" name="mobile" class="form-control" value="{{ $student->mobile }}" placeholder="Enter Sex">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">رقم الهوية</label>
													<div class="col-sm-9">
														<input type="text" name="numberId" class="form-control" value="{{ $student->numberId }}" placeholder="Enter No">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">الصف</label>
													<div class="col-sm-9">
														<input type="text" name="class" class="form-control" value="{{ $student->class }}" placeholder="Enter Age">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">المدرسة</label>
													<div class="col-sm-9">
														<input type="text" name="school" class="form-control" value="{{ $student->school }}" placeholder="Enter Age">
													</div>
												</div>
											</div>
								</div>
								<div class="modal-footer">
									<button type="button" data-dismiss="modal" class="btn">إلغاء</button>
									<button type="submit" class="btn red">حفظ </button>
								</div>
							</div>
						</div>
					</form>
			     @endforeach
				{{--End Edit --}}
</div>

@endsection

