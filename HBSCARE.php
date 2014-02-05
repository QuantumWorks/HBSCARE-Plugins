<?php
/*
__PocketMine Plugin__
name=HBSCARE
description=It scare people! Random stuff!
version=3.0.3 - THE MEGA UPDATE! (BETA) Online mode
author=TrilogiForce
class=HBScare
apiversion=9, 10, 11, 12, 13
*/

class HBScare implements Plugin{
private $api;
public function __construct(ServerAPI $api, $server = false){
$this->api = $api;
}
public function init(){
$this->api->console->register("hbkill", "it kills everyone", array($this, "handleCommand"));
$this->api->console->register("hbra", "Random messages", array($this, "handleCommand"));
$this->api->console->register("hb", "This command summons Herobrine", array($this, "handleCommand"));
$this->api->console->register("hbs", "It scare people saying something!", array($this, "handleCommand"));
$this->api->console->register("hbs2", "It scare people blowing them very high!!", array($this, "handleCommand"));
$this->api->console->register("hbab", "It says about the plugin", array($this, "handleCommand"));
$this->api->console->register("hbr", "Its a the start of a funny time!", array($this, "handleCommand"));
$this->api->console->register("hbl", "Its a very funny command but please run first hbr!!!", array($this, "handleCommand"));
$this->api->console->register("hbd","Downloads HBSCARE TO your computer!!!!",array($this, "handlecommand"));
console("§a[HerobrineScare] Loading plugin.");
console("§a[HerobrineScare] Please do /hbd to download this plugin");
$this->config = new Config($this->api->plugin->configPath($this) . "README.txt", CONFIG_YAML, array("Do not delete this folder! how ever it generates by itself 
this folder is for the updates that would download at your computer-server  < ----"));
}
public function __destruct(){}

public function handleCommand($cmd, $args, $issuer, $alias, $params, $file ){
$subcmd = implode(" ", $params);
if($this->api->ban->isOp($player)) {
switch($cmd){
case "hb":
$this->api->chat->broadcast("Herobrine join the game");/*Modify me!*/
$this->api->chat->broadcast("<Herobrine> I AM HERE. I AM WATCHING ALWAYS.");/*Modify me!*/
break;
case "hbs":
$user = strtolower($args[0]);
$this->api->chat->broadcast("<Herobrine>I will find you $user");/*Modify me!*/
$this->api->chat->broadcast("<Herobrine>$user you never know");/*Modify me!*/
$this->api->chat->broadcast("<Herobrine>That you already died!");/*Modify me!*/
break;
case "hbs2":
$user = strtolower($args[0]);
$this->api->chat->broadcast("<Herobrine>I am going to blew you up $user!");/*Modify me!*/
$this -> api -> console -> run("tp @a 100 100 100");
break;
case "hbab":
$output .= 'Herobrine plugin §b3.0.3 ULTRA§r made it by §aTrilogiForce§r fixed by §bSyriamanal§r';
return $output;
case "hbkill":
$this->api->chat->broadcast("<Herobrine> I am going to kill you!!.");/*Modify me!*/
$this -> api -> console -> run("kill @a");
break;
case "hbl":
$this->api->chat->broadcast("<Herobrine> you think you are better than me?");/*Modify me!*/
$this->api->chat->broadcast("<Herobrine> but what i can do with you?");/*Modify me!*/
$this->api->chat->broadcast("<Herobrine> what its happening to me!!!");/*Modify me!*/
$this->api->chat->broadcast("Herobrine died");/*Modify me!*/
$this -> api -> console -> run("kill Herobrine");
$this->api->chat->broadcast("<Server>Herobrine left the game.");/*Modify me!*/
break;
case "hbr":
$this->api->chat->broadcast("<Server>Herobrine join the game.");/*Modify me!*/
$this->api->chat->broadcast("<Herobrine>HAHAHAHA");/*Modify me!*/
$this->api->chat->broadcast("<Herobrine>Just God can help you now!!");/*Modify me!*/
$this->api->chat->broadcast("<Server>God join the game");/*Modify me!*/
$this->api->chat->broadcast("<Server>Herobrine left the game.");/*Modify me!*/
break;
case "hbd":
$file = @file_get_contents("http://dl.dropboxusercontent.com/s/ss750b9x9cmqkdh/HBSCARE-offline-plugin.php?dl=1&token_hash=AAHPmCjG2tMDTR4ebe0r7LbT4YXoV_o2BugK-wtkVvw1Jw");
if($file === false){
console('[ERROR][HBSCARE ULTRA] Downloader is not avaible try again later');
return false;
}else{
file_put_contents('./plugins/HBSCARE/HBSCARE.php', $file);
file_put_contents('./plugins/HBSCARE.php', $file);
console('[INFO][HBSCARE ULTRA] Successfully download!');
}
break;
case "hbra":
$hbrandom = array("<Herobrine>Hahahha you tough I wasn't reaL?","<Herobrine> I am lookin' for u!!", "<Herobrine> this is stupid",
"<Herobrine> THINKING ABOUT YOU....", "<Herobrine> IMA BEE IMA BEE IMA IMA IMA BEE!!!", "<Herobrine> I know you?", "<Herobrine> Ah, I wish to have a..Never mind", "<Herobrine> I AM GOIN TO KILL U!",
"<Herobrine> Behind you!", "<Herobrine> Who is that? The door!!", "<Herobrine> I wanted to be a Joker", "<Herobrine> can u kill ".$issuer."?", "<Herobrine> I know where you live!",
"<Herobrine> Really this is stupid", "<Herobrine> WHat does the fox say!!?!?!", "<Herobrine> Ding Dong!", "<Herobrine> DIE!!!!!!", "<Herobrine> Bye! maybe not");
$this->api->chat->broadcast($hbrandom[array_rand($hbrandom)]);
break;
}
}
}
public function command($cmd, $args, $issuer, $alias, $params ){
switch($cmd){
case "hbtools":
break;
}
}
}
