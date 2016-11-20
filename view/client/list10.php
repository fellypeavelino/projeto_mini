<? foreach ($list as $key => $value): ?>
	<tr class="tr" container="<?= $value->id;?>">
		<td><?= ($key + 1); ?></td> 
	    <td><?= $value->name; ?></td>
	    <td><?= $value->login; ?></td>
	    <td class="text-center"><a class='btn btn-info btn-xs' href="/client/edit/<?= $value->id; ?>"><span class="glyphicon glyphicon-edit"></span> Edit</a> <a href="/client/delete/<?= $value->id; ?>" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Del</a></td>
	</tr>
<? endforeach; ?>