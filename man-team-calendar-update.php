<?php
include "./man-UI.php";
include "./php/man-team-cal-upd.php";
?>

<body>
<h2 class="text-dark text-center p-3">Update Team Event</h2>
<div class="container d-flex justify-content-center align-items-center"
     style="min-height: 20vh">
    <form class="p-4 rounded-3 bg-white align-items-center"
          style="width: 50%;"
          action="php/man-team-cal-upd.php"
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
               value="<?=$teamCalData['id']?>"
               hidden>
        <div class="form-group">
            <div class="mb-3">
                <label for="name">Event Name</label>
                <input class="form-control"
                       type="text"
                       id="eventName"
                       name="eventName"
                       value="<?=$teamCalData['event_name']?>">
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
                       value="<?=$teamCalData['event_start']?>">
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
                       value="<?=$teamCalData['event_end']?>">
            </div>
        </div>
        <input class="form-control"
               type="text"
               id="teamCID"
               name="teamCID"
               value="<?=$teamCalData['teamCID']?>"
               hidden>
        <br>
        <div class="d-flex justify-content-center align-items-center">
            <button type="submit"
                    class="btn btn-primary mx-2"
                    name="update">Update</button>
            <a href="php/man-team-cal-rem.php?id=<?=$teamCalData['id']?>"
               class="btn btn-danger mx-1">Delete</a>
            <br>
            <a href="./man-team-room.php?id=<?=$teamCalData['teamCID']?>" class="btn btn-secondary mx-2">Back</a>
        </div>
    </form>
</div>
</body>

