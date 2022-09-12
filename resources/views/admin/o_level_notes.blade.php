@extends('layouts.admin')

@section('content')
<div class="col-12">
<div class="container-fluid pt-3">
<div class="card">
  <div class="card-header d-flex">
    <h3 class="card-title">O-Level Note</h3>
    <a href="/admin/o/notes/post" class="btn btn-secondary btn-sm ml-3">POST</a>
  </div>
  <!-- ./card-header -->
  <div class="card-body">
    <table class="table table-bordered table-hover">
      <thead>
        <tr>
          <th>Subject</th>
          <th>Topic</th>
          <th>Status</th>
          <th>Description</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($notesOlevels as $notesOlevel)
        <tr >
           <td>{{ $notesOlevel->subject }}</td>
           <td>{{ $notesOlevel->topic }}</td>
           <td>{{ $notesOlevel->status }}</td>
           <td>{!! substr(strip_tags($notesOlevel->description), 0, 300) !!}...<a href="#">Read more</a></td>
           <td>
             <div class="d-flex">
             <a href="/admin/o/notes/post/{{ $notesOlevel->id }}/edit" class="btn btn-success btn-sm">edit</a>
             <form action="/admin/o/notes/post/{{ $notesOlevel->id }}" method="post">
                 @method('DELETE')
                 @csrf
             <button type="submit" class="ml-1 btn btn-danger btn-sm">delete</a>
             </form>
             </div>
           </td>
        </tr> 
     @endforeach
      </tbody>
    </table>
  </div>
  <!-- /.card-body -->
</div>
</div>
</div>
@endsection

