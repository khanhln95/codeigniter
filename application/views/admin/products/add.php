<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="box-form">
    <?php echo form_open_multipart('',array('id'=>'form-products','id_product'=>$id_product ));?>
    <div class="clearfix"></div>
    <div class="form-group">
        <label>Nhóm sản phẩm</label>
        <select class="form-control select2" name="group_id" style="width:100%;">
            <?php foreach($list_group as $item) {?>
            <option value="<?=$item->id?>" <?=(isset($items) && $items->group_id==$item->id) ? 'selected="selected"' : ''?>><?=$item->title?></option>
            <?php } ?>
        </select>
    </div>
    
    <div class="text-right"><a class="btn btn-success" href="<?=site_url('admin/productcontroller/show'); ?>" title="add">Add</a></div>
    <?php echo form_close();?>
</div>