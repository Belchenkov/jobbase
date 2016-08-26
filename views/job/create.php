<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Category;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $job app\models\job */
/* @var $form ActiveForm */
?>
<div class="job-create">
    <h2 class="page-header">Создать вакансию</h2>
    <?php $form = ActiveForm::begin(); ?>
        <?php echo $form->errorSummary($job); ?>
        <?= $form->field($job, 'category_id')->label('Категория')
                    ->dropDownList(Category::find()
                        ->select(['name', 'id'])
                        ->indexBy('id')
                        ->column(), ['prompt' => 'Выбрать категорию']);
        ?>
        <?= $form->field($job, 'title')->label('Заголовок') ?>
        <?= $form->field($job, 'description')->textarea(['rows' => '6'])->label('Описание') ?>
        <?= $form->field($job, 'type')->label('Тип занятости')->dropDownList([
            'full_time' => 'Полная занятость',
            'part_time' => 'Частичная занятость',
            'as_needed' => 'По мере необходимости'
        ],
        ['prompt' => 'Выбрать тип']) ?>
        <?= $form->field($job, 'requirements')->textarea(['rows' => '6'])->label('Требования') ?>
    <?= $form->field($job, 'salary_range')->label('Уровень зарплаты')->dropDownList([
        'До 20 тыс.' => 'До 20 тыс.',
        '20 тыс. - 40 тыс.' => '20 тыс. - 40 тыс.',
        '40 тыс. - 60 тыс.' => '40 тыс. - 60 тыс.',
        '60 тыс. - 80 тыс.' => '60 тыс. - 80 тыс.',
        '80 тыс. - 100 тыс.' => '80 тыс. - 100 тыс.',
        'Выше 100 тыс.' => 'Выше 100 тыс.'
    ],
        ['prompt' => 'Выберете заработную плату']) ?>
        <?= $form->field($job, 'city')->label('Город') ?>
        <?= $form->field($job, 'state')->label('Адрес') ?>
        <?= $form->field($job, 'zipcode')->label('Почтовый индекс') ?>
        <?= $form->field($job, 'contact_email')->label('Почта') ?>
        <?= $form->field($job, 'contact_phone')->label('Телефон') ?>
        <?= $form->field($job, 'is_published')->label('Видна всем?')->radioList(array('1' => 'Да', '0' => 'Нет')) ?>

        <div class="form-group">
            <?= Html::submitButton('Опубликовать', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- job-create -->
