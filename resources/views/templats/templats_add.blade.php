@extends('admin.dashboard')     
@section('content')
@include("shared.msg")
<form action="{{ $route }}" method="post" enctype="multipart/form-data" role="form" class="portlet box purple">
	@csrf
	@method('POST')

						<!-- START PORTLET-->
							<div class="portlet-title">
								<div class="caption">
									<i class="fa fa-gift"></i> تصميم قالب
								</div>
							</div>
							<div class="portlet-body form">
								<div class="form-horizontal">
									@if(isset($file))
									<input type="hidden" value="{{ $file }}" name="file">
									@endif
									@if(isset($path))
									<input type="hidden" value="{{ $path }}" name="path">
									@endif	
										<div class="form-body">
										@if(!isset($file))
										<div class="form-group">
											<label class="col-md-3 control-label">إختار ملف</label>
											<div class="col-md-6">
												<input  id="file" name="file" type="file"  class="form-control input-lg" placeholder="Large Input">
											</div>
										</div>
										@endif
										<div class="form-group">
											<label class="col-md-3 control-label">عنوان القالب</label>
											<div class="col-md-6">
												<input id="title" name="title" value="{{ request('title') }}" type="text" class="form-control input-lg" placeholder="Large Input">
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">اسم المجموعة</label>
											<div class="col-md-6">
												@if(isset($details))
												<select class="form-control select2me  input-lg" multiple name="option1[]" disabled>
													@foreach($groups as $group)
														<option value="{{ $group->group }}" {{ (isset($details) && $details['option1'] == $group->group) ? 'selected' : ''  }}  >{{ $group->group }}</option>
													@endforeach
												</select>
												@elseif(request('option1') !== null )
												<select class="form-control select2me  input-lg" multiple name="option1[]" >
													@foreach($groups as $group)
														<option value="{{ $group->group }}" {{ in_array($group->group , request('option1') ) ? 'selected' : ''  }}  >{{ $group->group }}</option>
													@endforeach
												</select>
												@else
												<select class="form-control select2me  input-lg" multiple name="option1[]" >
													@foreach($groups as $group)
														<option value="{{ $group->group }}">{{ $group->group }}</option>
													@endforeach
												</select>

												@endif
											</div>
										</div>
									<div class="form-actions right1">
									<button type="submit" class="btn btn-circle green-meadow">تحميل الملف</button>
									</div>
							
								  <div class="form-group" id="preview">
										<h2>عرض تقريبي:</h2>
										@if(isset($file))
											<div style="width: 100%; height: 700px;border: 1px #ff1c1c dotted;padding: 5px;">
													<embed
														src="{{ isset($path) ? $path : $file }}"
														type="application/pdf"
														frameBorder="0"
														scrolling="initial"
														height="100%"
														width="100%"
													></embed>
											</div>
										@endif
						     </div>
			               </div>
 					<!-- BEGIN PORTLET-->
					<!-- BEGIN PORTLET-->
					<div class="portlet box yellow">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i>إعدادت النص
							</div>
						</div>
						<div class="portlet-body form">
							<!-- BEGIN FORM-->
							<div class="form-horizontal form-row-seperated">
								<div class="form-body">
								<div class="form-body">
								<div style="border: 1px #cccccc solid;padding: 5px;border-radius: 4px">
									<div  class="mt-repeater-item">
										@if(isset($data))
										@foreach($data as $i => $obj)
										<div class="row">
											<div class="form-group"> 
												<label class="col-md-3 control-label">النص</label>
												<div class="col-md-6">
												<input type="text" name="data[{{ $i }}][wr]" value="{{ $obj['wr'] }}" class="form-control main-text" id="wr" value="{{ isset($write) ? $write : "" }}" placeholder="أدخل هنا">
												</div>
											</div>
											<div class="col-md-2">
												<label class="control-label">اسم الخانة <span class="oldprename" style="color: #ccc"></span></label>
												<select name="data[{{ $i }}][settitle]"  class="form-control input-lg selectsize prevname">
													<option value="" >نص حر</option>

													<option value="numberId" {{$obj['settitle'] ==  "numberId"  ? 'selected' : '' }}> رقم الهوية</option>
													<option value="name"     {{$obj['settitle'] ==  "name"    ? 'selected' : '' }}>اسم المتدرب</option>
													<option value="email"    {{$obj['settitle'] ==  "email"     ? 'selected' : '' }}>الإيميل</option>
													<option value="mobile"   {{$obj['settitle'] ==  "mobile"  ? 'selected' : '' }}>رقم الجوال</option>
													<option value="class"    {{$obj['settitle'] ==  "class"   ? 'selected' : '' }}>الصف</option>
													<option value="school"   {{$obj['settitle'] ==  "school"  ? 'selected' : '' }}>المدرسة</option>

												</select>
											</div>
											<div class="col-md-2 divinsidetxt" style="display: none">
												<label class="control-label">النص</label>
												<textarea rows="1" name='data[{{ $i }}][free_text]' value="{{ $obj['free_text'] }}"  class="form-control input-lg free_text"></textarea> </div>
											<div class="col-md-1">
												<label class="control-label">الطول</label>
												<input name='data[{{ $i }}][y]' value="{{ $obj['y'] }}" value="{{ isset($y) ? $y : "" }}" type="text" placeholder="" class="form-control input-lg" /> </div>
											<div class="col-md-1">
												<label class="control-label"> تحديد</label>
												<select class="form-control input-lg" name="data[{{ $i }}][position_fixed]" value="{{ $obj['position_fixed'] }}" data-placeholder="اختر ">
													<option value="width: auto;">تحديد</option>
													<option value="width: 100%; text-align:center;">في المنتصف</option>
												</select> </div>
											<div class="col-md-1">
												<label class="control-label">  العرض</label>
												<input name='data[{{ $i }}][x]' value="{{ $obj['x'] }}"  type="text" placeholder="" class="form-control input-lg " /> </div>
											<div class="col-md-1">
												<label class="control-label"> حجم الخط</label>
												<select class="form-control input-lg" name="data[{{ $i }}][font_size]"  data-placeholder="اختر ">
														<option value="40px" {{ $obj['font_size']==  "40px" ? 'selected' : '' }}>40</option>
														<option value="35px" {{ $obj['font_size']==  "35px" ? 'selected' : '' }}>35</option>
														<option value="30px" {{ $obj['font_size']==  "30px" ? 'selected' : '' }}>30</option>
														<option value="25px" {{ $obj['font_size']==  "25px" ? 'selected' : '' }}>25</option>
														<option value="20px" {{ $obj['font_size']==  "20px" ? 'selected' : '' }}>20</option>
														<option value="18px" {{ $obj['font_size']==  "18px" ? 'selected' : '' }}>18</option>
														<option value="16px" {{ $obj['font_size']==  "16px" ? 'selected' : '' }}>16</option>
														<option value="14px" {{ $obj['font_size']==  "14px" ? 'selected' : '' }}>14</option>
												</select>
											 </div>
											<div class="col-md-1">
												<label class="control-label"> لون الخط</label>
												<input  name="data[{{ $i }}][font_color]" value="{{ $obj['font_color'] }}" class="form-control" type="color">
											</div>
											<div class="col-md-1">
												<label class="control-label"> نوع الخط</label>
												<select class="form-control input-lg" name="data[{{ $i }}][font_type]"  placeholder="اختر ">
														<option value="aefurat"   {{ $obj['font_type']==  "aefurat" ? 'selected' : '' }}>aefurat عربي</option>
														<option value="dejavusans"{{ $obj['font_type']==  "dejavusans" ? 'selected' : '' }}>dejavusans انجليزي</option>
													</select>
											 </div>
											 	 <div class="col-md-1" style="margin: 30px 0">
													<a href="javascript:;" data-repeater-delete class="delete-row btn btn-danger btn-sm btn-icon btn-circle mt-repeater-delete">
														<i class="fa fa-trash"></i>
													</a>
											</div>
										</div>
										@endforeach
										@else
										<div class="row">
											<div class="form-group"> 
												<label class="col-md-3 control-label">النص</label>
												<div class="col-md-6">
												<input type="text" name="data[0][wr]" class="form-control main-text" id="wr" value="{{ isset($write) ? $write : "" }}" placeholder="أدخل هنا">
												</div>
											</div>
											<div class="col-md-2">
												<label class="control-label">اسم الخانة <span class="oldprename" style="color: #ccc"></span></label>
												<select name="data[0][settitle]" class="form-control input-lg selectsize prevname">
													<option value="">نص حر</option>
													<option value="name"> الإسم</option>
													<option value="numberId"> رقم الهوية</option>
													<option value="email">  الإيميل</option>
													<option value="mobile"> رقم الجوال</option>
													<option value="class"> الصف </option>
													<option value="school">  المدرسة</option>

												</select>
											</div>
											<div class="col-md-2 divinsidetxt" style="display: none">
												<label class="control-label">النص</label>
												<textarea rows="1" name='data[0][free_text]'  class="form-control input-lg free_text"></textarea> </div>
											<div class="col-md-1">
												<label class="control-label">الطول</label>
												<input name='data[0][y]' value="{{ isset($y) ? $y : "" }}" type="text" placeholder="" class="form-control input-lg" /> </div>
											<div class="col-md-1">
												<label class="control-label"> تحديد</label>
												<select class="form-control input-lg" name="data[0][position_fixed]" data-placeholder="اختر ">
													<option value="width: auto;">تحديد</option>
													<option value="width: 100%; text-align:center;">في المنتصف</option>
												</select> </div>
											<div class="col-md-1">
												<label class="control-label">   العرض</label>
												<input name='data[0][x]' value="{{ isset($x) ? $x : "" }}" type="text" placeholder="" class="form-control input-lg " /> </div>
											<div class="col-md-1">
												<label class="control-label"> حجم الخط</label>
												<select class="form-control input-lg" name="data[0][font_size]" data-placeholder="اختر ">
														<option value="40px">40</option>
														<option value="35px">35</option>
														<option value="30px">30</option>
														<option value="25px">25</option>
														<option value="20px">20</option>
														<option value="18px">18</option>
														<option value="16px">16</option>
														<option value="14px">14</option>
												</select>
											 </div>
											<div class="col-md-1">
												<label class="control-label"> لون الخط</label>
												<input  name="data[0][font_color]" class="form-control" type="color">
											</div>
											<div class="col-md-1">
												<label class="control-label"> نوع الخط</label>
												<select class="form-control input-lg" name="data[0][font_type]" data-placeholder="اختر ">
														<option value="aefurat">aefurat عربي</option>
														<option value="dejavusans">dejavusans انجليزي</option>
													</select>	
											 </div>
											 <div class="col-md-1" style="margin: 30px 0">
													<a href="javascript:;" data-repeater-delete class="delete-row btn btn-danger btn-sm btn-icon btn-circle mt-repeater-delete">
														<i class="fa fa-trash"></i>
													</a>
											</div>
										</div>
										@endif
									</div>
									@if(isset($data))
									<button type="button" class="btn btn-primary add-new-row" data-index="{{ count($data) - 1 }}">Add new</button>
									@else
									<button type="button" class="btn btn-primary add-new-row" data-index="0">Add new</button>
									@endif
								</div>
                   
							</div>
								   <div class="form-group">
										<label class="control-label col-md-3">إضافة كود التحقق</label>
										<div class="col-md-4">
											 <select class="form-control input-lg" data-placeholder="اختر ">
												<option  value="none">بلا</option>
												<option  value="top:1mm;right:1mm">فوق يمين</option>
												<option  value="top:1mm;right:50%">فوق وسط</option>
												<option  value="top:1mm;left:1mm">فوق يسار</option>
												<option  value="bottom:1mm;right:1mm">تحت يمين</option>
												<option  value="bottom:1mm;right:50%">تحت وسط</option>
												<option  value="bottom:1mm;left:1mm">تحت يسار</option>
											</select>
										</div>
										
									</div>
									 <div class="form-group row">
										<label class="control-label col-md-3">هوامش الكود</label>
										<div class="col-lg-2">
											اعلى
											<input name="certcode_margins_top" type="text" value="" class="form-control input-lg onlyNum" />
										</div>
										<div class="col-lg-2">
											يمين
											<input name="certcode_margins_right" type="text" value="" class="form-control input-lg onlyNum" />
										</div>
										<div class="col-lg-2">
											اسفل
											<input name="certcode_margins_bottom" type="text" value="" class="form-control input-lg onlyNum" />
										</div>
										<div class="col-lg-2">
											يسار
											<input name="certcode_margins_left" type="text" value="" class="form-control input-lg onlyNum" />
										</div>
                                    </div>
									<div class="form-group last">
										<label class="control-label col-md-3"></label>
										<div class="col-md-4">
											<button type="submit" name="view" value="view" class="btn yellow" href="#form_modal11" data-toggle="modal">
											عرض <i class="fa fa-share"></i>
											</button>
										</div>
									</div>
								</div>
								<div class="form-actions">
									<div class="row">
										<div class="col-md-offset-3 col-md-9">
											<button type="submit" class="btn green"><i class="fa fa-check"></i> حفظ</button>
											<a href="{{ route('templates.index') }}" type="submit"  class="btn red">إلغاء</a>
										</div>
									</div>
								</div>
							</div>
							
							<!-- END FORM-->
						</div>
							
					<!-- END PORTLET-->
				

</form>		
	<!-- END CONTENT -->
                    
@endsection