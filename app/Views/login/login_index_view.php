<div class="container">
    <div class="row">
        <h1>Rules and notes</h1>
    </div>
    <div class="row">
        <h2>Values for roles</h2>
    </div>
    <div class="row">
        <div class="col-4">
            <dl>
                <dt>Values of user.staff for role staff:</dt>
                <dd>default:register_only</dd>
                <dd>staff_admin</dd>
                <dd>staff_active</dd>
                <dd>staff_former</dd>


            </dl>
        </div>
        <div class="col-4">
            <dl>
                <dt>Values of user.docflow for role docflow:</dt>  
                <dd>Default: NULL</dd>
                <dd>docflow_admin</dd>
                <dd>docflow_active</dd> 
                <dd>docflow_former</dd>
            </dl>

        </div>

        <div class="col-4">
            <dl>
                <dt>Values of user.bifor role BI:</dt>  
                <dd>Default: NULL</dd>
                <dd>bi_admin</dd>
                <dd>bi_active</dd>
                <dd>bi_former</dd> 
            </dl>

        </div>
    </div>
    <div class="row">
        <h2>Admin roles description</h2>
    </div>
    <div class="row">
        <div class="col-4">
            <dl>
                <dt>Role: staff_admin</dt>
                <dd>Can delete user with role: register_only </dd>
                <dd>Can change role from columns staff, bi, docflow to:
                    staff_former, bi_former, docflow_former for every former employee if the old role's are _active. 
                    Such as staff_active, bi_active, docflow_active, bi_admin, docflow_admin.
                </dd>
                <dd>Can change role from columns  bi and docflow to:
                    bi_admin, docflow_admin, bi_active, docflow_active for every  employee that is not former yet.
                </dd>



            </dl>
        </div>  
        <div class="col-4">
            <dl>
                <dt>Role: docflow_admin</dt>
                <dd>Can change role from columns to:
                    docflow_active or NULL for every  employee that is not former yet.
                </dd>
                <dd>He can make another changes that are specific to DocFlow activity.</dd> 
            </dl>

        </div>
        <div class="col-4">
            <dl>
                <dt>Role: bi_admin</dt>
                <dd>Can change role from columns to:
                    bi_active or NULL for every  employee that is not former yet.
                </dd>
                <dd>He can make another changes that are specific to BI activity.</dd>
            </dl>

        </div>
    </div>
    <div class="row">
        <h2>General notes</h2>
    </div>
    <div class="col-12">
        <p>It is not possible to delete user that is former employee or user that is active after first change of his password.</p>
        <p>If the user is register_only he do not have any right excluding to show his profile.</p>
        <p>For this example app passwords are: after register: 111111, after login:222222</p>
    </div>
</div>




