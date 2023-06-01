@extends('layouts.customheader')

@section('links')
<link rel="stylesheet" href="css/landing.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
@endsection
@section('body')
<div class="box">
<main class="intro">
    <div class="container">
        <div class="descript">
            <div class="descrpTitles">
                <h1>It is Your Time to Change the Future</h1>
            </div>
            <div class="descrpText">
                A small description of some sort i guess... I cant think of anything right now. Lets add that later with of effects too XD XD
            </div>
            <div class="btnDiv">
                <div class="btn" id="bigBtn">Get Started</div>
            </div>
            

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
        <h1 >What We Offer At Empower Lanka :</h1>
        <div class="cardContainer houdini">
            
            <div class="card">
                <div class="cardimg"><img src="img/promotion.png" alt="investor"/></div>
                
                <p>Need to write some bullshit filler text here </p>
            </div>
            <div class="card">
       
                <div class="cardimg"><img src="img/investor.png" alt="investor"/></div>
                <p>A platform to find potential investors to kickout you idea to success !</p>
            </div>
            <div class="card">
             
                <div class="cardimg"><img src="img/ads.png" alt="investor"/></div>
                <p>Need to write some bullshit filler text here </p>
            </div>
        </div>
    </div>
   
    
</section>

<footer>
    <div class="footerContent">
        <hr/>
        <div class="summary">Register now and join the community <span class="ftSignup">Sign up</span></div>
    
        <div class="socialTxt">You can also find us in :</div>
        <div class="sociallinks">
            <div class="social"><img src="img/facebook.png" alt=""/></div>
            <div class="social"><img src="img/twitter.png" alt=""/></div>
            <div class="social"><img src="img/youtube.png" alt=""/></div>
            <div class="social"><img src="img/linkedin.png" alt=""/></div>
        </div>
        <div class="tail">
            <p>&copy;2023 copyright : EmpowerLanka : Fantastic 4</p>
        </div>
    </div>
</footer>  
@endsection
@section('scripts')
<script src="/js/landing.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"></script>
@endsection