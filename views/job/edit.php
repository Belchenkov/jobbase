<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Category;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $job app\models\job */
/* @var $form ActiveForm */
?>
<div class="job-edit">
    <h2 class="page-header">Редактировать вакансию</h2>
    <?php $form = ActiveForm::begin(); ?>
    <?php echo $form->errorSummary($job); ?>
    <?= $form->field($job, 'category_id')
        ->dropDownList(Category::find()
            ->select(['name', 'id'])
            ->indexBy('id')
            ->column(), ['prompt' => 'Выбрать категорию']);
    ?>
    <?= $form->field($job, 'title') ?>
    <?= $form->field($job, 'description')->textarea(['rows' => '6']) ?>
    <?= $form->field($job, 'type')->dropDownList([
        'full_time' => 'Полная занятость',
        'part_time' => 'Частичная занятость',
        'as_needed' => 'По мере необходимости'
    ],
        ['prompt' => 'Выбрать тип']) ?>
    <?= $form->field($job, 'requirements') ?>
    <?= $form->field($job, 'salary_range')->dropDownList([
        'До 20 тыс.' => 'До 20 тыс.',
        '20 тыс. - 40 тыс.' => '20 тыс. - 40 тыс.',
        '40 тыс. - 60 тыс.' => '40 тыс. - 60 тыс.',
        '60 тыс. - 80 тыс.' => '60 тыс. - 80 тыс.',
        '80 тыс. - 100 тыс.' => '80 тыс. - 100 тыс.',
        'Выше 100 тыс.' => 'Выше 100 тыс.'
    ],
        ['prompt' => 'Уровень заработной платы']) ?>
    <?= $form->field($job, 'city') ?>
    <?= $form->field($job, 'state') ?>
    <?= $form->field($job, 'zipcode') ?>
    <?= $form->field($job, 'contact_email') ?>
    <?= $form->field($job, 'contact_phone') ?>
    <?= $form->field($job, 'is_published')->radioList(array('1' => 'Yes', '0' => 'No')) ?>

    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div><!-- job-create -->
