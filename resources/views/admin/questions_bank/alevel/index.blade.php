@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

          <div class="col-md-12 py-3">
            <!-- general form elements -->
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">A-Level Question & Answers</h3>&nbsp;
                <a href="/admin/a/question-bank/create" class="btn btn-info btn-sm">Add</a >
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
                    @foreach ($questionBankAlevels as $questionBankAlevel)
                    <tr >
                        <td>{{ $questionBankAlevel->subject }} </td>
                        <td>{!! $questionBankAlevel->question !!}</a></td>
                        <td>{!! substr(strip_tags($questionBankAlevel->answer), 0, 50) !!}...<a href="#">Read more</a></td>
                        <td>
                            <a href="/admin/a/question-bank/{{ $questionBankAlevel->id }}/edit" class="btn btn-info btn-sm">Edit</a>&nbsp;
                            <form action="/admin/a/question-bank/{{ $questionBankAlevel->id }}" method="post">
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