<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html; ?>

    <h1>Новая категория блога</h1>


<?php
if (isset($errors)) { ?>
    <ul>
        <?php if (empty($errors)) { ?>
            <li>Запись успешно сохранена</li> <?php
        } else {
            foreach ($errors as $error) {
                foreach ($error as $item) {
                    ?>
                    <li><?php echo $item; ?></li>
                    <?php
                }
            }
        }
        ?>
    </ul>
    <?php
}
?>

<?php
$form = ActiveForm::begin(['id' => 'form', 'method' => 'POST',
    'action' => 'create',
    'options' => ['style' => 'width: 100%;', 'autocomplete' => 'off']
]); ?>
<?php echo $form->field($category, 'title'); ?>
<?php echo Html::submitButton('Отправить', ['class' => 'btn btn-primary']); ?>
<?php ActiveForm::end(); ?>