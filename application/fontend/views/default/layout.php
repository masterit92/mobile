<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
    <head> 
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <?php
        $arr_file_css = array('style.css', 'flexslider.css', 'jqsimplemenu.css', 'slider_price.css');
        $arr_file_js = array();
        echo $this->render->Render_js($arr_file_js, 'fontend');
        echo $this->render->Render_css($arr_file_css, 'fontend');
        ?>
        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
        <script src="<?php echo base_url('public/fontend/js/jquery.flexslider-min.js') ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('public/fontend/js/functions.js'); ?>" type="text/javascript"></script>

        <script src="<?php echo base_url('public/fontend/js/my_js.js'); ?>" type="text/javascript"></script>
        <title><?php echo $title ?></title> 
    </head> 

    <body> 
        <!-- wrapper -->
        <div  id="wrapper">
            <div id="header">
                <?php $this->load->view('default/header'); ?> 
            </div>
            <div class="wrapper_center">
                <?php if($this->uri->segment(1)=='product'):?>
                <?php $this->load->view('default/left'); ?> 
                <?php endif; ?>
                <div id="container">
                    <?php
                    $this->load->view($template, $data = '');
                    ?> 
                </div>
            </div>
        </div>
        <div class="cl">&nbsp;</div>
        <!-- end of wrapper -->
        <div id="footer">
            <?php $this->load->view('default/footer'); ?> 
        </div>

    </body> 
</html>