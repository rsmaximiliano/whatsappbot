<?php
namespace Maxi;

use \WhatsProt;
use \Registration;

include '../Chat-API/src/whatsprot.class.php';
include '../Chat-API/src/Registration.php';

class WhatsappBot{

  private $username;
  private $nickname;
  private $debug;
  private $log;
  private $w;

  function __construct($username, $nickname, $debug, $log){
    $this->username = $username;    // Your number with country code, ie: 34123456789
    $this->nickname = $nickname;    // Your nickname, it will appear in push notifications
    $this->debug = $debug;  // Shows debug log, this is set to false if not specified
    $this->log = $log;  // Enables log file, this is set to false if not specified

    // Create a instance of WhatsProt class.
    $this->w = new WhatsProt($username, $nickname, $debug, $log);
  }

  function requestCode(){
    // Create a instance of Registration class.
    $r = new Registration($this->username, $this->debug);
    $r->codeRequest('sms'); // could be 'voice' too

  }

  function validateNumber($receivedCodeBySms){
    $r = new Registration($this->username, $this->debug);
    return $r->codeRegister($receivedCodeBySms);
  }

  function login($password){
    $this->w->connect(); // Connect to WhatsApp network
    $this->w->loginWithPassword($password); // logging in with the password we got!
    $this->w->sendSetProfilePicture("/usr/share/php/whatsappbot/whatsappbot/src/model/profile.png");
  }

  function readMessages(){
    return $this->w->pollMessage();
  }

  function sendMessage($target, $message){
    $numbers = array($target);
    $this->w->sendSync($numbers);
    $this->w->sendMessage($target, $message);
    while ($this->w->pollMessage());
  }

  function sendImage($to, $imagePath){
    $numbers = array($to);
    $this->w->sendSync($numbers);
    $this->w->sendMessageImage($to, $imagePath);
    while ($this->w->pollMessage());
  }
}
