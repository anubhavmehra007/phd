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
                <div class="col-md-6">
                  <div class="form-group">  
                    {{Form::label('name', 'Name')}}                   
                    {{Form::text('name', null, array('id' => 'name','class' => 'form-control', 'required' => 'required', 'placeholder'=>'Enter Name', 'autofocus'=>'autofocus' ) )}} 
                   </div>
                  </div>
                   <div class = 'col-md-6'>
                   <div class="form-group">                                              
                    {{Form::label('email', 'Email')}}
                    {{Form::text('email', null, array('class' => 'form-control', 'required' => 'required', 'placeholder'=>'Enter Email') )}}                    
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
<script type='text/javascript'>
  function showMarksFields() {
    var cw = document.getElementById('cw');
    var marks = document.getElementById('marks');
    if (cw.value == '1') {
      marks.style.display = 'block';
      marks.innerHTML = `
      <div class='form-row'>
          <div class='col-md-6'>
            <div class='form-group'>  
              {{Form::label('internal', 'Internal Marks')}}                   
              {{Form::number('internal', null, array('id' => 'internal','required' => 'required','class' => 'form-control', 'placeholder'=>'Enter Marks', 'autofocus'=>'autofocus' ) )}} 
             </div>
            </div>
             <div class = 'col-md-6'>
             <div class='form-group'>                                              
              {{Form::label('external', 'External Marks')}}
              {{Form::number('external', null, array('class' => 'form-control','required' => 'required', 'placeholder'=>'Enter Marks') )}}                    
            </div>
          </div>
        </div>`;
    }
    else {

      marks.style.display = 'none';
      marks.innerHTML = null;
    }
  }
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script>
  $(document).ready(function() {
    $('.college-name').select2();
  });

</script>    
@endsection

