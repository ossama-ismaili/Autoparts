@extends('layouts.app')

@section('content')
<div class="profile-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 row">
                <div class="col-12 mb-2">
                    <label for="name">{{__('profile.name_field')}}</label>
                    <input type="text" class="form-control" id="name" onchange="changeState('name')" value="{{$user->name}}">
                </div>
                <div class="col-12 mb-2">
                    <label for="email">{{__('profile.email_field')}}</label>
                    <input type="text" class="form-control" id="email" onchange="changeState('email')" value="{{$user->email}}">
                    <small id="emailHelp" class="form-text text-muted">{{__('profile.email_subtitle')}}</small>
                </div>
                <div class="col-12 mb-2">
                    <label for="password">{{__('profile.password_field')}}</label>
                    <small id="passwordHelp" class="form-text text-muted">{{__('profile.password_subtitle')}}</small>
                    <input type="text" class="form-control" id="password" onchange="changeState('password')" placeholder="{{__('profile.new_password')}}" value="">
                </div>
                <div class="col-12 mb-5">
                    <button class="btn btn-primary col-md-4" onclick="editProfile()"><span class="fa fa-pencil"></span> {{__('profile.edit')}}</button>
                </div>
            </div>
            <div class="col-md-6">
                <form action="/profile/avatar" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="avatar">Avatar</label>
                            <input type="file" class="form-control-file" id="avatar" name="avatar" >
                        </div>
                        <div class="form-group col-md-6 mt-4">
                            <button class="btn btn-success btn-block" type="submit"><span class="fa fa-image"></span> {{__('profile.update_avatar')}}</button>
                        </div>
                        <img src="{{env('APP_URL')}}/storage/{{$user->avatar}}" class="img-fluid col-8 mb-2" alt="user image">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    var nameState=false;
    var emailState=false;
    var passwordState=false;

    function changeState(param) {
        switch(param) {
            case "name":
                nameState=true;
                break;
            case "email":
                emailState=true;
                break;
            case "password":
                passwordState=true;
                break;
            default:
                console.log("Invalid Parameter");
        }
    }


    function editProfile() {
        if(nameState==true || emailState==true || passwordState==true){
            var user_data={};
            var avatar=null;
            if(nameState==true){
                user_data.name=$('#name').val();
            }
            if(emailState==true){
                user_data.email=$('#email').val();
            }
            if(passwordState==true){
                user_data.password=$('#password').val();
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'PUT',
                url: '/profile',
                data: {
                    'user_data':user_data
                },
                success: function (data) {
                    window.location.replace("/");
                },
                error: function (err) {
                    console.log(err);
                }
            });
        }
        else{
            alert("You didn't change anything!");
        }
    }

</script>
@endsection
