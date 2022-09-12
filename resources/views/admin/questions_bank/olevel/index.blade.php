@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

          <div class="col-md-12 py-3">
            <!-- general form elements -->
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">O-Level Question & Answers</h3>&nbsp;
                <a href="/admin/o/question-bank/create" class="btn btn-info btn-sm">Add</a >
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="pt-3">
                <table class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>Subject</th>
                      <th>Question</th>
                      <th>Answer</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($questionBankOlevels as $questionBankOlevel)
                    <tr >
                        <td>{{ $questionBankOlevel->subject }} </td>
                        <td>{!! $questionBankOlevel->question !!}</a></td>
                        <td>{!! substr(strip_tags($questionBankOlevel->answer), 0, 50) !!}...<a href="#">Read more</a></td>
                        <td>
                            <a href="/admin/o/question-bank/{{ $questionBankOlevel->id }}/edit" class="btn btn-info btn-sm">Edit</a>&nbsp;
                            <form action="/admin/o/question-bank/{{ $questionBankOlevel->id }}" method="post">
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