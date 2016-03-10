<?php
$url = 'http://www.pravda.com.ua/rus/rss/view_news/';
$korrespondent_url = 'http://k.img.com.ua/rss/ru/news.xml';
$junk_content = ' - RSS';
include_once(getcwd().'/lib/simplepie/SimplePieAutoloader.php');
include_once(getcwd().'/lib/simplepie/idn/idna_convert.class.php');
$feed = new SimplePie();
$feed->set_feed_url($url);
$feed->init();
$feed->handle_content_type();

$korrespondent_feed = new SimplePie();
$korrespondent_feed->set_feed_url($korrespondent_url);
$korrespondent_feed->init();
$korrespondent_feed->handle_content_type();

function random_shit() {
    $options = [
    "... не смешите мои носки!",
    ", но зачем этот цирк?",
    ". Давайте сделаем вид, что нас это волнует!",
    ", думаете — это случайность?",
    ", но всем на это насрать.",
    ", но всем похуй!",
    ", но кого ебет чужое горе?",
    "... да всем насрать!",
    ", но всем как-то похуй.",
    ", но все клали хуй на это.",
    ". Совпадение? Не думаю!",
    ", впрочем, это всем до пизды!"];

    $num = array_rand($options);
    return $options[$num];
}


?>

<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <title>Достижения Украины всем похуй!</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Самые честные новости Украины!">
    <meta name="keywords" content="украина, украина в перде, суровая реальность, покращення">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    .hero-unit, .local-shit {
        padding: 10px;
    }
    </style>
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <!--
    <link rel="shortcut icon" href="assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
    -->

    <!-- Google Analytics -->
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-2935903-11', 'auto');
      ga('send', 'pageview');

    </script>
  </head>

  <body>

    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#">Всем похуй!</a>
          <div class="nav-collapse">
            <ul class="nav">
              <li class="active"><a href="#">Главная</a></li>
              <!-- <li><a href="http://mourk.com/">О сайте</a></li> -->
              <li><a href="http://mourk.com/contact/">Связаться</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">
        <h1>Главные украинские и мировые достижения всем похуй!</h1>
        <br />
        <p>По мотивам: <a href="<?php echo $feed->get_permalink(); ?>"><?php echo str_replace($junk_content, "", $feed->get_title()); ?></a> и  <a href="<?php echo $korrespondent_feed->get_permalink(); ?>"><?php echo str_replace($junk_content, "", $korrespondent_feed->get_title()); ?></a>.
        Впрочем, <a href="http://lurkmore.to/%D0%92%D1%81%D0%B5%D0%BC_%D0%BF%D0%BE%D1%85%D1%83%D0%B9">всем похуй</a>!</p>
    <hr />
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span9">
                <div class="local-shit">
                  <h2>Новости Украины</h2>
                <p><ul>
                  <?php
                /*
                Here, we'll loop through all of the items in the feed, and $item represents the current item in the loop.
                */
                foreach ($feed->get_items() as $item):
                ?>
                    <li><a href="<?php echo $item->get_permalink(); ?>"><?php echo $item->get_title(); ?><?=random_shit();?></a></li>
                <?php endforeach; ?>
                </ul></p>
                </div>
            </div><!--/.well -->
        </div><!--/span-->
    </div>

    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span9">
                <div class="hero-unit">
                <h2>Главные мировые новости</h2>
                <p><ul>
                  <?php
                /*
                Here, we'll loop through all of the items in the feed, and $item represents the current item in the loop.
                */
                foreach ($korrespondent_feed->get_items() as $item):
                ?>
                    <li><a href="<?php echo $item->get_permalink(); ?>"><?php echo $item->get_title(); ?><?=random_shit();?></a></li>
                <?php endforeach; ?>
                </ul></p>
                </div>
            </div><!--/.well -->
        </div><!--/span-->
    </div>

    <div class="row-fluid">
        <div class="span4">
            <a href="http://twitter.com/share" class="twitter-share-button" data-count="horizontal" data-via="ld100" data-lang="ru">Твитнуть</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
        </div><!--/span-->
        <div class="span4">
            <!-- Place this tag where you want the +1 button to render -->
            <g:plusone></g:plusone>

            <!-- Place this tag after the last plusone tag -->
            <script type="text/javascript">
              window.___gcfg = {lang: 'ru'};

              (function() {
                var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
                po.src = 'https://apis.google.com/js/plusone.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
              })();
            </script>
        </div><!--/span-->
        <div class="span4">
            <div id="fb-root"></div><script src="http://connect.facebook.net/ru_RU/all.js#xfbml=1"></script><fb:like href="" send="false" layout="button_count" width="150" show_faces="false" font=""></fb:like>
        </div><!--/span-->
    </div>

    </div> <!-- /container -->

  </body>
</html>
