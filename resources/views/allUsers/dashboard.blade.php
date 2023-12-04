@extends('allUsers.layout.default', ['userDetail' => $userDetail])

@section('content')
<div class=content-header>
    <div class=container-fluid>
        <div class="mb-2 row">
            <div class=col-sm-6>
                <h1 class=m-0>{{$page_title}}</h1>
            </div>
            @php
                // echo '<pre>';print_r($userDetail); die();
            @endphp
        </div>
        <h3>Hello, {{$userDetail['full_name']}} </h3>
    </div>
</div>
@endsection