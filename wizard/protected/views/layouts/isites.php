<?php
$host = "http://".$_SERVER['HTTP_HOST'];
?>
<html lang="en">
<head>    
</head>
<body>
	
	<titlebar>
		<icon state="edit">
			<title>Edit</title>
			<request>policy/selection</request>
			<image>edit_icon.jpg</image>
			<permission>15</permission>
		</icon>
	</titlebar>

<?php if($_SERVER['WEBROOTS_ENV'] == 'development' || $_SERVER['WEBROOTS_ENV'] == 'staging'){ ?>
	<style>
		<?php include("css/bootstrap-isites.css"); ?>
	</style>
	<script src="http://twitter.github.com/bootstrap/assets/js/bootstrap.js"></script>
<?php } else { ?>
	<link href="<?php echo $host; ?>/css/bootstrap-isites.css" rel="stylesheet" type="text/css"/>
    <script src="<?php echo $host; ?>/js/bootstrap.js"></script>
<?php } ?>	

	
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <!--
	<link rel="shortcut icon" href="<?php echo $host; ?>/ico/favicon.ico"/>
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo $host; ?>/ico/apple-touch-icon-144-precomposed.png"/>
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $host; ?>/ico/apple-touch-icon-114-precomposed.png"/>
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $host; ?>/ico/apple-touch-icon-72-precomposed.png"/>
    <link rel="apple-touch-icon-precomposed" href="<?php echo $host; ?>/ico/apple-touch-icon-57-precomposed.png"/>
	-->
	
	<script>
	topicId = "<?php echo $_REQUEST['topicId']; ?>";
	pageContentId = "<?php echo $_REQUEST['pageContentId']; ?>";
	</script>

    <div class="bootstrapped">

		<?php echo $content; ?>

    </div> <!-- /container -->

  </body>
</html>
