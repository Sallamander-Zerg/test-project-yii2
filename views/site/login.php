<?php
use yii\helpers\Html;
use yii\web\View;
use \yii\widgets\ActiveForm;
/** @var yii\web\View $this */

View::registerCssFile('@web/css/style.css');
?>
<div class="form_wrapper">
  <div class="form_container">
    <div class="title_container">
      <h2>Responsive Registration Form</h2>
    </div>
    <div class="row clearfix">
      <div class="">
        <?php
          $form = ActiveForm::begin(['class'=>'form-horizontal']);
        ?>
          <div class="input_field"> <span><i aria-hidden="true" class="fa fa-envelope"></i></span>
            <?= $form->field($model,'name')->textInput(['autofocus'=>true]) ?>
          </div>
          <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i></span>
            <?= $form->field($model,'pasword')->passwordInput()?>
          </div>
          <button type="submit" class="button">login</button>
          <?php
            ActiveForm::end();
          ?>
      </div>
    </div>
  </div>
</div>