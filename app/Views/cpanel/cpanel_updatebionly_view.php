<div class="container">
    <div class="row">
        <div class="col-10">
            <h2>Update User </h2>  
            <p>The password can not be changed from ADMIN!</p>
            <?php
            if (session()->get('success')) {
                echo '<div class="alert alert-success">';
                echo session()->get('success');
                echo '</div>';
            }
            ?>
        </div>

    </div>
    <div class="row">
        <div class="col-4">
            <div class="alert-info m-2 p-2">
                <?php
                echo 'Username: ' . $user['username'] . '<br>';
                echo 'Created at: ' . $user['created_at'] . '<br>';
                echo 'Updated at: ' . $user['updated_at'] . '<br>';
                echo 'Full name: ' . $user['fullname'] . '<br>';
                ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-4">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="staff">Roles in BI group:</label>
                    <?php
                    echo form_dropdown('bi', BI_OPTIONS, $user['bi'], 'class="form-control"');
                    ?>

                </div>

                
                <div class="form-group">
                    <div class="col-12 col-sm-4">
                        <input type="submit" class="form-control btn btn-primary" value="Update">
                    </div>
                </div>

            </form>

        </div>
