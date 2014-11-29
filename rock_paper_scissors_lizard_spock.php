<?php

class RockPaperScissorsLizardSpock {

  private $player_1;
  private $player_2;
  private $result_matrix = [
      ['T', 'L', 'W', 'W', 'L'],
      ['W', 'T', 'L', 'L', 'W'],
      ['L', 'W', 'T', 'W', 'L'],
      ['L', 'W', 'L', 'T', 'W'],
      ['W', 'L', 'W', 'L', 'T']
  ];

  private $verbs = [
    "scissors-paper"    => "cuts",
    "paper-rock"        => "covers",
    "rock-lizard"       => "crushes",
    "lizard-spock"      => "poisons",
    "spock-scissors"    => "smashes",
    "scissors-lizard"   => "decapitates",
    "lizard-paper"      => "eats",
    "paper-spock"       => "disproves",
    "spock-rock"        => "vaporizes",
    "rock-scissors"     => "crushes"
  ];

  private $winner;
  private $loser;

  public function RockPaperScissorsLizardSpock($input) {
    $valid_input = new RPSLSInputHandler($input);
    $this->assign_player_values($valid_input->get_input());
  }

  public static function weapons() {
    return ["rock", "paper", "scissors", "lizard", "spock"];
  }

  public function play() {
    switch ($this->determine_game_result()) {
      case "W":
        $this->set_winner_loser($this->player_1, $this->player_2);
        break;
      case "L":
        $this->set_winner_loser($this->player_2, $this->player_1);
        break;
      default: break;
    }

    $this->output_result();
  }

  private function assign_player_values($input) {
    $this->player_1 = $input[0];
    $this->player_2 = $input[1];
  }

  private function determine_game_result() {
    $player_1_index = array_search($this->player_1, self::weapons());
    $player_2_index = array_search($this->player_2, self::weapons());

    return $this->result_matrix[$player_1_index][$player_2_index];
  }

  private function set_winner_loser($winner, $loser) {
    $this->winner = $winner;
    $this->loser = $loser;
  }

  private function output_result() {
    if ($this->winner) {
      echo ucfirst($this->winner)." ".$this->verbs[$this->winner."-".$this->loser]." ".$this->loser;
    } else {
      echo "Draw";
    }
    echo "\n";
  }
}