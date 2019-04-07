@extends('main')

@section('titlle','| '.$college->name.'')

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
            <a href="{{ url('/colleges') }}">College Details</a>
        </li> 
        <li class="breadcrumb-item active"><b>{{ $college->name }}</b></li>   
    </ol>
    @include('inc.msg')
    
    <ul class="nav nav-tabs" id="infoTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link" id="guide-tab" data-toggle="tab" href="#guide" role="tab" aria-controls="guide" aria-selected="false"><i class="fas fa-fw fa-user-tie"></i>Supervisors <span class="badge badge-primary">{{count($college->guides)}}</span></a>
        </li>        
        <li class="nav-item">
            <a class="nav-link" id="schlr-tab" data-toggle="tab" href="#schlr" role="tab" aria-controls="schlr" aria-selected="false"><i class="fas fa-user-friends"></i>Scholars <span class="badge badge-primary">{{count($college->scholars)}}</span></a>
        </li> 
        <li class="nav-item">
            <a class="nav-link" id="add-info-tab" data-toggle="tab" href="#add-info" role="tab" aria-controls="addinfo" aria-selected="false"><i class="fas fa-info"></i> Additional Information</a>
        </li>
        <li class="nav-item ml-auto">
                <a class="fas fa-edit nav-link" href="#" data-toggle="modal" data-target="#editcollegeModal">Edit Details</a>
        </li>
    </ul>
<div class="tab-content" id="infoTabContent">
    <div class="tab-pane fade show active" id="guide" role="tabpanel" aria-labelledby="guide-tab">
            @if(count($college->guides))
            @php $i=1; @endphp
                <table class="table table-hover table-striped">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Supervisor Name</th>
                        <th scope="col">Designation</th>                        
                        <th scope="col">Subject</th>
                    </tr>
                    </thead>
                    <tbody>            
                        @foreach ($college->guides as $guide)                
                          <tr>
                            <th scope="row">{{ $i }}</th>                            
                            <td>{!! Html::linkRoute('guides.show',$guide->name,array($guide->id),array('class'=> '' )) !!}</td>
                            <td>{{ $guide->desig->post }}</td>
                            <td>{{ $guide->dept->name }}</td>                            
                          </tr>                     
                        @php $i++; @endphp   
                        @endforeach
                    </tbody>
                </table>
            @else
            <div class="alert alert-primary" role="alert">
                    No Supervisor !!  
             </div> 
            @endif
            
                       
        </div>
    <div class="tab-pane fade" id="schlr" role="tabpanel" aria-labelledby="schlr-tab">
            @if(count($college->scholars))
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
                        @foreach ($college->scholars as $scholar)                
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
        <div class="tab-pane fade" id="add-info"  role="tabpanel" aria-labelledby="addinfo-tab">
            <table class="table table-striped">                        
              <tbody>
                  <tr>                            
                      <th scope="row">Created At:</th>
                      <td>{{ date('M j, Y h:ia',strtotime($college->created_at)) }}</td>                            
                  </tr>
                  <tr>                            
                    <th scope="row">Last Updated:</th>
                    <td>{{ date('M j, Y h:ia',strtotime($college->updated_at)) }}</td>                            
                </tr>
                <tr>                            
                  <th scope="row">Last Updated By:</th>
                  <td><a href="#" data-trigger="focus" data-toggle="popover" data-placement="bottom" data-html="true" title="User Info" data-content="<span>{{ $last_edited->name }}</span><hr><span>{{ $last_edited->mobile_no }}</span>">{{ $college->last_edited_by }}</a></td>                            
              </tr>
              </tbody>
            </table>
          </div> 
    </div>
    
    <!-- Edit College Modal-->
    <div class="modal fade" id="editcollegeModal" tabindex="-1" role="dialog" aria-labelledby="ecModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ecModalLabel">Edit/Update College Detail</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
                </div>
                <div class="modal-body">
                    {!! Form::model($college,['route' => ['colleges.update', $college->id], 'method' => 'PUT', 'class'=>'form-inline']) !!}
                    <div class="form-group row">
                        <label for="college" class="col-sm-3 col-form-label">Name</label>
                        <div class = 'col-sm-9'>                                                                      {{Form::text('name', null, array('class' => 'form-control', 'required' => 'required', 'placeholder'=>'Enter College Name') )}}                   
                        </div>
                    </div> 
                </div>
                <div class="modal-footer">                       
                        <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                        {{Form::submit('Update',  ['class' => 'btn btn-primary '])}}
                </div>
                
            </div>
        </div>
    </div>
            
@endsection

