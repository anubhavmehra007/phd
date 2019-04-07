@extends('main')

@section('titlle','| Edit Scholar Entry')

@section('stylesheets')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('/scholars') }}">Scholars</a>
    </li>
    <li class="breadcrumb-item active">Edit Entry</li>
    </ol>
    @include('inc.msg')
    <div class="alert alert-danger" style="display:none"></div>
    <div class="card card-register mx-auto mt-5">
        <div class="card-header">Edit/Update Scholar details</div>
        <div class="card-body">
        
            <div class="form-group">
              	{!! Form::model($scholar,['route' => ['scholars.update', $scholar->id], 'method' => 'PUT']) !!}          
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
                    {{Form::text('mobile_number', null, array('class' => 'form-control', 'required' => 'required', 'placeholder'=>'Enter Mobile Number ') )}}                    
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
                      {{Form::text('roll_no', null, array('id' => 'roll_num','class' => 'form-control', 'placeholder'=>'Enter Roll Number', 'autofocus'=>'autofocus' ) )}} 
                     </div>
                    </div>
                     <div class = 'col-md-6'>
                     <div class="form-group">                                              
                      {{Form::label('enrnum', 'Enrollment Number')}}
                      {{Form::text('enroll_no', null, array('class' => 'form-control', 'placeholder'=>'Enter Enrollment Number ') )}}                    
                    </div>
                  </div>
                </div>
              <div class="form-row">                  
                    <div class="col-md-6">
                      <div class="form-group">                         
                        {{Form::label('c_w_c_s', 'Course Work Completion Status')}}                     
                        {{Form::select('course_work', array('0' => 'Incomplete', '1' => 'Completed' ), null, array('class' => 'form-control cw_fun', 'id' => 'cw'))}}                      
                      </div>
                    </div>
                      <div class="col-md-6">
                      <div class="form-group">                         
                        {{Form::label('degree', 'Degree')}}                     
                        {{Form::select('degree', array('phd' => 'PHD', 'dphil' => 'D.Phil' ), null, array('class' => 'form-control', 'id' => 'degree', 'required' => 'required', 'placeholder'=>'Select Degree'))}}                      
                      </div>
                      </div>
                    
                                     
                </div>                
                @if ($scholar->course_work)
                <div class = '' id = 'marks' style="display: block;">
                <div class='form-row'>
                    <div class='col-md-6'>
                      <div class='form-group'>  
                        {{Form::label('internal1', 'Internal Marks (Paper 1)')}}                   
                        {{Form::number('internal_1', null, array('id' => 'internal1','required' => 'required','class' => 'form-control', 'placeholder'=>'Enter Marks', 'autofocus'=>'autofocus' ) )}} 
                       </div>
                      </div>
                       <div class = 'col-md-6'>
                       <div class='form-group'>                                              
                        {{Form::label('external1', 'External Marks (Paper 1)')}}
                        {{Form::number('external_1', null, array('class' => 'form-control','required' => 'required', 'placeholder'=>'Enter Marks') )}}                    
                      </div>
                    </div>
                  </div>
                  <div class='form-row'>
                    <div class='col-md-6'>
                      <div class='form-group'>  
                        {{Form::label('internal2', 'Internal Marks (Paper 2)')}}                   
                        {{Form::number('internal_2', null, array('id' => 'internal2','required' => 'required','class' => 'form-control', 'placeholder'=>'Enter Marks', 'autofocus'=>'autofocus' ) )}} 
                       </div>
                      </div>
                       <div class = 'col-md-6'>
                       <div class='form-group'>                                              
                        {{Form::label('external2', 'External Marks (Paper 2)')}}
                        {{Form::number('external_2', null, array('class' => 'form-control','required' => 'required', 'placeholder'=>'Enter Marks') )}}                    
                      </div>
                    </div>
                  </div>
                  <div class='form-row'>
                    <div class='col-md-6'>
                      <div class='form-group'>  
                        {{Form::label('internal3', 'Internal Marks (Paper 3)')}}                   
                        {{Form::number('internal_3', null, array('id' => 'internal3','required' => 'required','class' => 'form-control', 'placeholder'=>'Enter Marks', 'autofocus'=>'autofocus' ) )}} 
                       </div>
                      </div>
                       <div class = 'col-md-6'>
                       <div class='form-group'>                                              
                        {{Form::label('external3', 'External Marks (Paper 3)')}}
                        {{Form::number('external_3', null, array('class' => 'form-control','required' => 'required', 'placeholder'=>'Enter Marks') )}}                    
                      </div>
                    </div>
                  </div>
            </div>
                @else
                <div class = '' id = 'marks' style ='display:none;'>
               
                </div>                    
                @endif
                
                <div class="form-row">  
                    <div class="col-md-6">
                        <div class="form-group">                                              
                          {{Form::label('college', 'College')}}
                          {{Form::select('college',$colleges, $scholar->guide->college->id, array('class' => 'form-control college-name call_gd', 'id' => 'college', 'required' => 'required', 'placeholder'=>'Select College') )}}                    
                        </div>
                      </div>                   
                      <div class="col-md-6">
                        <div class="form-group">                          
                          {{Form::label('dept', 'Subject')}}                     
                          {{Form::select('dept',$subjects, $scholar->guide->dept->id, array('class' => 'form-control chng_subjct call_gd','id' =>'dept', 'required' => 'required', 'placeholder'=>'Select Subject' ) )}} 
                         </div>
                      </div>                 
                                      
                  </div>
                  <div class="form-row guide_data">
                      <div class="col-md-6">
                          <div class="form-group guide_list" id = "guides">  
                              {{Form::label('guide', 'Supervisior')}}                     
                              {{Form::select('guide',$guides, $scholar->guide_id, array('class' => 'form-control guide_list_ok','id' =>'guides_list_id', 'required' => 'required', 'placeholder'=>'Select Supervisior' ) )}}   
                            </div>    
                                                  
                        </div>                   
                  </div>
                  <div class="loader" style="display:none">
                      <div class="spinner-border float-right" role="status">
                          <span class="sr-only">Loading...</span>
                        </div>
                  </div>
                   
                  
                  <div class="form-row">  
                      <div class="col-md-6">
                          {!! Html::linkRoute('scholars.show','Cancel',array($scholar->id),array('class'=> 'btn btn-danger btn-block' )) !!}                                                   
                        </div>                  
                      <div class="col-md-6">
                          {{Form::hidden('ptype','update',['class' =>'input-ptype'])}}
                          {{Form::hidden('sid',$scholar->id,['class' =>'input-sid'])}}                        
                          {{Form::submit('Update',  ['class' => 'btn btn-go btn-primary btn-block'])}}
                      </div>
                     
                      </div>                   
                  </div>
            
                
            
          </form>
         
        </div>
      </div>
      {!! Form::close() !!} 
   
@endsection

@section('scripts')
@include('scholars.jsscholar')
<script>
  jQuery('.cw_fun').on("change", showMarksFields);  
function showMarksFields() {
  var cw = jQuery( this ).val();
  //jQuery("#marks").css("display", "none");
  var marks = jQuery("#marks");
  if (cw == '1') {
    marks.css("display", "block");      
    var mark_HTML = `
    <div class='form-row'>
        <div class='col-md-6'>
          <div class='form-group'>  
            {{Form::label('internal1', 'Internal Marks (Paper 1)')}}                   
            {{Form::number('internal_1',$scholar->internal_1, array('id' => 'internal1','required' => 'required','class' => 'form-control', 'placeholder'=>'Enter Marks', 'autofocus'=>'autofocus' ) )}} 
           </div>
          </div>
           <div class = 'col-md-6'>
           <div class='form-group'>                                              
            {{Form::label('external1', 'External Marks (Paper 1)')}}
            {{Form::number('external_1', $scholar->external_1, array('class' => 'form-control','required' => 'required', 'placeholder'=>'Enter Marks') )}}                    
          </div>
        </div>
      </div>
      <div class='form-row'>
        <div class='col-md-6'>
          <div class='form-group'>  
            {{Form::label('internal2', 'Internal Marks (Paper 2)')}}                   
            {{Form::number('internal_2', $scholar->internal_2, array('id' => 'internal2','required' => 'required','class' => 'form-control', 'placeholder'=>'Enter Marks', 'autofocus'=>'autofocus' ) )}} 
           </div>
          </div>
           <div class = 'col-md-6'>
           <div class='form-group'>                                              
            {{Form::label('external2', 'External Marks (Paper 2)')}}
            {{Form::number('external_2', $scholar->external_2, array('class' => 'form-control','required' => 'required', 'placeholder'=>'Enter Marks') )}}                    
          </div>
        </div>
      </div>
      <div class='form-row'>
        <div class='col-md-6'>
          <div class='form-group'>  
            {{Form::label('internal3', 'Internal Marks (Paper 3)')}}                   
            {{Form::number('internal_3', $scholar->internal_3, array('id' => 'internal3','required' => 'required','class' => 'form-control', 'placeholder'=>'Enter Marks', 'autofocus'=>'autofocus' ) )}} 
           </div>
          </div>
           <div class = 'col-md-6'>
           <div class='form-group'>                                              
            {{Form::label('external3', 'External Marks (Paper 3)')}}
            {{Form::number('external_3', $scholar->external_3, array('class' => 'form-control','required' => 'required', 'placeholder'=>'Enter Marks') )}}                    
          </div>
        </div>
      </div>
      `;
      marks.html(mark_HTML);
  }
  else {
    marks.css("display", "none");
    marks.html('');
  }
}

</script>

@endsection

