<div class="col-md-8 col-md-offset-2">
	<div class="panel panel-default">
		<div class="panel-heading">
			<?php echo $item['Book']['title'].' - '.$item['Book']['author']; ?>
		</div>
		<div class="panel-body">
			
			<div class="col-xs-6">
				<br>
				<table class="table table-condensed">
					<tbody>
						<tr>
							<td><button type="button" class="btn btn-default btn-xs" disabled="disabled"><span class="glyphicon glyphicon-star"></span></button></td>
							<td>
								<?php echo $item['Book']['fineness']; ?>
							</td>
						</tr>
						<tr>
							<td><button type="button" class="btn btn-default btn-xs" disabled="disabled"><span class="glyphicon glyphicon-list-alt"></span></button></td>
							<td>
								<?php echo $item['Book']['type'].' - '.$item['Book']['category']; ?>
							</td>
						</tr>
						<tr>
							<td><button type="button" class="btn btn-default btn-xs" disabled="disabled"><span class="glyphicon glyphicon-tag"></span></button></td>
							<td><b>
								<?php echo '￥'.$item['Book']['price']; ?>
							</b></td>
						</tr>
						<tr>
							<td><button type="button" class="btn btn-default btn-xs" disabled="disabled"><span class="glyphicon glyphicon-user"></span></button></td>
							<td>
								<?php 
								echo '<a href="/users/view/'.$item['User']['id'].'">'.$item['User']['username'].'</a>'.' - '.$item['User']['campus']; 
								?>
							</td>
						</tr>
						<tr>
							<td><button type="button" class="btn btn-default btn-xs" disabled="disabled"><span class="glyphicon glyphicon-earphone"></span></button></td>
							<td>
								<?php echo '<img data-src="holder.js/100x25/gray/text:'.$item['User']['mobile'].'">'; ?>
							</td>
						</tr>
						<tr>
							<td><button type="button" class="btn btn-default btn-xs" disabled="disabled"><span class="glyphicon glyphicon-eye-open"></span></button></td>
							<td>
								<?php echo $item['Book']['visit']; ?>
							</td>
						</tr>
						<tr>
							<td><button type="button" class="btn btn-default btn-xs" disabled="disabled"><span class="glyphicon glyphicon-comment"></span></button></td>
							<td><small>
								<?php echo $item['Book']['comment']; ?>
							</small></td>
						</tr>
						<!--
						<tr>
							<td><button type="button" class="btn btn-default btn-xs" disabled="disabled"><span class="glyphicon glyphicon-share-alt"></span></button></td>
							<td>
								<a name="xn_share" onclick="shareClick()" type="icon" href="javascript:;"></a>
							</td>
						</tr>
							-->
					</tbody>
				</table>
			</div>
			<div class="col-xs-6"><br>
				<div class="thumbnail">
					<?php
					if ($item['Book']['cover']) {
						echo '<img src="'.$item['Book']['cover'].'">';
					}else
						echo '<img data-src="holder.js/100x150/gray/auto/text:'.$item['Book']['title'].'">';
					?>
				</div>
			</div>
	  </div>
	</div>
</div>