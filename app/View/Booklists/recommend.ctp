
<?php
print_r('!'.$grade);

print_r($recommends);

echo $this->Html->css('booklist');
?>
<br>
	  <table class="table table-hover">
			<tbody>
<?php foreach ($recommends as $book){?>
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
