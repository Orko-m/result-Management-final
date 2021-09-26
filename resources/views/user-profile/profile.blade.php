@extends('admin.app')
@section('title','Update Profile')

@section('content')

    <div class="card center" style="width: 60rem;">
        <div class="card-body">
    <!-- general tab -->
    <div
        role="tabpanel"
        class="tab-pane active"
        id="account-vertical-general"
        aria-labelledby="account-pill-general"
        aria-expanded="true"
    >
        <!-- header media -->
{{--        <div class="media">--}}
{{--            <a href="javascript:void(0);" class="mr-25">--}}
{{--                <img--}}
{{--                    src="../../../app-assets/images/portrait/small/avatar-s-11.jpg"--}}
{{--                    id="account-upload-img"--}}
{{--                    class="rounded mr-50"--}}
{{--                    alt="profile image"--}}
{{--                    height="80"--}}
{{--                    width="80"--}}
{{--                />--}}
{{--            </a>--}}
{{--            <!-- upload and reset button -->--}}
{{--            <div class="media-body mt-75 ml-1">--}}
{{--                <label for="account-upload" class="btn btn-sm btn-primary mb-75 mr-75">Upload</label>--}}
{{--                <input type="file" id="account-upload" hidden accept="image/*" />--}}
{{--                <button class="btn btn-sm btn-outline-secondary mb-75">Reset</button>--}}

{{--            </div>--}}
{{--            <!--/ upload and reset button -->--}}
{{--        </div>--}}
        <!--/ header media -->

        <!-- form -->
        <form class="validate-form mt-2" method="post" action="{{ route('update-profile') }}">
            @csrf
            <div class="row">
                <div class="col-12 col-sm-1"></div>
                <div class="col-12 col-sm-10">
                    <div class="form-group">
                        <b><label for="account-name">Name</label></b>
                        <input
                            type="text"
                            class="form-control"
                            id="account-name"
                            name="name"
                            placeholder="Name"
                            value="{{ $user['name'] }}"
                        />
                    </div>
                </div>
                <div class="col-12 col-sm-1"></div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-1"></div>
                <div class="col-12 col-sm-10">
                    <div class="form-group">
                        <b><label for="account-e-mail">E-mail</label></b>
                        <input
                            type="email"
                            class="form-control"
                            id="account-e-mail"
                            name="email"
                            placeholder="Email"
                            value="{{ $user['email'] }}"
                        />
                    </div>
                </div>
                <div class="col-12 col-sm-1"></div>
            </div>
            <div class="row text-right">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary mt-2 mr-1">Update Profile</button>
                </div>
            </div>

        </form>
        <!--/ form -->
    </div>
        </div>
    </div>
@endsection
