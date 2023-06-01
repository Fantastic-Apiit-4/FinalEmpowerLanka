<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Empower Lanka</title>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
      <link rel="stylesheet" href="../../../../css/dash.css">
      <link rel="stylesheet" href="../../../../css/dashboard.css">
      <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
      <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/css/bootstrap-toggle.css"
            integrity="sha512-9tISBnhZjiw7MV4a1gbemtB9tmPcoJ7ahj8QWIc0daBCdvlKjEA48oLlo6zALYm3037tPYYulT0YQyJIJJoyMQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">




</head>

<body>
      <nav>
            <div class="container">
                  <a class="logo" href="/admin/general">
                        <img src="/img/logo.png" alt="EmpowerLanka_logo">
                  </a>

                  <div class="profile">
                        <a href="/admin/dashboard"><i class="uil uil-home"></i></a>

                        <div class="profpic">
                              <img src="/uploads/profiles/{{auth()->user()->profphoto}}" alt="profilephoto">
                        </div>
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                              <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                              <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->username }}
                              </a>

                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item" href="/profiles/{{auth()->user()->id}}">My profile</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                          {{ __('Logout') }}
                                    </a>


                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                          @csrf
                                    </form>
                              </div>
                        </li>
                        @endguest
                  </div>

            </div>
      </nav>
      <main>
            <div class="container">
                  <div class="left">
                        <div class="profsummary">
                              <div class="photo profpic">
                                    <img src="/uploads/profiles/{{auth()->user()->profphoto}}" alt="profile">
                              </div>
                              <div class="handle">
                                    <strong>{{auth()->user()->name}}</strong>
                                    <p>{{auth()->user()->email}}</p>
                                    <p class="role {{auth()->user()->role}} ">{{auth()->user()->role}}</p>
                                    <a href="/profiles/{{auth()->user()->id}}">
                                          <label for="profilebtn" class="myprofile viewbtn">View profile</label></a>
                              </div>
                        </div>

                        <div class="sidebar">
                              <a href="/admin/dashboard" class="menuitems">
                                    <span><i class="uil uil-mailbox"></i></span>
                                    <h3>Dashboard</h3>
                              </a>
                              <a href="/admin/general" class="menuitems">
                                    <span><i class="uil uil-postcard"></i></span>
                                    <h3>Feed</h3>
                              </a>


                              <a href="/admin/users" class="menuitems">
                                    <span><i class="uil uil-home"></i></span>
                                    <h3>Users</h3>
                              </a>
                        </div>

                  </div>


                  <!--------------------------this is the important content----------------------------------->
                  <div class="midcenter">
                        <div class="main-container">
                              <div class="pg">
                                    <strong>Users</strong>
                              </div>
                              <div class="right">

                                    <table>
                                          <thead>
                                                <tr>
                                                      <th></th>
                                                      <th>User</th>
                                                      <th>Registered at</th>
                                                      <th>Activity(last login)</th>
                                                      <th>Status</th>
                                                      <th></th>

                                                </tr>
                                          </thead>
                                          <tbody>
                                                @foreach ($users as $item)
                                                <tr>
                                                      <td>
                                                            <div class="photo profpic">
                                                                  <img src="/uploads/profiles/{{$item->profphoto}}"
                                                                        alt="profile">
                                                            </div>
                                                      </td>
                                                      <td>{{$item->name}} </td>
                                                      <td>{{$item->created_at}}</td>

                                                      <td>{{ \Carbon\Carbon::parse($item->last_sign_in_at)->diffForHumans() }}
                                                      </td>
                                                      <td>
                                                            @if($item->isban == '1')
                                                            <label class="label label-danger">Blocked</label>
                                                            @else
                                                            <label class="label label-success">Active</label>
                                                            @endif
                                                      </td>
                                                      <!--<td>
                <input data-id="{{$item->id}}" class="toggle-class" type="checkbox"
                data-onstyle="success"
                data-offstyle="danger" data-toggle="toggle" data-on="UnBlock" data-off="Block"
                {{$item->isban ? 'checked' : ''}}>
            </td>-->
                                                      @if($item->role_as == 0)
                                                      <td>
                                                            @if($item->isban == 1)
                                                            <a href="{{route('users.status.update',['user_id' => $item->id, 'status_code'=>0])  }}"
                                                                  class="btn btn-danger m-2">
                                                                  <i class="fa fa-ban"></i>
                                                            </a>
                                                            @else
                                                            <a href="{{route('users.status.update',['user_id' => $item->id, 'status_code'=>1])  }}"
                                                                  class="btn btn-success m-2">
                                                                  <i class="fa fa-check"></i>
                                                            </a>


                                                            @endif
                                                      </td>
                                                      @endif
                                                </tr>
                                                @endforeach
                                          </tbody>
                                    </table>
                              </div>
                              <!-----------------------this is the end of important content----------------------------------->
                        </div>
                  </div>


            </div>
      </main>

      <!---------------------Modal end--------------------------->

      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
      </script>
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
      </script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"
            integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous">
      </script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
            integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous">
      </script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"
            integrity="sha512-F636MAkMAhtTplahL9F6KmTfxTmYcAcjcCkyu0f0voT3N/6vzAuJ4Num55a0gEJ+hRLHhdz3vDvZpf6kqgEa5w=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script src="../js/preview.js"></script>
      <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>

</body>


@section('content')


@endsection