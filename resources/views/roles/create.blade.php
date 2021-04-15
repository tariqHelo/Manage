@extends('admin.dashboard') 
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.role.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("roles.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="title">{{ trans('cruds.role.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', '') }}" required>
                @if($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.role.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="permissions">{{ trans('cruds.role.fields.permissions') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('permissions') ? 'is-invalid' : '' }}" name="permissions[]" id="permissions" multiple required>
                    @foreach($permissions as $id => $permissions)
                        <option value="{{ $id }}" {{ in_array($id, old('permissions', [])) ? 'selected' : '' }}>{{ $permissions }}</option>
                    @endforeach
                </select>
                @if($errors->has('permissions'))
                    <div class="invalid-feedback">
                        {{ $errors->first('permissions') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.role.fields.permissions_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>

	{{-- <div class="form-group">
											<label class="control-label col-md-3">Multi-Value Select</label>
											<div class="col-md-4">
												<select id="select2_sample2" class="form-control select2" multiple>
													<optgroup label="NFC EAST">
													<option>Dallas Cowboys</option>
													<option>New York Giants</option>
													<option>Philadelphia Eagles</option>
													<option>Washington Redskins</option>
													</optgroup>
													<optgroup label="NFC NORTH">
													<option>Chicago Bears</option>
													<option>Detroit Lions</option>
													<option>Green Bay Packers</option>
													<option>Minnesota Vikings</option>
													</optgroup>
													<optgroup label="NFC SOUTH">
													<option>Atlanta Falcons</option>
													<option>Carolina Panthers</option>
													<option>New Orleans Saints</option>
													<option>Tampa Bay Buccaneers</option>
													</optgroup>
													<optgroup label="NFC WEST">
													<option>Arizona Cardinals</option>
													<option>St. Louis Rams</option>
													<option>San Francisco 49ers</option>
													<option>Seattle Seahawks</option>
													</optgroup>
													<optgroup label="AFC EAST">
													<option>Buffalo Bills</option>
													<option>Miami Dolphins</option>
													<option>New England Patriots</option>
													<option>New York Jets</option>
													</optgroup>
													<optgroup label="AFC NORTH">
													<option>Baltimore Ravens</option>
													<option>Cincinnati Bengals</option>
													<option>Cleveland Browns</option>
													<option>Pittsburgh Steelers</option>
													</optgroup>
													<optgroup label="AFC SOUTH">
													<option>Houston Texans</option>
													<option>Indianapolis Colts</option>
													<option>Jacksonville Jaguars</option>
													<option>Tennessee Titans</option>
													</optgroup>
													<optgroup label="AFC WEST">
													<option>Denver Broncos</option>
													<option>Kansas City Chiefs</option>
													<option>Oakland Raiders</option>
													<option>San Diego Chargers</option>
													</optgroup>
												</select>
											</div>
										</div> --}}
@endsection