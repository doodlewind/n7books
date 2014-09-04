<?php echo $this->Html->script('/js/flexview'); ?>
<div class="row">
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
					//echo '<a target="_blank" href="/books/view/'.$books[$i]['Book']['title'].'">';
					//echo '<img src="'.$books[$i]['Book']['cover'].'"></a>';
					//echo '<img data-src="holder.js/100x150/gray/auto/text:'.h($books[$i]['Book']['title']).'"></a>';
					if ($books[$i]['Book']['cover']) {
						echo $this->Html->link(
						    $this->Html->image($books[$i]['Book']['cover'], array('alt' => 'Brownies')),
						    array(
									'controller' => 'books',
									'action' => 'view',$books[$i]['Book']['title'],
						    ),
						    array('escapeTitle' => false, 'target' => '_blank')
						);

					}else {
						echo $this->Html->link(
						    $this->Html->image('img.png', array("data-src" => "holder.js/100x150/gray/auto/text:".$books[$i]['Book']['title'],'alt' => 'Brownies')),
						    array(
									'controller' => 'books',
									'action' => 'view',$books[$i]['Book']['title'],
						    ),
						    array('escapeTitle' => false, 'target' => '_blank')
						);
					}
						
						
					?>
				</div>
			</div>
			<div class="col-xs-8 col-sm-12 col-md-12 tb">
				<h3 class="text-left"><small><del>￥<?php echo $books[$i]['Book']['list_price'];?></del><price>￥<?php echo $books[$i][0]['min'];?>起</price>&nbsp;<span class="label label-default"><?php echo $books[$i][0]['count'];?>本</span></small></h3>
				<h5 class="text-right"><?php 
					echo $this->Html->link( $books[$i]['Book']['title'],array(
						'controller' => 'books',
						'action' => 'view',$books[$i]['Book']['title'],
						),
						array('target'=>'_blank')
					);
					?></h5>
				<h5 class="text-right"><small>
					<?php echo '"'.$books[$i]['Book']['comment'].'"';?>
					<small></h5>
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
	'first' => '首页',
	'last' => '末页',
	'tag' => 'li',
	'separator' => '',
	'currentTag' => 'a',
	'currentClass' => 'active'
));
echo '</ul></div>';
echo '</div>';
echo '</div>';


?>
</div>