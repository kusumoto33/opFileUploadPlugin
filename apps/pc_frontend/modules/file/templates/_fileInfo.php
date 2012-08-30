<table>
<thead>
<tr>
<th>ファイル名</th>
<th>作成日</th>
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
