<?php
include "./emp-UI.php";
?>

<body>
<h2 class="text-dark text-center p-3">Add Personal Event</h2>
<div class="container d-flex justify-content-center align-items-center"
     style="min-height: 20vh">
    <form class="p-4 rounded-3 bg-white align-items-center"
          style="width: 50%;"
          action="php/emp-ind-cal-add.php"
          method="post">
        <?php if (isset($_GET['error'])) { ?>
            <!--Fetch appropriate error-->
            <div class="alert alert-danger" role="alert">
                <?php echo $_GET['error']; ?>
            </div>
        <?php } else if (isset($_GET['success'])) { ?>
            <!--Fetch success message-->
            <div class="alert alert-success" role="alert">
                <?php echo $_GET['success']; ?>
            </div>
        <?php } ?>
        <div class="form-group">
            <div class="mb-3">
                <label for="name">Event Name</label>
                <input class="form-control"
                       type="text"
                       id="eventName"
                       name="eventName"
                       placeholder="Event Name">
            </div>
        </div>
        <br>
        <div class="form-group">
            <div class="mb-3">
                <label for="date">Event Start Date</label>
                <input class="form-control"
                       type="date"
                       id="eventStart"
                       name="eventStart">
            </div>
        </div>
        <br>
        <div class="form-group">
            <div class="mb-3">
                <label for="date">Event End Date</label>
                <input class="form-control"
                       type="date"
                       id="eventEnd"
                       name="eventEnd">
            </div>
        </div>
                <input class="form-control"
                       type="text"
                       id="id"
                       name="id"
                       value="<?=$currentID?>"
                       hidden>
        <br>
        <div class="d-flex justify-content-center align-items-center">
            <button type="submit"
                    class="btn btn-primary mx-2"
                    name="create">Add</button>
            <a href="./man-employees.php" class="btn btn-secondary mx-2">Back</a>
        </div>
    </form>
</div>
</body>

