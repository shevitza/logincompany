<div class="container">
    <div class="row">
        <h2><?php echo $form_title; ?></h2>
    </div>
    <div class="row">

        <div class="col-4">
            <form action="<?php echo base_url() . $form_action; ?>" method="POST" class="m-4 p-4 rounded" style="background-color: <?php echo $form_color; ?>">
                <div class="form-group">
                    <label for="username">User name</label>
                    <input type="text" class="form-control" name="username" value="<?php set_value('username'); ?>">   
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" value="">   
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
                        <input type="submit" class="form-control btn btn-dark p-2" value="Login">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

