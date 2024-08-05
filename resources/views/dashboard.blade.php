@extends('layouts.layout')
   
@section('content')

<div class="d-flex gap-3">
<div class="card" style="width: 18rem;">
    <div class="card-body">
      <h5 class="card-title">Total Stuents</h5>
      <h6 class="card-subtitle mb-2 text-muted">{{ $totalStudents }}</h6>
    </div>
</div>

<div class="card" style="width: 18rem;">
    <div class="card-body">
      <h5 class="card-title">Total Teachers</h5>
      <h6 class="card-subtitle mb-2 text-muted">{{ $totalTeachers }}</h6>
    </div>
</div>
</div>

@endsection
