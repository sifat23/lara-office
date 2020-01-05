@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    <form action="{{ route('verify.confirm') }}" method="POST">
                        @csrf
                        <p>Enter verification code Here</p>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="varification_code" required>
                            </div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary">Varify Account</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
