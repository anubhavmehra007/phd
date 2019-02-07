@extends('main')

@section('titlle','| New Scholar Entry')

@section('stylesheets')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')

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
                        {{Form::select('college',$data['cd'], null, array('class' => 'form-control college-name', 'id' => 'college', 'required' => 'required', 'placeholder'=>'Select College', 'onchange' => 'fillGuides()') )}}                    
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
                          {{Form::select('dept',$data['dd'], null, array('class' => 'form-control','id' =>'dept', 'required' => 'required', 'placeholder'=>'Select Department','onchange' => 'fillGuides()' ) )}} 
                         </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group" id = "guides" >                                                   
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
  function fillGuides() {

    var college = document.getElementById('college').value;
    var dept = document.getElementById('dept').value;
    var guide = document.getElementById('guides');
    var data = {!! json_encode($data['gd'])!!}
    var data = data[college][dept];

    if (data != undefined){
      var pre = "<label for='guide'>Guide</label><select class = 'form-control' name='guide'>";
      var mid = "";
      var post = "</select>";
        for(var key in data) {
        mid += `<option value = ${data[key]['id']}>${data[key]['name']}</option>`;
      }
      
      guide.innerHTML = pre + mid + post;
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

