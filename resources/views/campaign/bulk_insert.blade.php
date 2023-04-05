@extends('layout.master')
@section('content')
    <div class="container-head">
        <h1>Bulk Insert Campaign</h1>
    </div>
    <div class="container-body">
        <form action="{{route('campaign.bulk.insert')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="upload_csv" class="form-label">Choose an *.CSV file</label>
                <input class="form-control" type="file" id="upload_csv" required name="upload_csv">
            </div>
            <button class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
