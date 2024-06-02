<?php
use yii\helpers\Html;
use yii\web\View;
/** @var yii\web\View $this */

$this->title = 'My Yii Application';

View::registerCssFile('@web/css/style.css');
?>
<div class="form_wrapper">
  <div class="form_container">
    <div class="title_container">
      <h2>Responsive Registration Form</h2>
    </div>
    <div class="row clearfix">
      <div class="">
        <form>
          <div class="input_field"> <span><i aria-hidden="true" class="fa fa-envelope"></i></span>
            <input type="text" name="login" placeholder="Login" required />
          </div>
          <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i></span>
            <input type="password" name="password" placeholder="Password" required />
          </div>
          <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i></span>
            <input type="password" name="password" placeholder="Re-type Password" required />
          </div>
          <input class="button" type="submit" value="Register" />
        </form>
      </div>
    </div>
  </div>
</div>
<p class="credit">Developed by <a href="http://www.designtheway.com" target="_blank">Design the way</a></p>