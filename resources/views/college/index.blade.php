@extends('main')

@section('titlle','| colleges')

@section('stylesheets')


    {!! Html::style('css/dataTables.bootstrap4.css') !!} 

@endsection

@section('content')

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
    <li class="breadcrumb-item active">
        <a href="#">List of Colleges</a>
    </li>
    
    </ol>

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
                        <th>S.No</th>
                        <th>College Name</th>
                        <th>No. of Supervisor</th>
                        <th>No. of Scholars</th> 
                        <th>Action</th>                       
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>S.No</th>
                      <th>College Name</th>
                      <th>No. of Supervisor</th>
                      <th>No. of Scholars</th>  
                      <th>Action</th>                       
                  </tr>
                  </tfoot>
                  <tbody>
                      @foreach($colleges as $college)
                       <tr>
                        <td>{{ $college->id }}</td>
                        <td>{{ $college->name }}</td>
                        <td>{{ $college->guides()->count() }}</td>
                        @php $scholars_number = 0; @endphp
                        @foreach($college->guides()->get() as $guides)
                        @php $scholars_number+= $guides->scholars()->count(); @endphp 
                        @endforeach
                        <td>{{$scholars_number}}</td> 
                        <td>{!! Html::linkRoute('colleges.show','View',array($college->id),array('class'=> 'btn btn-info' )) !!}</td>                      
                      </tr>
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
