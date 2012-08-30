<?php

/**
 * This file is part of the OpenPNE package.
 * (c) OpenPNE Project (http://www.openpne.jp/)
 *
 * For the full copyright and license information, please view the LICENSE
 * file and the NOTICE file that were distributed with this source code.
 */

/**
 * file components
 *
 * @package    opFileHandlePlugin
 * @subpackage file
 * @author     Yuya Watanabe <watanabe@tejimaya.com>
 *
 */
class fileComponents extends sfComponents
{
  /**
   * Executes upload component
   */
  public function executeUpload()
  {
    $this->form = new MemberFileForm();
  }

  /**
   * Executes list component
   *
   * @param sfRequest $request A request object
   */
  public function executeList(sfWebRequest $request)
  {
    $this->pager = Doctrine::getTable('File')->getFilePager($request->getParameter('page', 1), 20);
  }
}
