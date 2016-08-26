<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application "JobBase"';
?>
<div class="site-index">

    <?php if(null !== Yii::$app->session->getFlash('success')) : ?>
        <div class="alert alert-success"><?php echo Yii::$app->session->getFlash('success'); ?></div>
    <?php endif; ?>

    <div class="jumbotron">
        <h1>Нужна работа?</h1>

        <p class="lead">Просмотрите наши открытые вакансии или найдите сотрудников</p>

        <p>
            <a class="btn btn-lg btn-success" href="/index.php?r=job%2Findex">Просмотр вакансий</a>
            <a class="btn btn-lg btn-primary" href="/index.php?r=job/create">Создать вакансию</a>
        </p>
    </div>

    <div class="body-content">

        <div class="row text-center">
            <div class="col-lg-12 text-center">
                <h2>Чем мы здесь занимаемся?</h2>

                <p class="lead">У нас собраны все самые актуальные и свежие вакансии. <br>
                    Портал “JobBase” занимает одну из лидирующих позиций по количеству размещаемых вакансий.
                </p>

            </div>
        </div>

    </div>
</div>
