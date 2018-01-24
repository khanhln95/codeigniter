<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
 
 
<div class="container">
    <h1>Danh sách nhóm</h1>
    <div class="text-right"><a class="btn btn-success" href="<?=site_url('admin/groupscontroller/create'); ?>" title="Thêm">Thêm nhóm</a></div>
    <hr>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-list">
            <thead>
                <tr>
                    <th class="w50">STT</th>
                    <th>Hình Ảnh</th>
                    <th>Tên</th>
                    <th class="w100">Ẩn | Hiện</th>
                    <th class="w100">Hành động</th>
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
                    <td><?=$item->title?></td>
                    <td class="w100 a-hide">
                        <span class="glyphicon glyphicon-ok-circle iconfa-show hide1<?=$item->id?> <?php if($item->hide==0) echo 'hide'; ?>"></span>
                        <span class="glyphicon glyphicon-remove-circle iconfa-hide hide0<?=$item->id?> <?php if($item->hide==1) echo 'hide'; ?>"></span>
                    </td>
                    <td class="w100 act">
                        <a href="<?=site_url('admin/groupscontroller/edit/'.$item->id); ?>" ><span class="glyphicon glyphicon-pencil"></span></a>
                        <a class="delete-confirm" href="<?=site_url('admin/groupscontroller/delete/'.$item->id); ?>"><span class="glyphicon glyphicon-trash"></span></a>                                
                    </td>
                </tr>
                <?php } ?>
                 
            </tbody>
        </table>
    </div>
</div>