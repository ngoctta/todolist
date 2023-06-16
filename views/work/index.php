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
            <h4 class="title">TO DO LIST</h4>
            <form class="create-task" method="post" action="index.php?controller=work&action=create">
                <div class="create-task-item">
                    <label for="name">Name</label>
                    <input type="text"
                           name="name"
                           class="form-control"
                           id="name"
                           placeholder="Enter name task"
                           required>
                </div>
                <div class="create-task-item">
                    <label for="start_date">Start date</label>
                    <input type="datetime-local"
                           name="start_date"
                           class="form-control"
                           id="start_date"
                           placeholder="Enter start date task"
                           required>
                </div>
                <div class="create-task-item">
                    <label for="end_date">End date</label>
                    <input type="datetime-local"
                           name="end_date"
                           class="form-control"
                           id="end_date"
                           placeholder="Enter end date task"
                           required>
                </div>
                <div class="create-task-item">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control" required>
                        <option value="1">Planning</option>
                        <option value="2">Doing</option>
                        <option value="3">Complete</option>
                    </select>
                </div>
                <div class="create-task-item">
                    <button class="save-button button" type="submit">Save</button>
                </div>
            </form>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Todo item</th>
                        <th scope="col">Start date</th>
                        <th scope="col">End date</th>
                        <th scope="col">Status</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($tasks)) : ?>
                    <?php foreach ($tasks as $key => $task): ?>
                    <tr>
                        <th scope="row"><?php echo $key + 1; ?></th>
                        <td><?php echo $task['name']; ?></td>
                        <td><?php echo $task['start_date']; ?></td>
                        <td><?php echo $task['end_date']; ?></td>
                        <td>
                            <?php echo $task['status'] == 1 ? 'Pending' : ($task['status'] == 2 ? 'Doing' : 'Complete'); ?>
                        </td>
                        <td>
                            <a href="index.php?controller=work&action=detail&id=<?= $task['id'] ?>"
                                class="update-button button">Edit</a>
                            <button class="button delete-button"
                                    data-id="<?php echo $task['id']; ?>">Delete</button>
                        </td>
                    </tr>
                    <?php endforeach;?>
                    <?php endif; ?>
                </tbody>
            </table>
            <a href="index.php?controller=work&action=calendar" class="button save-button">Calendar</a>
        </div>
    </section>

    <div id="delete-modal" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <p>Do you want to delete this task?</p>
            <form action="index.php?controller=work&action=delete" method="post">
                <input type="hidden" name="id" value="3" id="id-delete">
                <button class="button delete-button-submit" type="submit">Delete</button>
                <a href="#" class="button cancel-button">Cancel</a>
            </form>

        </div>
    </div>
    <script>
        var deleteModal = document.getElementById("delete-modal");
        var deleteBtn = document.querySelectorAll(".delete-button");
        var span = document.querySelectorAll(".close");
        var cancelBtn = document.getElementsByClassName("cancel-button")[0];

        deleteBtn.forEach(div => {
            div.onclick = function () {
                deleteModal.style.display = "block";
                document.getElementById("id-delete").value = div.dataset.id
            }
        })
        span.forEach(div => {
            div.onclick = function() {
                deleteModal.style.display = "none";
            }
        })

        cancelBtn.onclick = function (event) {
            deleteModal.style.display = "none"
        }

        window.onclick = function(event) {
            if (event.target == deleteModal) {
                deleteModal.style.display = "none";
            }
        }
    </script>

</body>
</html>