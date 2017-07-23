<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Friends of Satoshi | Verify</title>
        <meta name="description" content="Building a collaborative community." />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/about.combined.0001.css" rel="stylesheet" type="text/css" media="all" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:200,300,400,400i,500,600,700" rel="stylesheet">
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    </head>
    <body data-smooth-scroll-offset="77">
        <div class="nav-container">
            <div class="via-1500407324084" via="via-1500407324084" vio="Home Nav">
                <div class="bar bar--sm visible-xs">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-3 col-sm-2">
                                <a href="https://www.friendsofsatoshi.com"> <img class="logo logo-dark" alt="logo" src="img/fos-icon.png"> <img class="logo logo-light" alt="logo" src="img/fos-icon.png"> </a>
                            </div>
                            <div class="col-xs-9 col-sm-10 text-right">
                                <a href="#" class="hamburger-toggle" data-toggle-class="#menu2;hidden-xs hidden-sm"> <i class="icon icon--sm stack-interface stack-menu"></i> </a>
                            </div>
                        </div>
                    </div>
                </div>
                <nav id="menu2" class="bar bar-2 hidden-xs">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-2 text-center text-left-sm hidden-xs col-md-push-5">
                                <div class="bar__module">
                                    <a href="https://www.friendsofsatoshi.com" target="_self"> <img class="logo logo-dark" alt="logo" src="img/fos-icon.png"> <img class="logo logo-light" alt="logo" src="img/fos-icon.png"> </a>
                                </div>
                            </div>
                            <div class="col-md-5 col-md-pull-2">
                                <div class="bar__module">
                                    <ul class="menu-horizontal text-left">
                                        <li> <a href="about" target="_self">
                                        About</a> </li>
                                        <li> <a href="digital" target="_self">
                                        Digital</a> </li>
                                        <li> <a href="physical" target="_self">
                                        Physical</a> </li>
                                        <li> <a href="wall" target="_self">The Wall</a> </li>
                                        <li> <a href="contact" target="_self">
                                        Contact</a> </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-5 text-right text-left-xs text-left-sm">
                                <div class="bar__module">
                                    <a class="btn btn--sm type--uppercase" href="slack" target="_self"> <span class="btn__text">
                                    Join Slack<br></span> </a>
                                    <a class="btn btn--sm type--uppercase" href="verify" target="_self"> <span class="btn__text">
                                    Verify Coin<br></span> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <div class="main-container">
            <section class="bg--dark">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-10 col-md-8 col-sm-offset-1 col-md-offset-2">
                            <article>
                                <div class="article__title text-center">
                                    <h1 class="h2">Verify Friends of Satoshi Coin</h1>
     <?php


$input = $_REQUEST['search'];

if (!$input) {
	echo 'Please enter valid firstbits';
  echo '</br><a href=https://www.friendsofsatoshi.com/verify">Back</a>';
  exit;
}



$string = file_get_contents("coins.json");
$json_a = json_decode($string, true);


$coins = $json_a['founders'];



function find($coins, $input) {
  foreach($coins as $item) {
    $matches = preg_grep("/$input/", $item);
    if($matches) {
      return($item);
    }
  }
}

$found = (find($coins, $input));

if ($found) {

  echo '
  </br></br></br></br><div class="container"><div class="col-sm-6 col-sm-offset-3"><div class="panel-footer"><center>';
  echo 'Address: ' . $found['address'] . '</br>';
  echo 'Serial Number: ' . $found['serial'] . '</br>';
  echo 'Year: ' .$found['year'] . '</br>';
  echo 'Plating: ' . $found['plate'] . '</br>';
  echo 'Material: ' . $found['material'] . '</br>';
  echo 'Membership: ' . $found['membership'] . '</br>';

  $addressinfo = file_get_contents('https://blockchain.info/address/' . $found['address'] . '?format=json');
  $addressdecoded = json_decode($addressinfo, true);
  $bcbal = $addressdecoded['final_balance'] / 100000000;

  $txs = $addressdecoded['txs'];



  echo 'Balance: ' . $bcbal . '</br>';
  $USD = file_get_contents("https://blockchain.info/ticker");
  $price = json_decode($USD, true);
  $price1 = $price['USD']['last'];
  echo 'Total USD Value: ' . $bcbal * $price1 . '</br>';

  echo '</br><a href="https://www.friendsofsatoshi.com/verify">Back</a></center>
  </div></div></div>
  ';
}
else {
	echo 'No coins found';
  echo '</br><a href="https://www.friendsofsatoshi.com/verify">Back</a>';
}


?>

                            </article>
                        </div>
                    </div>
                </div>
            </section>
            <footer class="footer-7 text-center-xs">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6"> <span class="type--fine-print">© <span class="update-year">2017</span> Friends of Satoshi — Copyleft.</span>
                        </div>
                        <div class="col-sm-6 text-right text-center-xs">
                            <ul class="social-list list-inline">
                                <li><a href="https://www.youtube.com/channel/UCD_a4hqRUzIvtUv30QXYX5Q" target="_self"><i class="socicon icon socicon-youtube icon--xs"></i></a></li>
                                <li><a href="https://www.twitter.com/friendofsatoshi" target="_self"><i class="socicon socicon-twitter icon icon--xs"></i></a></li>
                                <li><a href="https://www.reddit.com/u/friendsofsatoshi" target="_self"><i class="socicon icon socicon-reddit icon--xs"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
       
        <script src="js/about.combined.0001.js"></script>
        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){ (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o), m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m) })(window,document,'script','https://www.google-analytics.com/analytics.js','ga'); ga('create', 'UA-85347747-1', 'auto'); ga('send', 'pageview');
        </script>

    </body>

</html>