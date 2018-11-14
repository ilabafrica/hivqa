@extends('NEW_THEME.layouts.main')

@section('title', 'Dashboard')

@section('content')

    <div class="row">
        <form role="form" method="POST" action="{{ url('dashboard') }}" class="form-inline">
            <div class="row">
                <div class="col-sm-4">
                    <div class='form-group'>
                        {!! Form::label('from', Lang::choice('messages.from', 1), array('class' => 'col-sm-4 control-label', 'style' => 'text-align:left')) !!}
                        <div class="col-sm-8 form-group input-group input-append date datepicker" style="padding-left:15px;">
                            {!! Form::text('from', isset($from)?$from:date('Y-m-01'), array('class' => 'form-control')) !!}
                            <span class='input-group-addon'><span class='glyphicon glyphicon-calendar'></span></span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class='form-group'>
                        {!! Form::label('to', Lang::choice('messages.to', 1), array('class' => 'col-sm-4 control-label', 'style' => 'text-align:left')) !!}
                        <div class="col-sm-8 form-group input-group input-append date datepicker" style="padding-left:15px;">
                            {!! Form::text('to', isset($to)?$to:date('Y-m-d'), array('class' => 'form-control')) !!}
                            <span class='input-group-addon'><span class='glyphicon glyphicon-calendar'></span></span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    {!! Form::button("<span class='glyphicon glyphicon-filter'></span> ".trans('messages.view'),
                                array('class' => 'btn btn-danger', 'name' => 'view', 'id' => 'view', 'type' => 'submit')) !!}
                </div>
            </div>
        </form>
        <hr />
        <div class="row">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    {!! Lang::choice('messages.data-collection-summary', 1) !!}
                </div>
                <div class="panel-body">
                    <div id="drill" style="height: 300px"></div>
                    <hr />
                    @foreach($checklists as $checklist)
                        <div class="col-sm-4">
                            <div id="pie{{$checklist->id}}" style="height: 300px"></div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>

@endsection
