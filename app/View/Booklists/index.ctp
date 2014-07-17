
<?php
echo $this->element('booklist');
echo $this->Html->css('booklist');
?>
<br>
	  <table class="table table-hover">
			<tbody>
				<tr>
					<td>标题</td>
					<td>作者</td>
					<td>类型</td>
					<td>书摊</td>
					<td>图书馆</td>
				</tr>
<?php foreach ($books as $book){?>
				<tr>
					<td><?php echo $book['Booklist']['title']; ?></td>
					<td><?php echo $book['Booklist']['author']; ?></td>
					<td><?php echo $book['Booklist']['type']; ?></td>
					<td><?php
						echo '<a href="/books/find/'.$book['Booklist']['title'].'" role="button" class="btn btn-info btn-xs">View</a>'
						?>
					</td>
					<td><button class="btn btn-success btn-xs">View</button></td>
				</tr>
<?php }?>
			</tbody>
		</table>
<?php
echo '<div class="col-xs-8 "><ul class="pagination">';
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
?>