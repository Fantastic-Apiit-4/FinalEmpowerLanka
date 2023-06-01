<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">

      <!-- Font Awesome -->
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
      <!-- Google Fonts -->
      <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
      <!-- MDB -->
      <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css" rel="stylesheet" />
      <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
      <link rel="stylesheet" href="../css/outheader2.css">
      <title>Empower Lanka</title>
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



      <section>
            <div class="container py-5">

                  <div class="row">
                        <div class="col-lg-4">
                              <div class="card mb-4">
                                    <div class="card-body text-center">
                                          <img src="/uploads/profiles/{{$u->profphoto}}" alt="avatar"
                                                class="rounded-circle img-fluid"
                                                style="width: 150px; height:150px; overflow:hidden;">
                                          <h5 class="my-3">{{$u->username}}</h5>
                                          <p class="text-muted mb-1">{{$u->role}}</p>


                                          <div class="d-flex justify-content-center mb-2">


                                                <!--Only show in user view-->
                                                @if ($u->id == auth()->user()->id)
                                                <a href="/edit"><button type="button"
                                                            class="btn btn-outline-primary ms-1"> Edit
                                                            profile</button></a>
                                                @else
                                                <a href="/chatting/{{$u->id}}"><button type="button"
                                                            class="btn btn-outline-primary ms-1">Message</button></a>
                                                @endif
                                          </div>
                                    </div>
                              </div>

                        </div>
                        <div class="col-lg-8">
                              <div class="card mb-4">
                                    <div class="card-body">
                                          <div class="row">
                                                <div class="col-sm-3">
                                                      <label class="form-label" for="typeText">Full Name</label>
                                                </div>
                                                <div class="col-sm-9">
                                                      <div class="form-outline">
                                                            {{$u->name}}
                                                      </div>
                                                </div>
                                          </div>
                                          <hr>

                                          <div class="row">
                                                <div class="col-sm-3">
                                                      <label class="form-label" for="typeText">Email</label>
                                                </div>
                                                <div class="col-sm-9">
                                                      <div class="form-outline">
                                                            {{$u->email}}
                                                      </div>
                                                </div>
                                          </div>
                                          <hr>
                                          <div class="row">
                                                <div class="col-sm-3">
                                                      <label class="form-label" for="typeText">Home Address</label>
                                                </div>
                                                <div class="col-sm-9">
                                                      <div class="form-outline">
                                                            {{$u->address}}
                                                      </div>
                                                </div>
                                          </div>
                                          <hr>
                                          <div class="row">
                                                <div class="col-sm-3">
                                                      <label class="form-label" for="typeText">Tele Phone</label>
                                                </div>
                                                <div class="col-sm-9">
                                                      <div class="form-outline">
                                                            {{$u->phone}}
                                                      </div>
                                                </div>
                                          </div>
                                          <hr>
                                          <div class="row">
                                                <div class="col-sm-3">
                                                      <label class="form-label" for="typeText">Description</label>
                                                </div>
                                                <div class="col-sm-9">
                                                      <div class="form-outline">
                                                            {{$u->description}}
                                                      </div>
                                                </div>
                                          </div>

                                    </div>

                              </div>

                        </div>

                  </div>
            </div>
            </div>
      </section>


</body>

</html>