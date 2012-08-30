<table>
<thead>
<tr>
<th><?php echo __('File Name') ?></th>
<th><?php echo __('Created At') ?></th>
</tr>
</thead>
<tbody>
<?php foreach($files as $file): ?>
<tr>
<td><a href="<?php echo url_for('@file_download?id='.$file->getId()).'?'.strtotime('now') ?>"><?php echo $file->getOriginalFilename() ?></a></td>
<td><?php echo $file->getCreatedAt() ?></td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
