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
			<request>tools/index</request>
			<image>edit_icon.jpg</image>
			<permission>15</permission>
		</icon>
	</titlebar>

	
	<link href="http://twitter.github.com/bootstrap/assets/css/bootstrap.css" rel="stylesheet" type="text/css"/>
    <link href="http://twitter.github.com/bootstrap/assets/css/bootstrap-responsive.css" rel="stylesheet" type="text/css"/>

<!--
	<link href="<?php echo $host; ?>/css/bootstrap.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $host; ?>/css/bootstrap-responsive.css" rel="stylesheet" type="text/css"/>
-->
<!--
	<link href="<?php echo $host; ?>/css/isites-fix.css" rel="stylesheet" type="text/css"/>
-->
	
	

	
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
    <script src="<?php echo $host; ?>/js/jquery-1.7.2.min.js"></script>

    <script src="http://twitter.github.com/bootstrap/assets/js/bootstrap.js"></script>

<!--
    <script src="<?php echo $host; ?>/js/bootstrap.js"></script>
-->

<style>
.icon-replace {
	background-color: inherit;
	background-repeat: no-repeat;
	border-bottom: none;
	display: block;
	height: 16px;
	text-decoration: none;
	text-indent: -1000em;
	width: 16px;
	background-position: 0 0;
}

.icon-replace-inline {
	background-color: inherit;
	background-repeat: no-repeat;
	border-bottom: none;
	display: inline-block;
	height: 16px;
	text-decoration: none;
	text-indent: -1000em;
	width: 16px;
}

.icon-notification {
	background-repeat: no-repeat;
	background-position: 0 0;
}

/* Action icon classes */

.act-add {
    background-image: url("/js/isites/resources/images/add.png");
}

.act-delete {
	background-image: url("/js/isites/resources/images/fugue/cross-circle.png");
}

.act-destroy {
	background-image: url("/js/isites/resources/images/cross.png");
}

.act-edit {
	background-image: url("/js/isites/resources/images/pencil.png");
}

.act-maximize {
	background-image: url("/js/isites/resources/images/fugue/application-resize-full.png");
}

.act-minimize {
	background-image: url("/js/isites/resources/images/fugue/application-resize-actual.png");
}

.act-print {
	background-image: url("/js/isites/resources/images/printer.png");
}

.act-info {
	background-image: url("/js/isites/resources/images/fugue/information.png");
}

.act-help {
	background-image: url("/js/isites/resources/images/help.png");
}

.act-upload {
	background-image: url("/js/isites/resources/images/fugue/drive-upload.png");
}



/* Standard icon classes */

.ico-create-folder {
	background-image: url("/js/isites/resources/images/folder_add.png");
}

.ico-create-link {
	background-image: url("/js/isites/resources/images/fugue/_overlay/chain--plus.png");
}

.ico-reorder {
	background-image: url("/js/isites/resources/images/arrow_switch.png");
}



.ico-announcement {
    background-image: url("/js/isites/resources/images/fugue/megaphone.png");
}

.ico-calendar {
    background-image: url("/js/isites/resources/images/calendar.png");
}

.ico-comment {
    background-image: url("/js/isites/resources/images/comment.png");
}

.ico-comments {
    background-image: url("/js/isites/resources/images/comments.png");
}

.ico-dir {
	background-image: url("/js/isites/resources/images/folder.png");
}

.ico-download {
	background-image: url("/js/isites/resources/images/fugue/drive-download.png");
}

.ico-email {
    background-image: url("/js/isites/resources/images/email.png");
}

.ico-event {
    background-image: url("/js/isites/resources/images/date.png");
}

.ico-feed {
	background-image: url("/js/isites/resources/images/ico-feed.gif");
}
.ico-feed-save {
	background-image: url("/js/isites/resources/images/ico-feed.gif");
	padding-left: 14px;
	background-position: 0 .3em;
}

.ico-file {
	background-image: url("/js/isites/resources/images/page.png");
}

.ico-image {
	background-image: url("/js/isites/resources/images/fugue/image.png");
}

.ico-link {
	background-image: url("/js/isites/resources/images/fugue/chain.png");
}

.ico-link-hidden {
	background-image: url("/js/isites/resources/images/fugue/overlay/chain--minus.png");
}

.ico-lock {
    background-image: url("/js/isites/resources/images/fugue/lock.png");
}

.ico-preferences {
    background-image: url("/js/isites/resources/images/page_white_wrench.png");
}

.ico-notifications {
    background-image: url("/js/isites/resources/images/bell_yellow.png");
}

.ico-notifications-off {
    background-image: url("/js/isites/resources/images/bell_gray.png");
}

.ico-person {
	background-image: url("/js/isites/resources/images/fugue/user.png");
}

.ico-unlock {
    background-image: url("/js/isites/resources/images/fugue/lock-unlock.png");
}

.ico-video {
    background-image: url("/js/isites/resources/images/film.png");
}

.ico-wiki {
    background-image: url("/js/isites/resources/images/plugin_edit.png");
}

.ico-success {
	background-image: url("/js/isites/resources/images/tick.png");
}

.ico-failure {
	background-image: url("/js/isites/resources/images/exclamation.png");
}

.ico-loading {
	background-image: url("/js/ext/resources/images/default/grid/grid-loading.gif");
}

/* Nav icons */

.nav-arrow-left {
	background-image: url("/js/isites/resources/images/arrow_left.png");
}

.nav-arrow-down {
	background-image: url("/js/isites/resources/images/arrow_down.png");
}

.nav-arrow-up {
	background-image: url("/js/isites/resources/images/arrow_up.png");
}

.nav-arrow-right {
	background-image: url("/js/isites/resources/images/arrow_right.png");
}

.nav-arrow-move {
	background-image: url("/js/isites/resources/images/arrow-move.gif");
}

.nav-dir-up {
	background-image: url("/js/isites/resources/images/folder-up.png");
}

/* Notification Icons - deprecated in favor of the ico classes above */		

.notify-file {
	background: url("/js/isites/resources/images/page.png") no-repeat 0 0;	
} 	
.notify-discussion {
	background: url("/js/isites/resources/images/comments.png") no-repeat 0 0;
} 	
.notify-announcement {
	background: url("/js/isites/resources/images/fugue/megaphone.png") no-repeat 0 0;
} 	
.notify-event {
	background: url("/js/isites/resources/images/date.png") no-repeat 0 0;
}
.notify-video {
	background: url("/js/isites/resources/images/film.png") no-repeat 0 0;
}
/* END Icons */
</style>
    <div class="container">

		<?php echo $content; ?>

    </div> <!-- /container -->

  </body>
</html>
