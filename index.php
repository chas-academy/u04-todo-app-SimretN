<?php 
require 'db_conn.php';
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>To-Do List</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="main-section">
       <div class="add-section">
          <form action="app/create.php" method="POST" autocomplete="off">
             <?php if(isset($_GET['mess']) && $_GET['mess'] == 'error'){ ?>
                <input type="text" 
                     name="title" 
                     style="border-color: #ff6666"
                     placeholder="This field is required" />
                     <input type="text" name="taskDescription" style="text-align: center; border-color: #ff6666" placeholder="Description">
              <button type="submit">Add &nbsp; <span>&#43;</span></button>

             <?php }else{ ?>
              <input type="text" 
                     name="title" 
                     placeholder="What do you need to do?" />
                     <input type="text" name="taskDescription" style="text-align: center;" placeholder="Description">
              <button type="submit">Add &nbsp; <span>&#43;</span></button>
             <?php } ?>
          </form>
       </div>
       <?php 
          $todos = $conn->query("SELECT * FROM todos ORDER BY id DESC");
       ?>
       <div class="show-todo-section">
            <?php if($todos->rowCount() <= 0){ ?>
                <div class="todo-item">
                    <div class="empty">
                        <img src="img/f.png" width="100%" />
                        <img src="img/Ellipsis.gif" width="80px">
                    </div>
                </div>
            <?php } ?>

            <?php while ($todo = $todos->fetch(PDO::FETCH_OBJ)) { ?>
                <div class="todo-item">
                    <button id="<?php echo $todo->id; ?>" class="delete-btn">Delete</button>
                    <button class="edit-btn">Edit</button>
                    <?php if ($todo->checked) { ?>
                        <input type="checkbox" class="check-box" data-todo-id="<?php echo $todo->id; ?>" checked />
                        <h2 class="checked"><?php echo $todo->title ?></h2>                     
                    <?php } else { ?>
                        <input type="checkbox" data-todo-id="<?php echo $todo->id; ?>" class="check-box" />                       
                    <?php } ?>
                    <br>
                    <h2><?php echo $todo->title ?></h2>
                    <p><?php echo $todo->taskDescription ?></p>
                    <br>
                    <small>created: <?php echo $todo->date_time ?></small>
                </div>
                <?php } ?>
       </div>
    </div>
    <script src="js/main.js"></script>
        
    
</body>
</html>