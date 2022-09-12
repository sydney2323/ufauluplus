@extends('layouts.client')

@section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="m-0">Question & Answers Bank</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/client">Home</a></li>
              <li class="breadcrumb-item active">Question & answers bank</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
 <!-- Main content -->

 <div class="content">  
 <div class="container">
   @if ($questionBanks->first() === null)
   <div class="card shadow">
     <div class="card-body">
      <p class="text-info">There are no Qn & Ans for this subject at the moment.!</p>
     </div>
   </div>   
   @endif
   @foreach ($questionBanks as $questionBank)
   <div class="mb-5">
   <div class="card shadow">
    <div class="card-header ui-sortable-handle" style="cursor: move;">
      <p class="card-title">
        <i class="fas fa-edit mr-1"></i>
      {{ $questionBank->subject }} Qn:{{$questionBank->id}}
      </p>
      <div class="card-tools">
        <ul class="nav nav-pills ml-auto">
          <li class="nav-item">
            <a class="nav-link active" href="#question{{$questionBank->id}}" data-toggle="tab">Question</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="#answer{{$questionBank->id}}" data-toggle="tab">Answer</a>
          </li>
        </ul>
      </div>
    </div><!-- /.card-header -->
    <div class="card-body">
      <div class="tab-content p-0">
        <!-- Morris chart - Sales -->
        <div class="chart tab-pane active" id="question{{$questionBank->id}}" style="position: relative;">
            <p>{!! $questionBank->question !!}</p>

         </div>
        <div class="chart tab-pane" id="answer{{$questionBank->id}}" style="position: relative;">
            <p>{!! $questionBank->answer !!}</p>
      </div>
    </div><!-- /.card-body -->
  </div>
</div>  
   @endforeach
   {{ $questionBanks->onEachSide(1)->links() }}
 
 </div>
 </div>
    </div><!-- /.container-fluid -->

    
@endsection

