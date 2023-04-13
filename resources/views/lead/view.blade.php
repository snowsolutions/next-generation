@extends('layout.master')
@section('content')
    <?php
    /** @var $record \Src\Application\Lead\Domains\Lead */
    ?>
    <div class="container-head">
        <h1>Lead: {{$record->firstName()->value() . ' ' . $record->lastName()->value()}}</h1>
    </div>
    <div class="container-body">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Lead information</h5>
                <div class="lead-field">
                    <label class="field-label label" for="">First Name</label>
                    <span>: </span>
                    <span class="field-value">{{ $record->firstName()->value() }}</span>
                </div>
                <div class="lead-field">
                    <label class="field-label label" for="">Last Name</label>
                    <span>: </span>
                    <span class="field-value">{{ $record->lastName()->value() }}</span>
                </div>
                <div class="lead-field">
                    <label class="field-label label" for="">Email</label>
                    <span>: </span>
                    <span class="field-value">{{ $record->email()->value() }}</span>
                </div>
                <div class="lead-field">
                    <label class="field-label label" for="">Company</label>
                    <span>: </span>
                    <span class="field-value">{{ $record->company()->value() }}</span>
                </div>
                <div class="lead-field">
                    <label class="field-label label" for="">Phone</label>
                    <span>: </span>
                    <span class="field-value">{{ $record->phone()->value() }}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-3">
        <a class="btn btn-secondary" href="{{route('lead.index')}}">Back</a>
    </div>
@endsection
