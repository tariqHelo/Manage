@extends("admin.dashboard")
@section("content")
@include('shared.msg')
	     <div class="table-toolbar">
                <div class="row">
                    <div class="col-md-6">
                        <div class="btn-group">
                            <a data-target="#stack1" data-toggle="modal" class="btn green">
                            إضافة<i class="fa fa-plus"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
	         <div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box grey-cascade">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-globe"></i>كل الطلاب
							</div>
					    	</div>
				     		<div class="portlet-body">
						
							<table id="studentsTable" class="table table-striped table-bordered table-hover" id="sample_1">
							<thead>
							<tr>
                                <th>
									 #
								</th>
								<th>
									 إسم المجموعة
								</th>
								<th>
									 Action
								</th>
							</tr>
                            </thead>
                            
                            @foreach ($groups as $group )
                                <tr class="odd gradeX">
										<td>
                                           {{ $group->id }}
										</td>
										<td>
											{{ $group->title }}
                                        </td>
                                        	<td>   
												 <a href="" data-target="#stack2{{ $group->id }}" data-toggle="modal" class="btn btn-primary btn-sm"><i class='fa fa-edit'></i></a>
											     <a href="{{ route("groups-delete", $group->id) }}" onclick='return confirm("Are you sure dude?")' class="btn btn-warning btn-sm"><i class='fa fa-trash'></i></a>
									
										</td>
									</tr>
                            @endforeach
						  
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
		       </div>
         </table>
    
        {{--Start Add New --}}
        <form action="{{route('groups.store')}}" method="POST" id="stack1" class="modal fade" tabindex="-1" data-width="400">
            @csrf
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
										<label class="col-sm-3 col-form-label">إسم المجموعة</label>
										<div class="col-sm-9">
											<input type="text"name="title" value="{{ old('title') }}" class="form-control" placeholder="الإسم">
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
		{{--Start Edit New --}}
		@foreach ($groups as $group)
			<form action="{{route('groups-update',$group->id)}}" method="POST" id="stack2{{$group->id}}" class="modal fade" tabindex="-1" data-width="400">
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
											<label class="col-sm-3 col-form-label">إسم المجموعة</label>
											<div class="col-sm-9">
												<input type="text"name="title" value="{{ $group->title }}" class="form-control" placeholder="الإسم">
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
		@endforeach
		{{--End Edit New --}}
@endsection