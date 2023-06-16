<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="./lib/style.css">
    <title>Document</title>

</head>
<body>
<section class="wrapper">
    <div class="box">
        <h4 class="title">UPDATE TO DO</h4>
        <form class="create-task update-task" method="post" action="index.php?controller=work&action=edit">
            <input type="hidden" name="id" value="<?php echo $task['id']; ?>">
            <div class="create-task-item">
                <label for="name">Name</label>
                <input type="text" name="name"
                       class="form-control"
                       id="name"
                       placeholder="Enter name task"
                       value="<?php echo $task['name']; ?>"
                       required>
            </div>
            <div class="create-task-item">
                <label for="start_date">Start date</label>
                <input type="datetime-local"
                       name="start_date"
                       class="form-control"
                       id="start_date"
                       placeholder="Enter start date task"
                       value="<?php echo $task['start_date']; ?>"
                       required>
            </div>
            <div class="create-task-item">
                <label for="end_date">End date</label>
                <input type="datetime-local"
                       name="end_date"
                       class="form-control"
                       id="end_date"
                       placeholder="Enter end date task"
                       value="<?php echo $task['end_date']; ?>"
                       required>
            </div>
            <div class="create-task-item">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="1" <?php echo $task['status'] == 1 ? 'selected' : '' ?>>Planning</option>
                    <option value="2" <?php echo $task['status'] == 2 ? 'selected' : '' ?>>Doing</option>
                    <option value="3" <?php echo $task['status'] == 3 ? 'selected' : '' ?>>Complete</option>
                </select>
            </div>
            <div class="create-task-item">
                <button class="save-button button" type="submit">Save</button>
            </div>
        </form>
    </div>
</section>

</body>
</html>