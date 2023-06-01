<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Empower Lanka</title>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
      <link rel="stylesheet" href="css/dash.css">
      <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
</head>

<body>
      <nav>
            <div class="container">
                  <a class="logo" href="/home/general">
                        <img src="/img/logo_w.png" alt="EmpowerLanka_logo">
                  </a>


                  <div class="profile">
                        <i class="uil uil-envelope-minus"></i>
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
                        <a href="" class="profsummary">
                              <div class="photo profpic">
                                    <img src="img/profile.jpg" alt="">
                              </div>
                              <div class="handle">
                                    <strong>FlashNewton</strong>
                                    <p>@flashnewton.gmail.com</p>
                                    <p class="role">Customer</p>
                                    <label for="profilebtn" class="myprofile">Edit profile</label>
                              </div>
                        </a>

                        <div class="sidebar">
                              <a href="#" class="menuitems">
                                    <span><i class="uil uil-postcard"></i></span>
                                    <h3>My feed</h3>
                              </a>
                              <a href="#" class="menuitems">
                                    <span><i class="uil uil-mailbox"></i></span>
                                    <h3>General</h3>
                                    <div class="notif-popup">
                                          <div>
                                                <div class="profpic mainprofile">
                                                      <img src="img/profile.jpg" alt="">
                                                </div>
                                                <div class="notif-body">
                                                      hgfhgfhgfhgfhfhgfgfhgfhg
                                                      <small class="text-muted">2 days ago</small>
                                                </div>
                                          </div>
                                          <div>
                                                <div class="profpic">
                                                      <img src="img/profile.jpg" alt="">
                                                </div>
                                                <div class="notif-body">
                                                      hgfhgfhgfhgfhfhgfgfhgfhg
                                                      <small class="text-muted">2 days ago</small>
                                                </div>
                                          </div>
                                    </div>
                              </a>

                              <a href="#" class="menuitems">
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
                              <strong>General</strong>

                        </div>

                        <div class="posts">
                              <!----------postsample------------->
                              @foreach ($pd as $p)
                              <div class="eachpost">
                                    <div class="head">
                                          <div class="user">
                                                <div class="profpic">
                                                      <img src="img/profile.jpg" alt="">
                                                </div>
                                                <div class="info">
                                                      <h3>{{$p->user->username}}</h3>
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
                                          <h3>{{$p->title}}</h5>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo, dolore
                                                      maxime repellat laborum autem voluptate consequuntur cum a odit
                                                      vitae. Voluptatum maiores hic unde sed in facere et totam
                                                      aspernatur expedita excepturi tempore quam, sequi pariatur
                                                      voluptates nesciunt dolores ratione?
                                                </p>
                                    </div>
                                    <div class="action-button">
                                          <div class="interact-button">
                                                <span><i class="uil uil-thumbs-up"></i></span>
                                                <span><i class="uil uil-share-alt"></i></span>
                                          </div>
                                          <div class="comment">
                                                <span><i class="uil uil-comment-alt-message"></i></span>
                                          </div>
                                    </div>
                              </div>
                              @endforeach

                              <div class="eachpost">
                                    <div class="head">
                                          <div class="user">
                                                <div class="profpic">
                                                      <img src="img/profile.jpg" alt="">
                                                </div>
                                                <div class="info">
                                                      <h3>Flashnewton</h3>
                                                      <small>15 minutes ago</small>
                                                </div>

                                          </div>
                                          <span class="edit">
                                                <i class="uil uil-ellipsis-v"></i>
                                          </span>
                                    </div>
                                    <div class="postphoto">
                                          <img src="/img/profile.jpg" alt="">
                                    </div>
                                    <div class="posttext">
                                          <h3>title shdkjashdkjhskjdha</h5>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo, dolore
                                                      maxime repellat laborum autem voluptate consequuntur cum a odit
                                                      vitae. Voluptatum maiores hic unde sed in facere et totam
                                                      aspernatur expedita excepturi tempore quam, sequi pariatur
                                                      voluptates nesciunt dolores ratione?
                                                </p>
                                    </div>
                                    <div class="action-button">
                                          <div class="interact-button">
                                                <span><i class="uil uil-thumbs-up"></i></span>
                                                <span><i class="uil uil-share-alt"></i></span>
                                          </div>
                                          <div class="comment">
                                                <span><i class="uil uil-comment-alt-message"></i></span>
                                          </div>
                                    </div>
                              </div>
                              <!---------------sample end------->
                              <!----------postsample------------->
                              <div class="eachpost">
                                    <div class="head">
                                          <div class="user">
                                                <div class="profpic">
                                                      <img src="img/profile.jpg" alt="">
                                                </div>
                                                <div class="info">
                                                      <h3>Flashnewton</h3>
                                                      <small>15 minutes ago</small>
                                                </div>

                                          </div>
                                          <span class="edit">
                                                <i class="uil uil-ellipsis-v"></i>
                                          </span>
                                    </div>
                                    <div class="postphoto">
                                          <img src="/img/profile.jpg" alt="">
                                    </div>
                                    <div class="action-button">
                                          <div class="interact-button">
                                                <span><i class="uil uil-thumbs-up"></i></span>
                                                <span><i class="uil uil-share-alt"></i></span>
                                          </div>
                                          <div class="comment">
                                                <span><i class="uil uil-comment-alt-message"></i></span>
                                          </div>
                                    </div>
                              </div>
                              <!---------------sample end------->
                              <!----------postsample------------->
                              <div class="eachpost">
                                    <div class="head">
                                          <div class="user">
                                                <div class="profpic">
                                                      <img src="img/profile.jpg" alt="">
                                                </div>
                                                <div class="info">
                                                      <h3>Flashnewton</h3>
                                                      <small>15 minutes ago</small>
                                                </div>

                                          </div>
                                          <span class="edit">
                                                <i class="uil uil-ellipsis-v"></i>
                                          </span>
                                    </div>
                                    <div class="postphoto">
                                          <img src="/img/profile.jpg" alt="">
                                    </div>
                                    <div class="action-button">
                                          <div class="interact-button">
                                                <span><i class="uil uil-thumbs-up"></i></span>
                                                <span><i class="uil uil-share-alt"></i></span>
                                          </div>
                                          <div class="comment">
                                                <span><i class="uil uil-comment-alt-message"></i></span>
                                          </div>
                                    </div>
                              </div>
                              <!---------------sample end------->
                              <!----------postsample------------->
                              <div class="eachpost">
                                    <div class="head">
                                          <div class="user">
                                                <div class="profpic">
                                                      <img src="img/profile.jpg" alt="">
                                                </div>
                                                <div class="info">
                                                      <h3>Flashnewton</h3>
                                                      <small>15 minutes ago</small>
                                                </div>

                                          </div>
                                          <span class="edit">
                                                <i class="uil uil-ellipsis-v"></i>
                                          </span>
                                    </div>
                                    <div class="postphoto">
                                          <img src="/img/profile.jpg" alt="">

                                    </div>
                                    <div class="action-button">
                                          <div class="interact-button">
                                                <span><i class="uil uil-thumbs-up"></i></span>
                                                <span><i class="uil uil-share-alt"></i></span>
                                          </div>
                                          <div class="comment">
                                                <span><i class="uil uil-comment-alt-message"></i></span>
                                          </div>
                                    </div>
                              </div>
                              <!---------------sample end------->

                        </div>







                  </div>
                  <div class="right">

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
                        <form action="/main" enctype="multipart/form-data" method="Post">
                              @csrf
                              <div class="modal-body">
                                    <div class="form-group">
                                          <div id="preview"></div>
                                    </div>

                                    <div class="form-group">
                                          <input type="text" name="title" class="form-control" placeholder="Subject"
                                                required>
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

      <script src="js/preview.js"></script>
</body>

</html>