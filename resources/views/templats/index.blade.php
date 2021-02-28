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
								</tr>
								</thead>
								<tbody>

									@foreach ($templates as $template )
									<tr>
										<td>
											{{ $template->id }}
										</td>
										<td>
											{{ $template->title }}
										</td>
										<td>
											<a href="" class="btn btn-primary btn-sm"><i class='fa fa-edit'></i></a>
											<a href="" onclick='return confirm("Are you sure delete?")' class="btn btn-warning btn-sm"><i class='fa fa-trash'></i></a>
										</td>
									</tr>
									@endforeach
								
								</tbody>
								</table>
							</div>
						</div>
					</div>
					<!-- END SAMPLE TABLE PORTLET-->
				</div>

@endsection