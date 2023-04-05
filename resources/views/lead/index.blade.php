@extends('layout.master')
@section('content')
    <div class="container-head">
        <h1>Leads</h1>
    </div>
    <div class="container-body">
        <table id="lead-table" class="table table-striped " style="width:100%">
            <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>

            @foreach($records as $record)
                    <?php
                    /** @var $record \Src\Entities\Lead\Domains\Lead */
                    ?>
                <tr class="record-row" data-id="{{$record->id()}}">
                    <td class="readonly record-field" data-field="FirstName" id="lead-{{$record->id()}}-FirstName">
                        <div class="mask">
                            {{$record->firstName()->value()}}
                        </div>
                        <div class="cell-form-inline">
                            <input type="text" class="form-control" name="FirstName" value="{{$record->firstName()->value()}}"/>
                        </div>
                    </td>
                    <td class="readonly record-field" data-field="LastName" id="lead-{{$record->id()}}-LastName">
                        <div class="mask">
                            {{$record->lastName()->value()}}
                        </div>
                        <div class="cell-form-inline">
                            <input type="text" class="form-control" name="LastName" value="{{$record->lastName()->value()}}"/>
                        </div>
                    </td>
                    <td class="readonly record-field" data-field="Email" id="lead-{{$record->id()}}-Email">
                        <div class="mask">
                            {{$record->email()->value()}}
                        </div>
                        <div class="cell-form-inline">
                            <input type="text" class="form-control" name="Email" value="{{$record->email()->value()}}"/>
                        </div>
                    </td>
                    <td class="readonly record-field" data-field="Phone" id="lead-{{$record->id()}}-Phone">
                        <div class="mask">
                            {{$record->phone()->value()}}
                        </div>
                        <div class="cell-form-inline">
                            <input type="text" class="form-control" name="Phone" value="{{$record->phone()->value()}}"/>
                        </div>
                    </td>
                    <td>
                        <a class="btn btn-warning" href="{{route('lead.delete', ['id' => $record->id()])}}">Delete</a>
                        <a class="btn btn-secondary" href="{{route('lead.view', ['id' => $record->id()])}}">View</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <script type="module">
        $(document).ready(function () {
            tableUtils.initTable('#lead-table', appAjax.lead)
        })
    </script>
@endsection
