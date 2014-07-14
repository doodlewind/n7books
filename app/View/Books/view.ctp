<div class="col-md-8 col-md-offset-2">
<?php foreach ($books as $item) { ?>
	<div class="panel panel-default">
		<div class="panel-heading">
			<?php echo $item['Book']['title'].' - '.$item['Book']['author']; ?>
		</div>
		<div class="panel-body">
			<div class="col-xs-4 col-sm-5"><br>
				<div class="thumbnail">
					<?php
					if ($item['Book']['cover']) {
						echo '<img src="'.$item['Book']['cover'].'">';
					}else
						echo '<img data-src="holder.js/100x150/text:'.$item['Book']['title'].'">';
					?>
				</div>
			</div>
			<div class="col-xs-8 col-sm-7 ">
				<br>
				<table class="table table-condensed">
					<tbody>
						<tr>
							<td class="text-right"><button type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-star"></span></button></td>
							<td>
								<?php echo $item['Book']['fineness']; ?>
							</td>
						</tr>
						<tr>
							<td class="text-right"><button type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-list-alt"></span></button></td>
							<td>
								<?php echo $item['Book']['type'].' - '.$item['Book']['category']; ?>
							</td>
						</tr>
						<tr>
							<td class="text-right"><button type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-tag"></span></button></td>
							<td><b>
								<?php echo '￥'.$item['Book']['price']; ?>
							</b></td>
						</tr>
						<tr>
							<td class="text-right"><button type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-user"></span></button></td>
							<td>
								<?php echo $item['User']['username']; ?>
							</td>
						</tr>
						<tr>
							<td class="text-right"><button type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-earphone"></span></button></td>
							<td>
								<?php echo '<img data-src="holder.js/100x25/sky/text:'.$item['User']['mobile'].'">'; ?>
							</td>
						</tr>
						<tr>
							<td class="text-right"><button type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-comment"></span></button></td>
							<td><small>
								<?php echo $item['Book']['comment']; ?>
							</small></td>
						</tr>
					</tbody>
				</table>
			</div>
	  </div>
	</div>
<?php } ?>

</div>