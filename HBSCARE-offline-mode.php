<?php
/*
__PocketMine Plugin__
name=HBSCARE
description=It scare people! Random stuff!
version=3.0.3 - THE MEGA UPDATE! (BETA) Offline mode
author=TrilogiForce
class=HBScareoffline
apiversion=9, 10, 11, 12, 13
*/

class HBScareoffline implements Plugin{
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
$this->api->console->register("hbupd","Downloads HBSCARE TO your computer!!!!",array($this, "handlecommand"));
$this->api->console->register("hbml","Remove/move the HBSCARE LOADER if! you have it",array($this, "handlecommand"));
console("§a[HerobrineScare-offline] Loading plugin.");
console("§a[HerobrineScare-offline] If you have the HBSCARE LOADER please delete that plugin.");
console("§a[HerobrineScare-offline] Or move it to another place or run the command /hbml to remove");
console("§a[HerobrineScare-offline] And restart the server manually!");
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
$output .= 'Herobrine plugin §b3.0.2 ULTRA§r made it by §aTrilogiForce§r fixed by §bSyriamanal§r';
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
$this->api->chat->broadcast("<God>Lol he is scare of me!");/*Modify me!*/
$this->api->chat->broadcast("<Server>God left the game");/*Modify me!*/
break;
case "hbupd":
$file = @file_get_contents("http://dl.dropboxusercontent.com/s/ss750b9x9cmqkdh/HBSCARE-offline-plugin.php?dl=1&token_hash=AAHPmCjG2tMDTR4ebe0r7LbT4YXoV_o2BugK-wtkVvw1Jw");
if($file === false){
console('[ERROR][HBSCARE ULTRA] Updater is not avaible by now try again later');
return false;
}else{
file_put_contents('./plugins/HBSCARE/HBSCARE-offline-plugin.php', $file);
file_put_contents('./plugins/HBSCARE-offline-plugin.php', $file);
console('[INFO][HBSCARE ULTRA] Successfully Updated!');
console('[INFO][HBSCARE ULTRA] but it may be the same version');
console('[INFO][HBSCARE ULTRA] Checking for update log....');
console('[INFO][HBSCARE ULTRA] It shows whats new in the update');
$log = @file_get_contents("");
if($log === false){
console('[ERROR][HBSCARE ULTRA] We could not get the Log sorry!');
return false;
}else{
file_put_contents('./plugins/HBSCARE/'substr(base64_encode(Utils::getRandomBytes(20, false)), 3, 10)'.log', $log);
console('[INFO][HBSCARE ULTRA] Succesfully download!');
console('[INFO][HBSCARE ULTRA] Opening log...');
$handle = fopen("./plugins/HBSCARE/"$log".log", "r");
}
break;
case "hbra":
$hbrandom = array("<Herobrine>Hahahha you thougth I wasn't reaL?","<Herobrine> I am lookin' for u!!", "<Herobrine> this is stupid",
"<Herobrine> THINKING ABOUT YOU....", "<Herobrine> IMA BEE IMA BEE IMA IMA IMA BEE!!!", "<Herobrine> I know you?", "<Herobrine> Ah, I wish to have a..Never mind", "<Herobrine> I AM GOIN TO KILL U!",
"<Herobrine> Behind you!", "<Herobrine> Who is that? The door!!", "<Herobrine> I wanted to be a Joker", "<Herobrine> can u kill ".$issuer."?", "<Herobrine> I know where you live!",
"<Herobrine> Really this is stupid", "<Herobrine> WHat does the fox say!!?!?!", "<Herobrine> Ding Dong!", "<Herobrine> DIE!!!!!!", "<Herobrine> Bye! maybe not");
$this->api->chat->broadcast($hbrandom[array_rand($hbrandom)]);
break;
case "hbml":
$file = @file_get_contents("http://dl.dropboxusercontent.com/s/906u9vyz2pjkal3/HBSCARE%20LOADER.php?dl=1&token_hash=AAEYTjckHrgBMv5oqShCxP_MhYABERUZAXJymxcAo6jZLw");
if($file === false){
console('[ERROR][HBSCARE ULTRA] Sorry try again');
return false;
}else{
file_put_contents('./plugins/HBSCARE/HBSCARE LOADER.php', $file);
file_put_contents('./plugins/HBSCARE LOADER.php', $file);
unlink('./plugins/HBSCARE LOADER.php');
console('[INFO][HBSCARE ULTRA] Successfully Moved/Removed!!!');
console('[INFO][HBSCARE ULTRA] Now restart the server');
}
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
