<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="css/login.css" />
      <title>Empower Lanka</title>
</head>

<body>
      <div class="row">

            <a class="logo" href="/">
                  <img src="img/logo.png" alt="EmpowerLanka_logo">
            </a>
            <div class="columns">
                  <div class="column-left">
                        <div class="content">
                              <h3>One of us ?</h3>
                              <p> Explore new ideas & Collaborate with experts !
                              </p>

                        </div>
                        <img src="img/login.svg" class="image" alt="" />

                  </div>

                  <div class="column-right">
                        <div class="signin-signup">
                              <!-- Form Starts  -->
                              <form method="POST" action="{{ route('login') }}" novalidate class="sign-in-form">

                                    @csrf
                                    <h2 class="title">LOGIN</h2>

                                    @if(Session::has('success'))
                                    <div class="alert alert-success">{{Session::get('success')}}</div>
                                    @endif
                                    @if(Session::has('fail'))
                                    <div class="alert alert-danger">{{Session::get('fail')}}</div>
                                    @endif

                                    <!-- Email input -->
                                    <div class="input-field">
                                          <i class="fas fa-envelope"></i>
                                          <input type="email" name="email" id="email" value="{{old('email')}}"
                                                placeholder="Email Address" />
                                    </div>
                                    <span class="text-danger text-end">@error('email') {{$message}} @enderror</span>

                                    <!-- Password input -->
                                    <div class="input-field">
                                          <i class="fas fa-lock"></i>
                                          <input type="password" name="password" id="password"
                                                value="{{old('password')}}" placeholder="Password" />
                                    </div>
                                    <span class="text-danger text-end">@error('password') {{$message}} @enderror</span>

                                    <!-- Login Button -->
                                    <button type="submit" class="btn solid"> LOGIN </button>

                              </form>
                              <p>New User ? <a href="/getstarted">Register</a></p>
                              <!-- Form Ends  -->
                        </div>
                  </div>
            </div>
      </div>




      <script src="login.js"></script>
</body>

</html>