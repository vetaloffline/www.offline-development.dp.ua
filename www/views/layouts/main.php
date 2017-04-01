<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
//use Yii;

AppAsset::register($this);
?>
<?php $this->beginPage() ;
if (!Yii::$app->request->cookies->getValue('Cart')) {
            Yii::$app->response->cookies->add(new \yii\web\Cookie([
                'name' => 'Cart',
                'expire' => time() + 99*99*99*99,
            ]));
        }

      
?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
<?
$session = Yii::$app->session;
$session->open();
$role = $session['roles'];
$session->close();
if ($role == 10) {
    $admin = true;
}

?>
    <?php $ssss = true;
    NavBar::begin([
        'brandLabel' => 'Offlines',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Главная', 'url' => ['/site/index']],
            ['label' => 'О нас', 'url' => ['/site/about']],
           // ['label' => 'Контакты', 'url' => ['/site/contact']],
              ['label' => 'Каталог', 'url' => ['/katalog/main']],
              ['label' => 'Корзинка', 'url' => ['/cart/index']],

              Yii::$app->user->isGuest ? (
                            ''
                        ) : ( ['label' => 'Профиль', 'url' => ['/profile/index']] ),
            !$admin ? (
                            ''
                        ) : ( ['label' => 'Admin', 'url' => ['/admin/default']] ),
            Yii::$app->user->isGuest ? (
                            ['label' => 'Регистрация', 'url' => ['/site/singup']]
                        ) : ( '' ),

            Yii::$app->user->isGuest ? (
                ['label' => 'Авторизация', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Выход (' . Yii::$app->user->identity->name . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>
<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody()  ;?>
</body>
</html>
<?php $this->endPage() ?>
