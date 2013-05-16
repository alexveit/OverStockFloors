<?php if (isset($_SERVER['HTTP_USER_AGENT']) && !strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 6')) echo '<?xml version="1.0" encoding="UTF-8"?>'. "\n"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="<?php echo $direction; ?>" lang="<?php echo $lang; ?>" xml:lang="<?php echo $lang; ?>">
<head>
<?php include "include_header.tpl"; ?>
<title><?php echo $title; ?></title>
<base href="<?php echo $base; ?>" />
<?php if ($description) { ?>
<meta name="description" content="<?php echo $description; ?>" />
<?php } ?>
<?php if ($keywords) { ?>
<meta name="keywords" content="<?php echo $keywords; ?>" />
<?php } ?>
<?php if ($icon) { ?>
<link href="<?php echo $icon; ?>" rel="icon" />
<?php } ?>
<?php foreach ($links as $link) { ?>
<link href="<?php echo $link['href']; ?>" rel="<?php echo $link['rel']; ?>" />
<?php } ?>
<link rel="stylesheet" type="text/css" href="catalog/view/theme/orange3/stylesheet/stylesheet.css" />
<?php foreach ($styles as $style) { ?>
<link rel="<?php echo $style['rel']; ?>" type="text/css" href="<?php echo $style['href']; ?>" media="<?php echo $style['media']; ?>" />
<?php } ?>
<script type="text/javascript" src="catalog/view/javascript/jquery/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="catalog/view/javascript/jquery/ui/jquery-ui-1.8.16.custom.min.js"></script>
<link rel="stylesheet" type="text/css" href="catalog/view/javascript/jquery/ui/themes/ui-lightness/jquery-ui-1.8.16.custom.css" />
<script type="text/javascript" src="catalog/view/javascript/jquery/ui/external/jquery.cookie.js"></script>
<script type="text/javascript" src="catalog/view/javascript/jquery/colorbox/jquery.colorbox.js"></script>
<link rel="stylesheet" type="text/css" href="catalog/view/javascript/jquery/colorbox/colorbox.css" media="screen" />
<script type="text/javascript" src="catalog/view/javascript/jquery/tabs.js"></script>
<script type="text/javascript" src="catalog/view/javascript/common.js"></script>
<?php foreach ($scripts as $script) { ?>
<script type="text/javascript" src="<?php echo $script; ?>"></script>
<?php } ?>
<!--[if IE 7]>
<link rel="stylesheet" type="text/css" href="catalog/view/theme/orange3/stylesheet/ie7.css" />
<![endif]-->
<!--[if lt IE 7]>
<link rel="stylesheet" type="text/css" href="catalog/view/theme/orange3/stylesheet/ie6.css" />
<script type="text/javascript" src="catalog/view/javascript/DD_belatedPNG_0.0.8a-min.js"></script>
<script type="text/javascript">
DD_belatedPNG.fix('#logo img');
</script>
<![endif]-->
<?php echo $google_analytics; ?>
</head>
<body>

<div id="header">
  <?php if ($logo) { ?>
  <div id="logo"><a href="<?php echo $home; ?>"><img src="<?php echo $logo; ?>" title="<?php echo $name; ?>" alt="<?php echo $name; ?>" /></a></div>
  
  <div id="currency"><img src="/catalog1/image/data/flag.gif" alt="American Flag" width="151" height="95" />
  </div>

  <div id="cart">
  <div class="heading">
    <h4>Overstock Floors etc.</h4>
    American owned and operated with 20 years <br />of experience in the flooring business.
<br />Check our <a href="http://www.kudzu.com/m/Overstock-Floors-Etc.-25174450/reviews/" target="_blank">testimonials!</a> </div>
<!--  
<div class="content">
        <div class="empty">This is a drop down</div>
      </div>
-->
</div>
<div id="search">
    <div class="button-search"></div>
        <input type="text" name="filter_name" value="Search" onclick="this.value = '';" onkeydown="this.style.color = '#000000';" />
	<h3>Call us for a free estimate! 770-781-4114
	<a href="https://www.facebook.com/overstock.floors?fref=ts'" target="_blank">
	<table border="0" align="right">
		<tbody>
			<tr>
				<td>Follow us on </td>
				<td>
					<img src="http://overstockfloorsetc.com/catalog/view/theme/orange3/image/facebookicon.png" height="24" width="24" />
				</td>
			</tr>
		  </tbody>
	</table>
	</a>
	<!-- <iframe src="//www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2Foverstock.floors%3Ffref%3Dts&amp;send=false&amp;layout=button_count&amp;width=450&amp;show_faces=true&amp;font=arial&amp;colorscheme=light&amp;action=like&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:450px; height:21px;" allowTransparency="true"></iframe> -->
	</h3>
</div>
<!-- 
  <div id="welcome">
        Welcome visitor you can <a href="http://www.overstockfloorsetc.com/catalog1/index.php?route=account/login">login</a> or <a href="http://www.overstockfloorsetc.com/catalog1/index.php?route=account/register">create an account</a>.      </div>
  <div class="links">
</div>
-->
</div>

<div id="menu">
	<div class="menu">
		<ul>
			<li><a href="<?php echo $home; ?>">Home</a></li>
			<?php foreach ($categories as $category) { ?>
			<li><a href="<?php echo $category['href']; ?>"><?php echo $category['name']; ?></a>
			<?php if ($category['children']) { ?>
			<div>
				<?php for ($i = 0; $i < count($category['children']);) { ?>
				<ul>
				<?php $j = $i + ceil(count($category['children']) / $category['column']); ?>
				<?php for (; $i < $j; $i++) { ?>
				<?php if (isset($category['children'][$i])) { ?>
				<li><a href="<?php echo $category['children'][$i]['href']; ?>"><?php echo $category['children'][$i]['name']; ?></a></li>
				<?php } ?>
				<?php } ?>
				</ul>
				<?php } ?>
			</div>
			<?php } ?>
			</li>
			<?php } ?>
		</ul>
	</div>
</div>
<div id="container">
<?php } ?>
<div id="notification"></div>
<div id="mainsite">