@extends('layout.master')
@section('content')
    <div class="container-head">
        <h1>Accounts</h1>
    </div>
    <div class="container-body">
        <table id="account-table" class="table table-striped " style="width:100%">
            <thead>
            <tr>
                <th>Account Name</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>

            @foreach($records as $record)
                    <?php
                    /** @var $record \Src\Entities\Account\Domains\Account */
                    ?>
                <tr class="record-row" data-id="{{$record->id()}}">
                    <td class="readonly record-field" data-field="Name" id="account-{{$record->id()}}-Name">
                        <div class="mask">
                            {{$record->name()->value()}}
                        </div>
                        <div class="cell-form-inline">
                            <input type="text" class="form-control" name="Name" value="{{$record->name()->value()}}"/>
                        </div>
                    </td>
                    <td class="readonly record-field" data-field="Phone" id="account-{{$record->id()}}-Phone">
                        <div class="mask">
                            {{$record->phone()->value()}}
                        </div>
                        <div class="cell-form-inline">
                            <input type="text" class="form-control" name="Phone" value="{{$record->phone()->value()}}"/>
                        </div>
                    </td>
                    <td>
                        <a class="btn btn-warning" href="{{route('account.delete', ['id' => $record->id()])}}">Delete</a>
                        <a class="btn btn-secondary" href="{{route('account.view', ['id' => $record->id()])}}">View</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <script type="module">
        $(document).ready(function () {
            tableUtils.initTable('#account-table', appAjax.account)
        })
    </script>
@endsection
