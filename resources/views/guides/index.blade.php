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
    @include('inc.msg')
    <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Guides</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>College</th>
                      <th>Department</th>
                      <th>Total Scholars</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>College</th>
                      <th>Department</th>
                      <th>Action</th>                      
                    </tr>
                  </tfoot>
                  <tbody> 
                      @php $i=1; @endphp                   
                      @foreach($guides as $guide)
                        <tr>
                          <td>{{$i}}</td>
                          <td>{{$guide['name']}}</td>
                          <td>{{$guide->college->name}}</td>
                          <td>{{$guide->dept->name}}</td>
                          <td>{!! Html::linkRoute('guides.show','View',array($guide['id']),array('class'=> 'btn btn-info' )) !!}</td>                     
                        </tr>
                    @php $i++; @endphp
                    @endforeach                    
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
