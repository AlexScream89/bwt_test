<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="/css/main.css">
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="/css/signin.css">
	<link rel="stylesheet" type="text/css" href="/css/starter-template.css">
	<script src="/js/jquery.js"></script>
	<script src="/js/jquery.validate.js"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<script src='https://www.google.com/recaptcha/api.js'></script>
	<title>BWT TEST</title>
</head>

<body>
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container">
		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav">
				<li class="active"><a href="/">Главная</a></li>
				<li><a href="/weather">Погода</a></li>
				<li><a href="/contact">Контакты</a></li>
				<li><a href="/message">Сообщения</a></li>
			</ul>
		</div><!--/.nav-collapse -->
	</div>
</div>

<div class="container">
	<?php if (\App\Models\Model_User::is_auth()) { ?>
	<div class="col-md-1 col-md-offset-11">
		<a href="/auth/logout" class="btn btn-danger">Выйти</a>
	</div>
	<?php } ?>
	<div class="starter-template">
		<?php
		include ($contentPage);
		?>
	</div>
</div>

</body>
</html>