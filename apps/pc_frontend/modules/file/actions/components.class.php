<?php

class fileComponents extends sfComponents
{
  public function executeUpload()
  {
    $this->form = new MemberFileForm();
  }

  public function executeList(sfWebRequest $request)
  {
    $this->pager = Doctrine::getTable('File')->getFilePager($request->getParameter('page', 1), 20);
  }
}
