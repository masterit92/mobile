<div class="left">
    <div class="menu_left">
        <div class="left_title">Filter by</div>
        <div class="left_content">Content</div>
    </div>
    <div class="menu_left">
        <div class="left_title">Sub Category</div>
        <div class="left_content">Content</div>
    </div>
    <div class="menu_left">
        <div class="left_title">Brands</div>
        <div class="left_content">Content</div>
    </div>
    <div class="menu_left">
        <div class="left_title">Price</div>
        <div class="left_content">Content</div>
    </div>
</div>
<div class="right">
    <section class="services">
        <div class="shell">
            <div class="boxes">
                <div class="cl">&nbsp;</div>
                <?php
                foreach($data['list_product'] as $product)
                {
                    ?>
                    <div class="box">
                        <a href="<?php echo base_url('product/detail?p_id='.$product['p_id'])?>">
                            <img src="<?php echo base_url($product['thumb']) ?>" alt="" />
                            <h3><?php echo $product['name'] ?></h3>
                            <?php echo '$'.$product['price']?>
                        </a>
                    </div>
                    <?php
                }
                $num_page = intval($data['num_page']);
                $url = '#';
                $class_name = 'event_page';
                ?>
                <div class="cl">&nbsp;</div>
                <div class="page">
                    <a href="#?page=1" class="<?php echo $class_name ?>" id="0">Start</a>
                    <?php
                    $current = 1;
                    if(isset($_GET['page']))
                    {
                        $current = $_GET['page'];
                    }
                    $flag = TRUE;
                    for($i = 1; $i <= $num_page; $i++)
                    {
                        if($i > ($current - 3) && $i < ($current + 3))
                        {
                            $flag = TRUE;
                            if($current===$i)
                            {
                                echo' <a href="' . $url . '?page=' . $i . '" class="' . $class_name .' current" id="' . ($i - 1) . '">' . $i . '</a>';
                            }else{
                                echo' <a href="' . $url . '?page=' . $i . '" class="' . $class_name .'" id="' . ($i - 1) . '">' . $i . '</a>';
                            }
                        }
                        else
                        {
                            if($flag)
                            {
                                $flag = FALSE;
                                echo " <a>....</a> ";
                            }
                        }
                    }
                    ?>
                    <a href="#?page=<?php echo $num_page ?>" class="<?php echo $class_name ?>" id="<?php echo $num_page - 1 ?>">End</a>
                </div>
            </div>
        </div>
    </section>
</div>