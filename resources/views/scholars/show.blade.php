@extends('main')

@section('titlle','|'.$scholar->name.'')

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
            <a href="#">Scholar Details</a>
        </li>    
    </ol>
    @include('inc.msg')
    <ul class="nav nav-tabs" id="infoTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="geninfo-tab" data-toggle="tab" href="#geninfo" role="tab" aria-controls="geninfo" aria-selected="true"><i class="fas fa-id-badge"></i> General</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="cw-tab" data-toggle="tab" href="#cw" role="tab" aria-controls="cw" aria-selected="false"><i class="fas fa-chalkboard-teacher"></i> Course Work</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="synopsis-tab" data-toggle="tab" href="#synopsis" role="tab" aria-controls="synopsis" aria-selected="false"><i class="fas fa-keyboard"></i> Synopsis</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="thesis-tab" data-toggle="tab" href="#thesis" role="tab" aria-controls="thesis" aria-selected="false"><i class="fas fa-book"></i> Thesis</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="add-info-tab" data-toggle="tab" href="#add-info" role="tab" aria-controls="addinfo" aria-selected="false"><i class="fas fa-info"></i> Additional Information</a>
      </li>
        <li class="nav-item ml-auto">
                {!! Html::linkRoute('scholars.edit',' Edit Details',array($scholar->id),array('class'=> 'fas fa-edit nav-link ')) !!}
                
        </li>
      </ul>
      
      <div class="tab-content" id="infoTabContent">
        <div class="tab-pane fade show active" id="geninfo" role="tabpanel" aria-labelledby="geninfo-tab">         
                <table class="table table-striped">                        
                    <tbody>
                        <tr>                            
                            <th scope="row">Name</th>
                            <td>{{ $scholar->name }}</td>                            
                        </tr>
                        <tr>                            
                            <th scope="row">Father Name</th>
                            <td>{{ $scholar->father_name }}</td>                            
                        </tr>
                        <tr>                            
                            <th scope="row">Enrollement Year</th>
                            <td><span class="badge badge-pill badge-info">{{ $scholar->y_o_j }}</span></td>                          
                        </tr>
                        <tr>                            
                            <th scope="row">Email-ID</th>
                            <td>{{ $scholar->email }}</td>                            
                        </tr>
                        <tr>                            
                            <th scope="row">Mobile Number </th>
                            <td>{{ $scholar->mobile_number }}</td>                            
                        </tr>
                        <tr>                            
                                <th scope="row">College</th>
                                <td>{{ $scholar->college->name }}</td>                            
                            </tr>
                        <tr>                            
                            <th scope="row">Subject</th>
                            <td>{{ $scholar->dept->name }}</td>                            
                        </tr>
                        <tr>                            
                          <th scope="row">Degree</th>
                          <td>{{ strtoupper($scholar->degree) }}</td>                            
                      </tr>
                        <tr>                            
                            <th scope="row">Supervisor Name</th>
                            <td>{!! Html::linkRoute('guides.show',$scholar->guide->name,array($scholar->guide_id),array('class'=> '' )) !!}</td>                            
                        </tr>
                        <tr>                            
                            <th scope="row">Enrollment Number</th>
                            <td>{{ $scholar->enroll_no }}</td>                            
                        </tr>
                        <tr>                            
                            <th scope="row">Roll No</th>
                            <td>{{ $scholar->roll_no }}</td>                            
                        </tr>         
                     </tbody>
                </table>
        </div>
        <div class="tab-pane fade" id="cw" role="tabpanel" aria-labelledby="cw-tab">
            @if ($scholar->course_work)
            <table class="table table-hover table-dark">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Internal</th>
                        <th scope="col">Exernal</th>
                        <th scope="col">Total</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">Paper 1</th>
                        <td>{{ $scholar->internal_1 }}</td>
                        <td>{{ $scholar->external_1 }}</td>
                        <td>{{ $scholar->internal_1 + $scholar->external_1 }}</td>
                      </tr>
                      <tr>
                        <th scope="row">Paper 2</th>
                        <td>{{ $scholar->internal_2 }}</td>
                        <td>{{ $scholar->external_2 }}</td>
                        <td>{{ $scholar->internal_2 + $scholar->external_2 }}</td>
                      </tr>
                      <tr>
                        <th scope="row">Paper 3</th>
                        <td>{{ $scholar->internal_3 }}</td>
                        <td>{{ $scholar->external_3 }}</td>
                        <td>{{ $scholar->internal_3 + $scholar->external_3 }}</td>
                      </tr>
                    </tbody>
                  </table>
            @else
            <div class="alert alert-primary" role="alert">
                    Course work details not available!
                  </div>
            @endif
        </div>
        <div class="tab-pane fade" id="synopsis" role="tabpanel" aria-labelledby="synopsis-tab">synopsis detail</div>
        <div class="tab-pane fade" id="thesis"  role="tabpanel" aria-labelledby="thesis-tab">
            {!! Html::linkRoute('thesis.createthesis','Add New Thesis',array($scholar['id']),array('class'=> 'btn btn-info' )) !!}
          <table class='table table-striped'>
          
        @foreach($scholar->thesis as $thesis)
        <tr>
          <th scope='row'>Title:</th>
          <td>{{$thesis->title}}</td>
          
        
        
          <th scope='row'>Approval Status:</th>
          @if($thesis->app_status == 0)
          <td>Not Approved</td>
          @endif
          @if($thesis->app_status == 1)
          <td>Approved</td>
          @endif
          @if($thesis->app_status == 2)
          <td>Rejected</td>
          @endif
          @if($thesis->app_status == 0)
          <td>{!! Html::linkRoute('thesis.approve','Approve',array($thesis->id),array('class'=> 'btn btn-info' )) !!}</td>
          <td>{!! Html::linkRoute('thesis.reject','Reject',array($thesis->id),array('class'=> 'btn btn-danger' )) !!}</td>
          @endif
        </tr>
        
        @endforeach
     
            


        </table>
      </div>
        <div class="tab-pane fade" id="add-info"  role="tabpanel" aria-labelledby="addinfo-tab">
          <table class="table table-striped">                        
            <tbody>
                <tr>                            
                    <th scope="row">Created At:</th>
                    <td>{{ date('M j, Y h:ia',strtotime($scholar->created_at)) }}</td>                            
                </tr>
                <tr>                            
                  <th scope="row">Last Updated:</th>
                  <td>{{ date('M j, Y h:ia',strtotime($scholar->updated_at)) }}</td>                            
              </tr>
              <tr>                            
                <th scope="row">Last Updated By:</th>
                <td>          
                    <a href="#" data-trigger="focus" data-toggle="popover" data-placement="bottom" data-html="true" title="User Info" data-content="<span>{{ $last_edited->name }}</span><hr><span>{{ $last_edited->mobile_no }}</span>">{{ $scholar->last_edited_by }}</a>      
                  
                </td> 
                                          
            </tr>
            </tbody>
          </table>
        </div>
      </div>
@endsection



