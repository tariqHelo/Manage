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
			<div class="row">
				<div class="col-md-12">
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
													<a href="javascript:;">
													البريد الإلكتروني </a>
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
									 Joined
								</th>
								<th>
									 Status
								</th>
							</tr>
							</thead>
							<tbody>
							<tr class="odd gradeX">
								<td>
									<input type="checkbox" class="checkboxes" value="1"/>
								</td>
								<td>
									 shuxer
								</td>
								<td>
									<a href="mailto:shuxer@gmail.com">
									shuxer@gmail.com </a>
								</td>
								<td>
									 120
								</td>
								<td class="center">
									 12 Jan 2012
								</td>
								<td>
									<span class="label label-sm label-success">
									Approved </span>
								</td>
							</tr>
							<tr class="odd gradeX">
								<td>
									<input type="checkbox" class="checkboxes" value="1"/>
								</td>
								<td>
									 looper
								</td>
								<td>
									<a href="mailto:looper90@gmail.com">
									looper90@gmail.com </a>
								</td>
								<td>
									 120
								</td>
								<td class="center">
									 12.12.2011
								</td>
								<td>
									<span class="label label-sm label-warning">
									Suspended </span>
								</td>
							</tr>
							<tr class="odd gradeX">
								<td>
									<input type="checkbox" class="checkboxes" value="1"/>
								</td>
								<td>
									 userwow
								</td>
								<td>
									<a href="mailto:userwow@yahoo.com">
									userwow@yahoo.com </a>
								</td>
								<td>
									 20
								</td>
								<td class="center">
									 12.12.2012
								</td>
								<td>
									<span class="label label-sm label-success">
									Approved </span>
								</td>
							</tr>
							<tr class="odd gradeX">
								<td>
									<input type="checkbox" class="checkboxes" value="1"/>
								</td>
								<td>
									 user1wow
								</td>
								<td>
									<a href="mailto:userwow@gmail.com">
									userwow@gmail.com </a>
								</td>
								<td>
									 20
								</td>
								<td class="center">
									 12.12.2012
								</td>
								<td>
									<span class="label label-sm label-default">
									Blocked </span>
								</td>
							</tr>
							<tr class="odd gradeX">
								<td>
									<input type="checkbox" class="checkboxes" value="1"/>
								</td>
								<td>
									 restest
								</td>
								<td>
									<a href="mailto:userwow@gmail.com">
									test@gmail.com </a>
								</td>
								<td>
									 20
								</td>
								<td class="center">
									 12.12.2012
								</td>
								<td>
									<span class="label label-sm label-success">
									Approved </span>
								</td>
							</tr>
							<tr class="odd gradeX">
								<td>
									<input type="checkbox" class="checkboxes" value="1"/>
								</td>
								<td>
									 foopl
								</td>
								<td>
									<a href="mailto:userwow@gmail.com">
									good@gmail.com </a>
								</td>
								<td>
									 20
								</td>
								<td class="center">
									 19.11.2010
								</td>
								<td>
									<span class="label label-sm label-success">
									Approved </span>
								</td>
							</tr>
							<tr class="odd gradeX">
								<td>
									<input type="checkbox" class="checkboxes" value="1"/>
								</td>
								<td>
									 weep
								</td>
								<td>
									<a href="mailto:userwow@gmail.com">
									good@gmail.com </a>
								</td>
								<td>
									 20
								</td>
								<td class="center">
									 19.11.2010
								</td>
								<td>
									<span class="label label-sm label-success">
									Approved </span>
								</td>
							</tr>
							<tr class="odd gradeX">
								<td>
									<input type="checkbox" class="checkboxes" value="1"/>
								</td>
								<td>
									 coop
								</td>
								<td>
									<a href="mailto:userwow@gmail.com">
									good@gmail.com </a>
								</td>
								<td>
									 20
								</td>
								<td class="center">
									 19.11.2010
								</td>
								<td>
									<span class="label label-sm label-success">
									Approved </span>
								</td>
							</tr>
							<tr class="odd gradeX">
								<td>
									<input type="checkbox" class="checkboxes" value="1"/>
								</td>
								<td>
									 pppol
								</td>
								<td>
									<a href="mailto:userwow@gmail.com">
									good@gmail.com </a>
								</td>
								<td>
									 20
								</td>
								<td class="center">
									 19.11.2010
								</td>
								<td>
									<span class="label label-sm label-success">
									Approved </span>
								</td>
							</tr>
							<tr class="odd gradeX">
								<td>
									<input type="checkbox" class="checkboxes" value="1"/>
								</td>
								<td>
									 test
								</td>
								<td>
									<a href="mailto:userwow@gmail.com">
									good@gmail.com </a>
								</td>
								<td>
									 20
								</td>
								<td class="center">
									 19.11.2010
								</td>
								<td>
									<span class="label label-sm label-success">
									Approved </span>
								</td>
							</tr>
							</tbody>
							</table>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>
			</div>

@endsection