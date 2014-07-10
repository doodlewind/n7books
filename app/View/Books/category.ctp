<!-- File: /app/View/bookss/index.ctp -->
<?php
$sum = count($books);
for ($i = 0; $i < $sum; $i++) {
	if ($i %4 == 0) {
		echo '<div class="col-xs-12 col-md-12">';
	}
	?>
		<div class="col-xs-12 col-md-3">
			<div class="col-xs-5 col-md-12">
				<div class="thumbnail">
					<?php
					echo '<img data-src="holder.js/100x150//text:'.$books[$i]['Book']['title'].'">';
					?>
				</div>
			</div>
			<div class="col-xs-7 col-md-12">
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
	//else echo '</div>';
}
echo '</div>';

?>