@extends('layouts.admin')

@section('content')
<div class="container-fluid pt-3">
    <div class="card-header d-flex">
        <h3 class="card-title">All user feedback and messages</h3>
      </div>
<div class="col-12">
    @foreach ($userFeedbacks as $userFeedback)
    <div class="card card-outline mt-1">
      <div class="card-body">
       <h5 class="card-title mb-1 text-info"> <strong>{{ $userFeedback->name }}</strong></h5>
       <p  class="card-text">{{ $userFeedback->email }}</p>
          <p class="card-text">
            {{ $userFeedback->message }}
        </p>
      </div>
    </div><!-- /.card -->
    @endforeach  
    {{ $userFeedbacks->onEachSide(1)->links() }}
</div>
</div>
@endsection