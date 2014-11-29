<?php

require "rpsls_input_handler.php";
require "rock_paper_scissors_lizard_spock.php";

$rpsls = new RockPaperScissorsLizardSpock($argv);
$rpsls->play();