<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<html>
<body>
	<div class="product">
		<?php foreach ($result as $i => $item) { ?>
		<?php if($item->picture != ''){?>
		<img src="<?=base_url()?>uploads/<?=$item->picture?>">
		<?php } ?> <br>
		<span class="titlePro"> <?php echo $item->name ?> </span> <br>
		Giá: <span class="pricePro"> <?php echo $item->price ?> </span>

		<?php } ?>
		
	</div>

</body>
</html>