<?php
$sum = count($books);
for ($i = 0; $i < $sum; $i++) {
	if ($i %4 == 0) {
		echo '<div class="col-xs-12 col-md-12">';
	}
	?>
		<div class="col-xs-12 col-sm-3 col-md-3">
			<div class="col-xs-5 col-sm-12 col-md-12">
				<div class="thumbnail">
					<?php
					echo '<a href="/books/view/'.$books[$i]['Book']['title'].'">';
					if ($books[$i]['Book']['cover']) {
						echo '<img src="'.$books[$i]['Book']['cover'].'"></a>';
					}else
						echo '<img data-src="holder.js/100x150//text:'.$books[$i]['Book']['title'].'"></a>';
					?>
				</div>
			</div>
			<div class="col-xs-7 col-sm-12 col-md-12">
				<h3 class="text-left"><small>￥<?php echo $books[$i][0]['min'];?>起 <span class="label label-default"><?php echo $books[$i][0]['count'];?>本</span></small></h3>
				<h4 class="text-right"><?php 
					echo $this->Html->link( $books[$i]['Book']['title'],
						array('controller' => 'books', 'action' => 'view',$books[$i]['Book']['title'])
						);
					?></h4>
				<h6  class="text-right">
					<?php echo '"'.$books[$i]['Book']['comment'].'"';?>
				</h6>
			</div>
		</div>	
	<?php
	if ($i % 4 == 3 ) {
		echo '<div class="col-xs-12"><hr></div>
		</div>';
	}
}
echo '</div>';

?>