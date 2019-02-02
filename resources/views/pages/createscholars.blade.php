@include('inc.msg')
{!!Form::open(['action' => 'ScholarsController@store', 'method' => 'POST']) !!}
{{Form::label('name', 'Name')}}
{{Form::text('name', null )}}
<br />
{{ Form::label('y_o_j', 'Year of Joining')}}
{{Form::number('y_o_j', null)}}
<br />
{{ Form::label('y_o_c', 'Year of Completion')}}
{{Form::number('y_o_c', null)}}
<br />
{{ Form::label('eta', 'Estimated year of completion') }}
{{Form::number('eta')}}
<br />
{{Form::label('Course Work Completion Status')}}
{{Form::select('course_work', array('0' => 'Incomplete', '1' => 'Completed'))}}

<br />
{{ Form::label('college', 'College') }}
{{ Form::text('college', null) }}
<br />
{{ Form::label('dept', 'Department') }}
{{ Form::text('dept', null) }}
<br />
{{Form::label('guide', 'Guide')}}

{{ Form::text('guide', null) }}
<br />
{{Form::submit('Submit',  ['class' => 'btn btn-lg'])}}
{!! Form::close() !!}