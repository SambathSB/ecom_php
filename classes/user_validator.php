<?php
class UserValidator
{
  private $data;
  private $errors = [];
  private static $fields = ['username', 'email', 'password'];

  public function __construct($postData)
  {
    $this->data = $postData;
  }

  public function validatorForm()
  {
    // foreach(self::$fields as $field) {
    //   if (!array_key_exists($field, $this->data)) {
    //     trigger_error("$field is not present in data");
    //     return;
    //   }
    // }

    if (array_key_exists('username', ($this->data)))
      $this->validatorUsername();
    if (array_key_exists('email', ($this->data)))
      $this->validatorEmail();
    if (array_key_exists('password', ($this->data)))
      $this->validatorPassword();
    return $this->errors;
  }

  private function validatorUsername()
  {
    $value = trim($this->data['username']);

    if (empty($value)) {
      $this->addErrors('username', 'username cannot be empty');
    } else {
      if (!preg_match('/^[a-zA-Z0-9]{6,12}$/', $value)) {
        $this->addErrors('username', 'username must be 6-12 chars');
      }
    }
  }

  private function validatorEmail()
  {
    $value = trim($this->data['email']);

    if (empty($value)) {
      $this->addErrors('email', 'email cannot be empty');
    } else {
      if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
        $this->addErrors('email', 'email must be a valid email');
      }
    }
  }

  private function validatorPassword()
  {
    $value = trim($this->data['password']);

    if (empty($value)) {
      $this->addErrors('password', 'password cannot be empty');
    } else {
      if (!preg_match('/^[a-zA-Z0-9]{8,12}$/', $value)) {
        $this->addErrors('password', 'password must be 8-12 chars');
      }
    }
  }

  private function addErrors($key, $value)
  {
    $this->errors[$key] = $value;
  }
}
