@extends('main')

@section('titlle','|'.$guide->name.'')

@section('stylesheets')
    <style type='text/css'>
        
        .tab-content{
            margin: 20px;
        }
    </style>
@endsection



@section('content')

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item active">
            <a href="#">Guide Details</a>
        </li>    
    </ol>
    @include('inc.msg')
    <ul class="nav nav-tabs" id="infoTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="geninfo-tab" data-toggle="tab" href="#geninfo" role="tab" aria-controls="geninfo" aria-selected="true"><i class="fas fa-id-badge"></i> General</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="schlr-tab" data-toggle="tab" href="#schlr" role="tab" aria-controls="schlr" aria-selected="false"><i class="fas fa-user-friends"></i>Scholars <span class="badge badge-primary">{{count($guide->scholars)}}</span></a>
        </li> 
        <li class="nav-item">
                {!! Html::linkRoute('guides.edit',' Edit Details',array($guide->id),array('class'=> 'fas fa-edit nav-link')) !!}               
        </li>
      </ul>
      <div class="tab-content" id="infoTabContent">
        <div class="tab-pane fade show active" id="geninfo" role="tabpanel" aria-labelledby="geninfo-tab">         
                <table class="table table-striped">                        
                    <tbody>
                        <tr>                            
                            <th scope="row">Name</th>
                            <td>{{ $guide->name }}</td>                            
                        </tr>    
                        <tr>                            
                            <th scope="row">Designation</th>
                            <td>{{ $guide->desig->post }}</td>                            
                        </tr>                
                        <tr>                            
                            <th scope="row">Email-ID</th>
                            <td>{{ $guide->email }}</td>                            
                        </tr>
                        <tr>                            
                            <th scope="row">Mobile Number </th>
                            <td>{{ $guide->mobile_number }}</td>                            
                        </tr>
                        <tr>                            
                            <th scope="row">College</th>
                            <td>{{ $guide->college->name }}</td>                            
                        </tr>
                        <tr>                            
                            <th scope="row">Subject</th>
                            <td>{{ $guide->dept->name }}</td>                            
                        </tr>                              
                     </tbody>
                </table>
        </div>
        <div class="tab-pane fade" id="schlr" role="tabpanel" aria-labelledby="schlr-tab">
            @if(count($guide->scholars))
            @php $i=1; @endphp
                <table class="table table-hover table-striped">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Scholar Name</th>
                        <th scope="col">Year of enrollment</th>
                    </tr>
                    </thead>
                    <tbody>            
                        @foreach ($guide->scholars as $scholar)                
                          <tr>
                            <th scope="row">{{ $i }}</th>
                            <td>{!! Html::linkRoute('scholars.show',$scholar->name,array($scholar['id']),array('class'=> '' )) !!}</td>
                            <td>{{$scholar->y_o_j}}</td>                            
                          </tr>                     
                        @php $i++; @endphp   
                        @endforeach
                    </tbody>
                </table>
            @else
            <div class="alert alert-primary" role="alert">
                    No Scholar !!  
             </div> 
            @endif
            
                       
        </div>    
@endsection

