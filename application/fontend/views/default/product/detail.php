<?php
$product= $data['product'][0];
?>
<div class="detail">
    <div class="detail_top">
        <b><a href="#" class="event_back">Back</a></b>
    </div>
    <div class="detail_left">
        <img src="<?php echo base_url($product['thumb'])?>" alt="No image"/>
    </div>
    <div class="detail_right">
        <h1><?php echo strtoupper($product['name'])?></h1>
          <hr/>
        <p>PRICE: <b><?php echo '$'.$product['price']?></b> </p>
        <p>DESCRIPTION:</p><b><?php echo $product['description']?></b>
        <p>
            <?php echo $product['quantity']>0 ? 'IN STOCK!':'OUT STOCK!'?>
        </p>
    </div>
    <div class="cl"></div>
</div>