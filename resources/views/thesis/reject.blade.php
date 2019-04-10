@extends('main')

@section('titlle','| Add College')


@section('content')

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('/colleges') }}">Emails</a>
    </li>
    <li class="breadcrumb-item active">New Entry</li>
    </ol>
    @include('inc.msg')
    
    <div class="card card-register mx-auto mt-5">
        <div class="card-header">Enter Thesis Title</div>
        <div class="card-body">
                   <div class="form-group">
                {!!Form::open(['action' => 'ThesisController@reject', 'method' => 'POST']) !!}
              <div class="form-row">
                <div class="col-md-12">
                  <div class="form-group">  
                    {{Form::label('reason', 'Enter Reason')}}                   
                    {{Form::textarea('reason', null, array('id' => 'reason','class' => 'form-control', 'required' => 'required', 'placeholder'=>'Enter Title', 'autofocus'=>'autofocus' ) )}} 
                   </div>
                   {{Form::hidden('id', $id)}}
                  
                   
              </div>
              
                    
                  </div>
            {{Form::submit('Enter Reason',  ['class' => 'btn btn-primary btn-block'])}}
   
            
          </form>
         
        </div>
      </div>
      {!! Form::close() !!} 
   
@endsection

