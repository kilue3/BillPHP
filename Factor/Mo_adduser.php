
<?php
if (isset($_POST['btn-submit'])) {
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $status = $_POST['status'];
    if ($fullname != Null & $username != NULL & $status != NULL) {
        $responds = adduser($fullname, $username, $status);

    } else {
        echo ' <script>
                callfail()
                </script>';

    }
}
?>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">เพิ่มผู้ใช้งาน</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">ชื่อ-สกุล:</label>
                        <input type="text" class="form-control" name="fullname" id="recipient-name" require>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">ชื่อผู้ใช้:</label>
                        <input type="text" class="form-control" name="username" id="recipient-name" require>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">สถานะ</label>
                        <select class="form-control" name="status" id="exampleFormControlSelect1" require>
                            <option>admin</option>
                            <option>normal</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="btn-submit" class="btn btn-primary">Send message</button>
                    <button type="button" onclick=callfail() class="btn btn-primary">alert</button>

                </div>
            </form>

        </div>
    </div>
</div>
</div>