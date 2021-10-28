@extends('layouts.admin')

@section('title')
Edit Permission
@endsection
@section('content')
<div class="card card-light">
    <div class="card-header">
        <h3 class="card-title">Edit permission</h3>
        <div class="card-tools">
            <a href="{{ route('permission.index') }}" class="btn btn-info"><i class="fas fa-shield-alt"></i> See all Permission</a>
        </div>
    </div>
   {!! Form::model($permission, ['method' => 'PATCH','route' => ['permission.update', $permission->id]]) !!}
        @csrf
        <div class="card-body">
            <label><span style="color:red">* </span>Required</label>
            <div class="form-group">
                <label>Name <span style="color:red">*</span></label>
            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
               <label>Description <span style="color:red">*</span></label>
            {!! Form::text('description', null, array('placeholder' => 'Description','class' => 'form-control')) !!}
                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update Permission</button>
        </div>
    {!! Form::close() !!}
</div>
@endsection
