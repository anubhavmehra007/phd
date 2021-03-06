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
    <div class="alert alert-danger" style="display:none"></div>
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
                <div class="col-md-6">
                  <div class="form-group">  
                    {{Form::label('father name', 'Father&rsquo;s Name')}}                   
                    {{Form::text('father_name', null, array('id' => 'father_name','class' => 'form-control', 'required' => 'required', 'placeholder'=>'Enter Father Name', 'autofocus'=>'autofocus' ) )}} 
                   </div>
                  </div>
                   <div class = 'col-md-6'>
                   <div class="form-group">                                              
                    {{Form::label('mobile', 'Mobile Number')}}
                    {{Form::text('mobile_no', null, array('class' => 'form-control', 'required' => 'required', 'placeholder'=>'Enter Mobile Number ') )}}                    
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
                <div class="form-row">
                  <div class="col-md-6">
                    <div class="form-group">  
                      {{Form::label('rollno', 'Roll No.')}}                   
                      {{Form::text('roll_num', null, array('id' => 'roll_num','class' => 'form-control', 'placeholder'=>'Enter Roll Number', 'autofocus'=>'autofocus' ) )}} 
                     </div>
                    </div>
                     <div class = 'col-md-6'>
                     <div class="form-group">                                              
                      {{Form::label('enrnum', 'Enrollment Number')}}
                      {{Form::text('enroll_num', null, array('class' => 'form-control', 'placeholder'=>'Enter Enrollment Number ') )}}                    
                    </div>
                  </div>
                </div>
              <div class="form-row">                  
                    <div class="col-md-6">
                      <div class="form-group">                         
                        {{Form::label('c_w_c_s', 'Course Work Completion Status')}}                     
                        {{Form::select('course_work', array('0' => 'Incomplete', '1' => 'Completed' ), null, array('class' => 'form-control', 'id' => 'cw','onchange' => 'showMarksFields()'))}} 
                      </div>
                        
                      
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">                         
                        {{Form::label('degree', 'Degree')}}                     
                        {{Form::select('degree', array('phd' => 'PHD', 'dphil' => 'D.Phil' ), null, array('class' => 'form-control', 'id' => 'degree', 'required' => 'required', 'placeholder'=>'Select Degree'))}}
                      
                      </div>
                    </div>
                    
                  </div>
                  <div class = '' id = 'marks' style ='display:none;'>
               
                  </div>
                    <div class="form-row"> 
                    <div class="col-md-6">
                      <div class="form-group">                                              
                        {{Form::label('college', 'College')}}
                        {{Form::select('college',$data['cd'], null, array('class' => 'form-control college-name call_gd', 'id' => 'college', 'required' => 'required', 'placeholder'=>'Select College', /*'onchange' => 'fillGuides()'*/) )}}                    
                      </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">                          
                          {{Form::label('dept', 'Subject')}}                     
                          {{Form::select('dept',$data['dd'], null, array('class' => 'form-control chng_subjct call_gd','id' =>'dept', 'required' => 'required', 'placeholder'=>'Select Subject',/*'onchange' => 'fillGuides()'*/ ) )}} 
                         </div>
                      </div>
                    </div>
                    <div class="form-row guide_data">
                      <div class="col-md-6">
                          <div class="form-group guide_list" id = "guides">  
                              {{Form::label('guide', 'Supervisior')}}                     
                              {{Form::select('guide',array(),null, array('class' => 'form-control guide_list_ok','id' =>'guides_list_id', 'required' => 'required', 'placeholder'=>'Select Supervisior','disabled' ) )}}   
                            </div> 
                                                        
                        </div>                   
                  </div>
                  <div class="loader" style="display:none">
                    <div class="spinner-border float-right" role="status">
                        <span class="sr-only">Loading...</span>
                      </div>
                </div>
                    {{--<div class="form-row">
                      <div class="col-md-6">
                        <div class="form-group" id = "guides" >                                                   
                        </div>
                      </div>                   
                  </div>--}}
                  <div class="form-row">  
                    <div class="col-md-12">
                      {{Form::hidden('ptype','store',['class' =>'input-ptype'])}}
                      {{Form::hidden('sid',null,['class' =>'input-sid'])}}                        
                      {{Form::submit('Create',  ['class' => 'btn btn-go btn-primary btn-block'])}}
                    </div>
                  </div>
            
                  
            
          </form>
         
        </div>
      </div>
      {!! Form::close() !!}   
@endsection

@section('scripts')
@include('scholars.jsscholar')
<script type='text/javascript'>
  function showMarksFields() {
    var cw = document.getElementById('cw');
    var marks = /*document.getElementById('marks');*/jQuery('#marks');
    if (cw.value == '1') {
      /*marks.style.display = 'block';*/
      marks.show();
      var marks_HTML = `
      <div class='form-row'>
          <div class='col-md-6'>
            <div class='form-group'>  
              {{Form::label('internal1', 'Internal Marks (Paper 1)')}}                   
              {{Form::number('internal_p1', null, array('id' => 'internal1','required' => 'required','class' => 'form-control', 'placeholder'=>'Enter Marks', 'autofocus'=>'autofocus' ) )}} 
             </div>
            </div>
             <div class = 'col-md-6'>
             <div class='form-group'>                                              
              {{Form::label('external1', 'External Marks (Paper 1)')}}
              {{Form::number('external_p1', null, array('class' => 'form-control','required' => 'required', 'placeholder'=>'Enter Marks') )}}                    
            </div>
          </div>
        </div>
        <div class='form-row'>
          <div class='col-md-6'>
            <div class='form-group'>  
              {{Form::label('internal2', 'Internal Marks (Paper 2)')}}                   
              {{Form::number('internal_p2', null, array('id' => 'internal2','required' => 'required','class' => 'form-control', 'placeholder'=>'Enter Marks', 'autofocus'=>'autofocus' ) )}} 
             </div>
            </div>
             <div class = 'col-md-6'>
             <div class='form-group'>                                              
              {{Form::label('external2', 'External Marks (Paper 2)')}}
              {{Form::number('external_p2', null, array('class' => 'form-control','required' => 'required', 'placeholder'=>'Enter Marks') )}}                    
            </div>
          </div>
        </div>
        <div class='form-row'>
          <div class='col-md-6'>
            <div class='form-group'>  
              {{Form::label('internal3', 'Internal Marks (Paper 3)')}}                   
              {{Form::number('internal_p3', null, array('id' => 'internal3','required' => 'required','class' => 'form-control', 'placeholder'=>'Enter Marks', 'autofocus'=>'autofocus' ) )}} 
             </div>
            </div>
             <div class = 'col-md-6'>
             <div class='form-group'>                                              
              {{Form::label('external3', 'External Marks (Paper 3)')}}
              {{Form::number('external_p3', null, array('class' => 'form-control','required' => 'required', 'placeholder'=>'Enter Marks') )}}                    
            </div>
          </div>
        </div>
        `;
        marks.html(marks_HTML);
    }
    else {
      marks.hide();
      marks.empty();
      /*marks.style.display = 'none';
      marks.innerHTML = null;*/
    }
  }
</script>
 {{-- function fillGuides() {
    var college = document.getElementById('college').value;
    var dept = document.getElementById('dept').value;
    var guide = document.getElementById('guides');
    var data = {!! json_encode($data['gd'])!!}
    var data = data[college][dept];

    if (data != undefined){
      var pre = "<label for='guide'>Supervisior</label><select id='guides_list_id' required class = 'form-control' name='guide'><option>Select Supervisior</option>";
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
    $('.subject-name').select2();
  });

</script>--}}
@endsection

