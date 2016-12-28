@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <h1>{{ $data['survey_title'] }}</h1>


                    {!! Form::open(array('route' => 'user.answers.post')) !!}
                        @foreach($data['questions'] as $question)
                            {!! Form::label($question['id'], $question['text']) !!}<br>
                            <!-- {!! Form::text($question['id'], $question['text']) !!}<br> -->

                            @foreach($question['answers'] as $answer)
                                <label>{!! Form::checkbox($answer['answer_question_id'], $answer['text']) !!} {{ $answer['text'] }}</label><br>
                            @endforeach

                            <br>
                        @endforeach
                        <button type="submit">Submit</button>
                    {!! Form::close() !!}

                   <?php  //echo link_to_action('SurveyController@show', $title = null, $parameters = ['well-being'], $attributes = []); ?>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
