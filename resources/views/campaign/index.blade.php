@extends('layout.master')
@section('content')
    <div class="container-head">
        <h1>Campaign</h1>
    </div>
    <div class="container-body">
        <div class="container-toolbar">
            <a class="btn btn-primary" href="{{route('campaign.bulk.insert_view')}}">Bulk Insert</a>
        </div>
        <table id="campaign-table" class="table table-striped " style="width:100%">
            <thead>
            <tr>
                <th>Campaign Name</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>

            @foreach($records as $record)
                    <?php
                    /** @var $record \Src\Application\Campaign\Domains\Campaign */
                    ?>
                <tr class="record-row" data-id="{{$record->id()}}">
                    <td class="readonly record-field" data-field="Name" id="campaign-{{$record->id()}}-Name">
                        <div class="mask">
                            {{$record->name()->value()}}
                        </div>
                        <div class="cell-form-inline">
                            <input type="text" class="form-control" name="Name" value="{{$record->name()->value()}}"/>
                        </div>
                    </td>
                    <td class="readonly record-field" data-field="StartDate" id="campaign-{{$record->id()}}-StartDate">
                        <div class="mask">
                            {{$record->startDate()->value()}}
                        </div>
                        <div class="cell-form-inline">
                            <input type="text" class="form-control" name="StartDate" value="{{$record->startDate()->value()}}"/>
                        </div>
                    </td>
                    <td class="readonly record-field" data-field="EndDate" id="campaign-{{$record->id()}}-EndDate">
                        <div class="mask">
                            {{$record->endDate()->value()}}
                        </div>
                        <div class="cell-form-inline">
                            <input type="text" class="form-control" name="EndDate" value="{{$record->endDate()->value()}}"/>
                        </div>
                    </td>

                    <td>
                        <a class="btn btn-warning" href="{{route('campaign.delete', ['id' => $record->id()])}}">Delete</a>
                        <a class="btn btn-secondary" href="{{route('campaign.view', ['id' => $record->id()])}}">View</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <script type="module">
        $(document).ready(function () {
            tableUtils.initTable('#campaign-table', appAjax.campaign)
        })
    </script>
@endsection
