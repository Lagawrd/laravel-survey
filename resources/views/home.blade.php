@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if(isset($response) && count($response) > 0)
                        Thank you for taking the survey. <br>
                        @foreach($response as $question_answer)
                            {!! $question_answer['question'] !!} : {!! $question_answer['answer'] !!}<br>
                        @endforeach
                        <br>
                    @endif
                    You are logged in! <br>
                    Take our well-being survey:
                    <a href="{{ URL::route('survey.get', 'well_being') }}">Survey</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
