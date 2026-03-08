<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <title><?= SITE_TITLE ?></title>
  <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/style.css">
  <style>
    body {}

    .page {
      height: max-content;
      height: 100px;
      padding-bottom: 10px;
    }

    .main {
      height: max-content;
    }

    .nav {
      padding-bottom: 10px;
      background-color: gry;
      box-shadow: 0 5px 5px gray;
    }

    .list {
      background-color: gry;
      border: 2px solid lightgray;
      padding: 20px;
      box-shadow: 0 5px 5px gray;
    }
  </style>
</head>

<body>
  <!-- partial:index.partial.html -->
  <div class="page">
    <div class="pageHeader">
      <div class="title">Z<sup style="color: gold;">9</sup>GPS <span style="color: gold;">ToDoList</span></div>
      <div class="userPanel">
        <a href="<?= site_url("?logout=1") ?>"><img style="background-color: white; margin-top: 8px;" src="assets/img/logOut.png" alt=""></a>
        <span class="username"><?= isLoggedInUser()->name ?? "no any one" ?></span>
        <img src="assets/img/matiullah.jpg" width="50" height="40" />
      </div>
    </div>
    <div class="main">
      <div class="nav">
        <div class="searchbox">
          <div><i class="fa fa-search"></i>
            <input type="search" placeholder="Search" />
          </div>
        </div>
        <div class="menu">
          <div style="margin-left: 16px;" class="title">Folders</div>
          <ul class="folder_list">

            <!-- <p style="color: red;">مشکل رنگ در کود خط 36 است</p> -->

            <li class="<?= isset($_GET["folder_id"]) ? " " : "active" ?>">

              <img style="height: 20px;" src="assets/img/open.png" alt="">

              <a href="<?= site_url() ?>">All</a>
            </li>

            <?php foreach ($folders as $folder) : ?>

              <li class="<?= (isset($_GET["folder_id"]) && $_GET['folder_id'] == $folder->id) ? 'active' : '' ?>">
                <img style="height: 20px;" src="assets/img/open.png" alt="">

                <a href="<?= site_url("?folder_id=$folder->id") ?>"> <i class="folder"><?= $folder->name ?>
                    <!-- for remove the folders -->
                    <a href="<?= site_url("?delete_Folder=$folder->id") ?>">
                      <img style="height: 20px; position: absolute; left: 159px;" onclick="return confirm('are you sur to delet this item from this page \n\n <?= $folder->name ?>')" src="assets/img/x.png" alt="">
                    </a>
                </a>
              </li>
            <?php endforeach; ?>


          </ul>


          </ul>
        </div>
        <div style="display: flex; flex-direction: row;">
          <input type="text" id="addFolderInput" style='width: 62%; margin-left: 25px; margin-right: 5px;' placeholder="Add New Folder" />
          <img style="height: 20px;" id="addFolderBtn" class="btn clickable" src="assets/img/add.png" alt="">
        </div>
      </div>
      <div class="view">
        <div class="viewHeader">
          <div class="title" style="width: 50%;">
            <input type="text" id="taskNameInput" style="width: 100%;margin-left:3%;line-height: 30px; margin-top: 18px;" placeholder="Add New Task">
          </div>
          <div class="functions">
            <div id="addtaskBTN" class="button active">Add New Task</div>
            <div class="button" id="completed">Completed</div>
            <script>
              let completed = document.querySelector('#completed');
              completed.addEventListener('click', () => {
                alert('you can not done all one in one click')
              })
            </script>
          </div>
        </div>
        <div class="content">
          <div class="list">
            <div class="title">Today</div>

            <ul>

              <?php if (sizeof($tasks) > 0) : ?>
                <?php foreach ($tasks as $task) : ?>

                  <li class="<?= $task->is_don ? 'checked' : "" ?>">
                    <!-- این ایکن به صورت انلاین از فونت اوسم کار می کند در غیر این صورت کار نمی کند -->
                    <i><img data-taskid="<?= $task->id ?>" class="is_Done" style="height: 25px; margin-top: 13px; margin-right: 20px; cursor: pointer;" src="<?= $task->is_don ? 'assets/img/don.png' : 'assets/img/no_don.png' ?>" alt=""></i>
                    <span> <?= $task->title ?> </span>
                    <div class="info" style="position: sticky; left: 79%;">
                      <span class='created-at'> <?= $task->created_at ?></span>
                      <a href="?delete_task=<?= $task->id ?>" class="remove">
                        <img style="height: 25px; margin-top: 13px;" onclick="return confirm('are you sur to delet this item from this page \n\n <?= $task->title ?>')" src="assets/img/xx.png" alt="">
                      </a>
                    </div>
                  </li>


                <?php endforeach; ?>

              <?php else : ?>
                <li>No Task Here ..</li>
              <?php endif; ?>


            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- partial -->
  <script src='assets/js/jquery.min.js'></script>


  <script src="assets/js/script.js"></script>
  <script>
    $(document).ready(function() {

      $('.is_Done').click(function(e) {
        let taskiD = $(this).attr('data-taskid')
        // alert(taskiD);

        $.ajax({
          url: "process/ajaxHandler.php",
          method: "post",
          data: {
            Action: "check_Switch",
            task_id: taskiD
          },
          success: function(response) {
            if (response = '1') {
              location.reload();
            } else {
              alert(response);
            }
          }
        })
      });

      $('#addFolderBtn').click(function(e) {
        var input = $('input#addFolderInput')
        // alert(input.val());
        $.ajax({
          url: "process/ajaxHandler.php",
          method: "post",
          data: {
            Action: "addFolder",
            folderName: input.val()
          },
          success: function(response) {
            if (response = '1') {

              location.reload();
              $('<i href="#" id = "aa" class="fa-folder">' + input.val() + '</i>').appendTo('ul.folder_list');
            } else {
              alert(response);
            }
          }
        })
        // $('#addFolderBtn').focus();
      });



      // $('#addtaskBTN').click(function(e){
      // وقت که سز یک بتن کلیک شود باید این خط کد اچرا شود برای این می باشد باید جور شود
      // })
      $('#addtaskBTN').on('click', function(e) {
        // alert("the enter is clicked");
        $.ajax({
          url: "process/ajaxHandler.php",
          method: "post",
          data: {
            Action: "addTask",
            folderId: <?= $_GET['folder_id'] ?? 0 ?>,
            taskTitle: $('#taskNameInput').val()
          },
          success: function(response) {

            // alert(response); 

            if (response = '1') {

              location.reload();

            } else {
              alert(response);
            }
          }
        })

      })

      $('#taskNameInput').focus();

    });
  </script>
  <!-- <script>
    $(document).ready(function(){

      $('.isDone').click(function(e){
          var tid = $(this).attr('data-taskId');
          $.ajax({
            url : "process/ajaxHandler.php",
            method : "post",
            data : {action: "doneSwitch",taskId : tid},
            success : function(response){
                location.reload();
            }
          });
      });

      $('#addFolderBtn').click(function(e){
          var input = $('input#addFolderInput');
          $.ajax({
            url : "process/ajaxHandler.php",
            method : "post",
            data : {action: "addFolder",folderName: input.val()},
            success : function(response){
              if(response == '1'){
                $('<li> <a href="#"><i class="fa fa-folder"></i>'+input.val()+'</a></li>').appendTo('ul.folder-list');
              }else{
                alert(response);
              }
            }
          });
      });

      $('#taskNameInput').on('keypress',function(e) {
          e.stopPropagation();
          if(e.which == 13) {
              $.ajax({
                url : "process/ajaxHandler.php",
                method : "post",
                data : {action: "addTask",folderId :          ?= $_GET['folder_id'] ?? 0 ?> ,taskTitle: $('#taskNameInput').val()},
                success : function(response){
                  if(response == '1'){
                    location.reload();
                  }else{
                    alert(response);
                  }
                }
              });
          }
      });
      $('#taskNameInput').focus();
    });

  </script> -->
</body>

</html>