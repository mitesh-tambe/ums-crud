
@extends('layouts.layout')
   
@section('content')

<div class="container mt-3">
    @session('success')
    <div class="alert alert-success" role="alert"> {{ $value }} </div>
    @endsession
    <div class="pull-right mb-3">

      <a class="btn btn-primary" href="{{ route('teachers.create') }}">Add Teacher</a>

    </div>
    <form action="{{ route('teachers.index') }}" method="GET">
      <div class="input-group mb-3">
          <input type="text" name="search" class="form-control" placeholder="Search data" value="{{ request()->input('search') }}">
          <button class="btn btn-outline-secondary" type="submit">Search</button>
      </div>
    </form>

    <table class="table">
      <thead>
        <tr>
          <th width="80px">No</th>
          <th>Teacher Name</th>
          <th>Gender</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($teachers as $teacher)
        <tr>
          <td>{{ ++$i }}</td>
          <td>{{ $teacher->name }}</td>
          <td>{{ $teacher->gender }}</td>
          <td>
            <a class="btn btn-primary btn-sm" href="{{ route('teachers.edit',$teacher->id) }}">Edit</a>

            <a class="btn btn-danger btn-sm" href="{{ route('teachers.destroy',$teacher->id) }}">Delete</a>
          </td>
        </tr>

        @empty
        <tr>
            <td colspan="4">There are no data.</td>
        </tr>
        @endforelse
      </tbody>
    </table>

    {!! $teachers->links() !!}
  </div>
@endsection