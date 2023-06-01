<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Home</title>
      <link rel="stylesheet" href="css/landing.css" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>

<body>
      <div class="box">
            <header>
                  <div class="container" id="cont">
                        <a class="logo" href="/landing">
                              <img src="img/logo.png" alt="EmpowerLanka_logo">
                        </a>
                        <div class="links">
                              <ul>
                                    @if (Route::has('login'))
                                    @auth
                                    <li class="btn"><a href="{{ url('/home/general') }}">Home</a></li>
                                    @else
                                    <li class="btn"><a href="{{ route('login') }}">Login</a></li>
                                    @if (Route::has('register'))
                                    <li class="btn"><a href="/getstarted">Register</a></li>
                                    @endif
                                    @endauth
                                    @endif


                              </ul>
                        </div>
                        <div class="ham">
                              <div class="hamburger" id="ham"></div>

                        </div>
                  </div>
            </header>
            <main class="intro">
                  <div class="container">
                        <div class="descript">
                              <div class="descrpTitles">
                                    <h1>It is Your Time to Change the Future</h1>
                              </div>
                              <div class="descrpText">
                                    Explore New Ideas, Connect With People, Encourage Others, Share Your Innovation
                                    Ideas,
                                    All At One Place !
                              </div>
                              <a class="getstart" href="/getstarted">
                                    <div class="btnDiv">
                                          <div class="btn" id="bigBtn">Get Started</div>
                                    </div>
                              </a>

                        </div>
                        <div class="pic">
                              <img src="img/kindpng_469182.png" class="bigpic">
                        </div>
                  </div>


            </main>
            <div class="waves">
                  <div class="wave" id="wave0"></div>
                  <div class="wave" id="wave1" style="--i:1;"></div>
                  <div class="wave" id="wave2" style="--i:2;"></div>
                  <div class="wave" id="wave3" style="--i:2;"></div>
                  <div class="wave" id="wave4" style="--i:1;"></div>
            </div>

      </div>

      <section class="secondSec">
            <div class="pattern">
                  <h1>What We Offer At Empower Lanka :</h1>
                  <div class="cardContainer houdini">

                        <div class="card">
                              <div class="cardimg"><img src="img/promotion.png" alt="investor" /></div>

                              <p>Share Your Success Story</p>
                        </div>
                        <div class="card">

                              <div class="cardimg"><img src="img/investor.png" alt="investor" /></div>
                              <p>A platform to find potential investors to kickout you idea to success</p>
                        </div>
                        <div class="card">

                              <div class="cardimg"><img src="img/ads.png" alt="investor" /></div>
                              <p>Find Suitable Audience </p>
                        </div>
                  </div>
            </div>


      </section>

      <footer>
            <div class="footerContent">
                  <hr />
                  <div class="summary">Register now and join the community <span class="ftSignup">Sign up</span></div>

                  <div class="socialTxt">You can also find us in :</div>
                  <div class="sociallinks">
                        <div class="social"><img src="img/facebook.png" alt="" /></div>
                        <div class="social"><img src="img/twitter.png" alt="" /></div>
                        <div class="social"><img src="img/youtube.png" alt="" /></div>
                        <div class="social"><img src="img/linkedin.png" alt="" /></div>
                  </div>
                  <div class="tail">
                        <p>&copy;2023 copyright : EmpowerLanka : Fantastic 4</p>
                  </div>
            </div>
      </footer>


      <script src="/js/landing.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"></script>
</body>

</html>