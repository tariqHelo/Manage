@extends('admin.dashboard')     
@section('content')
				{{-- <!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box red-intense">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-globe"></i>جميع الطلاب
							</div>
							<div class="actions">
								<div class="btn-group">
									<a class="btn default" href="javascript:;" data-toggle="dropdown">
									Columns <i class="fa fa-angle-down"></i>
									</a>
									<div id="sample_4_column_toggler" class="dropdown-menu hold-on-click dropdown-checkboxes pull-right">
										<label><input type="checkbox" checked data-column="0">Rendering engine</label>
										<label><input type="checkbox" checked data-column="1">Browser</label>
										<label><input type="checkbox" checked data-column="2">Platform(s)</label>
										<label><input type="checkbox" checked data-column="3">Engine version</label>
										<label><input type="checkbox" checked data-column="4">CSS grade</label>
									</div>
								</div>
							</div>
						</div>
						<div class="portlet-body">
							<table class="table table-striped table-bordered table-hover" id="sample_4">
							<thead>
								<tr>
									<th>
										 #
									</th>
									<th>
										 إسم الطالب
									</th>
									<th>
										 رقم الهوية
									</th>
									<th>
										المدرسة
									</th>
									<th>
										 الصف
									</th>
									<th>
										الحالة
									</th>
									<th>
										 Action
									</th>
								</tr>
							</thead>
							<tbody>
						
						</tr>
								</thead>
								<tbody>
								<tr>
									<td>
										 1
									</td>
									<td>
										 Table cell
									</td>
									<td>
										 Table cell
									</td>
									<td>
										 Table cell
									</td>
									<td>
										 Table cell
									</td>
									<td>
										 Table cell
									</td>
									<td>
										 Table cell
									</td>
								</tr>
								<tr>
									<td>
										 2
									</td>
									<td>
										 Table cell
									</td>
									<td>
										 Table cell
									</td>
									<td>
										 Table cell
									</td>
									<td>
										 Table cell
									</td>
									<td>
										 Table cell
									</td>
									<td>
										 Table cell
									</td>
								</tr>
								<tr>
									<td>
										 3
									</td>
									<td>
										 Table cell
									</td>
									<td>
										 Table cell
									</td>
									<td>
										 Table cell
									</td>
									<td>
										 Table cell
									</td>
									<td>
										 Table cell
									</td>
									<td>
										 Table cell
									</td>
								</tr>
							</tbody>
							</table>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET--> --}}
     

		<!-- BEGIN PAGE CONTENT-->
			<form action="{{ route('receve') }}" method="post" class="row">
				@csrf
				<div class="col-md-12">
						<select class="form-control" name="sm">
							@foreach($files as $file)
								<option value="{{ $file->id }}">{{ $file->title }}</option>
							@endforeach
						</select>
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box grey-cascade">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-globe"></i>كل الطلاب
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
						<div class="portlet-body">
							<div class="table-toolbar">
								<div class="row">
									<div class="col-md-6">
										<div class="btn-group">
											<button id="sample_editable_1_new" class="btn green">
											إضافة<i class="fa fa-plus"></i>
											</button>
										</div>
									</div>
									<div class="col-md-6">
										<div class="btn-group pull-right">
											<button class="btn dropdown-toggle" data-toggle="dropdown">إرسال  <i class="fa fa-angle-down"></i>
											</button>
											<ul class="dropdown-menu pull-right">
												<li>
													<a href="javascript:;">
												SMS	  </a>
												</li>
												<li>
													<button type="submit">
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
											{{ $student->school }}
										</td>
										<td class="center">
											{{ $student->mobile }}
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