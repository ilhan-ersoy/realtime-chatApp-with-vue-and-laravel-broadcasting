@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">Messenger App via sensei ilhan ersoy</div>

                <div class="card-body" id="app">
                    <chat-app :user="{{current_user()}}"></chat-app>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection