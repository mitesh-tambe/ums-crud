@extends('layouts.layout')
   
@section('content')

<div class="pull-left">

  <h1>@if (isset($student)) Edit @else Add @endif Student</h1>

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

@if (isset($student))
    <form action="{{ route('students.update', $student->id) }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @else
    <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
@endif

    @csrf
<div class="g-3 align-items-center">
    <div class="col-6">
      <label for="name" class="col-form-label">Name</label>
    </div>
    <div class="col-6">
      <input type="text" id="name" class="form-control" value="{{ old('name', $student->name ?? '') }}" name="name">
    </div>

    <div class="col-6">
        <label for="class" class="col-form-label">Class Name</label>
      </div>
      <div class="col-6">
        <input type="text" id="class" class="form-control" value="{{ old('class', $student->class ?? '') }}" name="class">
    </div>

    <div class="col-6">
        <label for="fees" class="col-form-label">Fees</label>
      </div>
      <div class="col-6">
        <input type="number" id="fees" class="form-control" value="{{ old('fees', $student->fees ?? '') }}" name="fees">
    </div>

    <div class="col-6 mb-2">
        <label for="admission_date" class="col-form-label">Admission Date</label>
      </div>
      <div class="col-6">
        <input type="date" id="admission_date" class="form-control" value="{{ old('admission_date', $student->admission_date ?? '') }}" name="admission_date">
    </div>

    <div class="mt-3 col-6">
      <label for="gender" class="col-form-label">Select Gender</label>
        <select class="form-select" name="gender">
            
            <option value="male" {{ old('gender', $student->gender ?? '') == 'male' ? 'selected' : '' }}>Male</option>
            <option value="female" {{ old('gender', $student->gender ?? '') == 'female' ? 'selected' : '' }}>Female</option>
        </select>
    </div>

    <div class="mt-3 col-6">
      <label for="class_teacher_id" class="col-form-label">Select class teacher</label>
        
        <select class="form-select" name="class_teacher_id">
          @if(!empty($student->class_teacher_id))
              @foreach($teachers as $teacher)
                  <option value="{{ $teacher->id }}"
                      @if($student->class_teacher_id == $teacher->id) selected @endif>
                      {{ $teacher->name }}
                  </option>
              @endforeach
          @else
              @foreach($teachers as $teacher)
                  <option value="{{ $teacher->id }}">
                      {{ $teacher->name }}
                  </option>
              @endforeach
          @endif
        </select>
    </div>

    <input type="hidden" name="status" value="1">
    <button type="submit" class="btn btn-success mt-3">Submit</button>
</div>

</form>

@endsection
