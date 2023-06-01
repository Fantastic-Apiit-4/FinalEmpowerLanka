<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>Empower Lanka</title>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
      <link rel="stylesheet" href="../css/comments.css">
      <link rel="styleshseet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

</head>

<body>
      <nav>
            <div class="container">
                  <a class="logo" href="/home/general">
                        <img src="/img/logo_w.png" alt="EmpowerLanka_logo">
                  </a>

                  <!--<div class="searchbar">
                <i class="uil uil-search"></i>
                <input type="search" placeholder="Enter to search">
            </div>-->
                  <div class="profile">
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

      <div class="main-container">

            <!----------postsample------------->
            <div class="eachpost">
                  <div class="head">
                        <div class="user">
                              <div class="profpic">
                                    <img src="/uploads/profiles/{{$pd->user->profphoto}}" alt="">
                              </div>
                              <div class="info">
                                    <h3><a class="posttitle"
                                                href="/profiles/{{$pd->user->id}}">{{$pd->user->username}}</a>
                                          <span class="postrole {{$pd->user->role}}">{{$pd->user->role}}</span>
                                    </h3>
                                    <small class="date">{{$pd->created_at}}</small>
                              </div>

                        </div>
                        <span class="edit">
                              <i class="uil uil-ellipsis-v"></i>
                        </span>
                  </div>

                  <div class="postphoto">
                        @if ($pd->postimage)
                        <img src="/uploads/postimg/{{$pd->postimage}}" alt="">
                        @endif
                  </div>

                  <div class="posttext">
                        @if ($pd->subject)
                        <div class="hashtag">{{$pd->subject}}</div>
                        @endif
                        <h3 class="posttext">{{$pd->title}} </h3>
                        <p class="posttext">{{$pd->description}} </p>
                  </div>
                  <div class="like">
                        <a href="#"><i class="fa fa-thumbs-up"></i></a>
                        <p>{{$pd->likes->count()}}</p>

                  </div>
            </div>


            <div class="comment">
                  <div class="panel">
                        <div class="panel-body">
                              <form action="#" class="addcomment">
                                    @csrf
                                    <textarea id="commenttxt" class="form-control" name="comment" rows="2"
                                          placeholder="What are you thinking?"></textarea>
                                    <input type="text" name="user_id" value="{{auth()->user()->id}}" hidden />
                                    <input type="text" name="post_id" value="{{$pd->id}}" hidden />
                                    <div class="mar-top clearfix">
                                          <button class="btn btn-sm btn-primary pull-right commentbtn" type="submit">
                                                Comment</button>
                                    </div>
                              </form>
                        </div>
                  </div>

                  <div id="cmtbox">
                        <!----controller is adding all the data here...dont delete the div -------->
                  </div>



            </div>
      </div>










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

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
            integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />

      <script src="js/preview.js"></script>
      <script src="../js/comments/comment.js"></script>





</body>

</html>