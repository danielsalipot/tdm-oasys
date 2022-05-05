@extends('layout.messaging')

@section('title')
    <h1 class="section-title mt-5 pb-2">Notification</h1>
    <style>
        p{
            font-size: 15px;
        }
    </style>
@endsection

@section('content')

    @foreach ($notif as $data)
        <div class="row shadow-lg p-3 my-5">
            <div class="col-5 d-flex flex-row flex-wrap align-items-center card me-3 p-4">
                <h3 class="display-4 w-100 text-center">Recepients</h3>
                @foreach ($data->receivers as $item)
                    <div class="col-4 card">
                        <div class="row">
                            <div class="col-4">
                                <img src="{{ URL::asset($item->data->picture)}}" alt="" height="50px" width="50px" class="rounded">
                            </div>
                            <div class="col mt-4">
                                {{ $item->data->fname }} {{ $item->data->mname }} {{ $item->data->lname }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col border p-3 ">
                <h4 class="text-secondary">Notification Title</h4>
                <input disabled type="type" value="{{ $data->title }}" class="h4 p-3 w-100 shadow-sm my-3">
                <h4 class="text-secondary">Notification Body</h>
                <div class="card text-dark p-3 shadow-sm my-3">
                    {!! $data->message !!}
                </div>
            </div>
        </div>
    @endforeach
@endsection
