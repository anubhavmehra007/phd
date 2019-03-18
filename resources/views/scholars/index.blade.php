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

    <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Scholars</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Enrollment Year</th>                      
                      <th>Guide</th>
                      <th>Subject</th>
                      <th>College</th>                      
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Enrollment Year</th>                      
                      <th>Guide</th>
                      <th>Subject</th>
                      <th>College</th>                      
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    
                      @php $i=1; @endphp
                      @foreach($scholars as $scholar)
                        <tr>
                          <td>{{ $i }}</td>
                          <td>{{$scholar->name}}</td>
                          <td>{{$scholar->y_o_j}}</td>                       
                          <td>{{$scholar->guide->name}}</td>
                          <td>{{$scholar->guide->dept->name}}</td>
                          <td>{{$scholar->guide->college->name}}</td>
                          <td>
                            {{--<a href="/thesis/create/{{$datum ['id'] }}"><button class="btn btn-primary btn-sm">Submit Thesis</button></a>
                          <br><br>
                          <a href="/scholars/edit/{{$datum ['id'] }}"><button class="btn btn-info btn-sm">Edit</button></a>
                          <br><br>
                          <a href="/scholars/delete/{{$datum ['id'] }}"><button class="btn btn-danger btn-sm">Delete</button></a>--}}
                          {!! Html::linkRoute('scholars.show','View',array($scholar['id']),array('class'=> 'btn btn-info' )) !!}
                        </td>
                          
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
