<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>Document</title>

      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
      <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">

      <link rel="stylesheet" href="../css/chat_header.css">
      <link rel="stylesheet" href="../css/chats.css">

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
                              <a href="{{ route('logout') }}" onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();"><i class="uil uil-signout"></i></a>
                              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                              </form>
                  </div>
            </div>

      </nav>
      <div class="bigbox">
            <!----------chatlist --------------->
            <div class="chatsection">
                  <div class="c_wrapper custombox">
                        <div class="user_dashboard">
                              <div class="head chattitle">
                                    <div class="content ">
                                          CHAT ROOM
                                    </div>
                              </div>
                              <div class="search_user">
                                    <span class="text">Select an user to chat</span>

                                    <input type="text" />
                                    <button><i class="chat_search uil uil-search"></i></button>

                              </div>
                              <div class="user_list">

                              </div>
                        </div>
                  </div>

            </div>
            <!--single chats-->
            <div class="c_wrapper">
                  <div class="chat_area">
                        <div class="head mainhead">
                              <a href="#"><i class="fas fa-arrow-left"></i></a>
                              <img src="/uploads/profiles/{{$u->profphoto}}" alt="">
                              <div class="details">
                                    <span>{{$u->name}}</span>
                                    <p class="{{$u->role}} rolebox">{{$u->role}}</p>
                              </div>
                        </div>
                        <div class="chat_box">
                              <!--Controller to add data-->
                        </div>
                        <form action="#" class="type_text">
                              @csrf
                              <input hidden type="text" name="sender" value="{{auth()->user()->id}}">
                              <input hidden type="text" name="reciever" value="{{$u->id}}">
                              <input class="text_content" name="message" type="text" placeholder="type something here">

                              <button><i class="uil uil-telegram-alt"></i></button>
                        </form>
                  </div>
            </div>


      </div>

      <script src="../js/chat/userchat.js"></script>


</body>

</html>