@extends('layouts.layout')
   
@section('content')

<div class="pull-left">

  <h1>@if (isset($teacher)) Edit @else Add @endif Teacher</h1>

</div>

@if ($errors->any())

    <div class="alert alert-danger">

        <strong>Whoops!</strong> There were some problems with your input.<br><br>

        <ul>

            @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

@endif

@if (isset($teacher))

    <form action="{{ route('teachers.update', $teacher->id) }}" method="POST" enctype="multipart/form-data">

    @method('PUT')

    @else
    
    <form action="{{ route('teachers.store') }}" method="POST" enctype="multipart/form-data">

@endif

    @csrf
<div class="g-3 align-items-center">
    <div class="col-6">
      <label for="name" class="col-form-label">Name</label>
    </div>
    <div class="col-6">
      <input type="text" id="name" class="form-control" value="{{ old('name', $teacher->name ?? '') }}" name="name">
    </div>

    <div class="mt-3 col-6">
      <label for="gender" class="col-form-label">Select Gender</label>
        <select class="form-select" name="gender">
            
            <option value="male" {{ old('gender', $teacher->gender ?? '') == 'male' ? 'selected' : '' }}>Male</option>
            <option value="female" {{ old('gender', $teacher->gender ?? '') == 'female' ? 'selected' : '' }}>Female</option>
        </select>
    </div>

    <input type="hidden" name="status" value="1">

    <button type="submit" class="btn btn-success mt-3">Submit</button>

</div>

</form>

@endsection
