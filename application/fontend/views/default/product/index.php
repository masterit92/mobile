
<div class="right">
    <?php if(count($data['list_product']) > 0): ?>
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
                            <a href="<?php echo base_url('product/detail?p_id=' . $product['p_id']) ?>">
                                <img src="<?php echo base_url($product['thumb']) ?>" alt="" />
                                <h3><?php echo $product['name'] ?></h3>
                                <?php echo '$' . $product['price'] ?>
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
                        <a href="#" class="<?php echo $class_name ?>" id="0">Start</a>
                        <?php
                        $current = 1;
                        if(isset($data['page']))
                        {
                            $current = $data['page'];
                        }
                        $flag = TRUE;
                        for($i = 1; $i <= $num_page; $i++)
                        {
                            if($i > ($current - 3) && $i < ($current + 3))
                            {
                                $flag = TRUE;
                                if($current === $i)
                                {
                                    echo' <a href="' . $url . '" class="' . $class_name . ' current" id="' . ($i - 1) . '">' . $i . '</a>';
                                }
                                else
                                {
                                    echo' <a href="' . $url . '" class="' . $class_name . '" id="' . ($i - 1) . '">' . $i . '</a>';
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
                        <a href="#" class="<?php echo $class_name ?>" id="<?php echo $num_page - 1 ?>">End</a>
                    </div>
                </div>
            </div>
        </section>
        <?php
    else: echo '<b>No data!</b>';
    endif;
    ?>
</div>