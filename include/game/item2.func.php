<?php
if(!defined('IN_GAME')) {
	exit('Access Denied');
}

function use_func_item($usemode,$item)
{
	if ($usemode=="poison"){poison($item);}
	elseif ($usemode=="wthchange"){wthchange($item);}
	elseif ($usemode=="hack") {hack($item);}
	elseif ($usemode=="newradar") {newradar($item);}
	elseif ($usemode=="divining") {divining($item);}
	elseif ($usemode=="divining1") {divining1($item);}
	elseif ($usemode=="divining2") {divining2($item);}
	elseif ($usemode=="deathnote") {deathnote($item);}
	elseif ($usemode=="qianghua") {qianghua($item);}
	elseif ($usemode=="nametag") {nametag($item);}
	elseif ($usemode=="supernametag") {supernametag($item);}
}

function poison($itmn = 0) {
	global $mode,$log,$nosta,$art,$club,$pid;
	global $itmp,${'itm'.$itmp},${'itms'.$itmp},${'itmk'.$itmp},${'itme'.$itmp},${'itmsk'.$itmp};
	$poison = & ${'itm'.$itmp};
	$poisonk = & ${'itmk'.$itmp};
	$poisone = & ${'itme'.$itmp};
	$poisons = & ${'itms'.$itmp};
	$poisonsk = & ${'itmsk'.$itmp};
	if ( $itmn < 1 || $itmn > 6 ) {
		$log .= '此道具不存在，请重新选择。';
		$mode = 'command';
		return;
	}
	global ${'itm'.$itmn},${'itmk'.$itmn},${'itmsk'.$itmn};
	$itm = & ${'itm'.$itmn};
	$itmk = & ${'itmk'.$itmn};
	$itmsk = & ${'itmsk'.$itmn};
	if(($poison != '毒药') || (strpos($itmk, 'H') !==0 && strpos($itmk, 'P') !== 0)) {
		$log .= '道具选择错误，请重新选择。<br>';
		$mode = 'command';
		return;
	}
	$itmk = substr_replace($itmk,'P',0,1);
	if($club == 8){ $itmk = substr_replace($itmk,'2',2,1); }
	elseif($art == '毒物说明书'){$itmk = substr_replace($itmk,'1',2,1);};
	if($art == '妖精的羽翼') {$itmk = substr_replace($itmk,'H',0,1);$log .= "一种神秘的力量净化了毒药，你的毒药变成了解毒剂！";}
	$itmsk = $pid;
	if($art == '妖精的羽翼') {$log .= "使用了 <span class=\"red\">$poison</span> ，<span class=\"yellow\">${'itm'.$itmn}</span> 被净化了！<br>";}
	else {$log .= "使用了 <span class=\"red\">$poison</span> ，<span class=\"yellow\">${'itm'.$itmn}</span> 被下毒了！<br>";}
	$poisons--;
	if($poisons <= 0){
		$log .= "<span class=\"red\">$poison</span> 用光了。<br>";
		$poison = $poisonk = '';$poisone = $poisons = 0;
	}


	$mode = 'command';
	return;
}

function wthchange($itm,$itmsk){
	global $now,$log,$weather, $wthinfo, $name,$nick;
	$weathertd = $weather;
	if($weather >= 14 && $weather <= 16){
		addnews ( $now, 'wthfail', $nick.' '.$name, $weather, $itm );
		$log .= "你使用了{$itm}。<br /><span class=\"red\">但是恶劣的天气并未发生任何变化！</span><br />";
	}else{
		if($itmsk==99){$weather = rand ( 0, 13 );}//随机全天气
		elseif($itmsk==98){$weather = rand ( 10, 13 );}//随机恶劣天气
		elseif($itmsk==97){$weather = rand ( 0, 9 );}//随机一般天气
		elseif($itmsk==96){$weather = rand ( 8, 9 );}//随机起雾天气
		elseif(!empty($itmsk) && is_numeric($itmsk)){
			if($itmsk >=0 && $itmsk < count($wthinfo)){
				$weather = $itmsk;
			}else{$weather = 0;}
		}
		else{$weather = 0;}
		
		$flag = false;
		if($itm=='【风神的神德】'){
			$dice = rand ( 1, 20 );
			if ($dice < 18){
				$flag = true;
			} else{
				$weather = 6;
			}
		}
		if($flag){
			$weather = $weathertd;
			$log .= "你使用了<span class=\"yellow\">{$itm}</span>。<br>“好像没什么反应嘛？”";
			include_once GAME_ROOT . './include/state.func.php';
			$log .= "你正这样想着，天空中忽然传来一阵巨响！”<br>“祈求神德的话，就以你的生命作为祭品吧！<br>你只来得及看到一个巨大的柱状物飞来，就失去了意识。";
			death ( 'thunde', '', 0, $itm );
		} else {
			include_once GAME_ROOT . './include/system.func.php';
			save_gameinfo ();
			addnews ( $now, 'wthchange', $nick.' '.$name, $weather, $itm );
			$log .= "你使用了<span class=\"yellow\">{$itm}</span>。<br />天气突然转变成了<span class=\"red\">$wthinfo[$weather]</span>！<br />";
		}
	}
	return;
}

function hack($itmn = 0) {
	global $log,$hack,$hack_obbs,$club,$now,$name,$alivenum,$deathnum,$hp,$state,$nick;
	
	global ${'itm'.$itmn},${'itmk'.$itmn},${'itme'.$itmn},${'itms'.$itmn},${'itmsk'.$itmn};
	$itm = & ${'itm'.$itmn};
	$itmk = & ${'itmk'.$itmn};
	$itme = & ${'itme'.$itmn};
	$itms = & ${'itms'.$itmn};
	$itmsk = & ${'itmsk'.$itmn};

	if(!$itms) {
		$log .= '此道具不存在，请重新选择。<br>';
		$mode = 'command';
		return;
	}

	if(!$itme) {
		$log .= "<span class=\"yellow\">$itm</span>已经没电，请寻找<span class=\"yellow\">电池</span>充电。<br>";
		$mode = 'command';
		return;
	}

	$hack_dice = rand(0,99);
	if(($hack_dice < $hack_obbs)||(($club == 7)&&($hack_dice<95))) {
		$hack = 1;
		$log .= '入侵禁区控制系统成功了！全部禁区都被解除了！<br>';
		include_once GAME_ROOT.'./include/system.func.php';
		movehtm();
		addnews($now,'hack',$nick.' '.$name);
		storyputchat($now,'hack');
		save_gameinfo();
	} else {
		$log .= '可是，入侵禁区控制系统失败了……<br>';
	}
	if($club == 7){
		$e_dice = rand(0,1);
		if($e_dice == 1){
			$itme--;
			$log .= "消耗了<span class=\"yellow\">$itm</span>的电力。<br>";
		}else{
			$log .= "由于操作迅速，<span class=\"yellow\">$itm</span>的电力没有消耗。<br>";
		}
	}else{
		$itme--;
		$log .= "消耗了<span class=\"yellow\">$itm</span>的电力。<br>";
	}
	
	$hack_dice2 = rand(0,99);

	if($hack_dice2 < 5 && $club != 7) {
		$log .= '由于你的不当操作，禁区系统防火墙锁定了你的电脑并远程引爆了它。幸好你本人的位置并没有被发现。<br>';
		$itm = $itmk = $itmsk = '';
		$itme = $itms = 0;
	} elseif($hack_dice2 < 8 && $club != 7) {
			$log .= "<span class=\"evergreen\">“小心隔墙有耳哦。”</span>——林无月<br>";
			include_once GAME_ROOT.'./include/state.func.php';
			$log .= '你擅自入侵禁区控制系统，被控制系统远程消灭！<br>';
			death('hack');
	} elseif($itme <= 0) {
		$log .= "<span class=\"red\">$itm</span>的电池耗尽了。";
	}
	return;
}

function newradar($m = 0){
	global $mode,$log,$cmd,$main,$pls,$db,$tablepre,$plsinfo,$arealist,$areanum,$hack,$gamestate;
	global $pnum,$npc2num,$npc3num,$npc4num,$npc5num,$npc6num,$radarscreen,$typeinfo,$weather;
	
	if((CURSCRIPT !== 'botservice') && (!$mode)) {
		$log .= '仪器使用失败！<br>';
		return;
	}
	//echo $weather;
	if($weather == 14){
		$dice = rand(0,1);
		if($dice == 1){
			$log .= '由于<span class="linen">离子风暴</span>造成了电磁干扰，探测仪器完全显示不出信息……<br>';
			return;
		}
	}
	$npctplist = Array(90,92,2,5,6,7,11,14,89);
	$tdheight = 20;
	$screenheight = count($plsinfo)*$tdheight;
	if (CURSCRIPT == 'botservice') 
	{
		if ($m==2)
			$result = $db->query("SELECT type,sNo,pls,name FROM {$tablepre}players WHERE hp>0");
		else  $result = $db->query("SELECT type,sNo,pls,name FROM {$tablepre}players WHERE hp>0 AND pls='{$pls}'");
		$rows=$db->num_rows($result);
		echo "radarresultnum=$rows\n";
		$i=0;
		while($data = $db->fetch_array($result)) 
		{
			$i++;
			echo "radarresulttype$i={$data['type']}\n";
			echo "radarresultsNo$i={$data['sNo']}\n";
			echo "radarresultpls$i={$data['pls']}\n";
			echo "radarresultname$i={$data['name']}\n";
		}	
	}
	else
	{
		$result = $db->query("SELECT type,pls FROM {$tablepre}players WHERE hp>0");
		while($cd = $db->fetch_array($result)) {
			$chdata[] = $cd;
		}
		$radar = array();
		foreach ($chdata as $data){
			if(isset($radar[$data['pls']][$data['type']])){$radar[$data['pls']][$data['type']]+=1;}
			else{$radar[$data['pls']][$data['type']]=1;}
		}
		$radarscreen = '<table height='.$screenheight.'px width=720px border="0" cellspacing="0" cellpadding="0" valign="middle"><tbody>';
		$radarscreen .= "<tr>
			<td class=b2 height={$tdheight}px width=120px><div class=nttx></div></td>
			<td class=b2><div class=nttx>{$typeinfo[0]}</div></td>";
		foreach ($npctplist as $value){
			$radarscreen .= "<td class=b2><div class=nttx>{$typeinfo[$value]}</div></td>";
		}
		$radarscreen .= '</tr>';
		for($i=0;$i<count($plsinfo);$i++) {
			$radarscreen .= "<tr><td class=b2 height={$tdheight}px><div class=nttx>{$plsinfo[$i]}</div></td>";
			if((array_search($i,$arealist) > $areanum) || $hack) {
				if($i==$pls) {
					//$result = $db->query("SELECT pid FROM {$tablepre}players WHERE hp>0 AND type='0' AND pls=$i");
					//$num0 = $db->num_rows($result);
					$num0 = $radar[$i][0];
					foreach ($npctplist as $j){
						//$result = $db->query("SELECT pid FROM {$tablepre}players WHERE hp>0 AND type=$j AND pls=$i");
						//${'num'.$j} = $db->num_rows($result);
							if($gamestate == 50){${'num'.$j} = 0;}
						else{
							${'num'.$j} = isset($radar[$i][$j]) ? $radar[$i][$j] : 0;
						}
					}
					if($num0){
						$pnum[$i] ="<span class=\"yellow b\">$num0</span>";
					} else {
						$pnum[$i] ='<span class="yellow b">-</span>';
					}
					foreach ($npctplist as $j){
						//${'npc'.$j.'num'}[$i] = "<span class=\"yellow b\">${'num'.$j}</span>";
						if(${'num'.$j}){
						${'npc'.$j.'num'}[$i] ="<span class=\"yellow b\">${'num'.$j}</span>";
						} else {
						${'npc'.$j.'num'}[$i] ='<span class="yellow b">-</span>';
						}
					}
				} elseif($m >= 2) {
					//$result = $db->query("SELECT pid FROM {$tablepre}players WHERE hp>0 AND type='0' AND pls=$i");
					//$num0 = $db->num_rows($result);
					$num0 = isset($radar[$i][0]) ? $radar[$i][0] : 0;
					foreach ($npctplist as $j){
						//$result = $db->query("SELECT pid FROM {$tablepre}players WHERE hp>0 AND type=$j AND pls=$i");
						//${'num'.$j} = $db->num_rows($result);
						if($gamestate == 50){${'num'.$j} = 0;}
						else{
							${'num'.$j} = isset($radar[$i][$j]) ? $radar[$i][$j] : 0;
						}
						
					}
					if ($m==2)
						if($num0){
							$pnum[$i] =$num0;
						} else {
							$pnum[$i] ='-';
						}	
					else  $pnum[$i] = '？';
					//$pnum[$i] ="$num0";
					foreach ($npctplist as $j){
						//${'npc'.$j.'num'}[$i] = "${'num'.$j}";;
						if(${'num'.$j}){
	
							${'npc'.$j.'num'}[$i] =${'num'.$j};

						} else {
							${'npc'.$j.'num'}[$i] ='-';
						}
					}
				} else {
					$pnum[$i] = '？';
					foreach ($npctplist as $j){
						${'npc'.$j.'num'}[$i] = '？';
					}
				}	
			} else {	
				$pnum[$i] = '<span class="red b">×</span>';
				foreach ($npctplist as $j){
				${'npc'.$j.'num'}[$i] = '<span class="red b">×</span>';
				}
			}
			$radarscreen .= "<td class=b3><div class=nttx>{$pnum[$i]}</div></td>";
			foreach ($npctplist as $j){
				$radarscreen .= "<td class=b3><div class=nttx>{${'npc'.$j.'num'}[$i]}</div></td>";
			}	
			$radarscreen .= '</tr>';
		}
		$radarscreen .= '</tbody></table>';
		$log .= '白色数字：该区域内的人数<br><span class="yellow b">黄色数字</span>：自己所在区域的人数<br><span class="red b">×</span>：禁区<br><br>';
		include template('radarcmd');
		$cmd = ob_get_contents();
		ob_clean();
		//$cmd = '<input type="radio" name="command" id="menu" value="menu" checked><a onclick=sl("menu"); href="javascript:void(0);" >返回</a><br><br>';
		$main = 'radar';
	}
	return;
}

function divining(){
	global $log;
	
	$dice = rand(0,99);
	if($dice < 20) {
		$up = 5;
		list($uphp,$upatt,$updef) = explode(',',divining1($up));
		$log .= "是大吉！要有什么好事发生了！<BR><span class=\"yellow b\">【命】+$uphp 【攻】+$upatt 【防】+$updef</span><BR>";
	} elseif($dice < 40) {
		$up = 3;
		list($uphp,$upatt,$updef) = explode(',',divining1($up));
		$log .= "中吉吗？感觉还不错！<BR><span class=\"yellow b\">【命】+$uphp 【攻】+$upatt 【防】+$updef</span><BR>";
	} elseif($dice < 60) {
		$up = 1;
		list($uphp,$upatt,$updef) = explode(',',divining1($up));
		$log .= "小吉吗？有跟无也没有什么分别。<BR><span class=\"yellow b\">【命】+$uphp 【攻】+$upatt 【防】+$updef</span><BR>";
	} elseif($dice < 80) {
		$up = 1;
		list($uphp,$upatt,$updef) = explode(',',divining2($up));
		$log .= "凶，真是不吉利。<BR><span class=\"red b\">【命】-$uphp 【攻】-$upatt 【防】-$updef</span><BR>";
	} else {
		$up = 3;
		list($uphp,$upatt,$updef) = explode(',',divining2($up));
		$log .= "大凶？总觉得有什么可怕的事快要发生了<BR><span class=\"red b\">【命】-$uphp 【攻】-$upatt 【防】-$updef</span><BR>";
	}
	return;
}

function divining1($u) {
	global $hp,$mhp,$att,$def;
	$uphp = rand(0,$u);
	$upatt = rand(0,$u);
	$updef = rand(0,$u);
	
	$hp+=$uphp;
	$mhp+=$uphp;
	$att+=$upatt;
	$def+=$updef;
	
	
	return "$uphp,$upatt,$updef";

}

function divining2($u) {
	global $hp,$mhp,$att,$def;
	$uphp = rand(0,$u);
	$upatt = rand(0,$u);
	$updef = rand(0,$u);
	
	if($hp - $uphp <= 0){
		$uphp = $hp-1;
		if($uphp < 0){$uphp = 0;}
	}
	
	$hp-=$uphp;
	$mhp-=$uphp;
	$att-=$upatt;
	$def-=$updef;
	
	return "$uphp,$upatt,$updef";
}

function deathnote($itmd=0,$dnname='',$dndeath='',$dngender='m',$dnicon=1,$sfn) {
	global $db,$tablepre,$log,$killnum,$mode,$achievement;
	global ${'itm'.$itmd},${'itms'.$itmd},${'itmk'.$itmd},${'itme'.$itmd},${'itmsk'.$itmd};
	$dn = & ${'itm'.$itmd};
	$dnk = & ${'itmk'.$itmd};
	$dne = & ${'itme'.$itmd};
	$dns = & ${'itms'.$itmd};
	$dnsk = & ${'itmsk'.$itmd};

	$mode = 'command';

	if($dn != '■DeathNote■' && $dn != '四面亲手制作的■DeathNote■' ){
		$log .= '道具使用错误！<br>';
		return;
	} elseif($dns <= 0) {
		$dn = $dnk = $dnsk = '';
		$dne = $dns = 0;
		$log .= '道具不存在！<br>';
		return;
	}

	if(!$dnname){return;}
	if($dnname == $sfn && $dn != '四面亲手制作的■DeathNote■'){
		$log .= "你不能自杀。<br>";
		return;
	}
	if(!$dndeath){$dndeath = '心脏麻痹';}
	if ($dn == '四面亲手制作的■DeathNote■') $dndeath="使用了天然呆四面的假冒伪劣■DeathNote■";
	//echo "name=$dnname,gender = $dngender,icon=$dnicon,";
	if ($dn != '四面亲手制作的■DeathNote■') 
		$result = $db->query("SELECT * FROM {$tablepre}players WHERE name='$dnname' AND type = 0");
	else  $result = $db->query("SELECT * FROM {$tablepre}players WHERE name='$sfn' AND type = 0");
	if(!$db->num_rows($result)) { 
		$log .= "你使用了■DeathNote■，但是什么都没有发生。<br>哪里出错了？<br>"; 
	} else {
		$edata = $db->fetch_array($result);
		
		if((($dngender != $edata['gd'])||($dnicon != $edata['icon'])) && ($dn != '四面亲手制作的■DeathNote■')) {
			$log .= "你使用了■DeathNote■，但是什么都没有发生。<br>哪里出错了？<br>"; 
		} else {
			if ($dn != '四面亲手制作的■DeathNote■') 
			{
				$log .= "你将<span class=\"yellow b\">$dnname</span>的名字写在了■DeathNote■上。<br>";
				$log .= "<span class=\"yellow b\">$dnname</span>被你杀死了。";
				include_once GAME_ROOT.'./include/state.func.php';
				kill('dn',$dnname,0,$edata['pid'],$dndeath);
				$killnum++;
			}
			else  
			{
				$log .= "你将<span class=\"yellow b\">$dnname</span>的名字写在了■DeathNote■上。<br>";
				$log .= "但就在这时，你突然感觉一阵晕眩。<br>你失去了意识。<br>";
				$log .= "<span class='lime'>“这张■DeathNote■似乎制作不合格呢，还真是对不起呢……”<br></span>";
				include_once GAME_ROOT.'./include/state.func.php';
				death ( 'fake_dn', '', 0, $dndeath);
				$killnum++;
			}
		}
	}
	$dns--;
	if($dns<=0){
		$log .= '■DeathNote■突然燃烧起来，转瞬间化成了灰烬。<br>';
		$dn = $dnk = $dnsk = '';
		$dne = $dns = 0;
	}
	return;
}

function qianghua($itmn = 0) {
	global $mode,$log,$nosta,$name,$nick;
	global $itmp,${'itm'.$itmp},${'itms'.$itmp},${'itmk'.$itmp},${'itme'.$itmp},${'itmsk'.$itmp};
	$baoshi = & ${'itm'.$itmp};
	$baoshie = & ${'itme'.$itmp};
	$baoshis = & ${'itms'.$itmp};
	$baoshik = & ${'itmk'.$itmp};
	$baoshisk = & ${'itmsk'.$itmp};	
	if ( $itmn < 1 || $itmn > 6 ) {
		$log .= '此道具不存在，请重新选择。';
		$mode = 'command';
		return;
	}
	global ${'itm'.$itmn},${'itme'.$itmn},${'itms'.$itmn},${'itmk'.$itmn},${'itmsk'.$itmn};
	$itm = & ${'itm'.$itmn};
	$itme = & ${'itme'.$itmn};
	$itms = & ${'itms'.$itmn};
	$itmk = & ${'itmk'.$itmn};
	$itmsk = & ${'itmsk'.$itmn};
	if($baoshis <= 0 || ($baoshi != '『灵魂宝石』' && $baoshi != '『祝福宝石』')) {
		$log .= '强化道具选择错误，请重新选择。<br>';
		$mode = 'command';
		return;
	}
	if(!$itms || strpos ( $itmsk, 'Z' ) === false) {
		$log .= '被强化道具选择错误，请重新选择。<br>';
		$mode = 'command';
		return;
	}
	$o_itm = $itm;
	if(!preg_match("/\[\+[0-9]\]/",$itm)){
		$itm = ${'itm'.$itmn}.'[+0]';
//		$itme = round(${'itme'.$itmn} * 1.5);
		$flag = true;
		$zitmlv = 0;
//		var_dump($zitmlv);
	}else{
		//$zitmlv = preg_replace("/\[\+([0-9])\]/","\\1",$zitmlv[0]);
		preg_match("/\[\+([0-9])\]/",$itm,$zitmlv);
		//var_dump($zitmlv);
		$zitmlv = $zitmlv[1];
		//$dengji = substr(${'itm'.$itmn},strpos(${'itm'.$itmn},"[+")+2,strlen(${'itm'.$itmn}) - strpos(${'itm'.$itmn},"]")+1);//北京你自己看着办
    //$dengji = str_replace(']','',$dengji);
		if($zitmlv >= 3 && $baoshi != '『灵魂宝石』'){
			$log .= '你所选的宝石只能强化装备到[+3]哦!DA☆ZE<br>';
		  $mode = 'command';
			return;
		}else{
			if ($zitmlv >= 4){
				$gailv = rand(1,$zitmlv-2);
			}elseif ($zitmlv >= 6){
				$gailv = rand(1,$zitmlv-1);
			}elseif ($zitmlv >= 10){
				$gailv = rand(1,$zitmlv);
			}else{
				$gailv = 1;
			}
			if ($gailv == 1 ){
				$flag = true;
			}else{$flag = false;}
	  }	
  }	
  addnews ( $now, 'newwep2',$nick.' '.$name, $baoshi, $o_itm );
	if ($flag){

	 $log .= "<span class=\"yellow\">『一道神圣的闪光照耀在你的眼睛上，当你恢复视力时，发现你的装备闪耀着彩虹般的光芒』</span><br>";
	 $nzitmlv = $zitmlv +1;
	 $itm = str_replace('[+'.$zitmlv.']','[+'.$nzitmlv.']',$itm);
	 $itme = round($itme * (1.5 + 0.1 * $zitmlv));
	}else{
	 //$ran = rand(5,20);
	 //$log .="<span class=\"yellow\">『一道神圣的闪光照耀在你的眼睛上，当你恢复视力时，发现你的装备变成了{$ran}块闪耀着彩虹光芒的碎片』</span><br>";
	 //$itm = "★散发着彩虹光芒的的碎片★";
	 $itm = "悲叹之种";
	 //$itme = round(${'itme'.$itmn} / $ran);
	 $itme = 1;
	 //$itms = $ran;
	 $itms = 1;
	 $itmk = 'X';
	 $itmsk = '';
	 $log .="<span class=\"yellow\">『一道神圣的闪光照耀在你的眼睛上，当你恢复视力时，发现你的装备变成了{$itm}』</span><br>";
	}			
	$baoshis--;
	if($baoshis <= 0){
		$log .= "<span class=\"red\">$baoshi</span> 用光了。<br>";
		$baoshi = $baoshik = $baoshisk = '';$baoshie = $baoshis = 0;
	}	
	$mode = 'command';
	return;
}	

function nametag($item){
	global $rename,$ntitm,$log,$now,$command,$mode,$nosta;
	global ${'itm'.$ntitm},${'itms'.$ntitm},${'itmk'.$ntitm},${'itme'.$ntitm},${'itmsk'.$ntitm};
	if(${'itm'.$ntitm} != '残响兵器' || ${'itmk'.$ntitm} != 'Y' || !${'itms'.$ntitm}){
		$log .= "<span class=\"yellow\">道具不存在！</span><br>";
		$mode = 'command';
		return;
	}
	if($item == 'itm'.$ntitm){
		$log .= "<span class=\"yellow\">不能修改道具自身！</span><br>";
		$mode = 'command';
		return;
	}
	if(strpos($item,'itm')===0){
		$i = str_replace('itm','',$item);
		global ${'itm'.$i},${'itms'.$i},${'itmk'.$i},${'itme'.$i},${'itmsk'.$i};
		$rn = & ${'itm'.$i};
		$rnk = & ${'itmk'.$i};
		$rne = & ${'itme'.$i};
		$rns = & ${'itms'.$i};
		$rnsk = & ${'itmsk'.$i};
	}else{
		global ${$item},${$item.'k'}, ${$item.'e'}, ${$item.'s'},${$item.'sk'};
		$rn = & ${$item};
		$rnk = & ${$item.'k'};
		$rne = & ${$item.'e'};
		$rns = & ${$item.'s'};
		$rnsk = & ${$item.'sk'};
	}
	
	
	if(!$rns || !$rne){
		$log .= "<span class=\"yellow\">道具选择错误！</span><br>";
		$mode = 'command';
		return;
	}
	if(strpos($rnk,'Y')===0 || strpos($rnk,'Z')===0){
		$log .= "<span class=\"yellow\">不能修改特殊道具的名字！</span><br>";
		$mode = 'command';
		return;
	}
	if(!$rename){
		$log .= "<span class=\"yellow\">请输入符合要求的名字！</span><br>";
		$mode = 'command';
		return;
	}
	$mark = '■';
	$rn0 = $rn;
	$rn = $mark.$rename.$mark;
	$rnsk = str_replace('Z','x',$rnsk);
	$log .= "{$rn0}已改名为<span class=\"yellow\">$rn</span>！武器的菁英属性已经抹消。<br>";
	if(${'itms'.$ntitm} != $nosta){
		${'itms'.$ntitm} --;
		if(${'itms'.$ntitm} <= 0){
			$log .= "<span class=\"yellow\">{${'itm'.$ntitm}}用完了。</span><br>";
			${'itm'.$ntitm} = ${'itmk'.$ntitm} = ${'itmsk'.$ntitm} = '';
			${'itms'.$ntitm} = ${'itme'.$ntitm} = 0;		
		}
	}
	$mode = 'command';
	return;
}
function supernametag($item){
	global $rename,$ntitm,$log,$now,$command,$mode,$nosta;
	global ${'itm'.$ntitm},${'itms'.$ntitm},${'itmk'.$ntitm},${'itme'.$ntitm},${'itmsk'.$ntitm};
	if(${'itm'.$ntitm} != '超臆想时空' || ${'itmk'.$ntitm} != 'Y' || !${'itms'.$ntitm}){
		$log .= "<span class=\"yellow\">道具不存在！</span><br>";
		$mode = 'command';
		return;
	}
	if($item == 'itm'.$ntitm){
		$log .= "<span class=\"yellow\">不能修改道具自身！</span><br>";
		$mode = 'command';
		return;
	}
	if(strpos($item,'itm')===0){
		$i = str_replace('itm','',$item);
		global ${'itm'.$i},${'itms'.$i},${'itmk'.$i},${'itme'.$i},${'itmsk'.$i};
		$rn = & ${'itm'.$i};
		$rnk = & ${'itmk'.$i};
		$rne = & ${'itme'.$i};
		$rns = & ${'itms'.$i};
		$rnsk = & ${'itmsk'.$i};
	}else{
		global ${$item},${$item.'k'}, ${$item.'e'}, ${$item.'s'},${$item.'sk'};
		$rn = & ${$item};
		$rnk = & ${$item.'k'};
		$rne = & ${$item.'e'};
		$rns = & ${$item.'s'};
		$rnsk = & ${$item.'sk'};
	}
	
	
	if(!$rns || !$rne){
		$log .= "<span class=\"yellow\">道具选择错误！</span><br>";
		$mode = 'command';
		return;
	}
	if(strpos($rnk,'Y')===0 || strpos($rnk,'Z')===0){
		$log .= "<span class=\"yellow\">不能修改特殊道具的名字！</span><br>";
		$mode = 'command';
		return;
	}
	if(!$rename){
		$log .= "<span class=\"yellow\">请输入符合要求的名字！</span><br>";
		$mode = 'command';
		return;
	}
	if($rename =='『A.Q.U.A』'){
		$log .= "<span class=\"yellow\">呵呵，你知道的太多了。</span><br>";
		$log .= '你头晕脑胀地躺到了地上，<br>感觉整个人都被救济了。<br>';
		include_once GAME_ROOT . './include/state.func.php';
		$log .= '然后你失去了意识。<br>';
			for ($i=1;$i<=6;$i++){
				global ${'itm'.$i},${'itmk'.$i},${'itme'.$i},${'itms'.$i},${'itmsk'.$i};
				$itm = & ${'itm'.$i};
				$itmk = & ${'itmk'.$i};
				$itme = & ${'itme'.$i};
				$itms = & ${'itms'.$i};
				$itmsk = & ${'itmsk'.$i};
				if ($itm=='黑色发卡') {$flag=true;}
				$itm = '';
				$itmk = '';
				$itme = 0;
				$itms = 0;
				$itmsk = '';
			}
		death ( 'salv', '', 0, $itm );
		//return;	
	}
	if($rename =='『T.E.R.R.A』'){
		$log .= "<span class=\"yellow\">呵呵，你知道的太多了。</span><br>";
		$log .= '你头晕脑胀地躺到了地上，<br>感觉整个人都被救济了。<br>';
		include_once GAME_ROOT . './include/state.func.php';
		$log .= '然后你失去了意识。<br>';
			for ($i=1;$i<=6;$i++){
				global ${'itm'.$i},${'itmk'.$i},${'itme'.$i},${'itms'.$i},${'itmsk'.$i};
				$itm = & ${'itm'.$i};
				$itmk = & ${'itmk'.$i};
				$itme = & ${'itme'.$i};
				$itms = & ${'itms'.$i};
				$itmsk = & ${'itmsk'.$i};
				if ($itm=='黑色发卡') {$flag=true;}
				$itm = '';
				$itmk = '';
				$itme = 0;
				$itms = 0;
				$itmsk = '';
			}
		death ( 'salv', '', 0, $itm );
		//return;	
	}
	if($rename =='『V.E.N.T.U.S』'){
		$log .= "<span class=\"yellow\">呵呵，你知道的太多了。</span><br>";
		$log .= '你头晕脑胀地躺到了地上，<br>感觉整个人都被救济了。<br>';
		include_once GAME_ROOT . './include/state.func.php';
		$log .= '然后你失去了意识。<br>';
			for ($i=1;$i<=6;$i++){
				global ${'itm'.$i},${'itmk'.$i},${'itme'.$i},${'itms'.$i},${'itmsk'.$i};
				$itm = & ${'itm'.$i};
				$itmk = & ${'itmk'.$i};
				$itme = & ${'itme'.$i};
				$itms = & ${'itms'.$i};
				$itmsk = & ${'itmsk'.$i};
				if ($itm=='黑色发卡') {$flag=true;}
				$itm = '';
				$itmk = '';
				$itme = 0;
				$itms = 0;
				$itmsk = '';
			}
		death ( 'salv', '', 0, $itm );
		//return;	
	}
	if($rename =='『C.H.A.O.S』'){
		$log .= "<span class=\"yellow\">呵呵，你知道的太多了。</span><br>";
		$log .= '你头晕脑胀地躺到了地上，<br>感觉整个人都被救济了。<br>';
		include_once GAME_ROOT . './include/state.func.php';
		$log .= '然后你失去了意识。<br>';
			for ($i=1;$i<=6;$i++){
				global ${'itm'.$i},${'itmk'.$i},${'itme'.$i},${'itms'.$i},${'itmsk'.$i};
				$itm = & ${'itm'.$i};
				$itmk = & ${'itmk'.$i};
				$itme = & ${'itme'.$i};
				$itms = & ${'itms'.$i};
				$itmsk = & ${'itmsk'.$i};
				if ($itm=='黑色发卡') {$flag=true;}
				$itm = '';
				$itmk = '';
				$itme = 0;
				$itms = 0;
				$itmsk = '';
			}
		death ( 'salv', '', 0, $itm );
		//return;	
	}
		if($rename =='琉璃血'){
		$log .= "<span class=\"yellow\">呵呵，你知道的太多了。</span><br>";
		$log .= '你头晕脑胀地躺到了地上，<br>感觉整个人都被救济了。<br>';
		include_once GAME_ROOT . './include/state.func.php';
		$log .= '然后你失去了意识。<br>';
			for ($i=1;$i<=6;$i++){
				global ${'itm'.$i},${'itmk'.$i},${'itme'.$i},${'itms'.$i},${'itmsk'.$i};
				$itm = & ${'itm'.$i};
				$itmk = & ${'itmk'.$i};
				$itme = & ${'itme'.$i};
				$itms = & ${'itms'.$i};
				$itmsk = & ${'itmsk'.$i};
				if ($itm=='黑色发卡') {$flag=true;}
				$itm = '';
				$itmk = '';
				$itme = 0;
				$itms = 0;
				$itmsk = '';
			}
		death ( 'salv', '', 0, $itm );
		//return;	
	}
		if($rename =='社员专用的ID卡'){
		$log .= "<span class=\"yellow\">呵呵，你知道的太少了。</span><br>";
		$log .= '你头晕脑胀地躺到了地上，<br>感觉整个人都被救济了。<br>';
		include_once GAME_ROOT . './include/state.func.php';
		$log .= '然后你失去了意识。<br>';
			for ($i=1;$i<=6;$i++){
				global ${'itm'.$i},${'itmk'.$i},${'itme'.$i},${'itms'.$i},${'itmsk'.$i};
				$itm = & ${'itm'.$i};
				$itmk = & ${'itmk'.$i};
				$itme = & ${'itme'.$i};
				$itms = & ${'itms'.$i};
				$itmsk = & ${'itmsk'.$i};
				if ($itm=='黑色发卡') {$flag=true;}
				$itm = '';
				$itmk = '';
				$itme = 0;
				$itms = 0;
				$itmsk = '';
			}
		death ( 'salv', '', 0, $itm );
		//return;	
	}
	$mark = '';
	$rn0 = $rn;
	$rn = $mark.$rename.$mark;
//	$rnsk = str_replace('Z','x',$rnsk);
	$log .= "{$rn0}已改名为<span class=\"yellow\">$rn</span>！<br>";
	if(${'itms'.$ntitm} != $nosta){
		${'itms'.$ntitm} --;
		if(${'itms'.$ntitm} <= 0){
			$log .= "<span class=\"yellow\">{${'itm'.$ntitm}}用完了。</span><br>";
			${'itm'.$ntitm} = ${'itmk'.$ntitm} = ${'itmsk'.$ntitm} = '';
			${'itms'.$ntitm} = ${'itme'.$ntitm} = 0;		
		}
	}
	$mode = 'command';
	return;
}
?>