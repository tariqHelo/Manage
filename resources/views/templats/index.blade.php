@extends('admin.dashboard')

@section('content')
		<div class="row">
				<div class="col-md-12">
					@include("shared.msg")
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
											 <form method="post" action="{{ route('templates.destroy', $template->id) }}">
											<a href="{{ route('templates.edit', $template->id) }}" class="btn btn-primary btn-sm"><i class='fa fa-edit'></i></a>
                                            <button onclick='return confirm("Are you sure??")' type="submit" class="btn btn-danger btn-sm"><i class='fa fa-trash'></i></button>
											@csrf
											@method("DELETE")
										</form></td></tr> 
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