@extends('layouts.admin')
@section('pageName')
Edit Roles
@endsection

@section('content')
<div class="card card-light">
    <div class="card-header">
        <h3 class="card-title">Edit Role</h3>
        <div class="card-tools">
            <a href="{{ route('role.index') }}" class="btn btn-info" ><i class="fas fa-shield-alt"></i> See all Roles</a>
        </div>
    </div>
    <div class="card-body">
        {!! Form::model($role, ['method' => 'PATCH','route' => ['role.update', $role->id]]) !!}
        <div class="modal-body">
            <div class="form-group">
                <div class="form-group">
            <strong>Name:</strong>
            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
        </div>

            </div>

            <b-form-group label="Assign Permissions">
            
            <br/>
            @foreach($permission as $value)
                <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                {{ $value->name }}</label>
            <br/>
            @endforeach
            </b-form-group>


        </div>
        <div class="modal-footer justify-content-between">
            
            <button type="submit"  class="btn btn-lg btn-primary"><i class="fas fa-save"></i> Save Role</button>
        </div>
    {!! Form::close() !!}
    </div>
</div>
@endsection
