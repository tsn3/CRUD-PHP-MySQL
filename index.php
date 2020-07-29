<?php
require 'db.php';
$sql = 'SELECT * FROM users';
$statement = $connection->prepare($sql);
$statement->execute();
$people = $statement->fetchAll(PDO::FETCH_OBJ);
 ?>
<?php
require 'db.php';
$sql = 'SELECT * FROM course';
$statement = $connection->prepare($sql);
$statement->execute();
$lessons = $statement->fetchAll(PDO::FETCH_OBJ);
?>
<?php require 'header.php'; ?>
<div class="container">
   <div class="card mt-5">
        <div class="card-header">
            <h2>Курсы</h2>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>

                    <th>Преподаватель</th>
                    <th>Курс</th>
                    <th>Управление</th>
                </tr>
                <?php foreach($lessons as $lesson): ?>
                    <tr>

                        <td><?= $lesson->teacher; ?></td>
                        <td><?= $lesson->course; ?></td>
                        <td>
                            <a href="edit_course.php?id=<?= $lesson->id ?>" class="btn btn-info">Редактировать</a>
                            <a onclick="return confirm('Вы уверены, что хотите удалить эту запись?')" href="delete_course.php?id=<?= $lesson->id ?>" class='btn btn-danger'>Удалить</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
   </div>
  <div class="card mt-5">
    <div class="card-header">
      <h2>Ученики</h2>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <tr>
          <th>Фамилия</th>
          <th>Имя</th>
          <th>Email</th>
          <th>Фотография</th>
          <th>Управление</th>
        </tr>
        <?php foreach($people as $person): ?>
          <tr>
            <td><?= $person->surname; ?></td>
            <td><?= $person->name; ?></td>
            <td><?= $person->email; ?></td>
            <td><?= $person->name; ?></td>
            <td>
              <a href="edit.php?id=<?= $person->id ?>" class="btn btn-info">Редактировать</a>
              <a onclick="return confirm('Вы уверены, что хотите удалить эту запись?')" href="delete.php?id=<?= $person->id ?>" class='btn btn-danger'>Удалить</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
