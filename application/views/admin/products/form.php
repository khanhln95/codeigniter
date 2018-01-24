<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="box-form">
    <?php echo form_open_multipart('',array('id'=>'form-products','id_product'=>$id_product ));?>
    <div class="clearfix"></div>
    <div class="form-group">
        <div class="row">
            <label class="col-sm-12">Hình ảnh sản phẩm</label>
            <div class="col-sm-3">
                <input type="file" accept="image/*" name="picture" class="filestyle" data-input="false" data-buttonText="Chọn hình"/>
            </div>
            <div class="col-sm-9">
                <?php if(isset($items) && $items->picture!='') { ?>
                <img src="<?=base_url()?>uploads/<?=(isset($items->picture)) ? $items->picture : ''?>" height="80">
                <?php } ?>                
            </div>
        </div>
    </div>    
    <div class="clearfix"></div>
    <div class="form-group">
        <label>Tên sản phẩm</label>
        <div class="relative"><textarea class="form-control area-input" rows="1" name="name" id="name" data-error="Nhập tên"><?=(isset($items)) ? $items->name : ''?></textarea></div>
    </div>    
    <div class="form-group">
        <label>Giới thiệu</label>
        <div class="relative"><textarea class="form-control area-input" rows="1" name="description" id="description" data-error="Viết vài dòng giới thiệu về sản phẩm"><?=(isset($items)) ? $items->description : ''?></textarea></div>
    </div>
    <div class="form-group">
        <label>Giá</label>
        <div class="relative"><textarea class="form-control area-input" rows="1" name="price" id="price" data-error="Nhập giá sản phẩm"><?=(isset($items)) ? $items->price : ''?></textarea></div>
    </div>
    
    <div class="form-group">
        <button type="submit" class="btn btn-success"><?=$button_title?></button>
    </div>
    <?php echo form_close();?>
</div>