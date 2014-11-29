<?php

class RPSLSInputHandler {

  private $input;

  public function RPSLSInputHandler($arguments) {
    try {
      $this->input = $arguments;
      $this->clean_input();
      $this->validate_input();
    } catch(Exception $e) {
      echo "Oops! ".$e->getMessage()."\n";
      exit;
    }
  }

  public function get_input() {
    return $this->input;
  }

  private function clean_input() {
    array_shift($this->input);

    foreach ($this->input as $key => $val) {
      $this->input[$key] = trim(strtolower($val));
    }
  }

  private function validate_input() {
    $this->validate_number_of_arguments();
    $this->validate_approved_names();
  }

  private function validate_number_of_arguments() {
    if (sizeof($this->input) != 2) {
      throw new Exception("Please provide 2 arguments.");
    }
  }

  private function validate_approved_names() {
    foreach($this->input as $val) {
      if (!in_array($val, RockPaperScissorsLizardSpock::weapons())) {
        throw new Exception("'".$val."' is not a valid input.");
      }
    }
  }
}