<?php

function op_file_get_pager_navigation($pager, $internalUri, $options = array())
{
  $uri = url_for($internalUri);

  if (isset($options['use_current_query_string']) && $options['use_current_query_string'])
  {
    $options['query_string'] = sfContext::getInstance()->getRequest()->getCurrentQueryString();
    $pageFieldName = isset($options['page_field_name']) ? $options['page_field_name'] : 'page';
    $options['query_string'] = preg_replace('/'.$pageFieldName.'=\d\&*/', '', $options['query_string']);
    unset($options['page_field_name']);
    unset($options['use_current_query_string']);
  }

  if (isset($options['query_string']))
  {
    $options['link_options']['query_string'] = $options['query_string'];
    unset($options['query_string']);
  }

  $params = array(
    'pager' => $pager,
    'internalUri' => $internalUri,
    'options' => new opPartsOptionHolder($options)
  );

  $pager = sfOutputEscaper::unescape($pager);
  if ($pager instanceof sfReversibleDoctrinePager)
  {
    return get_partial('global/pagerReversibleNavigation', $params);
  }
  else
  {
    return get_partial('global/pagerNavigation', $params);
  }
}
