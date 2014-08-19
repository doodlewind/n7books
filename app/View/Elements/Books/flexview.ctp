<?php
$sum = count($books);
for ($i = 0; $i < $sum; $i++) {
	if ($i %4 == 0) {
		echo '<div class="col-xs-12 col-md-12">';
	}
	?>
		<div class="col-xs-12 col-sm-3 col-md-3">
			<div class="col-xs-4 col-sm-12 col-md-12 ">
				<div class="thumbnail">
					<?php
					echo '<a target="_blank" href="/books/view/'.$books[$i]['Book']['title'].'">';
					if ($books[$i]['Book']['cover']) {
						echo '<img src="'.$books[$i]['Book']['cover'].'"></a>';
					}else
						echo '<img data-src="holder.js/100x150/sky/auto/text:'.$books[$i]['Book']['title'].'"></a>';
					?>
				</div>
			</div>
			<div class="col-xs-8 col-sm-12 col-md-12 tb">
				<h3 class="text-left"><small>￥<?php echo $books[$i][0]['min'];?>起 <span class="label label-default"><?php echo $books[$i][0]['count'];?>本</span></small></h3>
				<h5 class="text-right"><?php 
					echo $this->Html->link( $books[$i]['Book']['title'],array(
						'controller' => 'books',
						'action' => 'view',$books[$i]['Book']['title'],
						),
						array('target'=>'_blank')
					);
					?></h5>
				<h6  class="text-right">
					<?php echo '"'.$books[$i]['Book']['comment'].'"';?>
				</h6>
			</div>
		</div>	
	<?php
	if ($i % 4 == 3 ) {
		echo '<div class="col-xs-12"><br></div>
		</div>';
	}
}
echo '<div class="col-xs-12 ">&nbsp;&nbsp;&nbsp;&nbsp;<ul class="pagination">';
echo $this->Paginator->numbers(array(
	'first' => '<<',
	'last' => '>>',
	'tag' => 'li',
	'separator' => '',
	'currentTag' => 'a',
	'currentClass' => 'active'
));
echo '</ul></div>';
echo '</div>';
echo '</div>';


?>