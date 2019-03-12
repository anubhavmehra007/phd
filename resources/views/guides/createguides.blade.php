@extends('main')

@section('titlle','| New Guide Entry')

@section('stylesheets')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('/guides') }}">Guides</a>
    </li>
    <li class="breadcrumb-item active">New Entry</li>
    </ol>
    @include('inc.msg')
    
    <div class="card card-register mx-auto mt-5">
        <div class="card-header">Register A Guide</div>
        <div class="card-body">
                   <div class="form-group">
                {!!Form::open(['action' => 'GuidesController@store', 'method' => 'POST']) !!}
              <div class="form-row">
                  <div class = 'col-md-6'>
                      <div class="form-group">                                              
                       {{Form::label('designtion', 'Designation')}}
                       {{Form::select('designtion', $data['designation'],null, array('class' => 'form-control', 'required' => 'required', 'placeholder'=>'Select Designation') )}}                    
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
                        {{Form::text('mobile_no', null, array('class' => 'form-control', 'required' => 'required', 'placeholder'=>'Enter Mobile Number ') )}}                    
                      </div>
                  </div>
                   
              </div>
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-group">  
                    {{Form::label('college', 'College')}}                   
                    {{Form::select('college', $data['cd'],null, array('class' => 'form-control college-name', 'required' => 'required', 'placeholder'=>'Select College') )}} 
                   </div>
                  </div>
                   <div class = 'col-md-6'>
                   <div class="form-group">                                              
                    {{Form::label('dept', 'Department')}}
                    {{Form::select('dept', $data['dd'],null, array('class' => 'form-control', 'required' => 'required', 'placeholder'=>'Select Department') )}}                    
                  </div>
                </div>
              </div>
                    
                  </div>
            {{Form::submit('Create',  ['class' => 'btn btn-primary btn-block'])}}
   
            
          </form>
         
        </div>
      </div>
      {!! Form::close() !!} 
   
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script>
  $(document).ready(function() {
    $('.college-name').select2();
  });

</script>    
@endsection

