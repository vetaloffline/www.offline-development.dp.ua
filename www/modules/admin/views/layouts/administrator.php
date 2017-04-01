 <?
use app\assets\AppAsset;
AppAsset::register($this);
 ?>
<?php $this->beginPage() ;?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>offlines</title>
	 <?php $this->head() ?>
</head>
 <?php $this->beginBody() ?>
<body>
	<div id="body_home">
		<div id="body_head">
			<nav class="navbar navbar-inverse">
				<div class="container-fluid">
					<div class="navbar-header">
						<a class="navbar-brand" href="/">Выход</a>
					</div>
					<ul class="nav navbar-nav">
						<li><a href="/web/admin/orders">Список заказов</a></li>
						<li><a href="/web/admin/katalog/index">Каталог</a></li>
						<li><a href="/web/admin/users/index">Настройки пользователей</a></li>
						<li><a href="/web/admin/goodadd/index">Добавить товар</a></li>
					</ul>
				</div>
			</nav>
		</div>
		<div id="body_body">
			<div id="center_body">
				<div class="container-fluid">
					<div class="row content">
						<div class="col-sm-3 sidenav">
							<ul class="nav nav-pills nav-stacked menu_navbar">
								<li class="li_menu_admin"><a href="/web/admin/katalog/index">Каталог</a></li>
								<li class="li_menu_admin"><a href="/web/admin/goodadd/index">Добавить товар</a></li>
								<li class="li_menu_admin"><a href="/web/admin/orders">Список заказов</a></li>
								<li class="li_menu_admin"><a href="/web/admin/users/index">Пользователи</a></li>
							</ul><br>
						</div>
						<div class="conten_main">
						 <?= $content ?>
						</div>

					</div>

				</div>
			</div>
		</div>
	</div>
<?php $this->endBody()?>
</body>
</html>
<?php $this->endPage()?>


