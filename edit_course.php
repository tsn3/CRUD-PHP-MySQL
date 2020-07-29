<?php
require 'db.php';
$id = $_GET['id'];
$sql = 'SELECT * FROM course WHERE id=:id';
$statement = $connection->prepare($sql);
$statement->execute([':id' => $id ]);
$lesson = $statement->fetch(PDO::FETCH_OBJ);
// оператор 'или'
if (isset ($_POST['teacher']) && isset($_POST['course'])) {
  $teacher = $_POST['teacher'];
  $course = $_POST['course'];
  $sql = 'UPDATE course SET teacher=:teacher, course=:course WHERE id=:id';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':teacher' => $teacher, ':course' => $course, ':id' => $id])) {
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
          <label for="teacher">Преподаватель</label>
          <input value="<?= $lesson->teacher; ?>" type="text" name="teacher" id="teacher" class="form-control">
        </div>
        <div class="form-group">
          <label for="course">Курс</label>
          <input value="<?= $lesson->course; ?>" type="text" name="course" id="course" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Редактировать запись</button>
        </div>
      </form>
    </div>
  </div>

</div>

<?php require 'footer.php'; ?>

