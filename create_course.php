<?php
require 'db.php';
$message = '';
if (isset ($_POST['teacher'])  && isset($_POST['course']) ) {
    $teacher = $_POST['teacher'];
    $course = $_POST['course'];
    $sql = 'INSERT INTO course(teacher, course) VALUES(:teacher, :course)';
    $statement = $connection->prepare($sql);
    if ($statement->execute([':teacher' => $teacher, ':course' => $course])) {
        $message = 'данные добавлены успешно';
    }
}
?>
<?php require 'header.php'; ?>
<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h2>Форма добавления курса</h2>
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
                    <input type="text" name="teacher" id="teacher" class="form-control">
                </div>
                <div class="form-group">
                    <label for="course">Курс</label>
                    <input type="text" name="course" id="course" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-info">Создать курс</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require 'footer.php'; ?>
