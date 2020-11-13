<script type="text/javascript">
    $('.confirmation').on('click', function () {
        return confirm('Are you sure?');
    });
</script>

<?php
//preview($users);
//$table = new \CodeIgniter\View\Table();
//echo $table->generate($users);
?>
<div class="container">
    <div class="row">
        <div class="col-4">
            <?php
            if (session()->get('success')) {
                echo '<div class="alert alert-success m-2 p-2">';
                echo session()->get('success');
                echo '</div>';
            }
            ?> 
        </div>
    </div>
    <div class="row">
        <div class="col-10">
            <h2>List of Users</h2> 
        </div>
        <div class="col-2">
            <?php
            if (session('role') === 'staff_admin'):
                echo anchor(base_url() . '/cpanel/adduser', 'Add User', 'class="btn btn-light"');
            endif;
            ?>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <table class="table">
                <tr>
                    <th>User name</th>
                    <th>Full name</th>
                    <th>e-mail</th>
                    <th>Department</th>
                    <th>Date adding</th>
                    <th>To update</th>
                    <th>To delete</th>
                    <th>BI role</th>

                </tr>
                <?php
                foreach ($users as $k => $v) {
                    echo '<tr>';
                    echo '<td>';
                    echo $users[$k]['username'];
                    echo '</td>';
                    echo '<td>';
                    echo $users[$k]['fullname'];
                    echo '</td>';
                    echo '<td>';
                    echo $users[$k]['email'];
                    echo '</td>';
                    echo '<td>';
                    if ($users[$k]['departmentID'] != null) {
                        $departmentID = $users[$k]['departmentID'];
                        echo $department[$departmentID];
                    }

                    echo '</td>';
                    echo '<td>';
                    echo $users[$k]['created_at'];
                    echo '</td>';
                    echo '<td>';
                    if (session()->get('role') == 'staff_admin') {
                      echo anchor('cpanel/update/' . $users[$k]['userID'], 'update', 'class="btn btn-info"');
                    } else {
                         echo anchor('cpanel/updatebionly/' . $users[$k]['userID'], 'update', 'class="btn btn-info"'); 
                        
                    }
                    echo '</td>';
                    echo '<td>';
                    if ($users[$k]['staff'] == 'register_only') {
                        echo anchor('cpanel/delete/' . $users[$k]['userID'], 'delete', 'class="btn btn-danger" onclick="return confirm(\'Are you sure you want to delete this item\')"');
                    } else {
                        echo $users[$k]['staff'];
                    }

                    echo '</td>';
                    echo '<td>';
                    echo $users[$k]['bi'];
                    echo '</td>';
                    echo '</tr>';
                }
                ?>

            </table>
        </div>
    </div>
</div>
