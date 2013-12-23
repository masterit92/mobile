<script>
    $(function() {
        $('.event_top_cat').click(function() {
            $('#container').ajax({
                url: '<?php echo base_url('product/filter')?>',
                data: {action: 'test'},
                type: 'post',
                success: function(output) {
                    alert(output);
                }
            });
        });
    });
</script>
<div class="left">
    <div class="menu_left">
        <div class="left_title">Filter by</div>
        <div class="left_content">Content</div>
    </div>
    <div class="menu_left">
        <div class="left_title">Top Category</div>
        <div class="left_content">
            <?php
            foreach($data['top_category'] as $category)
            {
                ?>
                <input type="radio" class="event_top_cat" name="cat_top" value="<?php echo $category['c_id']?>"/> <b><?php echo $category['name']?></b><br/>
                <?php
            }
            ?>
        </div>
    </div>
    <?php
    if(isset($data['parent_id'])):
        ?>
        <div class="menu_left">
            <div class="left_title">Sub Category</div>
            <div class="left_content">
                <?php
                $arr_cat=$data['all_category'];

                function show_sub_category($arr_cat,$parent_id=1,$text='&triangleright;')
                {

                    foreach($arr_cat as $category)
                    {
                        if($category['parent_id'] == $parent_id):
                            echo $text;
                            ?>
                            <input type="checkbox" class="event_sub_cat" name="sub_cat[]" value="<?php echo $category['c_id']?>"/><b><?php echo $category['name']?></b>
                            <br/>
                            <?php
                            show_sub_category($arr_cat,$category['c_id'],$text . '&triangleright;&triangleright;');
                        endif;
                    }
                }

                show_sub_category($arr_cat,$data['parent_id']);
                ?>
            </div>
        </div>
    <?php endif;?>
    <div class="menu_left">
        <div class="left_title">Price</div>
        <div class="left_content">
            <p>
                <label for="amount"><b>Price range:</b></label>
                <input type="text" id="amount" style="border:0; color:#f6931f; font-weight:bold;">
            </p>

            <div id="slider-range"></div>
        </div>
    </div>
</div>
<div class="right">
    <?php if(count($data['list_product']) > 0):?>
        <div class="sort_by">
            &nbsp;&nbsp; Product
            <p>
                Sort by: 
                <a href="#">Name&DoubleUpArrow;</a> - 
                <a href="#">Name&DoubleDownArrow;</a> - 
                <a href="#">Price&DoubleUpArrow;</a> - 
                <a href="#">Price&DoubleDownArrow;</a> 
            </p>
        </div>

        <section class="services">
            <div class="shell">
                <div class="boxes">
                    <div class="cl">&nbsp;</div>
                    <?php
                    foreach($data['list_product'] as $product)
                    {
                        ?>
                        <div class="box">
                            <a href="<?php echo base_url('product/detail?p_id=' . $product['p_id'])?>">
                                <img src="<?php echo base_url($product['thumb'])?>" alt="" />
                                <h3><?php echo $product['name']?></h3>
                                <?php echo '$' . $product['price']?>
                            </a>
                        </div>
                        <?php
                    }
                    $num_page=intval($data['num_page']);
                    $url='#';
                    $class_name='event_page';
                    ?>
                    <div class="cl">&nbsp;</div>
                    <div class="page">
                        <a href="#?page=1" class="<?php echo $class_name?>" id="0">Start</a>
                        <?php
                        $current=1;
                        if(isset($_GET['page']))
                        {
                            $current=$_GET['page'];
                        }
                        $flag=TRUE;
                        for($i=1; $i <= $num_page; $i++)
                        {
                            if($i > ($current - 3) && $i < ($current + 3))
                            {
                                $flag=TRUE;
                                if($current === $i)
                                {
                                    echo' <a href="' . $url . '?page=' . $i . '" class="' . $class_name . ' current" id="' . ($i - 1) . '">' . $i . '</a>';
                                }
                                else
                                {
                                    echo' <a href="' . $url . '?page=' . $i . '" class="' . $class_name . '" id="' . ($i - 1) . '">' . $i . '</a>';
                                }
                            }
                            else
                            {
                                if($flag)
                                {
                                    $flag=FALSE;
                                    echo " <a>....</a> ";
                                }
                            }
                        }
                        ?>
                        <a href="#?page=<?php echo $num_page?>" class="<?php echo $class_name?>" id="<?php echo $num_page - 1?>">End</a>
                    </div>
                </div>
            </div>
        </section>
        <?php
    else: echo '<b>No data!</b>';
    endif;
    ?>
</div>