<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html; ?>

    <h1>Новая категория блога</h1>

<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            <div class="form">
				<?php
					$form = ActiveForm::begin(['id' => 'form', 'method' => 'POST',
					    'action' => 'create',
					    'options' => ['style' => 'width: 100%;', 'autocomplete' => 'off']
					]); 
					
					echo $form->errorSummary($category);
				?>
				
				<?php echo $form->field($category, 'name'); ?>
				
				<?php echo Html::submitButton('Отправить', ['class' => 'btn btn-primary']); ?>
				<?php ActiveForm::end(); ?>
	
			</div>
		</div>
	</div>
</div>