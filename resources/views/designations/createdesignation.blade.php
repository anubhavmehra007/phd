@extends('main')

@section('titlle','| Add Designation')


@section('content')

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('/designations') }}">Designations</a>
    </li>
    <li class="breadcrumb-item active">New</li>
    </ol>
    @include('inc.msg')
    
    <div class="card card-register mx-auto mt-5">
        <div class="card-header">Add New Designation</div>
        <div class="card-body">
            {!!Form::open(['action' => 'DesigController@store', 'method' => 'POST']) !!}
                   <div class="form-group">
               
                <div class="form-row">
                    <div class="col-md-6">
                      <div class="form-group">  
                        {{Form::label('designation', 'Designation')}}                   
                        {{Form::text('designation', null, array('id' => 'designations','class' => 'form-control', 'required' => 'required', 'placeholder'=>'Enter Designation', 'autofocus'=>'autofocus' ) )}} 
                       </div>
                      </div>
                       <div class = 'col-md-6'>
                       <div class="form-group">                                              
                          {{Form::label('scholars', 'No. of scholars')}}
                          {{Form::number('num_of_sch', null, array('class' => 'form-control', 'required' => 'required', 'placeholder'=>'Enter No. of scholars') )}}                    
                      </div>
                    </div>
                  </div>
              
                    
                  </div>
            {{Form::submit('Create',  ['class' => 'btn btn-primary btn-block'])}}
            {!! Form::close() !!}
         
        </div>
      </div>
      
   
@endsection

