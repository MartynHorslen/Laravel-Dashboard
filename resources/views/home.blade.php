@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <h1 class="mb-4">{{ __('Dashboard') }}</h1>
            <div class="card">
                <div class="card-header">{{ __('Widget-1') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('No widgets to display.') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
