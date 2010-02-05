<?php
// lib/form/doctrine/BackendJobeetJobForm.class.php
abstract class PluginBackendJobeetJobForm extends JobeetJobForm
{
  public function setup()
  {
    parent::setup();

    $this->widgetSchema['logo'] = new sfWidgetFormInputFileEditable(array(
      'label'     => 'Company logo',
      'file_src'  => '/uploads/jobs/'.$this->getObject()->getLogo(),
      'is_image'  => true,
      'edit_mode' => !$this->isNew(),
      'template'  => '<div>%file%<br />%input%<br />%delete% %delete_label%</div>',
    ));

    $this->validatorSchema['logo_delete'] = new sfValidatorPass();

  }

  protected function removeFields()
  {
    unset(
      $this['created_at'], $this['updated_at'],
      $this['token']
    );
  }
}
?>
