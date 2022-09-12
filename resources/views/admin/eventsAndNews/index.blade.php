@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

          <div class="col-md-12 py-3">
            <!-- general form elements -->
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Events and News</h3>&nbsp;
                <a href="/admin/eventsAndNews/create" class="btn btn-info btn-sm">Add</a >
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="pt-3">
                <table class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>Type</th>
                      <th>Title</th>
                      <th>Description</th>
                      <th>Image</th>
                      <th>Fee</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($eventAndNews as $eventAndNews)
                    <tr >
                        <td>{{ $eventAndNews->type }} </td>
                        <td>{{ $eventAndNews->title }} </td>
                        <td>{{ $eventAndNews->description }} </td>
                        <td> <img height="60" width="80" src="{{ asset('images-upload/'.$eventAndNews->image) }}" /> </td>
                        <td>{{ $eventAndNews->fee }} </td>
                        <td>
                            <a href="/admin/eventsAndNews/{{ $eventAndNews->id }}/edit" class="btn btn-info btn-sm">Edit</a>&nbsp;
                            <form action="/admin/eventsAndNews/{{ $eventAndNews->id }}" method="post">
                              @method('DELETE')
                              @csrf
                            <button type="submit" class="btn btn-danger  btn-sm">Delete</a>
                          </form>
                        </td>
                    </tr>
                    @endforeach 
                  </tbody>
                </table>
              </div>
            </div>

          
             
          </div>
    </div>
@endsection