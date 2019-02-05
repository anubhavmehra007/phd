@extends('main')

@section('titlle','| Guides')

@section('stylesheets')


    {!! Html::style('css/dataTables.bootstrap4.css') !!} 

@endsection

@section('content')

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
    <li class="breadcrumb-item active">
        <a href="#">Guides Details</a>
    </li>
    
    </ol>

    <!-- Icon Cards-->
    <div class="row ">
            <div class="col-md-2">
                    <a href="{{ route('guides.create') }}" class="btn btn-primary btn-lg ">New Guide&rsquo;s Entry</a>
            </div>    
            <div class="col-md-12">
                    <hr>
                </div>
    
    </div>

    <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Guides</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>Name</th>
                      <th>College</th>
                      <th>Department</th>
                      <th>Total Scholars</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Name</th>
                      <th>College</th>
                      <th>Department</th>
                      <th>Total Scholars</th>
                      
                    </tr>
                  </tfoot>
                  <tbody>
                    @if(count($data) > 0)

                      @foreach($data as $datum)
                        <tr>
                          
                          <td>{{$datum['guide_name']}}</td>
                          <td>{{$datum['college_name']}}</td>
                          <td>{{$datum['dept_name']}}</td>
                          <td>{{$datum['scholars']}}</td>
                          
                          
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
