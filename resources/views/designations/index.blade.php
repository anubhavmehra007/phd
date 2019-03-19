@extends('main')

@section('titlle','| designations')

@section('stylesheets')

    {!! Html::style('css/dataTables.bootstrap4.css') !!} 

@endsection

@section('content')

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item active">
          <a href="#">List of Designation</a>
      </li>    
    </ol>
    @include('inc.msg')

    <!-- Icon Cards-->    

    <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Scholars</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>                        
                        <th>Designation</th>                        
                        <th>No. of Scholars</th>
                        <th>Action</th>                        
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($desigsnatons as $desigsnaton)
                    <tr>
                      <td>{{ $desigsnaton->post }}</td>
                      <td>{{ $desigsnaton->no_of_scholars }}</td>
                      <td>{!! Html::linkRoute('designations.edit','Edit',array($desigsnaton['id']),array('class'=> 'btn btn-info' )) !!}</td>
                    </tr>                        
                    @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Designation</th>                        
                      <th>No. of Scholars</th>
                      <th>Action</th>                        
                </tr>
                  </tfoot>
                  <tbody>
                    
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
