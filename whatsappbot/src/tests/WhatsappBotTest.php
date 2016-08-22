<?php
set_time_limit(10);
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
    $this->bot = new WhatsappBot($this->username, $this->nickname, $this->debug, $this->log);
    $this->bot->requestCode();
  }

  public function testValidateNumber(){
    $this->bot = new WhatsappBot($this->username, $this->nickname, $this->debug, $this->log);
    $receivedCodeBySms = "251821";
    var_dump($this->bot->validateNumber($receivedCodeBySms));//to see password that wa given to us
  }

  public function testSendMessage(){
    $this->bot = new WhatsappBot($this->username, $this->nickname, $this->debug, $this->log);
    $password = "KFY/xqcjxnM65wb/XUJMP2wRBDI="; 
    $this->bot->login($password);
    $message = "Fronteamos porque podemos.";
    $target = "5492920688288";
    $this->bot->sendMessage($target, $message);
  }

  public function readMessages(){
    $this->bot->readMessages();
  }

  public function sendImage(){
	   $this->bot = new WhatsappBot($this->username, $this->nickname, $this->debug, $this->log);
    $password = "KFY/xqcjxnM65wb/XUJMP2wRBDI="; 
    $this->bot->login($password);
	$this->bot->sendImage("5492920688288", "https://i.ytimg.com/vi/uXCtOk5dedI/maxresdefault.jpg");
  } 
 	

}
$wt = new WhatsappBotTest();
$wt->setUp();
$wt->sendImage();
$wt->testSendMessage();

/*
$wt->testSendMessage();
while (true)
	$wt->readMessages();
 */
