@extends('main')

@section('titlle','| Add College')


@section('content')

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('/colleges') }}">Colleges</a>
    </li>
    <li class="breadcrumb-item active">New Entry</li>
    </ol>
    @include('inc.msg')
    
    <div class="card card-register mx-auto mt-5">
        <div class="card-header">Enter New College</div>
        <div class="card-body">
                   <div class="form-group">
                {!!Form::open(['action' => 'CollegesController@store', 'method' => 'POST']) !!}
              <div class="form-row">
                <div class="col-md-12">
                  <div class="form-group">  
                    {{Form::label('name', 'College Name')}}                   
                    {{Form::text('college_name', null, array('id' => 'college_name','class' => 'form-control', 'required' => 'required', 'placeholder'=>'Enter College Name', 'autofocus'=>'autofocus' ) )}} 
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

