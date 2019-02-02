@extends('main')

@section('titlle','| New Scholar Entry')

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
        {!!Form::open(['action' => 'ScholarsController@store', 'method' => 'POST']) !!}
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">  
                    {{Form::label('name', 'Name')}}                     
                    {{Form::text('name', null, array('class' => 'form-control', 'required' => 'required', 'placeholder'=>'Name', 'autofocus'=>'autofocus' ) )}} 
                   </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    {{Form::label('y_o_j', 'Year of Joining')}}
                    {{Form::number('y_o_j', null, array('class' => 'form-control', 'required' => 'required', 'placeholder'=>'Year of Joining') )}}                    
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
                <div class="form-row">
                  <div class="col-md-6">
                    <div class="form-label-group">
                      {{Form::label('y_o_c', 'Year of Completion')}}                     
                      {{Form::number('y_o_c', null, array('class' => 'form-control', 'required' => 'required', 'placeholder'=>'Year of Completion' ) )}} 
                     </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-label-group">                        
                      {{Form::label('eta', 'Estimated year of completion')}}
                      {{Form::number('eta', null, array('class' => 'form-control', 'required' => 'required', 'placeholder'=>'Estimated year of completion') )}}                    
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                  <div class="form-row">
                    <div class="col-md-6">
                      <div class="form-label-group">                         
                        {{Form::label('c_w_c_s', 'Course Work Completion Status')}}                     
                        {{Form::select('course_work', array('0' => 'Incomplete', '1' => 'Completed' ) )}} 
                       </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-label-group">                                              
                        {{Form::label('college', 'college')}}
                        {{Form::text('college', null, array('class' => 'form-control', 'required' => 'required', 'placeholder'=>'Name of the college') )}}                    
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                    <div class="form-row">
                      <div class="col-md-6">
                        <div class="form-label-group">                          
                          {{Form::label('dept', 'Department')}}                     
                          {{Form::text('dept', null, array('class' => 'form-control', 'required' => 'required', 'placeholder'=>'Department' ) )}} 
                         </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-label-group">                                                   
                          {{Form::label('guide', 'Guide')}}
                          {{Form::text('guide', null, array('class' => 'form-control', 'required' => 'required', 'placeholder'=>'Name of he Guide') )}}                    
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

