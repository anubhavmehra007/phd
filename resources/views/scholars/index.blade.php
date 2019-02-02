@extends('main')

@section('titlle','| scholars')

@section('stylesheets')


    {!! Html::style('css/dataTables.bootstrap4.css') !!} 

@endsection

@section('content')

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
    <li class="breadcrumb-item active">
        <a href="#">Scholars Details</a>
    </li>
    
    </ol>

    <!-- Icon Cards-->
    <div class="row ">
            <div class="col-md-2">
                    <a href="{{ route('scholars.create') }}" class="btn btn-primary btn-lg ">New Scholars Entry</a>
            </div>    
            <div class="col-md-12">
                    <hr>
                </div>
    
    </div>

    <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Scholars</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>Name</th>
                        <th>Start Year</th>
                        <th>Complete Year</th>
                        <th>Estimated Year</th>
                        <th>Course Work</th>
                        <th>Guide</th>
                        <th>Dept</th>
                        <th>College</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Name</th>
                      <th>Start Year</th>
                      <th>Complete Year</th>
                      <th>Estimated Year</th>
                      <th>Course Work</th>
                      <th>Guide</th>
                      <th>Dept</th>
                      <th>College</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @if(count($data) > 0)

                      @foreach($data as $datum)
                        <tr>
                          {{$i = 0}}
                          <td>{{$datum[$i]['name']}}</td>
                          <td>{{$datum[$i]['yoj']}}</td>
                          <td>
                           @if($datum[$i]['yoc'] == 0) 
                           Not Complete
                           @else
                           {{$datum[$i]['yoc']}}
                           @endif
                          
                          </td>
                          <td>{{$datum[$i]['eta']}}</td>
                          <td>
                              @if($datum[$i]['course'] == 0) 
                              Not Complete
                              @else
                              Completed
                              @endif
                             
                             </td>
                          <td>{{$datum[$i]['guide']}}</td>
                          <td>{{$datum[$i]['dept']}}</td>
                          <td>{{$datum[$i]['college']}}</td>
                          {{$i++}}
                        </tr>

                    @endforeach
                    @endif
                  </tbody>
                </table>
              </div>
            </div>
            
          </div>

@endsection

@section('scripts')
    <!-- Page level plugin JavaScript-->
    {!! Html::script('js/jquery.dataTables.js') !!} 
    {!! Html::script('js/dataTables.bootstrap4.js') !!} 
      
    <!-- Demo scripts for this page-->
    
    {!! Html::script('js/datatables-demo.js') !!}  
@endsection
