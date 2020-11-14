# logincompany
Login with different roles for small company with Codeigniter 4.04

Every registered user has role register_only in the first moment. Adninistrator is making the registration for every new employee.

It is not possible to delete user that is former employee or user that is active after first change of his password.
If the user is register_only he do not have any right excluding to show his profile and change his password.

Role: staff_admin

    Can delete user with role: register_only 
    Can change role from columns staff, bi, docflow to: staff_former, bi_former, docflow_former for every former employee if the old role's are _active. Such as staff_active, bi_active, docflow_active, bi_admin, docflow_admin. 
    Can change role from columns bi and docflow to: bi_admin, docflow_admin, bi_active, docflow_active for every employee that is not former yet. 

Role: bi_admin

    Can change role from columns to: bi_active or NULL for every employee that is not former yet. 
    He can make another changes that are specific to BI activity.



