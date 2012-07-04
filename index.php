<?php
$url = 'http://sdelanounas.in.ua/index/rss/';
include_once(getcwd().'/lib/simplepie/SimplePieAutoloader.php');
include_once(getcwd().'/lib/simplepie/idn/idna_convert.class.php');
$feed = new SimplePie();
$feed->set_feed_url($url);
$feed->init();
$feed->handle_content_type();
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
        "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<title>Достижения Украины всем похуй!</title>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
</head>
<body>
 
	<div class="header">
		<h1><a href="<?php echo $feed->get_permalink(); ?>"><?php echo $feed->get_title(); ?></a> | <a href="http://lurkmore.to/%D0%92%D1%81%D0%B5%D0%BC_%D0%BF%D0%BE%D1%85%D1%83%D0%B9">всем похуй</a>></h1>
		<p><?php echo $feed->get_description(); ?></p>
	</div>
 
	<?php
	/*
	Here, we'll loop through all of the items in the feed, and $item represents the current item in the loop.
	*/
	foreach ($feed->get_items() as $item):
	?>
 
		<div class="item">
			<h2><a href="<?php echo $item->get_permalink(); ?>"><?php echo $item->get_title(); ?>, но всем похуй!</a></h2>
		</div>
 
	<?php endforeach; ?>
 
</body>
</html>