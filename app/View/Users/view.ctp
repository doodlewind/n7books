<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">学霸: <?php echo $user['User']['username']?></h3>
  </div>
  <div class="panel-body">
    <div class="col-xs-12">
		<h4><a>TA 的书摊</a></h4>
		<table class="table table-hover">
			<tbody>
<?php 
$count = 0;
foreach($user['Book'] as $book) {
	$count += $book['visit'];
?>
				<tr>
					<td>
<?php echo '<a href="/books/detail/'.$book['id'].'">'.$book['title'].'</a>'; ?>
					</td>
					<td><?php echo $book['author'];?></td>
					<td><b>￥<?php echo $book['price']?></b></td>
						<td><small>『<?php echo $book['comment']?>』</small></td>
				</tr>
<?php } ?>
			</tbody>
		</table>
	</div>
	<div class="col-xs-12">
		<h4><a>TA 是...</a></h4>
		<hr>
		<div class="col-xs-4">
			<h4><small>书摊第 </small>
				<a><?php echo $user['User']['id']; ?></a>
				<small> 位用户</small>
			</h4>
		</div>
		<div class="col-xs-4">
			<h4><small>热度 </small>
				<a><?php echo $count; ?></a>
			</h4>
		</div>
		<div class="col-xs-4">
			<h4>
				<small>
<?php echo $user['User']['grade'].' - '.$user['User']['school']; ?>
				</small>
			</h4>
		</div>
  </div>
</div>