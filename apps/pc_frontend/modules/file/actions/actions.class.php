<?php

class fileActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
  }

  public function executeUpload(sfWebRequest $request)
  {
    $this->form = new MemberFileForm();

    if ($request->isMethod(sfWebRequest::POST))
    {
      $files = $request->getFiles($this->form->getName());
      foreach ($files as $file)
      {
        if(false !== strpos($file['type'], 'image'))
        {
          $this->getUser()->setFlash('notice', '画像以外をアップロードしてください');

          $this->redirect('file_index');
        }
      }
      if ($this->form->bindAndSave($request->getParameter($this->form->getName()), $files))
      {
        $this->getUser()->setFlash('notice', 'アップロード完了しました');
      }
    }

    $this->redirect('file_index');
  }

  public function executeDownload(sfWebRequest $request)
  {
    $file = Doctrine::getTable('File')->find($request->getParameter('id'));
    opToolkit::fileDownload(
      $file->getOriginalFilename(),
      $file->getFileBin()->getBin()
    );
  }
}
