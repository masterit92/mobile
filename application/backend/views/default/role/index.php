<table class="zebra">
    <caption>Role</caption>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach($data['list_role'] as $role)
        {
            ?>
            <tr>
                <td><?php echo $role['role_id']?></td>
                <td><?php echo html_escape($role['name'])?></td>
                <td>
                    <?php
                    if($role['status'] == 1)
                    {
                        echo '<a href="'.base_url('admin/role/set_status?role_id='.$role['role_id'].'&status='.$role['status']).'">Active</a>';
                    }
                    else
                    {
                        echo '<a href="'.base_url('admin/role/set_status?role_id='.$role['role_id'].'&status='.$role['status']).'"> No Active</a>';
                    }
                    ?>
                </td>
                <td>
                    <a href="<?php echo base_url('admin/role/edit?role_id='.$role['role_id'])?>">Edit</a>
                    <a href="<?php echo base_url('admin/role/delete?role_id='.$role['role_id'])?>" class="event_delete">Delete</a>
                </td>
            </tr>
    <?php
}
?>
            <tr>
                <td colspan="4">
                    <a href="<?php echo base_url('admin/role/create')?>">Add New</a>
                </td>
            </tr>
    </tbody>
</table>