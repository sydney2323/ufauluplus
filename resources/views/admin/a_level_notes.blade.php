@extends('layouts.admin')

@section('content')
<div class="col-12">
<div class="container-fluid pt-3">
<div class="card">
  <div class="card-header d-flex">
    <h3 class="card-title">A-Level Note</h3>
    <a href="/admin/a/notes/post" class="btn btn-secondary btn-sm ml-3">POST</a>
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
        @foreach ($notesAlevels as $notesAlevel)
        <tr >
           <td>{{ $notesAlevel->subject }}</td>
           <td>{{ $notesAlevel->topic }}</td>
           <td>{{ $notesAlevel->status }}</td>
           <td>{!! substr(strip_tags($notesAlevel->description), 0, 150) !!}...<a href="#">Read more</a></td>
           <td>
             <div class="d-flex">
             <a href="/admin/a/notes/post/{{ $notesAlevel->id }}/edit" class="btn btn-info btn-sm">
              <i class="fas fa-pencil-alt">
              </i>
              Edit</a>
             <form action="/admin/a/notes/post/{{ $notesAlevel->id }}" method="post">
                 @method('DELETE')
                 @csrf
             <button type="submit" class="ml-1 btn btn-danger btn-sm">
              <i class="fas fa-trash-alt"> </i>
              Delete</button>
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

