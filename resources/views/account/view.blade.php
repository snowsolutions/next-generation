@extends('layout.master')
@section('content')
    <?php
    /** @var $record \Src\Application\Account\Domains\Account */
    ?>
    <div class="container-head">
        <h1>Account: {{$record->name()->value()}}</h1>
    </div>
    <div class="container-body">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Lead information</h5>
                <div class="account-field">
                    <label class="field-label label" for="">Account Name</label>
                    <span>: </span>
                    <span class="field-value">{{ $record->name()->value() }}</span>
                </div>
                <div class="account-field">
                    <label class="field-label label" for="">Phone</label>
                    <span>: </span>
                    <span class="field-value">{{ $record->phone()->value() }}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-3">
        <a class="btn btn-secondary" href="{{route('account.index')}}">Back</a>
    </div>
@endsection
