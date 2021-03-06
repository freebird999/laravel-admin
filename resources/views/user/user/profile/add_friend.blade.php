<div class="user-inr1" style="display:none;">
	<style>
		.row{margin-right:0;}
	</style>
	<div class="row">
		<h4 class="col-sm-12">好友请求</h4>
	</div>

	<div class="row">
		<table width="100%" border="0" class="tab_rgst table table-bordered table-bordered" style="border: 0">
			<tr>
				<th><div align="">发送者</div></>
				<th><div align="">内容</div></th>
				<th><div align="">时间</div></th>
				<th><div align="">操作</div></th>
			</tr>
			<?php if(!empty($add_friend_letter)):?>
			<?php foreach($add_friend_letter as $letter):?>
			<tr>
				<td><?php echo $letter->user_info->user_name;?></td>
				<td><?php echo $letter->contens;?></div></td>
				<td><?php echo $letter->created_at;?></td>
				<?php if($letter->status == 1):?>
					<td><button class="btn btn-info" disabled="disabled" >已确认</button></td>
				<?php else:?>
					<td><button class="btn btn-info" href="javascript:void(0)" data-user_id="<?php echo $letter->user_info_id;?>" data-letter_id="<?php echo $letter->id;?>" onclick="confirmAddFrined(this)">确认</button></td>
				<?php endif;?>

	</tr>
	<?php endforeach;?>
	<?php endif;?>


	</table>
	</div>

	<div class="page_bt">
		<ul>
			<?php echo $add_friend_letter->render(); ?>
		</ul>
		<div class="clear"></div>
	</div>

</div>

<script>

	/**
	 * 确认添加好友
	 *
	 * @param obj
	 */
	function confirmAddFrined(obj){
		var _this = $(obj);

		var user_id 	= _this.attr('data-user_id')
		var letter_id 	= _this.attr('data-letter_id')

		if(user_id > 0 && letter_id > 0){
			$.post('<?php echo action("User\AddFriendController@postConfirmAddFriend") ;?>', {"user_id" : user_id, "letter_id" : letter_id}, function(data){
				var _data = $.parseJSON(data);

				if(_data.code == 200){
					toastr.success(_data.msg);
					_this.parents('tr').fadeOut("slow");

				}else if(_data.code == 400){
					toastr.warning(_data.msg);
				}
			});
		}


	}
</script>