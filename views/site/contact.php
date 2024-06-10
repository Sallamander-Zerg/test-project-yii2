<?php

use yii\bootstrap5\Html;
?>
<!DOCTYPE html>
<html>
<head>
  <title>Страница пользователя</title>
</head>
<body>
  <h1>Страница пользователя <?= $userData[0]['name'] ?></h1>

  <div class="user-info">
    <p>роль: <?=$userData[0]['userRules']?></p>
  </div>
  <?php
if($userData[0]['userRules']!="admin"){
    echo'<table>
    <thead>
      <tr>
        <th>Имя</th>
        <th>Действия(доступно только администратору)</th>
      </tr>
    </thead>';
}else{
  echo'<table>
    <thead>
      <tr>
        <th>Имя</th>
        <th>Статус</th>
        <th>Действия</th>
      </tr>
    </thead>';
}
foreach($allUser as $User){
  echo'<tbody>
  <tr>
    <td>'.$User['name'].'</td>
    <td>';
  if($userData[0]['userRules']=="admin"){
     echo'<select>
        <option value="active">Работает</option>
        <option value="inactive">Уволен</option>
      </select>';
  }
    echo '</td>
    <td>'.
    ($userData[0]['userRules'] == "admin")? '<button type="button" onclick="">Редактировать</button>' : '<button type="button" onclick="" disabled>Редактировать</button>'.'</td>
  </tr>
  </tbody>';
}
echo '</table>';
  ?>
</body>
</html>
