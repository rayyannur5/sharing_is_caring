@extends('layouts/main')

@section('container')
    <link href="{{ asset('assets/css/updateUser.css') }}" rel="stylesheet">

    <div class="container-xl px-4 mt-4">
        <!-- Account page navigation-->
        <nav class="nav navbar-expand-lg nav-borders">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link ms-0" href="{{ url('/update') }}">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ url('/security') }}">Security</a>
                </li>
            </ul>
            <a href="{{ url('/user') }}"><button class="btn btn-success ">Back</button></a>
        </nav>

        <hr class="mt-0 mb-4">

        @if ($info === 'failed')
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Wrong current password!!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if ($info === 'success')
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Password has been changed!!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        
        <div class="row">
            <div class="col-xl-8">

                <!-- Change password card-->
                <div class="card mb-4">
                    <div class="card-header">Change Password</div>
                    <div class="card-body">
                        <form action="{{ url('/user/password') }}" method="post">
                            {{ csrf_field() }}

                            <!-- Form Group (current password)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="currentPassword">Current Password</label>
                                <input class="form-control" name="currentPassword" id="currentPassword" type="password"
                                    placeholder="Enter current password" required>
                            </div>
                            <!-- Form Group (new password)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="newPassword">New Password</label>
                                <input class="form-control" name="newPassword" id="newPassword" type="password"
                                    placeholder="Enter new password" required>
                            </div>
                            <!-- Form Group (confirm password)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="confirmPassword">Confirm Password</label>
                                <input class="form-control" name="confirmPassword" id="confirmPassword" type="password"
                                    placeholder="Confirm new password" required>
                            </div>
                            <button class="btn btn-primary" id="save" type="submit">Save</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <!-- Delete account card-->
                <div class="card mb-4">
                    <div class="card-header">Delete Account</div>
                    <div class="card-body">
                        <p>Deleting your account is a permanent action and cannot be undone. If you are sure you want to
                            delete your account, select the button below.</p>
                        <button class="btn btn-danger text-white" type="button">I understand, delete my
                            account</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script>
        var check = false;
        $("#newPassword").on("keyup", function() {
            var pswd = $(this).val();
            console.log(pswd);
            if (pswd.length < 8) {
                $("#newPassword").removeClass("is-valid").addClass("is-invalid");
            } else {
                $("#newPassword").removeClass("is-invalid").addClass("is-valid");
            }
        });
        $("#newPassword").on("focusout", function() {

            if ($(this).val() != $("#confirmPassword").val()) {
                $("#confirmPassword").removeClass("is-valid").addClass("is-invalid");
                check = false;
            } else {
                $("#confirmPassword").removeClass("is-invalid").addClass("is-valid");
                check = true;
            }
        });

        $("#confirmPassword").on("keyup", function() {
            if ($("#newPassword").val() != $(this).val()) {
                $(this).removeClass("is-valid").addClass("is-invalid");
                check = false;
            } else {
                $(this).removeClass("is-invalid").addClass("is-valid");
                check = true;
            }
            if (check) {
                $("#save").removeClass("disabled");
            } else {
                $("#save").addClass("disabled");
            }
        });
    </script>
@endsection
