@extends('layouts.admin')

@section('title')
Create Permission
@endsection
@section('content')
<div class="card card-light">
    <div class="card-header">
        <h3 class="card-title">Add new permission</h3>
        <div class="card-tools">
            <a href="{{ route('permission.index') }}" class="btn btn-info"><i class="fas fa-shield-alt"></i> See all Permission</a>
        </div>
    </div>
    <form method="POST" action="{{ route('permission.store') }}">
        @csrf
        <div class="card-body">
            <label><span style="color:red">* </span>Required</label>
            <div class="form-group">
                <label for="name">Permission Name <span style="color:red">*</span></label>
                <input type="text" name="name"  id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Permission Name">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                
                <label for="name">Permission Description <span style="color:red">*</span></label>
                <input type="text" name="description"  id="description" class="form-control @error('description') is-invalid @enderror" value="{{ old('description') }}" placeholder="Permission Description">
                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Create Permission</button>
        </div>
    </form>
</div>
@endsection
