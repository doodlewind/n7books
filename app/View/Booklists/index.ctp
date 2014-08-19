<!--查找begin-->
<h3><a>查找</a><small> - 看看你的专业书单？</small></h3>
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
	foreach ($books as $book){
		?>
		<tr>
			<td><?php echo $book['Booklist']['course']; ?></td>
			<td><?php echo $book['Booklist']['title']; ?></td>
			<td><?php echo $book['Booklist']['author']; ?></td>
	
			<td><?php
				//get first content to search divided by space
				$title = preg_split("/[ ]/", $book['Booklist']['title'])[0];
				echo '<a href="http://opac.lib.ustc.edu.cn/opac/openlink.php?strSearchType=title&match_flag=forward&historyCount=1&strText='.$title.'&doctype=ALL&displaypg=20&showmode=list&sort=CATA_DATE&orderby=desc&location=ALL" role="button" class="btn btn-success btn-xs" target="_blank">GO</a>'
				?>
			</td>
			<td><?php
					echo $this->Form->create('Book', array(
						'controller' => 'books',
						'action' => 'find'
					));
					echo '<input name="data[Book][title]" id="BookTitle" value= "'.$title.'" type="hidden">';
					echo $this->Form->end(array(
						'label' => 'GO',
						'class' => 'btn btn-info btn-xs',
						'target' => "_blank",
					));
					?>
				</td>
		</tr>
<?php
	}
}?>
			</tbody>
		</table>
<!--查找end-->
