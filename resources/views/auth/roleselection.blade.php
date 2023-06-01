@extends('layouts.customheader2')
@section('links')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">  
<link rel="stylesheet" href="css/roles.css">
@endsection
@section('body')
<h3 class="title">Select Your Role</h3>
<div class="container m-container">  
    <form action="/getstarted" method="POST" >
        @csrf
        <div class="radio-tile-group m-tile-group">

            <div class="in-con">
              <input id="entrepreneur" type="radio" name="roles" value="entrepreneur">
              <div class="radio-tile">
                <img src="img/assets/entrepreneur.png" id="img" class="ig "/>
                <label for="customer">Entrepreneur</label>
              </div>
            </div>
        
            <div class="in-con">
              <input id="investor" type="radio" name="roles" value="investor">
              <div class="radio-tile">
                <img src="img/assets/investor1.png" class="ig"/>
                <label for="investor">Investor</label>
              </div>
            </div>

            <div class="in-con">
                <input id="customer" type="radio" name="roles" value="customer">
                <div class="radio-tile">

                  <img src="img/assets/customer.png" class="ig "/>
                  <label for="investor">Customer</label>
                </div>
              </div>

              <div class="in-con">
                <input id="distributor" type="radio" name="roles" value="distributor">
                <div class="radio-tile">

                  <img src="img/assets/distributor.png" class="ig "/>
                  <label for="investor">Distributor</label>
                </div>
              </div>
          </div>
          <div class="myrow">
            <a href="/"><div class="m-btn cancelbtn"><label class="cancel">Cancel</label></div></a>
          <button id="nextbtn" class="m-btn disabled" disabled type="submit">Next</button>
          </div>
    </form>
 
</div>
@endsection
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>  
<script src="js/roles.js"></script>


@endsection