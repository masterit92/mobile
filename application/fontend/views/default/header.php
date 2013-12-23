<!-- header -->
<header>
    <div class="shell">
        <h1 id="logo"><a href="#">Core</a></h1>
        <div class="contact">
            <p>
                <input type="text" name="txt_search" placeholder="Search...."/>
                <input type="button" name="btn_search" value="Search" class="button"/>
            </p>
            <p class="ico phone-ico"><span></span>+132 456 789</p>
            <p class="ico mail-ico"><span></span><a href="#">sales@core.com</a></p>
        </div>
    </div>	
</header>
<!-- end of header -->
<!-- navigation -->
<nav id="navigation" >
    <div class="shell">
        <ul>
            <li <?php echo $title === 'Home' ? 'class="active"' : ''?> >
                <a href="<?php echo base_url('index')?>" ><span></span>HOME</a>
            </li>
            <li <?php echo $title === 'Product' ? 'class="active"' : ''?>>
                <a href="<?php echo base_url('product')?>"><span></span>PRODUCTS</a>
                <div class="subs">
                    <?php
                    $arr_cat=$data['all_category'];

                    function show_div_category($arr_cat,$parent_id=0,$text='&triangleright;')
                    {

                        foreach($arr_cat as $cat)
                        {
                            if($parent_id == 0)
                                echo "<div class='subs_parent'>";
                            if($cat['parent_id'] == $parent_id):
                                echo '<a href="' . base_url('product/product_category?c_id=' . $cat['c_id']) . '">' . $text . $cat['name'] . '</a><br/>';
                                show_div_category($arr_cat,$cat['c_id'],$text . '&triangleright;&triangleright;');
                            endif;
                            if($parent_id == 0)
                                echo "</div>";
                        }
                    }

                    show_div_category($arr_cat);
                    ?>
                </div>
            </li>
        </ul>
    </div>	
</nav>
<!-- end of navigation -->