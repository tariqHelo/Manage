@extends('admin.dashboard')

@section('content')


		<div class="row">
				<div class="col-md-12">
					<!-- BEGIN SAMPLE TABLE PORTLET-->
					<div class="portlet box purple">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-comments"></i>القوالب المحفوظة
							</div>
							<div class="tools">

							</div>
						</div>
						<div class="portlet-body">
							<div class="table-scrollable">
								<table class="table table-striped table-hover">
								<thead>
								<tr>
									<th>
										 #
									</th>
									<th>
										 إسم الكشف
									</th>
									<th>
										 الخيارات
									</th>
									
									<th>
										 Status
									</th>
								</tr>
								</thead>
								<tbody>
								<tr>
									<td>
										 1
									</td>
									<td>
										 Mark
									</td>
									<td>
										 makr124
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
					</div>
					<!-- END SAMPLE TABLE PORTLET-->
				</div>

@endsection