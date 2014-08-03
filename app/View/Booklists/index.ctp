<!--查找begin-->
<h3><a>查找</a><small> - 教材清单待整理，有误敬请谅解</small></h3>
<hr>
<?php
echo $this->element('booklist');
echo $this->Html->css('booklist');
?>

<?php 
if (isset($books)) {
?>
	  <table class="table table-hover">
			<tbody>
				<tr>
					<td>课程</td>
					<td>课本</td>
					<td>作者</td>
					<td>图书馆</td>
					<td>书谱</td>
				</tr>
<?php
	foreach ($books as $book){?>
				<tr>
					<td><?php echo $book['Booklist']['course']; ?></td>
					<td><?php echo $book['Booklist']['title']; ?></td>
					<td><?php echo $book['Booklist']['author']; ?></td>
					<td><?php
						echo '<a href="http://opac.lib.ustc.edu.cn/opac/openlink.php?title='.$book['Booklist']['title'].'" role="button" class="btn btn-success btn-xs" target="_blank">GO</a>'
						?>
					</td>
					<td><?php
						echo $this->Form->create('Book', array(
							'controller' => 'books',
							'action' => 'find'
						));
						echo '<input name="data[Book][title]" id="BookTitle" value= "'.$book['Booklist']['title'].'" type="hidden">';
						echo $this->Form->end(array(
							'label' => 'GO',
							'class' => 'btn btn-info btn-xs',
							'target' => "_blank",
						));
						?>
					</td>
				</tr>
<?php }
}?>
			</tbody>
		</table>
<!--查找end-->

<!--推荐begin-->		
<?php 
if (isset($recommands)) {
?>
	<h3><a>推荐</a></h3>
		  <table class="table table-hover">
				<tbody>
					<tr>
					<td>课本</td>
					<td>作者</td>
					<td>图书馆</td>
					<td>书谱</td>
					</tr>
<?php
	foreach ($recommands as $book){	
?>
				<tr>
					<td><?php echo $book['Booklist']['title']; ?></td>
					<td><?php echo $book['Booklist']['author']; ?></td>
					
					<td><?php
						echo '<a href="http://opac.lib.ustc.edu.cn/opac/openlink.php?title='.$book['Booklist']['title'].'" role="button" class="btn btn-success btn-xs" target="_blank">GO</a>'
						?>
					</td>
					<td><?php
							echo $this->Form->create('Book', array(
								'controller' => 'books',
								'action' => 'find'
							));
							echo '<input name="data[Book][title]" id="BookTitle" value= "'.$book['Booklist']['title'].'" type="hidden">';
							echo $this->Form->end(array(
								'label' => 'GO',
								'class' => 'btn btn-info btn-xs',
								'target' => "_blank",
							));
							?>
						</td>
				</tr>
<?php }
}?>
			</tbody>
		</table>
<!--推荐end-->