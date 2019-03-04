@extends('main')

@section('titlle','| Add Subject')


@section('content')

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('/subjects') }}">Subjects</a>
    </li>
    <li class="breadcrumb-item active">New Entry</li>
    </ol>
    @include('inc.msg')
    
    <div class="card card-register mx-auto mt-5">
        <div class="card-header">Add New Subject</div>
        <div class="card-body">
                   <div class="form-group">
                {!!Form::open(['action' => 'DeptsController@store', 'method' => 'POST']) !!}
              <div class="form-row">
                <div class="col-md-12">
                  <div class="form-group">  
                    {{Form::label('name', 'Subject Name')}}                   
                    {{Form::text('subject_name', null, array('id' => 'subject_name','class' => 'form-control', 'required' => 'required', 'placeholder'=>'Enter Subject Name', 'autofocus'=>'autofocus' ) )}} 
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

