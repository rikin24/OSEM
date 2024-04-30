<?php
include "./emp-UI.php";
include "./php/emp-ind-cal-upd.php";
?>

<body>
<h2 class="text-dark text-center p-3">Update Personal Event</h2>
<div class="container d-flex justify-content-center align-items-center"
     style="min-height: 20vh">
    <form class="p-4 rounded-3 bg-white align-items-center"
          style="width: 50%;"
          action="php/emp-ind-cal-upd.php"
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
        <input type="text"
               name="id"
               value="<?=$indCalData['id']?>"
               hidden>
        <div class="form-group">
            <div class="mb-3">
                <label for="name">Event Name</label>
                <input class="form-control"
                       type="text"
                       id="eventName"
                       name="eventName"
                       value="<?=$indCalData['event_name']?>">
            </div>
        </div>
        <br>
        <div class="form-group">
            <div class="mb-3">
                <label for="date">Event Start Date</label>
                <input class="form-control"
                       type="date"
                       id="eventStart"
                       name="eventStart"
                       value="<?=$indCalData['event_start']?>">
            </div>
        </div>
        <br>
        <div class="form-group">
            <div class="mb-3">
                <label for="date">Event End Date</label>
                <input class="form-control"
                       type="date"
                       id="eventEnd"
                       name="eventEnd"
                       value="<?=$indCalData['event_end']?>">
            </div>
        </div>
        <input class="form-control"
               type="text"
               id="empCID"
               name="empCID"
               value="<?=$currentID?>"
               hidden>
        <br>
        <div class="d-flex justify-content-center align-items-center">
            <button type="submit"
                    class="btn btn-primary mx-2"
                    name="update">Update</button>
            <a href="php/emp-ind-cal-rem.php?id=<?=$indCalData['id']?>"
               class="btn btn-danger mx-1">Delete</a>
            <br>
            <a href="./emp-home.php" class="btn btn-secondary mx-2">Back</a>
        </div>
    </form>
</div>
</body>

