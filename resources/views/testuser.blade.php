<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Document</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
      <link rel="stylesheet" href="css/outheader.css">
      <link rel="stylesheet" href="css/testuser.css">

</head>

<body>
      <nav>
            <div class="empnavbar">
                  <a class="logo" href="/home/general">
                        <img src="/img/logo_w.png" alt="EmpowerLanka_logo">
                  </a>
                  <div class="empowerlinks">
                        <a href="/home/general"><i class="uil uil-home"></i><label class="linklabel">&nbsp;
                                    Home</label></a>
                        <a href="/home/general">
                              <div class="loggeduserpic">
                                    <img src="/uploads/profiles/{{auth()->user()->profphoto}}" alt="profilephoto">
                              </div>

                  </div>
            </div>

      </nav>

      <div class="box">
            <div class="container">
                  <div class="row head-row">
                        <h2>Edit Profile</h2>
                  </div>
                  <div class="row">
                        <div class="col-sm-3">
                              <!--left col-->


                              <div class="text-center">
                                    <div>
                                          <h4>{{auth()->user()->username}}</h4>
                                    </div>
                                    <div class="role-box">
                                          <div class="role">{{auth()->user()->role}}</div>
                                    </div>
                                    <img src="/uploads/profiles/{{auth()->user()->profphoto}}"
                                          class="pfpic avatar img-circle img-thumbnail" alt="avatar">


                                    <label class="profchangebtn" for="profphoto">Change profile photo</label>


                              </div>

                        </div>
                        <!--/col-3-->
                        <div class="col-sm-9">

                              <form class="form" action="/profile/edit" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                          <input type="file" id="profphoto" name="profphoto"
                                                class="noshow text-center center-block file-upload">
                                          <div class="col-xs-6">
                                                <label for="name">
                                                      <h4>Name</h4>
                                                </label>
                                                <input type="text" class="form-control" name="name" id="first_name"
                                                      value="{{auth()->user()->name}}">
                                          </div>
                                    </div>

                                    <div class="form-group">

                                          <div class="col-xs-6">
                                                <label for="phone">
                                                      <h4>Phone</h4>
                                                </label>
                                                <input type="text" class="form-control" name="phone" id="phone"
                                                      value="{{auth()->user()->phone}}">
                                          </div>
                                    </div>
                                    <div class="form-group">

                                          <div class="col-xs-6">
                                                <label for="email">
                                                      <h4>Email</h4>
                                                </label>
                                                <input type="email" readonly class="form-control" name="email"
                                                      id="email" value="{{auth()->user()->email}}">
                                          </div>
                                    </div>
                                    <div class="form-group">

                                          <div class="col-xs-6">
                                                <label for="address">
                                                      <h4>Address</h4>
                                                </label>
                                                <input type="address" name="address" class="form-control" id="address"
                                                      value="{{auth()->user()->address}}">
                                          </div>
                                    </div>
                                    <div class="form-group">

                                          <div class="col-xs-12">
                                                <label for="description">
                                                      <h4>Description</h4>
                                                </label>
                                                <textarea name="description" id="description"
                                                      class="form-control">{{auth()->user()->description}}</textarea>
                                          </div>
                                    </div>
                                    <div class="form-group">
                                          <div class="col-xs-12">
                                                <br>
                                                <a href="/profiles/{{auth()->user()->id}}"><label
                                                            class="btn cancelbtn btn-lg btn-success pull-right">Cancel</label></a>
                                                <button class="btn updatebtn btn-lg btn-success pull-right"
                                                      type="submit">Update</button>

                                                <!--<button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>-->
                                          </div>
                                    </div>
                              </form>
                        </div>

                  </div>
                  <!--/col-9-->
            </div>
      </div>

      <script>
      $(document).ready(function() {
            var readURL = function(input) {
                  if (input.files && input.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                              $('.avatar').attr('src', e.target.result);
                        }
                        reader.readAsDataURL(input.files[0]);
                  }
            }
            $(".file-upload").on('change', function() {
                  readURL(this);
            });
      });
      </script>
</body>

</html>