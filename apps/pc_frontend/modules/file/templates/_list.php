<?php use_helper('opFileHandleUtil') ?>

<?php $listStr = op_file_get_pager_navigation($pager, '@file_index?page=%d').get_partial('fileInfo', array('files' => $pager->getResults())).op_file_get_pager_navigation($pager, '@file_index?page=%d')?>
<?php op_include_parts('Box', 'fileList', array('title' => 'アップロードファイルリスト', 'body' => $listStr)) ?>
