<table class="zebra">
    <caption>User</caption>
    <thead>
        <tr>
            <th>ID</th>
            <th>Email</th>
            <th>Full Name</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach($data['list_user'] as $user)
        {
            ?>
            <tr>
                <td><?php echo $user['user_id']?></td>
                <td><?php echo html_escape($user['email'])?></td>
                <td><?php echo html_escape($user['full_name'])?></td>
                <td>
                    <?php 
                        if($user['status']==1){
                            echo '<a href="'.base_url('admin/users/set_status?user_id='.$user['user_id'].'&status='.$user['status']).'">Active</a>';
                        }else{
                            echo '<a href="'.base_url('admin/users/set_status?user_id='.$user['user_id'].'&status='.$user['status']).'">No Active</a>';
                        }
                    ?>
                </td>
                <td>
                    <a href="<?php echo base_url('admin/users/permissions?user_id='.$user['user_id'])?>">Permissions</a>
                    <a href="<?php echo base_url('admin/users/delete?user_id='.$user['user_id'])?>" class="event_delete">Delete</a>
                </td>
            </tr>
            <?php
        }
        ?>
            <tr>
                <td colspan="5">
                    <a href="<?php echo base_url('admin/users/create')?>">Add New</a>
                </td>
            </tr>
    </tbody>
</table>