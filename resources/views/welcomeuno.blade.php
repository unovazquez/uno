<!DOCTYPE html>
<!-- /ht Paul Irish - http://front.ie/j5OMXi -->
<!--[if lt IE 7 ]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if IE 9 ]>    <html class="no-js ie9 oldie" lang="en"> <![endif]-->
<!--[if (gte IE 10)|!(IE)]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->


<head>
    <meta charset="utf-8">

    <title>uno</title>



    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
    <link rel="apple-touch-icon-precomposed" href="images/apple-touch-icon-precomposed.png" />

    <link href='css/all.css' rel='stylesheet' type='text/css'>
    <link href='css/style.css' rel='stylesheet' type='text/css'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css' rel='stylesheet' type='text/css'>

    <script src="../ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script>
    window.jQuery || document.write('<script src="js/jquery-1.7.2.min.js"><\/script>')
    </script>
    <script src="js/plugins.js"></script>
    <script src="js/script.js"></script>

</head>
<div id="contact">
   <div class="contactoClose">x</div>

  <form id="enviarMail" action="" class="formContacto">
            <div class="spaceContact">
              <label for="name">Name:</label>
              <input required="" id="inputContacto" type="text" name="nameMail">
            </div>
            <div class="spaceContact">
              <label for="email">Email:</label>
              <input required="" id="inputContacto" type="email" name="fromMail">
            </div>
            <div class="spaceContact">
              <label for="textarea">Menssage:</label>
              <textarea id="textContacto" cols="40" rows="4" name="messageMail"></textarea>
            </div>
            <div class="spaceContact">
              <input name="sendMail" type="submit" class=" sendBtn" value="SEND">
            </div>
  <div id="gracias">
        
  </div>
          </form>


</div>

<body class="monsanto">

    <!--[if lt IE 8]>
    <p class="browsehappy">You are using an outdated browser. <br>Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

    <div id="experience">
        <canvas id="lines"></canvas>
    </div>

    <audio id="bgMusic" controls autoplay>
        <source src="http://entro.co/music/936Hz.mp3" type="audio/mpeg">
            Your browser does not support the audio element.
    </audio>
    <div class="sectionOne">
        <div class="ezqUR"></div>
        <div class="ezqUL"></div>
        <div class="ezqDR"></div>
        <div class="ezqDL"></div>
        <a href="javascript:void(0)" class="btn btn-default audioBtn" data-toggle="tooltip" title="Preview" onclick="aud_play_pause()"><i id="stateicon" class="fa fa-play pointer"></i></a>
        <div class="contacto pointer"><img src="img/unoxLogo.png" alt="" /> contact</div>

        <div class="IntroText">
            <div class="logo">
                <img class="loginho" src="img/unoxxLogo.png" alt="" />
            </div>


           <!--  <table class="menu">
               <tr>
                   <td><a href="#" class="pointer">about us</a>
                   </td>
                   <td><a href="#work" class="pointer">our work</a>
                   </td>
                   <td><a href="#special" class="pointer">special services</a>
                   </td>
                   <td><a href="#rentals" class="pointer">production rentals</a>
                   </td>
                   <td><a href="#workWithUs" class="pointer">work with us</a>
                   </td>
               </tr>
           </table> -->

            <div class="welcome">
            <h2>
                <div id="biggerH2"> UNO OPEN GOVERNMENT</div>
                
            </h2>    
                <h2>
                    <div id="weWant">EXPECT US</div>
                </h2>
                <div align="center">
                @if(!\Auth::check())
                  <a class="pointer myButton"  href="{{ url('/register') }}">Register</a>
                  <a class="pointer myButton" href="{{ url('/login') }}">Login</a>
                @else
                  <h4>Welcome {{\Auth::user()->name}} , you are now logged in. <br>{{\Auth::user()->email}}</h4>
                @endif
                </div>
            </div>
        </div>
        <div class="footerOne">
        
            
            <a class="pointer" href="https://twitter.com/entrolopitecus" target="_blank"><img src="img/unoxLogo.png" alt="" /></a>
            
        </div>
      
    </div>


    <div id="bigLetter">
    </div>

<!--     <nav id="menu">
    <ul>
        <li id="navWork" class="navLink">
            <a href="#work" class="cf">
                <span class="navLinkDivis"></span>
                <span class="navInner">
                        <span class="navInnerText">
                            UNO
                        </span>
                </span>
                <span class="navLinkDivis"></span>
            </a>
        </li>

        <li id="navSpecial" class="navLink">
            <a href="#special" class="cf">
                <span class="navLinkDivis"></span>
                <span class="navInner">
                <span class="navInnerText">
                
                </span>
                </span>
                <span class="navLinkDivis"></span>
            </a>

        </li>

        <li id="navRentals" class="navLink">

            <a href="#rentals" class="cf">
                <span class="navLinkDivis"></span>
                <span class="navInner">
                <span class="navInnerText">
                    production rentals
                </span>
                </span>
                <span class="navLinkDivis"></span>
            </a>

        </li>




        <li id="navWorkW" class="navLink">

            <a href="#workWithUs" class="cf">
                <span class="navLinkDivis"></span>
                <span class="navInner">
                <span class="navInnerText">
                    work with us
                </span>
                </span>
                <span class="navLinkDivis"></span>
            </a>

        </li>
    </ul>
</nav>
 -->
    <div class="picaOjos">
        <div class="logoX">
        <img src="img/unoxLogo.png" alt="" />
        </div>
        
    </div>

    <script src="js/index.js"></script>

    <script type="text/javascript">
    $("#enviarMail").submit(function(){
  var formData = new FormData($(this)[0]);
  $.ajax({
    url: 'sendMail.php',
    type: 'POST',
    data: formData,
    async: false,
    success: function(data) {
      $('#gracias').html(data);
    },
    cache: false,
    contentType: false,
    processData: false
  });
  return false;
});

    </script>

    <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-69039707-1', 'auto');
  ga('send', 'pageview');

</script>

</body>

</html>
