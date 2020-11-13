<div class="container">
    <div class="row">
        <div class="col-4">
            <h3>Change Password</h3>
            <form action="<?php echo base_url().'/staff/changepassword';  ?>" method="POST">
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" value="">   
                </div>
                <div class="form-group">
                    <label for="password_confirm">Password Confirm</label>
                    <input type="password" class="form-control" name="password_confirm" value="">   
                </div>
                <div class="row">
                    <?php if (isset($validation)): ?>
                        <div class="alert alert-danger">
                            <?php
                            echo $validation->listErrors();
                            ?>
                        </div>
                        <?php
                    endif;
                    ?>
                </div>
                <div class="form-group">
                    <div class="col-12 col-sm-4">
                        <input type="submit" class="form-control btn btn-primary" value="Change">
                    </div>
                </div>
                
            </form>
        </div>
    </div>
</div>

