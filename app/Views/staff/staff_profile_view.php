<div class="container">
    <div class="row">
        <h2> You are logged as  
            <?php
            echo session()->get('username');
            ?>
        </h2>
    </div>
    <div class="row">
        <div class="col-4">
            <table class="table">
                <tr><th>Profile Data</th><th></th>
                    <?php
                    echo '<tr><td>Full name:</td>';
                    echo '<td>';
                    echo session()->get('fullname');
                    echo '</td></tr>';
                    echo '<tr><td>E-mail:</td>';
                    echo '<td>';
                    echo session()->get('email');
                    echo '</td></tr>';
                    echo '<tr><td>Department:</td>';
                    echo '<td>';
                    echo session()->get('departmenName');
                    echo '</td></tr>';
                    echo '<tr><td>Role in staff:</td>';
                    echo '<td>';
                    echo session()->get('role');
                    echo '</td></tr>';
                     echo '<tr><td>BI role:</td>';
                    echo '<td>';
                    echo session()->get('bi');
                    echo '</td></tr>';
                    ?>

            </table>

        </div>
    </div>
</div>



