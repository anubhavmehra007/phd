@extends('main')

@section('titlle','| Edit Guide Entry')

@section('stylesheets')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('/guides') }}">Guides</a>
    </li>
    <li class="breadcrumb-item active">Edit Entry</li>
    </ol>
    @include('inc.msg')
    
    <div class="card card-register mx-auto mt-5">
        <div class="card-header">Edit/Update Guide details</div>
              <div class="card-body">
                {!! Form::model($guide,['route' => ['guides.update', $guide->id], 'method' => 'PUT']) !!}  
                <div class="form-group">            
                  <div class="form-row">
                      <div class = 'col-md-6'>
                          <div class="form-group">                                              
                            {{Form::label('designtion', 'Designation')}}
                            {{Form::select('desig_id', $designations,$guide->desig_id, array('class' => 'form-control', 'required' => 'required', 'placeholder'=>'Select Designation') )}}                    
                          </div>
                        </div>
                    <div class="col-md-6">
                      <div class="form-group">  
                        {{Form::label('name', 'Name')}}                   
                        {{Form::text('name', null, array('id' => 'name','class' => 'form-control', 'required' => 'required', 'placeholder'=>'Enter Name', 'autofocus'=>'autofocus' ) )}} 
                        </div>
                      </div>                        
                  </div>
                  <div class="form-row">
                      <div class = 'col-md-6'>
                          <div class="form-group">                                              
                            {{Form::label('email', 'Email')}}
                            {{Form::text('email', null, array('class' => 'form-control', 'required' => 'required', 'placeholder'=>'Enter Email') )}}                    
                          </div>
                        </div>
                    <div class="col-md-6">
                        <div class="form-group">                                              
                            {{Form::label('mobile', 'Mobile Number')}}
                            {{Form::text('mobile_number', null, array('class' => 'form-control', 'required' => 'required', 'placeholder'=>'Enter Mobile Number ') )}}                    
                          </div>
                      </div>
                        
                  </div>
                  <div class="form-row">
                    <div class="col-md-6">
                      <div class="form-group">  
                        {{Form::label('college', 'College')}}                   
                        {{Form::select('college_id', $colleges, $guide->college_id, array('class' => 'form-control college-name', 'required' => 'required', 'placeholder'=>'Select College') )}} 
                        </div>
                      </div>
                      <div class = 'col-md-6'>
                        <div class="form-group">                                              
                          {{Form::label('dept', 'Department')}}
                          {{Form::select('dept_id', $subjects, $guide->dept_id, array('class' => 'form-control', 'required' => 'required', 'placeholder'=>'Select Department') )}}                    
                        </div>
                    </div>
                  </div>  
                  <div class="form-row">  
                      <div class="col-md-6">
                          {!! Html::linkRoute('guides.show','Cancel',array($guide->id),array('class'=> 'btn btn-danger btn-block' )) !!}                                                   
                        </div>                  
                      <div class="col-md-6">
                          {{Form::submit('Update',  ['class' => 'btn btn-primary btn-block'])}}
                      </div>
                     
                      </div>               
              </div>
        

        
      </form>

      </div>
      </div>
      
   
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script>
    jQuery(document).ready(function() {
      $('.college-name').select2();
  });


</script>
@endsection

