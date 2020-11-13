<div class="container">
    <div class="row">
        <div class="col-10">
            <h2>New User Form</h2>  
            <p>The password for every new user created from ADMIN  is  111111 by default!</p>
             <?php
                if(session()->get('success')){
                    echo '<div class="alert alert-success">';
                    echo session()->get('success');
                    echo '</div>';
                }
                ?>
        </div>

    </div>
    <div class="row">

        <div class="col-4">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="username">User name</label>
                    <input type="text" class="form-control" name="username" value="<?php set_value('username'); ?>">   
                </div>
                <div class="form-group">
                    <label for="fullname">Full name</label>
                    <input type="text" class="form-control" name="fullname" value="<?php set_value('fullname'); ?>">   
                </div>
                <div class="form-group">
                    <label for="email">User email</label>
                    <input type="text" class="form-control" name="email" value="<?php set_value('email'); ?>">   
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
                        <input type="submit" class="form-control btn btn-primary" value="Create">
                    </div>
                </div>

            </form>
        </div>

    </div>
</div>