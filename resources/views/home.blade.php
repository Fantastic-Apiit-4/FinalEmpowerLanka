<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>Empower Lanka</title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
            integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
      <link rel="stylesheet" href="../css/dash.css">
      <link rel="stylesheet" href="../css/chat.css">
      <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
</head>

<body>
      <nav>
            <div class="container">

                  <a class="logo" href="/home/general">
                        <img src="/img/logo_w.png" alt="EmpowerLanka_logo">
                  </a>



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
                              <a href="/home/general" class="menuitems">
                                    <span><i class="uil uil-postcard"></i></span>
                                    <h3>General</h3>
                              </a>
                              <a href="/home/myfeed" class="menuitems">
                                    <span><i class="uil uil-mailbox"></i></span>
                                    <h3>My Feed</h3>

                              </a>

                              <a href="/home/mypost" class="menuitems">
                                    <span><i class="uil uil-home"></i></span>
                                    <h3>My posts</h3>
                              </a>
                        </div>
                        <label class="createpost btn btn-main" data-toggle="modal" data-target="#postModal">Create
                              post</label>
                  </div>

                  <!-------------------------- posts ----------------------------------->
                  <div class="midcenter">
                        <!--------------modal------------------->
                        <div class="pg">
                              <strong>{{$pp}}</strong>

                        </div>

                        <div class="posts">


                              <!----------postsample------------->
                              @foreach ($pd as $p)
                              @if($p->isban==0)
                              <div class="eachpost">
                                    <div class="head">
                                          <div class="user">
                                                <div class="profpic">
                                                      <img src="/uploads/profiles/{{$p->user->profphoto}}" alt="">
                                                </div>
                                                <div class="info">
                                                      <h3><a class="posttitle"
                                                                  href="/profiles/{{$p->user->id}}">{{$p->user->username}}</a>&nbsp;<span
                                                                  class="postrole {{$p->user->role}}">{{$p->user->role}}</span>
                                                      </h3>
                                                      <small>{{$p->created_at}}</small>
                                                </div>

                                          </div>
                                          <span class="edit">
                                                <i class="uil uil-ellipsis-v"></i>
                                          </span>
                                    </div>
                                    <div class="postphoto">
                                          @if ($p->postimage)
                                          <img src="/uploads/postimg/{{$p->postimage}}" alt="">
                                          @endif
                                    </div>
                                    <div class="posttext">
                                          @if ($p->subject)

                                          <div class="hashtag">#&nbsp;{{$p->subject}}</div>
                                          @endif

                                          <h3 class="posttext">{{$p->title}}</h3>
                                          <p class="posttext">{{$p->description}} </p>

                                    </div>
                                    <div class="action-button">
                                          <form action="#" id="likeform">
                                                @csrf
                                                <input type="text" name="post_id" value="{{$p->id}}" hidden />
                                                <input type="text" name="user_id" value="{{auth()->user()->id}}"
                                                      hidden />
                                                <button id="likebtn" class="interact-button">

                                                      <span><i class="uil uil-thumbs-up"><span
                                                                        class="comcount">{{$p->likes->count()}}</span></i></span>
                                                </button>
                                          </form>
                                          <div class="comment">
                                                <span><span class="comcount">{{$p->comments->count()}}</span> <a
                                                            href="/viewPost/{{$p->id}}"><i
                                                                  class="uil uil-comment-alt-message"></i></a></span>
                                          </div>
                                    </div>
                              </div>
                              @endif
                              @endforeach


                        </div>







                  </div>
                  <div class="right">
                        @include('chat.chatuserlist')
                  </div>
            </div>
      </main>
      <!-- Modal -->
      <div class="modal fade" id="postModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                  <div class="modal-content">
                        <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Add a post</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                              </button>
                        </div>
                        <form action="/home" enctype="multipart/form-data" method="Post">
                              @csrf
                              <div class="modal-body">
                                    <div class="form-group">
                                          <div id="preview"></div>
                                    </div>

                                    <div class="form-group">
                                          <input type="text" name="title" class="form-control" placeholder="Title"
                                                required>
                                    </div>
                                    <div class="form-group">
                                          <select name="subject" id="subject" class="form-select"
                                                aria-label="Default select example">
                                                <option selected>Select a subject</option>
                                                <option value="Advertisement">Advertisement</option>
                                                <option value="Fundraiser">Fundraiser</option>
                                                <option value="Advice">Advice</option>
                                                <option value="Distribution">Distribution</option>
                                                <option value="Funding">Funding</option>
                                          </select>
                                    </div>

                                    <div class="form-group">
                                          <textarea name="description" class="form-control" placeholder="Enter a post"
                                                required></textarea>
                                    </div>

                                    <div class="lower">
                                          <div class="form-group pt-2 pb-2">
                                                <input name="postimage" id="uploadpic" onchange="showimg(event)"
                                                      accept="image/*" type="file" class="form-control-file">
                                                <label for="uploadpic" class="btn-post uppic"><i
                                                            class="uil uil-image-upload"></i></label>
                                          </div>

                                          <button type="submit" class="btn-post addbtn">Add</button>
                                    </div>

                              </div>
                        </form>
                  </div>
            </div>
      </div>
      <!---------------------Modal end--------------------------->

      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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

      <script src="../js/preview.js"></script>
      <script src="../js/chat/searchuser.js"></script>
      <script src="../js/comments/like.js"></script>
</body>

</html>