<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Empower Lanka</title>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" />
      <link rel="stylesheet" href="../../css/dash.css">
      <link rel="stylesheet" href="../../../css/dashboard_charts.css">
      <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
</head>

<body>
      <nav>
            <div class="container">
                  <a class="logo" href="/admin/dashboard">
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

                  <!-------------------------- Dashboard ----------------------------------->

                  <div class="midcenter">
                        <div class="main-container">
                              <div class="pg">
                                    <strong>Dashboard</strong>
                              </div>



                              <div class="charts">
                                    <div class="charts-card">
                                          <p class="chart-title"> User Traffic</p>

                                          <div style="width: 500px;">
                                                <canvas id="chart">

                                                </canvas>
                                          </div>
                                    </div>

                                    <div class="card-vertical">
                                          <div class="card">
                                                <div class="card-inner">
                                                      <p class="card-title">
                                                            New Registered Users
                                                      </p>
                                                </div>
                                                <span class="card-desc">{{$thisMonthUsers}}
                                                </span>
                                          </div>

                                          <div class="card">
                                                <div class="card-inner">
                                                      <p class="card-title">
                                                            All Users
                                                      </p>
                                                </div>
                                                <span class="card-desc">
                                                      {{$totalAllUsers}}
                                                </span>
                                          </div>
                                    </div>

                              </div>

                              <div class="card-horizontal">
                                    <div class="card entrepreneur">
                                          <div class="card-inner">
                                                <p class="card-title">
                                                      Entrepreneur
                                                </p>
                                          </div>
                                          <span class="card-desc">
                                                {{$totalentrepreneurs}}
                                          </span>
                                    </div>

                                    <div class="card customer">
                                          <div class="card-inner">
                                                <p class="card-title">
                                                      Customers
                                                </p>
                                          </div>
                                          <span class="card-desc">
                                                {{$totalcustomers}}
                                          </span>
                                    </div>

                                    <div class="card investor">
                                          <div class="card-inner">
                                                <p class="card-title">
                                                      Investors
                                                </p>
                                          </div>
                                          <span class="card-desc">
                                                {{$totalinvestors}}
                                          </span>
                                    </div>

                                    <div class="card distributor">
                                          <div class="card-inner">
                                                <p class="card-title">
                                                      Distributors
                                                </p>
                                          </div>
                                          <span class="card-desc">
                                                {{$totaldistributors}}
                                          </span>
                                    </div>
                              </div>
                        </div>

                  </div>


            </div>
            </div>
      </main>



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
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
      <script src="../js/preview.js"></script>

      <script>
      var ctx = document.getElementById('chart').getContext('2d');
      var userChart = new Chart(ctx, {
            type: 'bar',
            data: {
                  labels: {!!json_encode($labels) !!},
                  datasets: {!!json_encode($datasets) !!}
            },
      });
      </script>
</body>

</html>