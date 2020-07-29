<?php
require 'db.php';
$id = $_GET['id'];
$sql = 'SELECT * FROM users WHERE id=:id';
$statement = $connection->prepare($sql);
$statement->execute([':id' => $id ]);
$person = $statement->fetch(PDO::FETCH_OBJ);
// оператор 'или'
if (isset ($_POST['name']) && isset($_POST['surname']) && isset($_POST['email']) ) {
  $name = $_POST['name'];
  $surname = $_POST['surname'];
  $email = $_POST['email'];
  $sql = 'UPDATE users SET name=:name, surname=:surname, email=:email WHERE id=:id';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':name' => $name, ':surname' => $surname, ':email' => $email, ':id' => $id])) {
    header("Location: /crud");
  }
}
?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Редактировать</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">
        <div class="form-group">
          <label for="name">Имя</label>
          <input value="<?= $person->name; ?>" type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
          <label for="surname">Фамилия</label>
          <input value="<?= $person->surname; ?>" type="text" name="surname" id="surname" class="form-control">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" value="<?= $person->email; ?>" name="email" id="email" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Редактировать запись</button>
        </div>
      </form>
    </div>
  </div>

</div>


<?php require 'footer.php'; ?>
