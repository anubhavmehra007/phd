@extends('main')

@section('titlle','| Edit Designation')


@section('content')

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('/designations') }}">Designations</a>
    </li>
    <li class="breadcrumb-item active">Edit Entry</li>
    </ol>
    @include('inc.msg')
    
    <div class="card card-register mx-auto mt-5">
        <div class="card-header">Add New Designation</div>
        <div class="card-body">
            {!! Form::model($designation,['route' => ['designations.update', $designation->id], 'method' => 'PUT']) !!}            
              <div class="form-group">               
                <div class="form-row">
                    <div class="col-md-6">
                      <div class="form-group">  
                        {{Form::label('designation', 'Designation')}}                   
                        {{Form::text('post', null, array('id' => 'designations','class' => 'form-control', 'required' => 'required', 'placeholder'=>'Enter Designation', 'autofocus'=>'autofocus' ) )}}
                       </div>
                      </div>
                       <div class = 'col-md-6'>
                        <div class="form-group">                                              
                            {{Form::label('scholars', 'No. of scholars')}}
                            {{Form::number('no_of_scholars', null, array('class' => 'form-control', 'required' => 'required', 'placeholder'=>'Enter No. of scholars') )}}                    
                        </div>
                      </div>
                </div>
                <div class="form-row">  
                    <div class="col-md-6">
                        <a class="btn btn-danger btn-block" href="{{ url('/designations') }}">Cancel</a>             </div>                  
                    <div class="col-md-6">
                        {{Form::submit('Update',  ['class' => 'btn btn-primary btn-block'])}}
                    </div>
                   
                    </div>        
              </div>
            
            {!! Form::close() !!}
         
        </div>
      </div>
    
   
@endsection


