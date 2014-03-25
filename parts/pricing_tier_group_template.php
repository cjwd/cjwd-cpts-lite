<?php 
/**
 * Display data from the first level of the add more array
 */
?>
<!--
--><div class="grid__item one-whole desk-one-half">
    <div class="product-tier ">
        <div class="grid__item one-half">
            <h3 class="product-tier-name"><?php echo $data['tier_name']; ?></h3>
            <span class="tier-price"><?php echo $data['tier_price']; ?></span>
            <a href="<?php echo $data['example_url']; ?>" class="btn btn--small btn--positive">View Example</a>
        </div><!--
        --><div class="grid__item one-half">
            <ul class="check-list">
                <?php piklist('pricing_tier_feature_template', array('data' => $data['tier_features'], 'loop' => 'data')); ?>
            </ul>
        </div>
    </div> <!-- end product-tier -->
</div><!--