@extends('main')

@section('titlle','| New Scholar Entry')


@section('content')
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
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('/scholars') }}">Scholars</a>
    </li>
    <li class="breadcrumb-item active">New Entry</li>
    </ol>
    @include('inc.msg')
    
    <div class="card card-register mx-auto mt-5">
        <div class="card-header">Register A Scholar</div>
        <div class="card-body">
        
            <div class="form-group">
                {!!Form::open(['action' => 'ScholarsController@store', 'method' => 'POST']) !!}
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
                <div class="col-md-3">
                  <div class="form-group">
                    {{Form::label('y_o_j', 'Year of Joining')}}
                    {{Form::number('y_o_j', null, array('class' => 'form-control', 'required' => 'required', 'placeholder'=>'Enter Year') )}}                    
                  </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                      {{Form::label('y_o_c', 'Year of Completion')}}                     
                      {{Form::number('y_o_c', null, array('class' => 'form-control', 'required' => 'required', 'placeholder'=>'Enter Year' ) )}} 
                     </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">                        
                      {{Form::label('eta', 'Estimated year of completion')}}
                      {{Form::number('eta', null, array('class' => 'form-control', 'required' => 'required', 'placeholder'=>'Estimated Year') )}}                    
                    </div>
                  </div>
                </div>
              
              <div class="form-group">
                  <div class="form-row">
                    <div class="col-md-6">
                      <div class="form-group">                         
                        {{Form::label('c_w_c_s', 'Course Work Completion Status')}}                     
                        {{Form::select('course_work', array('0' => 'Incomplete', '1' => 'Completed' ), null, array('class' => 'form-control', 'id' => 'cw','onchange' => 'showMarksFields()'))}} 
                      
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">                                              
                        {{Form::label('college', 'College')}}
                        {{Form::text('college', null, array('class' => 'form-control', 'required' => 'required', 'placeholder'=>'Enter College Name') )}}                    
                      </div>
                    </div>
                  </div>
                </div>
                <div class = 'form-group' id = 'marks' style ='display:none;'>
               
                </div>
                <div class="form-group">
                    <div class="form-row">
                      <div class="col-md-6">
                        <div class="form-group">                          
                          {{Form::label('dept', 'Department')}}                     
                          {{Form::text('dept', null, array('class' => 'form-control', 'required' => 'required', 'placeholder'=>' Enter Department Name' ) )}} 
                         </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">                                                   
                          {{Form::label('guide', 'Guide')}}
                          {{Form::text('guide', null, array('class' => 'form-control', 'required' => 'required', 'placeholder'=>'Enter Guide Name') )}}                    
                        </div>
                      </div>
                    </div>
                  </div>
            {{Form::submit('Create',  ['class' => 'btn btn-primary btn-block'])}}
   
            
          </form>
         
        </div>
      </div>
      {!! Form::close() !!} 
   
      
      <br />
     
      <br />
    
   
    
    

@endsection

