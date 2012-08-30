<?php

/**
 * This file is part of the OpenPNE package.
 * (c) OpenPNE Project (http://www.openpne.jp/)
 *
 * For the full copyright and license information, please view the LICENSE
 * file and the NOTICE file that were distributed with this source code.
 */

/**
 * file actions
 *
 * @package    opFileUploadPlugin
 * @subpackage file
 * @author     Yuya Watanabe <watanabe@tejimaya.com>
 *
 */
class fileActions extends sfActions
{
  /**
   * Executes index action
   */
  public function executeIndex()
  {
  }

  /**
   * Executes upload action
   *
   * @param sfRequest $request A request object
   */
  public function executeUpload(sfWebRequest $request)
  {
    $this->form = new MemberFileForm();

    if ($request->isMethod(sfWebRequest::POST))
    {
      $i18n = sfContext::getInstance()->getI18n();

      $files = $request->getFiles($this->form->getName());
      foreach ($files as $file)
      {
        if(false !== strpos($file['type'], 'image'))
        {
          $this->getUser()->setFlash('notice', $i18n->__('Please upload file except Image'));

          $this->redirect('file_index');
        }
      }
      if ($this->form->bindAndSave($request->getParameter($this->form->getName()), $files))
      {
        $this->getUser()->setFlash('notice', $i18n->__('Upload Successful'));
      }
    }

    $this->redirect('file_index');
  }

  /**
   * Executes download action
   *
   * @param sfRequest $request A request object
   */
  public function executeDownload(sfWebRequest $request)
  {
    $file = Doctrine::getTable('File')->find($request->getParameter('id'));
    opToolkit::fileDownload(
      $file->getOriginalFilename(),
      $file->getFileBin()->getBin()
    );
  }

  /**
   * Executes delete action
   *
   * @param sfRequest $request A request object
   */
  public function executeDelete(opWebRequest $request)
  {
    $file = Doctrine::getTable('File')->find($request->getParameter('id'));

    $this->form = new sfForm();

    if ($request->isMethod(sfWebRequest::POST))
    {
      $request->checkCSRFProtection();

      $file->delete();
      $this->getUser()->setFlash('notice', 'ファイルを削除しました');
      $this->redirect('@file_index');
    }
  }
}
