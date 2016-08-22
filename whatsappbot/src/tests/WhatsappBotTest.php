<?php
use Maxi\WhatsappBot;

include 'src/model/WhatsappBot.php';

//class WhatsappBotTest extends PHPUnit_Framework_TestCase{
class WhatsappBotTest{
  private $bot;
  private $username;
  private $nickname;
  private $debug;
  private $log;

  public function setUp(){
    $this->username = "5492920614964";
    $this->nickname = "Eglow";
    $this->debug = true;
    $this->log = true;
  }

  public function testRequestCode(){
    /*
    $this->bot = new WhatsappBot($this->username, $this->nickname, $this->debug, $this->log);
    $this->bot->requestCode();
    */
  }

  public function testValidateNumber(){
    /*
    $this->bot = new WhatsappBot($this->username, $this->nickname, $this->debug, $this->log);
    $receivedCodeBySms = "252099";
    var_dump($this->bot->validateNumber($receivedCodeBySms));//to see password that wa given to us
    */
  }

  public function testSendMessage(){
    $this->bot = new WhatsappBot($this->username, $this->nickname, $this->debug, $this->log);
    $password = "BlT+Yd+poxaaJloW1EKVsWmRkF4=";
    $this->bot->login($password);
    $message = "vbnbvn";
    $target = "5492920541480";
    //$this->bot->sendMessage($target, $message);
  }

  public function readMessages(){
    $this->bot->readMessages();
  }
}
set_time_limit(10);
date_default_timezone_set('Europe/Madrid');
$wt = new WhatsappBotTest();
$wt->setUp();
$wt->testSendMessage();
while (true)
  $wt->readMessages();
