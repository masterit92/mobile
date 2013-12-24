<?php
if(isset($data['maker']))
{
    $maker=$data['maker'];
}
?>
<div id="content">
    <h1>Form Maker</h1>
    <form action="<?php echo base_url("admin/maker/save")?>" method="post" id="input_form">
        <?php
        if(isset($maker)):
            ?>
            <input type="hidden" value="<?php echo $maker[0]['m_id']?>" name="m_id"/>
            <?php
        endif;
        ?>
        <p><strong>Note:</strong> Items marked <span class="required">*</span> are required fields</p>
        <fieldset id="personal">
            <legend><span>User Information</span></legend>
            <ol>
                <li><label for="Maker Name"  class="required">Maker Name<span>*</span></label>
                    <input name="name" type="text"  value="<?php echo isset($maker) ? $maker[0]['name'] : ''?>" placeholder="Maker Name" class="required" />	
                </li>
            </ol>
        </fieldset>
        <fieldset id="submitform">
            <input type="submit" id="formsubmit" name="save" value="Save" />
            <input type="button"  name="back" value="Back" class="event_back" />
        </fieldset>
    </form>
</div>