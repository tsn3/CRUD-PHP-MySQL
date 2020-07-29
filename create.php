<?php
require 'db.php';
$message = '';
if (isset ($_POST['name']) && isset($_POST['surname']) && isset($_POST['email']) ) {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $sql = 'INSERT INTO users(name, surname, email) VALUES(:name, :surname, :email)';
    $statement = $connection->prepare($sql);
    if ($statement->execute([':name' => $name, ':surname' => $surname, ':email' => $email])) {
        $message = 'данные добавлены успешно';
    }
}
?>

<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Добавление ученика</h2>
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
          <input type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
          <label for="surname">Фамилия</label>
          <input type="text" name="surname" id="surname" class="form-control">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" name="email" id="email" class="form-control">
        </div>
         <form method="POST" action="index.php" enctype="multipart/form-data">
              <input type="hidden" name="size" value="1000000">
              <div>
                  <input type="file" name="image">
              </div>
         </form>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Добавить ученика</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
