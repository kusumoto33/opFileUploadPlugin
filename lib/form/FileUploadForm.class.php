<?php

class FileUploadForm extends BaseFileForm
{
  public function configure()
  {
    $this->setWidget('file', new sfWidgetFormInputFile());
    $this->setValidator('file', new sfValidatorFile(array('required' => true)));

    $this->useFields(array('file'));
  }

  public function save()
  {
    $file = new File();
    $file->setFromValidatedFile($this->getValue('file'));
    $file->setName('uploader_'.$this->getObject()->getId().'_'.$file->getName());

    return $file->save();
  }
}
