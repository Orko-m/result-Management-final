@extends('admin.app')
@section('title','Reset Password')

@section('content')

<!-- change password -->

    <!-- form -->
    <form method="POST" action="{{ route('update-password') }}">
        @csrf
        <div class="justify-content-center">
        <div class="row">
<div class="col-12 col-sm-3"></div>
            <div class="col-12 col-sm-6">
                <div class="form-group">
                    <label for="account-old-password">Old Password</label>
                    <div class="input-group form-password-toggle input-group-merge">
                        <input
                            type="password"
                            class="form-control"
                            id="account-old-password"
                            name="current_password"
                            placeholder="Old Password"
                        />
                        <div class="input-group-append">
                            <div class="input-group-text cursor-pointer">
                                <i data-feather="eye"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <div class="col-12 col-sm-3"></div>
        <div class="row">
            <div class="col-12 col-sm-3"></div>
            <div class="col-12 col-sm-6">
                <div class="form-group">
                    <label for="account-new-password">New Password</label>
                    <div class="input-group form-password-toggle input-group-merge">
                        <input
                            type="password"
                            id="account-new-password"
                            name="password"
                            class="form-control"
                            placeholder="New Password"
                        />
                        <div class="input-group-append">
                            <div class="input-group-text cursor-pointer">
                                <i data-feather="eye"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-3"></div>
        </div>

        <div class="row">
            <div class="col-12 col-sm-3"></div>
            <div class="col-12 col-sm-6">
                <div class="form-group">
                    <label for="account-retype-new-password">Confirm New Password</label>
                    <div class="input-group form-password-toggle input-group-merge">
                        <input
                            type="password"
                            class="form-control"
                            id="account-retype-new-password"
                            name="confirm-password"
                            placeholder="New Password"
                        />
                        <div class="input-group-append">
                            <div class="input-group-text cursor-pointer"><i data-feather="eye"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <div class="row">
                <div class="col-12 col-sm-3"></div>
            <div class="col-12 col-sm-6">
                <button type="submit" class="btn btn-primary mr-1 mt-1">Save changes</button>
                <button type="reset" class="btn btn-outline-secondary mt-1">Cancel</button>
            </div>
                <div class="col-12 col-sm-3"></div>
        </div>
        </div>
    </form>
    <!--/ form -->
<!--/ change password -->

@endsection
