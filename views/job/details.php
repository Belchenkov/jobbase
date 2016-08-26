<a href="/index.php?r=job" class="btn btn-primary">Вернуться к вакансиям</a>

<h2 class="page-header">
    <?php echo $job->title; ?> <br>
    <small><?php echo $job->city; ?> <?php echo $job->state; ?></small>
    <span class="pull-right">
        <a href="index.php?r=job/edit&id=<?php echo $job->id; ?>" class="btn btn-warning">Редактировать</a>
        <a href="index.php?r=job/delete&id=<?php echo $job->id; ?>" class="btn btn-danger">Удалить</a>
    </span>
</h2>

<?php if(!empty($job->description)) : ?>
    <div class="well">
        <h4>Описание вакансии</h4>
        <?php echo $job->description; ?>
    </div>
<?php endif; ?>

<ul class="list-group">
    <?php if( !empty($job->create_date) ) :?>
        <?php $phpdate = strtotime($job->create_date); ?>
        <?php $formatted_date = date("F j, Y, g:i a", $phpdate); ?>
        <li class="list-group-item"><strong>Дата публикации: </strong><?php echo $job->create_date; ?></li>
    <?php endif;?>

    <?php if( !empty($job->category->name) ) :?>
        <li class="list-group-item"><strong>Категория: </strong><?php echo $job->category->name; ?></li>
    <?php endif;?>

    <?php if( !empty($job->type) ) :?>
        <li class="list-group-item"><strong>Тип занятости: </strong><?php echo $job->type; ?></li>
    <?php endif;?>

    <?php if( !empty($job->salary_range) ) :?>
        <li class="list-group-item"><strong>Уровень зарплаты: </strong><?php echo $job->salary_range; ?></li>
    <?php endif;?>


    <?php if( !empty($job->contact_email) ) :?>
        <li class="list-group-item"><strong>Электронная почта: </strong><?php echo $job->contact_email; ?></li>
    <?php endif;?>

    <?php if( !empty($job->contact_phone) ) :?>
        <li class="list-group-item"><strong>Контактный телефон: </strong><?php echo $job->contact_phone; ?></li>
    <?php endif;?>
</ul>

<a href="mailto:<?php echo $job->contact_email; ?>" class="btn btn-info">Отправить резюме</a>
