<div id="content">
    <h1>Form Create User</h1>
    <form action="<?php echo base_url("admin/users/save")?>" method="post" id="input_form">
        <p><strong>Note:</strong> Items marked <span class="required">*</span> are required fields</p>
        <fieldset id="personal">
            <legend><span>User Information</span></legend>
            <ol>
                <li>
                    <label for="password"  class="required">New Password<span>*</span></label>
                    <input type="password" id="password" name="password" placeholder="Password" class="required"/>
                </li>
                <li>
                    <label for="Re-password"  class="required">Re-Password<span>*</span></label>
                    <input type="password" id="re_password" name="re_password" placeholder="Re-Password" class="required" />
                </li>
                <input type="hidden" value="<?php echo $this->input->get('user_id')?>" name="user_id"/>
            </ol>
        </fieldset>
        <fieldset id="submitform">
            <input type="submit" id="formsubmit" name="save" value="Save" />
            <input type="button"  name="back" value="Back" class="event_back" />
        </fieldset>
    </form>
</div>
