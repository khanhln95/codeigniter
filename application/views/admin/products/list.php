<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="container">
    <h1>Danh sách sản phẩm</h1>
    <div class="text-right"><a class="btn btn-success" href="<?=site_url('admin/productcontroller/create'); ?>" title="Thêm">Thêm sản phẩm</a></div>
    <hr>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-list">
            <thead>
                <tr>
                    <th class="w50">STT</th>
                    <th>Hình Ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Giới thiệu</th>
                    <th>Giá</th>
                    <th>Hành động</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php foreach ($model as $i => $item) { ?>                    
                <tr>
                    <td class="w50"><?=$i+1?></td>
                    <td>
                    <?php if($item->picture!='') { ?>
                    <img src="<?=base_url()?>uploads/<?=$item->picture?>" height="80">
                    <?php } ?>
                    </td>
                    <td><?=$item->name?></td>
                    <td><?=$item->description?></td>
                    
                    <td><?=$item->price?></td>
                    <td class="w100 act">
                        <a href="<?=site_url('admin/productcontroller/edit/'.$item->id); ?>" ><span class="glyphicon glyphicon-pencil"></span></a>
                        <a class="delete-confirm" href="<?=site_url('admin/productcontroller/delete/'.$item->id); ?>"><span class="glyphicon glyphicon-trash"></span></a> 
                        <a href="<?=site_url('admin/productcontroller/insertPro/'.$item->id); ?>"><span class="glyphicon glyphicon-plus"></span></a>                               
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>