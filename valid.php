<?php

define('CURSCRIPT', 'valid');

require './include/common.inc.php';
require './include/user.func.php';

if(!$cuser||!$cpass) { gexit($_ERROR['no_login'],__file__,__line__); }
if($gamestate < 20) { gexit($_ERROR['no_start'],__file__,__line__); }
//if($gamestate >= 30) { gexit($_ERROR['valid_stop'],__file__,__line__); }

$result = $db->query("SELECT * FROM {$tablepre}users WHERE username='$cuser'");
if(!$db->num_rows($result)) { gexit($_ERROR['login_check'],__file__,__line__); }
$udata = $db->fetch_array($result);
$wingames = $udata['wingames'];
if($udata['password'] != $cpass) { gexit($_ERROR['wrong_pw'], __file__, __line__); }
if($udata['groupid'] <= 0) { gexit($_ERROR['user_ban'], __file__, __line__); }

if($gamestate >= 30 && $udata['groupid'] < 6 && $cuser != $gamefounder) {
	gexit($_ERROR['valid_stop'],__file__,__line__);
}

if($mode == 'enter') {
	if($iplimit) {
		$result = $db->query("SELECT * FROM {$tablepre}users AS u, {$tablepre}players AS p WHERE u.ip='{$udata['ip']}' AND ( u.username=p.name AND p.type=0)");
		if($db->num_rows($result) > $iplimit) { gexit($_ERROR['ip_limit'],__file__,__line__); }
	}	

	$ip = real_ip();
	$db->query("UPDATE {$tablepre}users SET gender='$gender', icon='$icon', motto='$motto', killmsg='$killmsg', lastword='$lastword' WHERE username='".$udata['username']."'" );
	if($validnum >= $validlimit) {
		gexit($_ERROR['player_limit'],__file__, __line__);
	}
	$result = $db->query("SELECT * FROM {$tablepre}players WHERE name = '$cuser' AND type = 0");
	if($db->num_rows($result)) {
		gexit($_ERROR['player_exist'], __file__, __line__);
	}
	if ($gender !== 'm' && $gender !== 'f'){
		$gender = 'm';
	}

	$validnum++;
	$alivenum++;
	$name = $cuser;
	$pass = $cpass;
	$gd = $gender;
	$type = 0;
	$endtime = $validtime = $now;
	$sNo = $validnum;
	$hp = $mhp = $hplimit;
	$sp = $msp = $splimit;
	$rand = rand(0,15);
	$att = 95 + $rand;
	$def = 105 - $rand;
	$pls = 0;
	$killnum = 0;
	$lvl = 0;
	$exp = $areanum * 20;
	$money = 20;
	$rage = 0;
	$pose = 0;
	$tactic = 0;
	$icon = $icon ? $icon : rand(1,$iconlimit);
	$club = 0;

	$arb = $gd == 'm' ? '男生校服' : '女生校服';
	$arbk = 'DB'; $arbe = 5; $arbs = 15; $arbsk = '';
	$arh = $ara = $arf = $art = '';
	$arhk = $arak = $arfk = $artk = '';
	$arhsk = $arask = $arfsk = $artsk = '';
	$arhe = $arae = $arfe = $arte = 0;
	$arhs = $aras = $arfs = $arts = 0;
	
	//获取已经完成的成就
	include_once GAME_ROOT.'./include/game/achievement.func.php';
	$achievement = $udata['achievement'];
	if (!valid_achievement($achievement)) {
		$achievement=init_achievement($achievement);
		$db->query("UPDATE {$tablepre}users SET achievement='$achievement' WHERE username='".$name."'" );		//如果第一次游戏，初始化成就
	}
	for ($i=0; $i<=6; $i++){$itm[$i] = $itmk[$i] = $itmsk[$i] = ''; $itme[$i] = $itms[$i] = 0;}
	$itm[1] = '面包'; $itmk[1] = 'HH'; $itme[1] = 120; $itms[1] = 15;
	$itm[2] = '矿泉水'; $itmk[2] = 'HS'; $itme[2] = 140; $itms[2] = 15;
	//$itm[6] = '银白盒子'; $itmk[6] = 'p'; $itme[6] = 1; $itms[6] = 1; $itmsk[6] = 'ps';
	$itm[5] = '秋刀鱼罐头'; $itmk[5] = 'HB'; $itme[5] = 70; $itms[5] = 15;
	
	if ($wingames <=1){
	$itm[6] = '银白盒子'; $itmk[6] = 'ps'; $itme[6] = 1; $itms[6] = 1; $itmsk[6] = '';
	}
	
	$weplist = openfile(config('stwep',$gamecfg));
	do { 
		$index = rand(1,count($weplist)-1); 
		list($wep,$wepk,$wepe,$weps,$wepsk) = explode(",",$weplist[$index]);
	} while(!$wepk);

	$stitemlist = openfile(config('stitem',$gamecfg));
	do { 
		$index = rand(1,count($stitemlist)-1); 
		list($itm[3],$itmk[3],$itme[3],$itms[3],$itmsk[3]) = explode(",",$stitemlist[$index]);
	} while(!$itmk[3]);
	do { 
		$index = rand(1,count($stitemlist)-1); 
		list($itm[4],$itmk[4],$itme[4],$itms[4],$itmsk[4]) = explode(",",$stitemlist[$index]);
	} while(!$itmk[4] || ($itmk[3] == $itmk[4]));

	if(strpos($wepk,'WG') === 0){
		$itm[3] = '手枪子弹'; $itmk[3] = 'GB'; $itme[3] = 1; $itms[3] = 12; $itmsk[3] = '';
	}
	
	include_once GAME_ROOT.'./include/game/clubslct.func.php';
	getclub($name,$tc1,$tc2,$tc3);
	if ($tc1==7 || $tc2==7 || $tc3==7)
	{
		if (rand(1,10)%2==1)
		{
			$itm[4] = '生命探测器'; $itmk[4] = 'ER'; $itme[4] = 3; $itms[4] = 1; $itmsk[4] = '';
		}
		else
		{
			$itm[4] = '电池'; $itmk[4] = 'BE'; $itme[4] = 2; $itms[4] = 1; $itmsk[4] = '';
		}
	}
//	$itm[5] = '好人卡'; $itmk[5] = 'Y'; $itme[5] = 1; $itms[5] = 20; $itmsk[5] = '';
	//$itm[5] = '特别赠礼'; $itmk[5] = 'p'; $itme[5] = 1; $itms[5] = 1; $itmsk[5] = '';
//	$shenzhuang = rand(1,10);
//	switch ($shenzhuang) {
//		case 1:
//			$itm[5] = '圭一少年的球棒'; $itmk[5] = 'WP'; $itme[5] = 1800; $itms[5] = 100; $itmsk[5] = 'e';
//		break;
//		case 2:
//			$itm[5] = '简称为UCW的三弦'; $itmk[5] = 'WK'; $itme[5] = 1800; $itms[5] = 100; $itmsk[5] = 'p';
//		break;
//		case 3:
//			$itm[5] = '燃素粒子火焰炮'; $itmk[5] = 'WG'; $itme[5] = 1800; $itms[5] = 100; $itmsk[5] = 'u';
//		break;
//		case 4:
//			$itm[5] = '水晶的超级球'; $itmk[5] = 'WC'; $itme[5] = 1800; $itms[5] = 100; $itmsk[5] = 'ir';
//		break;
//		case 5:
//			$itm[5] = '久违的KEY系催泪弹'; $itmk[5] = 'WD'; $itme[5] = 1800; $itms[5] = 100; $itmsk[5] = 'd';
//		break;
//		case 6:
//			$itm[5] = '梦想天生'; $itmk[5] = 'WF'; $itme[5] = 1800; $itms[5] = 100; $itmsk[5] = 'd';
//		break;
//		case 7:
//			$itm[5] = '这样的装备没问题么的铠甲'; $itmk[5] = 'DB'; $itme[5] = 1800; $itms[5] = 100; $itmsk[5] = 'E';
//		break;
//		case 8:
//			$itm[5] = '这样的装备没问题么的头盔'; $itmk[5] = 'DH'; $itme[5] = 1800; $itms[5] = 100; $itmsk[5] = 'q';
//		break;
//		case 9:
//			$itm[5] = '这样的装备没问题么的手套'; $itmk[5] = 'DA'; $itme[5] = 1800; $itms[5] = 100; $itmsk[5] = 'U';
//		break;
//		case 10:
//			$itm[5] = '这样的装备没问题么的靴子'; $itmk[5] = 'DF'; $itme[5] = 1800; $itms[5] = 100; $itmsk[5] = 'I';
//		break;
//	}
	if ($name == 'Amarillo_NMC') {
		$msp += 500;$mhp += 500;$hp += 500;$sp += 500;
		$att += 200;$def += 200;
		$exp += 3000;$money = 20000;$rage = 255;$pose = 1;$tactic = 3;
		$itm[1] = '死者苏生'; $itmk[1] = 'HB'; $itme[1] = 2000; $itms[1] = 400; $itmsk[1] = '';
		$itm[2] = '移动PC'; $itmk[2] = 'EE'; $itme[2] = 50; $itms[2] = 1;
		$itm[3] = '超光速快子雷达'; $itmk[3] = 'ER'; $itme[3] = 32; $itms[3] = 1;$itmsk[3] = 2;
		$itm[4] = '凸眼鱼'; $itmk[4] = 'Y'; $itme[4] = 1; $itms[4] = 30;$itmsk[4] = '';
		$itm[5] = '楠叶特制营养剂'; $itmk[5] = 'ME'; $itme[5] = 50; $itms[5] = 12;
		$itm[6] = '测试道具'; $itmk[6] = 'ME'; $itme[6] = 50; $itms[6] = 12;
		$wep = '神圣手榴弹';$wepk = 'WC';$wepe = 8765;$weps = 876;$wepsk = 'd';
		$arb = '守桥人的长袍';$arbk = 'DB'; $arbe = 3200; $arbs = 100; $arbsk = 'A';
		$arh = '千年积木';$arhk = 'DH'; $arhe = 1600; $arhs = 120; $arhsk = 'c';
		$ara = '皇家钻戒';$arak = 'DA'; $arae = 1600; $aras = 120; $arask = 'a';
		$arf = '火弩箭';$arfk = 'DF'; $arfe = 1600; $arfs = 120; $arfsk = 'M';
		$art = '贤者之石';$artk = 'A'; $arte = 9999; $arts = 999; $artsk = 'H';
		$wp=$wk=$wg=$wc=$wd=$wf=600;
	
	}elseif($name == '霜火协奏曲') {
		$art = '击败思念的纹章';$artk = 'A'; $arte = 1; $arts = 1; $artsk = 'zZ';
	}elseif($name == '时期') {
		$art = '击败鬼畜级思念的纹章';$artk = 'A'; $arte = 1; $arts = 1; $artsk = 'zZ';
	}elseif($name == '枪毙的某神' || $name == '精灵们的手指舞') {
		$art = 'TDG地雷的证明';$artk = 'A'; $arte = 1; $arts = 1; $artsk = 'zZ';
	}
	
	$nick=$udata['nick'];
	$nicks=$udata['nicks'];
	if (($nicks=='')||($nick=='')){
		$nick='参展者';
		$nicks='参展者';
		$db->query("UPDATE {$tablepre}users SET nick='$nick', nicks='$nicks' WHERE username='".$udata['username']."'" );
	}else{
	if (strpos($nicks,$nick)===false){
		$nick='弱子';
	}
	}
//	
//	if(strpos($ip,'124.226.190')===0){
//		$msp = $sp = 16;$mhp = $hp = 6666;
//		$att = 1;$def = 1;$lvl = 0;
//		$money = 0;$club=17;
//		$itm[1] = '管理员之怒1'; $itmk[1] = 'HH'; $itme[1] = 100; $itms[1] = 30; $itmsk[1] = '';
//		$itm[2] = '管理员之怒2'; $itmk[2] = 'HS'; $itme[2] = 15; $itms[2] = 30; $itmsk[2] = '';
//		$itm[3] = '废物'; $itmk[3] = 'Y'; $itme[3] = 1; $itms[3] = 1; $itmsk[3] = '';
//		$itm[4] = '废物'; $itmk[4] = 'Y'; $itme[4] = 1; $itms[4] = 1; $itmsk[4] = '';
//		$wep = '啊哈哈哈我已经天下无敌了！';$wepk = 'WF';$wepe = 1;$weps = 8765;$wepsk = '';
//		$arb = '超级无敌纸防御';$arbk = 'DB'; $arbe = 30000; $arbs = 1; $arbsk = '';
//		$arh = '超级无敌纸防御';$arhk = 'DH'; $arhe = 30000; $arhs = 1; $arhsk = '';
//		$ara = '超级无敌纸防御';$arak = 'DA'; $arae = 30000; $aras = 1; $arask = '';
//		$arf = '超级无敌纸防御';$arfk = 'DF'; $arfe = 30000; $arfs = 1; $arfsk = '';
//		$art = '不发装备了，这个收好';$artk = 'A'; $arte = 1; $arts = 1; $artsk = 'HcM';
//	}

//	if ($name == '内衣') {
//		$itm[3] = '奖品-泽克西斯之荣耀模样的杏仁豆腐'; $itmk[3] = 'HB'; $itme[3] = 50; $itms[3] = 15; $itmsk[2] = 'z';
//		$itm[4] = '奖品-Flint Lock模样的杏仁豆腐'; $itmk[4] = 'HB'; $itme[4] = 50; $itms[4] = 15; $itmsk[3] = 'z';
//		$itm[5] = '『灵魂宝石』模样的杏仁豆腐'; $itmk[5] = 'HB'; $itme[5] = 50; $itms[5] = 15; $itmsk[4] = 'Z';
//		$wep = '奖品-福林洛克';$wepk = 'WP';$wepe = 85;$weps = 85;$wepsk = 'dZ';
//		$arb = '奖品-黑暗星云之祝福';$arbk = 'DB'; $arbe = 85; $arbs = 85; $arbsk = 'AaZ';
//		$arh = '奖品-黄色铃铛';$arhk = 'DH'; $arhe = 85; $arhs = 85; $arhsk = 'AaZ';
//		$ara = '奖品-地元素挂饰';$arak = 'DA'; $arae = 85; $aras = 85; $arask = 'AaZ';
//		$arf = '奖品-福林克之靴';$arfk = 'DF'; $arfe = 85; $arfs = 85; $arfsk = 'AaZ';
//		$art = '奖品-泽克西斯菁英';$artk = 'A'; $arte = 85; $arts = 85; $artsk = 'AaZ';
//	}
	$state = 0;
	$bid = 0;

	$inf = $teamID = $teamPass = '';
	$db->query("INSERT INTO {$tablepre}players (name,pass,type,endtime,validtime,gd,sNo,icon,club,hp,mhp,sp,msp,att,def,pls,lvl,`exp`,money,bid,inf,rage,pose,tactic,killnum,state,wp,wk,wg,wc,wd,wf,teamID,teamPass,wep,wepk,wepe,weps,arb,arbk,arbe,arbs,arh,arhk,arhe,arhs,ara,arak,arae,aras,arf,arfk,arfe,arfs,art,artk,arte,arts,itm0,itmk0,itme0,itms0,itm1,itmk1,itme1,itms1,itm2,itmk2,itme2,itms2,itm3,itmk3,itme3,itms3,itm4,itmk4,itme4,itms4,itm5,itmk5,itme5,itms5,itm6,itmk6,itme6,itms6,wepsk,arbsk,arhsk,arask,arfsk,artsk,itmsk0,itmsk1,itmsk2,itmsk3,itmsk4,itmsk5,itmsk6,nick,nicks) VALUES ('$name','$pass','$type','$endtime','$validtime','$gd','$sNo','$icon','$club','$hp','$mhp','$sp','$msp','$att','$def','$pls','$lvl','$exp','$money','$bid','$inf','$rage','$pose','$tactic','$state','$killnum','$wp','$wk','$wg','$wc','$wd','$wf','$teamID','$teamPass','$wep','$wepk','$wepe','$weps','$arb','$arbk','$arbe','$arbs','$arh','$arhk','$arhe','$arhs','$ara','$arak','$arae','$aras','$arf','$arfk','$arfe','$arfs','$art','$artk','$arte','$arts','$itm[0]','$itmk[0]','$itme[0]','$itms[0]','$itm[1]','$itmk[1]','$itme[1]','$itms[1]','$itm[2]','$itmk[2]','$itme[2]','$itms[2]','$itm[3]','$itmk[3]','$itme[3]','$itms[3]','$itm[4]','$itmk[4]','$itme[4]','$itms[4]','$itm[5]','$itmk[5]','$itme[5]','$itms[5]','$itm[6]','$itmk[6]','$itme[6]','$itms[6]','$wepsk','$arbsk','$arhsk','$arask','$arfsk','$artsk','$itmsk[0]','$itmsk[1]','$itmsk[2]','$itmsk[3]','$itmsk[4]','$itmsk[5]','$itmsk[6]','$nick','$nicks')");
	$db->query("UPDATE {$tablepre}users SET lastgame='$gamenum' WHERE username='$name'");
	global $nick;
	if($udata['groupid'] >= 6 || $cuser == $gamefounder){
		addnews($now,'newgm',$nick.' '.$name,"{$sexinfo[$gd]}{$sNo}号",$ip);
	}else{
		addnews($now,'newpc',$nick.' '.$name,"{$sexinfo[$gd]}{$sNo}号",$ip);
	}
	
	if($validnum >= $validlimit && $gamestate == 20){
		$gamestate = 30;
	}
	//$gamestate = $validnum < $validlimit ? 20 : 30;
	save_gameinfo();
	

	include template('validover');
} elseif($mode == 'notice') {
	include template('notice');
} elseif($mode == 'tutorial') {
	if(!isset($tmode)){$tmode = 0;}
	$nexttmode = $tmode +1;
	include template('tutorial');
} else {
	extract($udata);
	$result = $db->query("SELECT * FROM {$tablepre}players WHERE name = '$cuser' AND type = 0");
	if($db->num_rows($result)) {
		header("Location: game.php");exit();
	}

	if($validnum >= $validlimit) {
		gexit($_ERROR['player_limit'],__file__,__line__);
	}
	$iconarray = get_iconlist($icon);
	$select_icon = $icon;
	include template('valid');
}

function makeclub() {
	global $wp,$wk,$wg,$wc,$wd,$wf,$money,$mhp,$msp,$hp,$sp,$att,$def;
	$wp = $wk = $wg = $wc = $wd = $wf = 0;
	$dice = rand(0,105);
	if($dice < 10)		{$club = 1;$wp = 30;}//殴25
	elseif($dice < 20)	{$club = 2;$wk = 30;}//斩25
	elseif($dice < 30)	{$club = 3;$wc = 30;}//投25
	elseif($dice < 40)	{$club = 4;$wg = 30;}//射25
	elseif($dice < 50)	{$club = 5;$wd = 20;}//爆25
	elseif($dice < 55)	{$club = 6;}//移动、探索消耗减
	elseif($dice < 60)	{$club = 7;}//P(HACK)=1
	elseif($dice < 65)	{$club = 8;}//查毒可
	elseif($dice < 75)	{$club = 9;$wf = 20;}//能使用必杀，灵25
	elseif($dice < 80)	{$club = 10;}//攻击熟练+2
	elseif($dice < 85)	{$club = 11;$money = 500;}//出击钱数500
	elseif($dice < 90)	{$club = 16;$wp = $wk = $wg = $wc = $wd = $wf = 15;}//全熟练50
	elseif($dice < 95)	{$club = 13;$mhp = $mhp + 200;$hp = $mhp;}//生命上限提高200
	elseif($dice < 100)	{$club = 14;$att = $att + 200;$def = $def + 200;}//攻防+100
	elseif($dice <= 105) {$club = 18;}
	else				{$club = makeclub();}
	return $club;
}
?>


