<table>
<thead>
<tr>
<th><?php echo __('File Name') ?></th>
<th><?php echo __('Created At') ?></th>
<th>&nbsp;</th>
</tr>
</thead>
<tbody>
<?php foreach($files as $file): ?>
<tr>
<td><a href="<?php echo url_for('@file_download?id='.$file->getId()).'?'.strtotime('now') ?>"><?php echo $file->getOriginalFilename() ?></a></td>
<td><?php echo $file->getCreatedAt() ?></td>
<td><?php echo link_to('削除', url_for('@file_delete?id='.$file->getId())) ?></td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
