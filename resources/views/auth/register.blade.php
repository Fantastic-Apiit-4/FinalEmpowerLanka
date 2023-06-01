<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="css/register.css" />
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
                              <h3>New here ?</h3>
                              <p>
                                    Collaborate With Experts,
                                    Discover & Share New Ideas With World.
                                    Start A New Journey By Today !
                              </p>

                        </div>
                        <img src="img/register.svg" class="image" alt="" />

                  </div>

                  <div class="column-right">
                        <div class="signin-signup">
                              <form method="POST" action="{{ route('register') }}" class="sign-in-form">
                                    @csrf
                                    <h2 class="title">REGISTER</h2>

                                    <!-- Full Name input -->
                                    <div class="input-field">
                                          <i class="fas fa-user"></i>
                                          <input type="text" name="name" id="name" value="{{old('name')}}"
                                                placeholder="Full Name" />
                                    </div>
                                    <span class="text-danger text-end">@error('name') {{$message}} @enderror</span>

                                    <!-- Username input -->
                                    <div class="input-field">
                                          <i class="fas fa-address-card"></i>
                                          <input type="text" name="username" id="username" value="{{old('username')}}"
                                                placeholder="Username" />
                                    </div>
                                    <span class="text-danger text-end">@error('username') {{$message}} @enderror</span>

                                    <!-- Email input -->
                                    <div class="input-field">
                                          <i class="fas fa-envelope"></i>
                                          <input type="email" name="email" id="email" value="{{old('email')}}"
                                                placeholder="Email Address" />
                                    </div>
                                    <span class="text-danger text-end">@error('email') {{$message}} @enderror</span>

                                    <!-- Address input -->
                                    <div class="input-field">
                                          <i class="fas fa-house-user"></i>
                                          <input type="text" name="address" id="address" value="{{old('address')}}"
                                                placeholder="Home Address" />
                                    </div>
                                    <span class="text-danger text-end">@error('address') {{$message}} @enderror</span>

                                    <!-- Telephone input -->
                                    <div class="input-field">
                                          <i class="fas fa-phone"></i>
                                          <input type="text" name="phone" id="phone" value="{{old('phone')}}"
                                                placeholder="Telephone" />
                                    </div>
                                    <span class="text-danger text-end">@error('phone') {{$message}} @enderror</span>

                                    <!-- Password input -->
                                    <div class="input-field">
                                          <i class="fas fa-lock fa-bounce"></i>
                                          <input type="password" name="password" id="password"
                                                value="{{old('password')}}" placeholder="Password" />
                                    </div>
                                    <span class="text-danger text-end">@error('password') {{$message}} @enderror</span>

                                    <!-- Confirm Password input -->
                                    <div class="input-field">
                                          <i class="fas fa-lock-open"></i>
                                          <input type="password" name="password_confirmation" id="password-confirm"
                                                required autocomplete="new-password" value="{{old('password')}}"
                                                placeholder="Confirm Password" />
                                    </div>
                                    <span class="text-danger text-end">@error('password_confirmation') {{$message}}
                                          @enderror</span>

                                    <input type="text" name="role" value="{{$role}}" hidden>

                                    <!-- Submit button -->
                                    <button type="submit" class="btn">
                                          {{ __('Register') }}
                                    </button>
                              </form>
                              <p>Already have an account ? <a href="{{ route('login') }}">Login</a></p>
                              <!-- Form Ends -->
                        </div>
                  </div>
            </div>
      </div>




      <script src="login.js"></script>
</body>

</html>