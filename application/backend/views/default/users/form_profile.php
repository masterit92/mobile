<?php
$user= $data['user'][0];
?>
<div id="content">
    <h1>Form Create User</h1>
    <form action="<?php echo base_url("admin/users/save")?>" method="post" id="input_form">
        <p><strong>Note:</strong> Items marked <span class="required">*</span> are required fields</p>
        <fieldset id="personal">
            <legend><span>User Information</span></legend>
            <ol>
                <li><label for="full name"  class="required">Full Name<span>*</span></label>
                    <input name="full_name" type="text" id="full_name" value="<?php echo $user['full_name']?>" placeholder="Full Name" class="required" />	
                </li>
                <input type="hidden" value="<?php echo $user['user_id']?>" name="user_id"/>
            </ol>
        </fieldset>
        <fieldset id="submitform">
            <input type="submit" id="formsubmit" name="save" value="Save" />
            <input type="button"  name="back" value="Back" class="event_back" />
        </fieldset>
    </form>
</div>
