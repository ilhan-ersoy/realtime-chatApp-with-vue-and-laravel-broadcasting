@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header" style="font-size: 15px">Messenger App via İLHAN ERSOY </div>

                <div class="card-body" id="app" style="padding:0">
                    <chat-app :user={{auth()->user()}}></chat-app>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
