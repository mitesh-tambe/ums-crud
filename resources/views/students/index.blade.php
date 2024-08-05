
@extends('layouts.layout')
   
@section('content')

<div class="container mt-3">
    @session('success')
    <div class="alert alert-success" role="alert"> {{ $value }} </div>
    @endsession
    <div class="pull-right mb-3">

      <a class="btn btn-primary" href="{{ route('students.create') }}">Add Student</a>

    </div>
    
    <form action="{{ route('students.index') }}" method="GET">
      <div class="input-group mb-3">
          <input type="text" name="search" class="form-control" placeholder="Search data" value="{{ request()->input('search') }}">
          <button class="btn btn-outline-secondary" type="submit">Search</button>
      </div>
    </form>
    <table class="table">
      <thead>
        <tr>
          <th width="80px">No</th>
          <th>Student Name</th>
          <th>Class</th>
          <th>Yearly Fees</th>
          <th>Class Teacher's Name</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($students as $student)
        <tr>
          <td>{{ ++$i }}</td>
          <td>{{ $student->name }}</td>
          <td>{{ $student->class }}</td>
          <td>{{ $student->fees }}</td>
          <td>{{ $student->teacher->name }}</td>
          <td class="d-flex">
            <div class="mr-2">

              <a class="btn btn-primary btn-sm" href="{{ route('students.edit', $student->id) }}">Edit</a>
            </div>

            {{-- <a class="btn btn-danger btn-sm" href="{{ route('students.destroy', $student->id) }}">Delete</a> --}}

            <form action="{{ route('students.destroy', $student->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger btn-sm">Delete</button>
            </form>
          </td>
        </tr>

        @empty
        <tr>
            <td colspan="4">There are no data.</td>
        </tr>
        @endforelse
      </tbody>
    </table>

    {!! $students->links() !!}
  </div>
@endsection