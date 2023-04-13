@extends('layout.master')
@section('content')
    <?php
    /** @var $record \Src\Application\Campaign\Domains\Campaign */
    ?>
    <div class="container-head">
        <h1>Campaign: {{$record->name()->value()}}</h1>
    </div>
    <div class="container-body">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Lead information</h5>
                <div class="lead-field">
                    <label class="field-label label" for="">Campaign Name</label>
                    <span>: </span>
                    <span class="field-value">{{ $record->name()->value() }}</span>
                </div>
                <div class="lead-field">
                    <label class="field-label label" for="">Start Date</label>
                    <span>: </span>
                    <span class="field-value">{{ $record->startDate()->value() }}</span>
                </div>
                <div class="lead-field">
                    <label class="field-label label" for="">End Date</label>
                    <span>: </span>
                    <span class="field-value">{{ $record->endDate()->value() }}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-3">
        <a class="btn btn-secondary" href="{{route('campaign.index')}}">Back</a>
    </div>
@endsection
