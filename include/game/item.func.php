<?php

if (! defined ( 'IN_GAME' )) {
	exit ( 'Access Denied' );
}

function itemuse($itmn) {
	global $mode, $log, $nosta, $pid, $name, $state, $now,$nick,$achievement;
	if ($itmn < 1 || $itmn > 6) {
		$log .= '此道具不存在，请重新选择。';
		$mode = 'command';
		return;
	}
	
	global ${'itm' . $itmn}, ${'itmk' . $itmn}, ${'itme' . $itmn}, ${'itms' . $itmn}, ${'itmsk' . $itmn};
	$itm = & ${'itm' . $itmn};
	$itmk = & ${'itmk' . $itmn};
	$itme = & ${'itme' . $itmn};
	$itms = & ${'itms' . $itmn};
	$itmsk = & ${'itmsk' . $itmn};
	$i=$itm;$ik=$itmk;$ie=$itme;$is=$itms;$isk=$itmsk;
	
	if (($itms <= 0) && ($itms != $nosta)) {
		$itm = $itmk = $itmsk = '';
		$itme = $itms = 0;
		$log .= '此道具不存在，请重新选择。<br>';
		$mode = 'command';
		return;
	}
	if(strpos ( $itmk, 'W' ) === 0 || strpos ( $itmk, 'D' ) === 0 || strpos ( $itmk, 'A' ) === 0 || strpos ( $itmk, 'ss' ) === 0){
		
		if(strpos ( $itmk, 'W' ) === 0) {
			$eqp = 'wep';
			$noeqp = 'WN';
		}elseif(strpos ( $itmk, 'DB' ) === 0) {
			$eqp = 'arb';
			$noeqp = 'DN';
		}elseif(strpos ( $itmk, 'DH' ) === 0) {
			$eqp = 'arh';
			$noeqp = '';
		}elseif(strpos ( $itmk, 'DA' ) === 0) {
			$eqp = 'ara';
			$noeqp = '';
		}elseif(strpos ( $itmk, 'DF' ) === 0) {
			$eqp = 'arf';
			$noeqp = '';
		}elseif (strpos ( $itmk, 'A' ) === 0) {
			$eqp = 'art';
			$noeqp = '';
		}elseif (strpos ( $itmk, 'ss' ) === 0) {
			$eqp = 'art';
			$noeqp = '';
		}elseif (strpos ( $itmk, 'XX' ) === 0) {
			$eqp = 'art';
			$noeqp = '';
		}elseif (strpos ( $itmk, 'XY' ) === 0) {
			$eqp = 'art';
			$noeqp = '';
		}
		global ${$eqp}, ${$eqp.'k'}, ${$eqp.'e'}, ${$eqp.'s'}, ${$eqp.'sk'};
		if((($artk=='XX')||($artk=='XY'))&&($eqp == 'art')){
			$log .= '你的饰品不能替换！<br>';
			$mode = 'command';
			return;
		}
		if (($noeqp && strpos ( ${$eqp.'k'}, $noeqp ) === 0) || ! ${$eqp.'s'}) {
			${$eqp} = $itm;
			${$eqp.'k'} = $itmk;
			${$eqp.'e'} = $itme;
			${$eqp.'s'} = $itms;
			${$eqp.'sk'} = $itmsk;
			$log .= "装备了<span class=\"yellow\">$itm</span>。<br>";
			$itm = $itmk = $itmsk = '';
			$itme = $itms = 0;
		} else {
			$itmt = ${$eqp};
			$itmkt = ${$eqp.'k'};
			$itmet = ${$eqp.'e'};
			$itmst = ${$eqp.'s'};
			$itmskt = ${$eqp.'sk'};
			${$eqp} = $itm;
			${$eqp.'k'} = $itmk;
			${$eqp.'e'} = $itme;
			${$eqp.'s'} = $itms;
			${$eqp.'sk'} = $itmsk;
			$itm = $itmt;
			$itmk = $itmkt;
			$itme = $itmet;
			$itms = $itmst;
			$itmsk = $itmskt;
			$log .= "卸下了<span class=\"red\">$itm</span>，装备了<span class=\"yellow\">${$eqp}</span>。<br>";
		}
	} elseif (strpos ( $itmk, 'HS' ) === 0) {
		global $sp, $msp,$club;
		if ($sp < $msp) {
			$oldsp = $sp;
			if($club == 16){
				$spup = round($itme*2.5);
			}else{
				$spup = $itme;
			}
			$sp += $spup;
			$sp = $sp > $msp ? $msp : $sp;
			$oldsp = $sp - $oldsp;
			$log .= "你使用了<span class=\"red\">$itm</span>，恢复了<span class=\"yellow\">$oldsp</span>点体力。<br>";
			if ($itms != $nosta) {
				$itms --;
				if ($itms <= 0) {
					$log .= "<span class=\"red\">$itm</span>用光了。<br>";
					$itm = $itmk = $itmsk = '';
					$itme = $itms = 0;
				}
			}
		} else {
			$log .= '你的体力不需要恢复。<br>';
		}
	} elseif (strpos ( $itmk, 'HH' ) === 0) {
		global $hp, $mhp,$club;
		if ($hp < $mhp) {
			$oldhp = $hp;
			if($club == 16){
				$hpup = round($itme*2.5);
			}else{
				$hpup = $itme;
			}
			$hp += $hpup;
			$hp = $hp > $mhp ? $mhp : $hp;
			$oldhp = $hp - $oldhp;
			$log .= "你使用了<span class=\"red\">$itm</span>，恢复了<span class=\"yellow\">$oldhp</span>点生命。<br>";
			if ($itms != $nosta) {
				$itms --;
				if ($itms <= 0) {
					$log .= "<span class=\"red\">$itm</span>用光了。<br>";
					$itm = $itmk = $itmsk = '';
					$itme = $itms = 0;
				}
			
			}
		} else {
			$log .= '你的生命不需要恢复。<br>';
		}
	}elseif (strpos ( $itmk, 'HM' ) === 0) {
		global $mss,$ss;
		$mss+=$itme;
		$ss+=$itme;
		$log .= "你使用了<span class=\"red\">$itm</span>，增加了<span class=\"yellow\">$itme</span>点歌魂。<br>";
		if ($itms != $nosta) {
			$itms --;
			if ($itms <= 0) {
				$log .= "<span class=\"red\">$itm</span>用光了。<br>";
				$itm = $itmk = $itmsk = '';
				$itme = $itms = 0;
			}
		}
	}elseif (strpos ( $itmk, 'HT' ) === 0) {
		global $ss, $mss;
		$ssup=$itme;
		if ($ss < $mss) {
			$oldss = $ss;
			$ss += $ssup;
			$ss = $ss > $mss ? $mss : $ss;
			$oldss = $ss - $oldss;
			$log .= "你使用了<span class=\"red\">$itm</span>，恢复了<span class=\"yellow\">$oldss</span>点歌魂。<br>";
			if ($itms != $nosta) {
				$itms --;
				if ($itms <= 0) {
					$log .= "<span class=\"red\">$itm</span>用光了。<br>";
					$itm = $itmk = $itmsk = '';
					$itme = $itms = 0;
				}
			
			}
		} else {
			$log .= '你的歌魂不需要恢复。<br>';
		}
	} elseif (strpos ( $itmk, 'HB' ) === 0) {
		global $hp, $mhp, $sp, $msp,$club;
		if (($hp < $mhp) || ($sp < $msp)) {
			if($club == 16){
				$bpup = round($itme*2.5);
			}else{
				$bpup = $itme;
			}
			$oldsp = $sp;
			$sp += $bpup;
			$sp = $sp > $msp ? $msp : $sp;
			$oldsp = $sp - $oldsp;
			$oldhp = $hp;
			$hp += $bpup;
			$hp = $hp > $mhp ? $mhp : $hp;
			$oldhp = $hp - $oldhp;
			$log .= "你使用了<span class=\"red\">$itm</span>，恢复了<span class=\"yellow\">$oldhp</span>点生命和<span class=\"yellow\">$oldsp</span>点体力。<br>";
			if ($itms != $nosta) {
				$itms --;
				if ($itms <= 0) {
					$log .= "<span class=\"red\">$itm</span>用光了。<br>";
					$itm = $itmk = $itmsk = '';
					$itme = $itms = 0;
				}
			}
		} else {
			$log .= '你的生命和体力都不需要恢复。<br>';
		}
	} elseif (strpos ( $itmk, 'P' ) === 0) {
		global $lvl, $db, $tablepre, $now, $hp, $inf, $bid;
		if (strpos ( $itmk, '2' ) === 2) {
			$damage = round ( $itme * 2 );
		} elseif (strpos ( $itmk, '1' ) === 2) {
			$damage = round ( $itme * 1.5 );
		} else {
			$damage = round ( $itme );
		}
		if (strpos ( $inf, 'p' ) === false) {
			$inf .= 'p';
		}
		$hp -= $damage;
		if ($itmsk && is_numeric($itmsk)) {
			$result = $db->query ( "SELECT * FROM {$tablepre}players WHERE pid='$itmsk'" );
			$wdata = $db->fetch_array ( $result );
			$log .= "糟糕，<span class=\"yellow\">$itm</span>中被<span class=\"yellow\">{$wdata['name']}</span>掺入了毒药！你受到了<span class=\"dmg\">$damage</span>点伤害！<br>";
			addnews ( $now, 'poison', $nick.' '.$name, $wdata ['name'], $itm );
		} else {
			$log .= "糟糕，<span class=\"yellow\">$itm</span>有毒！你受到了<span class=\"dmg\">$damage</span>点伤害！<br>";
		}
		if ($hp <= 0) {
			if ($itmsk) {
				$bid = $itmsk;
				$result = $db->query ( "SELECT * FROM {$tablepre}players WHERE pid='$itmsk'" );
				$wdata = $db->fetch_array ( $result );
				/*
				if($wdata['hp'] > 0){
					$expup = round(($wdata['lvl'] - $lvl)/3);
					$wdata['exp'] += $expup;
				}
				*/
				include_once GAME_ROOT . './include/state.func.php';
				$killmsg = death ( 'poison', $wdata ['name'], $wdata ['type'], $itm );
				$log .= "你被<span class=\"red\">" . $wdata ['name'] . "</span>毒死了！";
				if($killmsg){$log .= "<span class=\"yellow\">{$wdata['name']}对你说：“{$killmsg}”</span><br>";}
			} else {
				//$bid = 0;
				include_once GAME_ROOT . './include/state.func.php';
				death ( 'poison', '', 0, $itm );
				$log .= "你被毒死了！";
			}
		}
		if ($itms != $nosta) {
			$itms --;
			if ($itms <= 0) {
				$log .= "<span class=\"red\">$itm</span>用光了。<br>";
				$itm = $itmk = $itmsk = '';
				$itme = $itms = 0;
			}
		}
	
	} elseif (strpos ( $itmk, 'T' ) === 0) {
		global $pls, $exp, $upexp, $wd, $club,$lvl,$db,$tablepre;
		$trapk = str_replace('TN','TO',$itmk);
		//$mapfile = GAME_ROOT . "./gamedata/mapitem/{$pls}mapitem.php";
		//$itemdata = "$itm,TO,$itme,1,$pid,\n";
		//writeover ( $mapfile, $itemdata, 'ab' );
		$db->query("INSERT INTO {$tablepre}maptrap (itm, itmk, itme, itms, itmsk, pls) VALUES ('$itm', '$trapk', '$itme', '1', '$pid', '$pls')");
		$log .= "设置了陷阱<span class=\"red\">$itm</span>。<br>小心，自己也很难发现。<br>";
		//echo $exp;
		if($club == 5){$exp += 2;$wd+=2;}
		else{$exp++;$wd++;}
		
		if ($exp >= $upexp) {
			include_once GAME_ROOT . './include/state.func.php';
			//lvlup ( $exp, $upexp );
			lvlup ($lvl, $exp, 1);
		}
		if ($itms != $nosta) {
			$itms --;
			if ($itms <= 0) {
				$log .= "<span class=\"red\">$itm</span>用光了。<br>";
				$itm = $itmk = $itmsk = '';
				$itme = $itms = 0;
			}
		}
	} elseif (strpos ( $itmk, 'GB' ) === 0) {
		global $wep, $wepk, $weps, $wepsk;
		if ((strpos ( $wepk, 'WG' ) !== 0)&&(strpos ( $wepk, 'WJ' ) !== 0)) {
			$log .= "<span class=\"red\">你没有装备枪械，不能使用子弹。</span><br>";
			$mode = 'command';
			return;
		}
		if (strpos ($wepk,'WG')===false){
			if ($itmk=='GBh'){
			$bulletnum = 1;	
			}else{
			$log .= "<span class=\"red\">枪械类型和弹药类型不匹配。</span><br>";
			$mode = 'command';
			return;
			}
		}
		elseif (strpos ( $wepsk, 'o' ) !== false) {
			$log .= "<span class=\"red\">{$wep}不能装填弹药。</span><br>";
			$mode = 'command';
			return;
		} elseif (strpos ( $wepsk, 'e' ) !== false || strpos ( $wepsk, 'w' ) !== false) {
			if ($itmk == 'GBe') {
				$bulletnum = 10;
			} else {
				$log .= "<span class=\"red\">枪械类型和弹药类型不匹配。</span><br>";
				$mode = 'command';
				return;
			}
		} elseif (strpos ( $wepsk, 'i' ) !== false || strpos ( $wepsk, 'u' ) !== false) {
			if ($itmk == 'GBi') {
				$bulletnum = 10;
			} else {
				$log .= "<span class=\"red\">枪械类型和弹药类型不匹配。</span><br>";
				$mode = 'command';
				return;
			}
		} else {
			if (strpos ( $wepsk, 'r' ) !== false) {
				if ($itmk == 'GBr') {
					$bulletnum = 20;
				} else {
					$log .= "<span class=\"red\">枪械类型和弹药类型不匹配。</span><br>";
					$mode = 'command';
					return;
				}
			} else {
				if ($itmk == 'GB') {
					$bulletnum = 6;
				} else {
					$log .= "<span class=\"red\">枪械类型和弹药类型不匹配。</span><br>";
					$mode = 'command';
					return;
				}
			}
		}
		if ($weps == $nosta) {
			$weps = 0;
		}
		$bullet = $bulletnum - $weps;
		if ($bullet <= 0) {
			$log .= "<span class=\"red\">{$wep}的弹匣是满的，不能装弹。</span>";
			return;
		} elseif ($bullet >= $itms) {
			$bullet = $itms;
		}
		$itms -= $bullet;
		$weps += $bullet;
		$log .= "为<span class=\"red\">$wep</span>装填了<span class=\"red\">$itm</span>，<span class=\"red\">$wep</span>残弹数增加<span class=\"yellow\">$bullet</span>。<br>";
		if ($itms <= 0) {
			$log .= "<span class=\"red\">$itm</span>用光了。<br>";
			$itm = $itmk = $itmsk = '';
			$itme = $itms = 0;
		}
	} elseif (strpos ( $itmk, 'R' ) === 0) {
		//$log.= $itm .'已经废弃，请联系管理员。';
		if ($itme > 0) {
			$log .= "使用了<span class=\"red\">$itm</span>。<br>";
			include_once GAME_ROOT . './include/game/item2.func.php';
			newradar ( $itmsk );
			$itme --;
			if ($itme <= 0) {
				$log .= $itm . '的电力用光了，请使用电池充电。<br>';
			}
		} else {
			$itme = 0;
			$log .= $itm . '没有电了，请先充电。<br>';
		}
	} elseif (strpos ( $itmk, 'C' ) === 0) {
		global $inf, $exdmginf,$ex_inf;
		$ck=substr($itmk,1,1);
		if($ck == 'a'){
			$flag=false;
			$log .= "服用了<span class=\"red\">$itm</span>。<br>";
			foreach ($ex_inf as $value) {
				if(strpos ( $inf, $value ) !== false){
					$inf = str_replace ( $value, '', $inf );
					$log .= "{$exdmginf[$value]}状态解除了。<br>";
					$flag=true;
				}
			}
			if(!$flag){
				$log .= '但是什么也没发生。<br>';
			}
		}elseif(in_array($ck,$ex_inf)){
			if(strpos ( $inf, $ck ) !== false){
				$inf = str_replace ( $ck, '', $inf );
				$log .= "服用了<span class=\"red\">$itm</span>，{$exdmginf[$ck]}状态解除了。<br>";
			}else{
				$log .= "服用了<span class=\"red\">$itm</span>，但是什么效果也没有。<br>";
			}
		}elseif ($ck == 'x'){
			$inf = "puiewhbaf";
			$log .= "服用了<span class=\"red\">$itm</span>，<br>";
			$log .= "但是，假冒伪劣的<span class=\"red\">$itm</span>导致你{$exdmginf['p']}了！<br>";
			$log .= "假冒伪劣的<span class=\"red\">$itm</span>导致你{$exdmginf['u']}了！<br>";
			$log .= "假冒伪劣的<span class=\"red\">$itm</span>导致你{$exdmginf['i']}了！<br>";
			$log .= "假冒伪劣的<span class=\"red\">$itm</span>导致你{$exdmginf['e']}了！<br>";
			$log .= "而且，假冒伪劣的<span class=\"red\">$itm</span>还导致你{$exdmginf['w']}了！<br>";
			$log .= "你遍体鳞伤地站了起来。<br>";
			$log .= "真是大快人心啊！<br>";
		}else{
			$log .= "服用了<span class=\"red\">$itm</span>……发生了什么？<br>";
		}
		
		$itms --;
		/*if (strpos ( $itm, '烧伤药剂' ) === 0) {
			if (strpos ( $inf, 'u' ) !== false) {
				$inf = str_replace ( 'u', '', $inf );
				$log .= "服用了<span class=\"red\">$itm</span>，{$exdmginf['u']}状态解除了。<br>";
			} else {
				$log .= "服用了<span class=\"red\">$itm</span>，但是什么效果也没有。<br>";
			}
			$itms --;
		} elseif (strpos ( $itm, '麻痹药剂' ) === 0) {
			if (strpos ( $inf, 'e' ) !== false) {
				$inf = str_replace ( 'e', '', $inf );
				$log .= "服用了<span class=\"red\">$itm</span>，{$exdmginf['e']}状态解除了。<br>";
			} else {
				$log .= "服用了<span class=\"red\">$itm</span>，但是什么效果也没有。<br>";
			}
			$itms --;
		
		} elseif (strpos ( $itm, '解冻药水' ) === 0) {
			if (strpos ( $inf, 'i' ) !== false) {
				$inf = str_replace ( 'i', '', $inf );
				$log .= "服用了<span class=\"red\">$itm</span>，{$exdmginf['i']}状态解除了。<br>";
			} else {
				$log .= "服用了<span class=\"red\">$itm</span>，但是什么效果也没有。<br>";
			}
			$itms --;
		
		} elseif (strpos ( $itm, '解毒剂' ) === 0) {
			if (strpos ( $inf, 'p' ) !== false) {
				$inf = str_replace ( 'p', '', $inf );
				$log .= "服用了<span class=\"red\">$itm</span>，{$exdmginf['p']}状态解除了。<br>";
			} else {
				$log .= "服用了<span class=\"red\">$itm</span>，但是什么效果也没有。<br>";
			}
			$itms --;
		
		} elseif (strpos ( $itm, '清醒药剂' ) === 0) {
			if (strpos ( $inf, 'w' ) !== false) {
				$inf = str_replace ( 'w', '', $inf );
				$log .= "服用了<span class=\"red\">$itm</span>，{$exdmginf['w']}状态解除了。<br>";
			} else {
				$log .= "服用了<span class=\"red\">$itm</span>，但是什么效果也没有。<br>";
			}
			$itms --;
		
		} elseif (strpos ( $itm, '全恢复药剂' ) === 0) {
			if (strpos ( $inf, 'w' ) !== false) {
				$inf = str_replace ( 'w', '', $inf );
				$log .= "服用了<span class=\"red\">$itm</span>，{$exdmginf['w']}状态解除了。<br>";
			} else {
				$log .= "服用了<span class=\"red\">$itm</span>，但是什么效果也没有。<br>";
			}
			$itms --;
		
		} else {
			$log .= "服用了<span class=\"red\">$itm</span>……发生了什么？<br>";
			$itms --;
		}*/
		if ($itms <= 0) {
			$log .= "<span class=\"red\">$itm</span>用光了。<br>";
			$itm = $itmk = $itmsk = '';
			$itme = $itms = 0;
		}
	
	} elseif (strpos ( $itmk, 'V' ) === 0) {
		$skill_minimum = 100;
		$skill_limit = 300;
		$log .= "你阅读了<span class=\"red\">$itm</span>。<br>";
		$dice = rand ( - 10, 10 );
		if (strpos ( $itmk, 'VV' ) === 0) {
			global $wp, $wk, $wg, $wc, $wd, $wf;
			$ws_sum = $wp + $wk + $wg + $wc + $wd + $wf;
			if ($ws_sum < $skill_minimum * 5) {
				$vefct = $itme;
			} elseif ($ws_sum < $skill_limit * 5) {
				$vefct = round ( $itme * (1 - ($ws_sum - $skill_minimum * 5) / ($skill_limit * 5 - $skill_minimum * 5)) );
			} else {
				$vefct = 0;
			}
			if ($vefct < 10) {
				if ($vefct < $dice) {
					$vefct = - $dice;
				}
			}
			$wp += $vefct; //$itme;
			$wk += $vefct; //$itme;
			$wg += $vefct; //$itme;
			$wc += $vefct; //$itme;
			$wd += $vefct; //$itme; 
			$wf += $vefct; //$itme;
			$wsname = "全系熟练度";
		} elseif (strpos ( $itmk, 'VP' ) === 0) {
			global $wp;
			if ($wp < $skill_minimum) {
				$vefct = $itme;
			} elseif ($wp < $skill_limit) {
				$vefct = round ( $itme * (1 - ($wp - $skill_minimum) / ($skill_limit - $skill_minimum)) );
			} else {
				$vefct = 0;
			}
			if ($vefct < 10) {
				if ($vefct < $dice) {
					$vefct = - $dice;
				}
			}
			$wp += $vefct; //$itme;
			$wsname = "斗殴熟练度";
		} elseif (strpos ( $itmk, 'VK' ) === 0) {
			global $wk;
			if ($wk < $skill_minimum) {
				$vefct = $itme;
			} elseif ($wk < $skill_limit) {
				$vefct = round ( $itme * (1 - ($wk - $skill_minimum) / ($skill_limit - $skill_minimum)) );
			} else {
				$vefct = 0;
			}
			if ($vefct < 10) {
				if ($vefct < $dice) {
					$vefct = - $dice;
				}
			}
			$wk += $vefct; //$itme; 
			$wsname = "斩刺熟练度";
		} elseif (strpos ( $itmk, 'VG' ) === 0) {
			global $wg;
			if ($wg < $skill_minimum) {
				$vefct = $itme;
			} elseif ($wg < $skill_limit) {
				$vefct = round ( $itme * (1 - ($wg - $skill_minimum) / ($skill_limit - $skill_minimum)) );
			} else {
				$vefct = 0;
			}
			if ($vefct < 10) {
				if ($vefct < $dice) {
					$vefct = - $dice;
				}
			}
			$wg += $vefct; //$itme; 
			$wsname = "射击熟练度";
		} elseif (strpos ( $itmk, 'VC' ) === 0) {
			global $wc;
			if ($wc < $skill_minimum) {
				$vefct = $itme;
			} elseif ($wc < $skill_limit) {
				$vefct = round ( $itme * (1 - ($wc - $skill_minimum) / ($skill_limit - $skill_minimum)) );
			} else {
				$vefct = 0;
			}
			if ($vefct < 10) {
				if ($vefct < $dice) {
					$vefct = - $dice;
				}
			}
			$wc += $vefct; //$itme; 
			$wsname = "投掷熟练度";
		} elseif (strpos ( $itmk, 'VD' ) === 0) {
			global $wd;
			if ($wd < $skill_minimum) {
				$vefct = $itme;
			} elseif ($wd < $skill_limit) {
				$vefct = round ( $itme * (1 - ($wd - $skill_minimum) / ($skill_limit - $skill_minimum)) );
			} else {
				$vefct = 0;
			}
			if ($vefct < 10) {
				if ($vefct < $dice) {
					$vefct = - $dice;
				}
			}
			$wd += $vefct; //$itme; 
			$wsname = "引爆熟练度";
		} elseif (strpos ( $itmk, 'VF' ) === 0) {
			global $wf;
			if ($wf < $skill_minimum) {
				$vefct = $itme;
			} elseif ($wf < $skill_limit) {
				$vefct = round ( $itme * (1 - ($wf - $skill_minimum) / ($skill_limit - $skill_minimum)) );
			} else {
				$vefct = 0;
			}
			if ($vefct < 10) {
				if ($vefct < $dice) {
					$vefct = - $dice;
				}
			}
			$wf += $vefct; //$itme; 
			$wsname = "灵击熟练度";
		}
		if ($vefct > 0) {
			$log .= "嗯，有所收获。<br>你的{$wsname}提高了<span class=\"yellow\">$vefct</span>点！<br>";
		} elseif ($vefct == 0) {
			$log .= "对你来说书里的内容过于简单了。<br>你的熟练度没有任何提升。<br>";
		} else {
			$vefct = - $vefct;
			$log .= "对你来说书里的内容过于简单了。<br>而且由于盲目相信书上的知识，你反而被编写者的纰漏所误导了！<br>你的{$wsname}下降了<span class=\"red\">$vefct</span>点！<br>";
		}
		if ($itms != $nosta) {
			$itms --;
			if ($itms <= 0) {
				$log .= "<span class=\"red\">$itm</span>用光了。<br>";
				$itm = $itmk = $itmsk = '';
				$itme = $itms = 0;
			}
		}
	} elseif (strpos ( $itmk, 'M' ) === 0) {
		$log .= "你服用了<span class=\"red\">$itm</span>。<br>";
		
		if (strpos ( $itmk, 'MA' ) === 0) {
			global $att;
			$att_min = 200;
			$att_limit = 500;
			$dice = rand ( - 5, 5 );
			if ($att < $att_min) {
				$mefct = $itme;
			} elseif ($att < $att_limit) {
				$mefct = round ( $itme * (1 - ($att - $att_min) / ($att_limit - $att_min)) );
			} else {
				$mefct = 0;
			}
			if ($mefct < 5) {
				if ($mefct < $dice) {
					$mefct = - $dice;
				}
			}
			$att += $mefct;
			$mdname = "基础攻击力";
		} elseif (strpos ( $itmk, 'MD' ) === 0) {
			global $def;
			$def_min = 200;
			$def_limit = 500;
			$dice = rand ( - 5, 5 );
			if ($def < $def_min) {
				$mefct = $itme;
			} elseif ($def < $def_limit) {
				$mefct = round ( $itme * (1 - ($def - $def_min) / ($def_limit - $def_min)) );
			} else {
				$mefct = 0;
			}
			if ($mefct < 5) {
				if ($mefct < $dice) {
					$mefct = - $dice;
				}
			}
			$def += $mefct;
			$mdname = "基础防御力";
		} elseif (strpos ( $itmk, 'ME' ) === 0) {
			global $exp, $upexp, $baseexp;
			$lvlup_objective = $itme / 10;
			$mefct = round ( $baseexp * 2 * $lvlup_objective + rand ( 0, 5 ) );
			$exp += $mefct;
			$mdname = "经验值";
		} elseif (strpos ( $itmk, 'MS' ) === 0) {
			global $sp, $msp;
			$mefct = $itme;
			$sp += $mefct;
			$msp += $mefct;
			$mdname = "体力上限";
		} elseif (strpos ( $itmk, 'MH' ) === 0) {
			global $hp, $mhp;
			$mefct = $itme;
			$hp += $mefct;
			$mhp += $mefct;
			$mdname = "生命上限";
		} elseif (strpos ( $itmk, 'MV' ) === 0) {
			global $wp, $wk, $wg, $wc, $wd, $wf;
			$skill_minimum = 100;
			$skill_limit = 300;
			$dice = rand ( - 10, 10 );
			$ws_sum = $wp + $wk + $wg + $wc + $wd + $wf;
			if ($ws_sum < $skill_minimum * 5) {
				$mefct = $itme;
			} elseif ($ws_sum < $skill_limit * 5) {
				$mefct = round ( $itme * (1 - ($ws_sum - $skill_minimum * 5) / ($skill_limit * 5 - $skill_minimum * 5)) );
			} else {
				$mefct = 0;
			}
			if ($mefct < 10) {
				if ($mefct < $dice) {
					$mefct = - $dice;
				}
			}
			$wp += $mefct;
			$wk += $mefct;
			$wg += $mefct;
			$wc += $mefct;
			$wd += $mefct;
			$wf += $mefct;
			$mdname = "全系熟练度";
		}
		if ($mefct > 0) {
			$log .= "身体里有种力量涌出来！<br>你的{$mdname}提高了<span class=\"yellow\">$mefct</span>点！<br>";
		} elseif ($mefct == 0) {
			$log .= "已经很强了，却还想靠药物继续强化自己，是不是太贪心了？<br>你的能力没有任何提升。<br>";
		} else {
			$mefct = - $mefct;
			$log .= "已经很强了，却还想靠药物继续强化自己，是不是太贪心了？<br>你贪婪的行为引发了药物的副作用！<br>你的{$mdname}下降了<span class=\"red\">$mefct</span>点！<br>";
		}
		if (strpos ( $itmk, 'ME' ) === 0) {
			
			if ($exp >= $upexp) {
				global $lvl;
				include_once GAME_ROOT . './include/state.func.php';
				lvlup ( $lvl, $exp, 1 );
			}
		}
		if ($itms != $nosta) {
			$itms --;
			if ($itms <= 0) {
				$log .= "<span class=\"red\">$itm</span>用光了。<br>";
				$itm = $itmk = $itmsk = '';
				$itme = $itms = 0;
			}
		}
	} elseif ( strpos( $itmk,'EW' ) ===0 )	{
		include_once GAME_ROOT . './include/game/item2.func.php';
		wthchange ( $itm,$itmsk);
		$itms--;
		if ($itms <= 0) {
			$log .= "<span class=\"red\">$itm</span>用光了。<br>";
			$itm = $itmk = $itmsk = '';
			$itme = $itms = 0;
		}
	} elseif (strpos ( $itmk, 'EE' ) === 0 || $itm == '移动PC') {//移动PC
		include_once GAME_ROOT . './include/game/item2.func.php';
		hack ( $itmn );
	} elseif (strpos ( $itmk, 'ER' ) === 0) {//雷达
		if ($itme > 0) {
			$log .= "使用了<span class=\"red\">$itm</span>。<br>";
			include_once GAME_ROOT . './include/game/item2.func.php';
			newradar ( $itmsk );
			global $club;
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
			if ($itme <= 0) {
				$log .= $itm . '的电力用光了，请使用电池充电。<br>';
			}
		} else {
			$itme = 0;
			$log .= $itm . '没有电了，请先充电。<br>';
		}
	} elseif (strpos ( $itmk, 'B' ) === 0) {
		$flag = false;
		global $elec_cap;
		$bat_kind = substr($itmk,1,1);
		for($i = 1; $i <= 6; $i ++) {
			global ${'itm' . $i}, ${'itmk' . $i}, ${'itme' . $i}, ${'itms' . $i};
			if (${'itmk' . $i} == 'E'.$bat_kind && ${'itms' . $i}) {
				if(${'itme' . $i} >= $elec_cap){
					$log .= "包裹{$i}里的<span class=\"yellow\">${'itm'.$i}</span>已经充满电了。<br>";
				}else{
					${'itme' . $i} += $itme;
					if(${'itme' . $i} > $elec_cap){${'itme' . $i} = $elec_cap;}
					$itms --;
					$flag = true;
					$log .= "为包裹{$i}里的<span class=\"yellow\">${'itm'.$i}</span>充了电。";
					break;
				}				
			}
		}
		if (! $flag) {
			$log .= '你没有需要充电的物品。<br>';
		}
		if ($itms <= 0 && $itm) {
			$log .= "<span class=\"red\">$itm</span>用光了。<br>";
			$itm = $itmk = $itmsk = '';
			$itme = $itms = 0;
		}		
	} elseif(strpos ( $itmk, 'p' ) === 0){
		//你们这帮乱用itmk的都乖乖自觉归类！itmk空间也是有限的！
		$log.="你打开了<span class=\"yellow\">$itm</span>。<br>";
		if(strpos( $itmk, 'ps' ) === 0){//银色盒子
			include_once config('randomitem',$gamecfg);
			$dice = rand(1,100);
			if($dice <= 75){//一般物品
				$itemflag = $itmlow;
			}elseif($dice <= 95){//中级道具
				$itemflag = $itmmedium;
			}elseif($dice <= 97){//神装
				$itemflag = $itmhigh;
			}elseif($dice <= 99){//礼品盒和游戏王
				$file = config('present',$gamecfg);
				$plist = openfile($file);
				$file2 = config('box',$gamecfg);
				$plist2 = openfile($file2);
				$plist = array_merge($plist,$plist2);
				$rand = rand(0,count($plist)-1);
				list($in,$ik,$ie,$is,$isk) = explode(',',$plist[$rand]);
				$itmflag = false;
			}else{//三抽
				$itemflag = $antimeta;
			}
			if($itemflag){
				$itemflag = explode("\r\n",$itemflag);
				$rand = rand(0,count($itemflag)-1);
				list($in,$ik,$ie,$is,$isk) = explode(',',$itemflag[$rand]);
			}
		}else{//一般礼品盒
			$file = config('present',$gamecfg);
			$plist = openfile($file);
			$rand = rand(0,count($plist)-1);
			list($in,$ik,$ie,$is,$isk) = explode(',',$plist[$rand]);
		}		
		global $itm0,$itmk0,$itme0,$itms0,$itmsk0,$mode;
		$itm0 = $in;$itmk0=$ik;$itme0=$ie;$itms0=$is;$itmsk0=$isk;
		addnews($now,'present',$name,$itm,$in);
		$itms--;
		if ($itms <= 0) {
			$log .= "<span class=\"red\">$itm</span>用光了。<br>";
			$itm = $itmk = $itmsk = '';
			$itme = $itms = 0;
		}
		include_once GAME_ROOT.'./include/game/itemmain.func.php';
		itemget();			
	} elseif(strpos ( $itmk, 'ygo' ) === 0){
		$log.="你打开了<span class=\"yellow\">$itm</span>。<br>";
		$file1 = config('box',$gamecfg);
		$plist1 = openfile($file1);
		$rand1 = rand(0,count($plist1)-1);
		list($in,$ik,$ie,$is,$isk) = explode(',',$plist1[$rand1]);
		global $itm0,$itmk0,$itme0,$itms0,$itmsk0,$mode;
		$itm0 = $in;$itmk0=$ik;$itme0=$ie;$itms0=$is;$itmsk0=$isk;
		addnews($now,'present',$nick.' '.$name,$itm,$in);
		$itms1--;
		if ($itms1 <= 0) {
			$log .= "<span class=\"red\">$itm</span>用光了。<br>";
			$itm = $itmk = $itmsk = '';
			$itme = $itms = 0;
		}
		include_once GAME_ROOT.'./include/game/itemmain.func.php';
		itemget();	
	} elseif(strpos ( $itmk, 'fy' ) === 0){
		$log.="你打开了<span class=\"yellow\">$itm</span>。<br>";
		$file1 = config('fy',$gamecfg);
		$plist1 = openfile($file1);
		$rand1 = rand(0,count($plist1)-1);
		list($in,$ik,$ie,$is,$isk) = explode(',',$plist1[$rand1]);
		global $itm0,$itmk0,$itme0,$itms0,$itmsk0,$mode;
		$itm0 = $in;$itmk0=$ik;$itme0=$ie;$itms0=$is;$itmsk0=$isk;
		addnews($now,'present',$nick.' '.$name,$itm,$in);
		$itms1--;
		if ($itms1 <= 0) {
			$log .= "<span class=\"red\">$itm</span>用光了。<br>";
			$itm = $itmk = $itmsk = '';
			$itme = $itms = 0;
		}
		include_once GAME_ROOT.'./include/game/itemmain.func.php';
		itemget();	
	}elseif ($itmk=='U') {
		global $db, $tablepre,$pls;
		$trapresult = $db->query("SELECT * FROM {$tablepre}maptrap WHERE pls = '$pls' AND itme>='$itme'");
		$trpnum = $db->num_rows($trapresult);
		$itms--;
		if ($trpnum>0){
			$itemno = rand(0,$trpnum-1);
			$db->data_seek($trapresult,$itemno);
			$mi=$db->fetch_array($trapresult);
			$deld = $mi['itm'];
			$delp = $mi['tid'];
			$db->query("DELETE FROM {$tablepre}maptrap WHERE tid='$delp'");
			$log.="远方传来一阵爆炸声，伟大的<span class=\"yellow\">{$itm}</span>用生命和鲜血扫除了<span class=\"yellow\">{$deld}</span>。<br><span class=\"red\">实在是大快人心啊！</span><br>";
		}else{
			$log.="你使用了<span class=\"yellow\">{$itm}</span>，但是没有发现陷阱。<br>";
		}
	}elseif (strpos ( $itmk, 'Y' ) === 0 || strpos ( $itmk, 'Z' ) === 0) {
		if ($itm == '电池') {
			//功能需要修改，改为选择道具使用YE类型道具可充电
			$flag = false;
			for($i = 1; $i <= 6; $i ++) {
				global ${'itm' . $i}, ${'itme' . $i};
				if (${'itm' . $i} == '移动PC') {
					${'itme' . $i} += $itme;
					$itms --;
					$flag = true;
					$log .= "为<span class=\"yellow\">${'itm'.$i}</span>充了电。";
					break;
				}
			}
			if (! $flag) {
				$log .= '你没有需要充电的物品。<br>';
			}
		}	elseif ($itm == '群青多面体') {
			global $plsinfo,$nosta,$db,$tablepre;
			$result = $db->query("SELECT pid,name,pls FROM {$tablepre}players WHERE type = 14 && hp > 0");
			$ndata = array();
			while($nd = $db->fetch_array($result)){
				$ndata[$nd['name']] = $nd;
			}
			if(!empty($ndata)){
				foreach($ndata as $key => &$val){
					$npls = $val['pls'];
					while($npls == $val['pls']){
						$npls = rand(1,count($plsinfo)-1);
					}				
					$val['pls'] = $npls;$npls = $plsinfo[$npls];
					$log .= "<span class=\"yellow\">{$key}</span>响应道具号召，移动到了<span class=\"yellow\">{$npls}</span>。<br>";
					addnews($now,'npcmove',$name,$key);
				}
				$db->multi_update("{$tablepre}players",$ndata,'pid');
				if($itms != $nosta){$itms --;}
			}
			
			return;
		}	elseif ($itm == '残响兵器') {
			global $cmd;
			foreach(Array('wep','arb','arh','ara','arf','art') as $val) {
				global ${$val},${$val.'k'}, ${$val.'e'}, ${$val.'s'},${$val.'sk'};
			}
			for($i = 1; $i <= 6; $i ++) {
				global ${'itmk' . $i},${'itm' . $i}, ${'itme' . $i}, ${'itms' . $i},${'itmsk' . $i};
			}
			
			include template('nametag');
			
			$cmd = ob_get_contents();
			ob_clean();
			return;
		}	elseif ($itm == '超臆想时空') {
			global $cmd;
			foreach(Array('wep','arb','arh','ara','arf','art') as $val) {
				global ${$val},${$val.'k'}, ${$val.'e'}, ${$val.'s'},${$val.'sk'};
			}
			for($i = 1; $i <= 6; $i ++) {
				global ${'itmk' . $i},${'itm' . $i}, ${'itme' . $i}, ${'itms' . $i},${'itmsk' . $i};
			}
			
			include template('supernametag');
			
			$cmd = ob_get_contents();
			ob_clean();
			return;
		} elseif ($itm == '毒药') {
			global $cmd;
			for($i = 1; $i <= 6; $i ++) {
				global ${'itmk' . $i},${'itm' . $i}, ${'itme' . $i}, ${'itms' . $i};
			}
			include template('poison');
			
			$cmd = ob_get_contents();
			ob_clean();
			return;
		} elseif (strpos ( $itm, '磨刀石' ) !== false) {
			global $wep, $wepk, $wepe, $weps, $wepsk;
			if (strpos ( $wepk, 'K' ) == 1 && strpos ( $wepsk, 'Z' ) === false) {
				if (strpos($wepsk,'j')!==false){
					$log.='多重武器不能改造。<br>';
					return;
				}
				$dice = rand ( 0, 100 );
				if ($dice >= 15) {
					$wepe += $itme;					
					$log .= "使用了<span class=\"yellow\">$itm</span>，<span class=\"yellow\">$wep</span>的攻击力变成了<span class=\"yellow\">$wepe</span>。<br>";
					if (strpos ( $wep, '锋利的' ) === false) {
						$wep = '锋利的'.$wep;
					}
				} else {
					$wepe -= ceil ( $itme / 2 );
					if ($wepe <= 0) {
						$log .= "<span class=\"red\">$itm</span>使用失败，<span class=\"red\">$wep</span>损坏了！<br>";
						$wep = $wepk = $wepsk = '';
						$wepe = $weps = 0;
					} else {
						$log .= "<span class=\"red\">$itm</span>使用失败，<span class=\"red\">$wep</span>的攻击力变成了<span class=\"red\">$wepe</span>。<br>";
					}
				}
				
				$itms --;
			} elseif(strpos ( $wepsk, 'Z' ) !== false){
				$log .= '咦……刀刃过于薄了，感觉稍微磨一点都会造成不可逆的损伤呢……<br>';
			} else {
				$log .= '你没装备锐器，不能使用磨刀石。<br>';
			}
		} elseif (preg_match ( "/钉$/", $itm ) || preg_match ( "/钉\[/", $itm )) {
			global $wep, $wepk, $wepe, $weps, $wepsk;
			if (( strpos ( $wep, '棍棒' ) !== false) && ($wepk == 'WP')) {
				if (strpos($wepsk,'j')!==false){
					$log.='多重武器不能改造。<br>';
					return;
				}
				$dice = rand ( 0, 100 );
				if ($dice >= 10) {
					$wepe += $itme;
					$log .= "使用了<span class=\"yellow\">$itm</span>，<span class=\"yellow\">$wep</span>的攻击力变成了<span class=\"yellow\">$wepe</span>。<br>";
					if (strpos ( $wep, '钉' ) === false) {
						$wep = str_replace ( '棍棒', '钉棍棒', $wep );
					}
				} else {
					$wepe -= ceil ( $itme / 2 );
					if ($wepe <= 0) {
						$log .= "<span class=\"red\">$itm</span>使用失败，<span class=\"red\">$wep</span>损坏了！<br>";
						$wep = $wepk = $wepsk = '';
						$wepe = $weps = 0;
					} else {
						$log .= "<span class=\"red\">$itm</span>使用失败，<span class=\"red\">$wep</span>的攻击力变成了<span class=\"red\">$wepe</span>。<br>";
					}
				}
				
				$itms --;
			} else {
				$log .= '你没装备棍棒，不能安装钉子。<br>';
			}
		} elseif ($itm == '针线包') {
			global $arb, $arbk, $arbe, $arbs, $arbsk, $noarb;
			if (($arb == $noarb) || ! $arb) {
				$log .= '你没有装备防具，不能使用针线包。<br>';
			} elseif(strpos($arbsk,'Z')!==false){
				$log .= '<span class="yellow">该防具太单薄以至于不能使用针线包。</span><br>你感到一阵蛋疼菊紧，你的蛋疼度增加了<span class="yellow">233</span>点。<br>';
			}else {
				$arbe += (rand ( 0, 2 ) + $itme);
				$log .= "用<span class=\"yellow\">$itm</span>给防具打了补丁，<span class=\"yellow\">$arb</span>的防御力变成了<span class=\"yellow\">$arbe</span>。<br>";
				$itms --;
			}
		} elseif ($itm == '消音器') {
			global $wep, $wepk, $wepe, $weps, $wepsk;
			if (strpos ( $wepk, 'WG' ) !== 0) {
				$log .= '你没有装备枪械，不能使用消音器。<br>';
			} elseif (strpos ( $wepsk, 'S' ) === false) {
				$wepsk .= 'S';
				$log .= "你给<span class=\"yellow\">$wep</span>安装了<span class=\"yellow\">$itm</span>。<br>";
				$itms --;
			} else {
				$log .= "你的武器已经安装了消音器。<br>";
			}
		} elseif ($itm == '探测器电池') {
			$flag = false;
			for($i = 1; $i <= 6; $i ++) {
				global ${'itmk' . $i}, ${'itme' . $i}, ${'itm' . $i};
				if (${'itmk' . $i} == 'R') {
					//if((strpos(${'itm'.$i}, '雷达') !== false)&&(strpos(${'itm'.$i}, '电池') === false)) {
					${'itme' . $i} += $itme;
					$itms --;
					$flag = true;
					$log .= "为<span class=\"yellow\">${'itm'.$i}</span>充了电。";
					break;
				}
			}
			if (! $flag) {
				$log .= '你没有探测仪器。<br>';
			}
		} elseif ($itm == '御神签') {
			$log .= "使用了<span class=\"yellow\">$itm</span>。<br>";
			include_once GAME_ROOT . './include/game/item2.func.php';
			divining ();
			$itms --;
		} elseif ($itm == '凸眼鱼') {
			global $db, $tablepre, $name,$now,$corpseprotect;
			$tm = $now - $corpseprotect;//尸体保护
			$db->query ( "UPDATE {$tablepre}players SET weps='0',arbs='0',arhs='0',aras='0',arfs='0',arts='0',itms0='0',itms1='0',itms2='0',itms3='0',itms4='0',itms5='0',itms6='0',money='0' WHERE hp <= 0 AND endtime <= $tm" );
			$cnum = $db->affected_rows ();
			addnews ( $now, 'corpseclear', $nick.' '.$name, $cnum );
			$log .= "使用了<span class=\"yellow\">$itm</span>。<br>突然刮起了一阵怪风，吹走了地上的{$cnum}具尸体！<br>";
			$itms --;
			
		} elseif ($itm == '天候棒') {
			global $weather, $wthinfo, $name;
			$weather = rand ( 10, 13 );
			include_once GAME_ROOT . './include/system.func.php';
			save_gameinfo ();
			addnews ( $now, 'wthchange', $name, $weather );
			$log .= "你转动了几下天候棒。<br>天气突然转变成了<span class=\"red b\">$wthinfo[$weather]</span>！<br>";
			$itms --;

		}	elseif ($itm == '武器师安雅的奖赏') {
			global $wep, $wepk, $wepe, $weps, $wepsk, $wp, $wk, $wg, $wc, $wd, $wf;
			if (! $weps || ! $wepe) {
				$log .= '请先装备武器。<br>';
				return;
			}
			if (strpos($wepsk,'j')!==false){
				$log.='多重武器不能改造。<br>';
				return;
			}
			$dice = rand ( 0, 99 );
			$dice2 = rand ( 0, 99 );
			$skill = array ('WP' => $wp, 'WK' => $wk, 'WG' => $wg, 'WC' => $wc, 'WD' => $wd, 'WF' => $wf );
			arsort ( $skill );
			$skill_keys = array_keys ( $skill );
			$nowsk = substr ( $wepk, 0, 2 );
			$maxsk = $skill_keys [0];
			if (($skill [$nowsk] != $skill [$maxsk]) && ($dice < 30)) {
				$wepk = $maxsk;
				$kind = "更改了{$wep}的<span class=\"yellow\">类别</span>！";
			} elseif (($weps != $nosta) && ($dice2 < 70)) {
				$weps += ceil ( $wepe / 2 );
				$kind = "增强了{$wep}的<span class=\"yellow\">耐久</span>！";
			} else {
				$wepe += ceil ( $wepe / 2 );
				$kind = "提高了{$wep}的<span class=\"yellow\">攻击力</span>！";
			}
			$log .= "你使用了<span class=\"yellow\">$itm</span>，{$kind}";
			addnews ( $now, 'newwep', $nick.' '.$name, $itm, $wep );
			if (strpos ( $wep, '-改' ) === false) {
				$wep = $wep . '-改';
			}
			$itms --;
		} elseif ($itm == '■DeathNote■') {
			$mode = 'deathnote';
			$log .= '你翻开了■DeathNote■<br>';
			return;
		} elseif ($itm == '游戏解除钥匙') {
			global $url;
			$state = 6;
			$url = 'end.php';
			include_once GAME_ROOT . './include/system.func.php';
			gameover ( $now, 'end3', $name );
		}elseif ($itm == '『C.H.A.O.S』') {
			global $ss,$rp,$killnum,$att,$def,$log;
			$flag=false;
			$log.="一阵强光刺得你睁不开眼。<br>强光逐渐凝成了光球，你揉揉眼睛，发现包裹里的东西全都不翼而飞了。<br>";
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
			global $itm0,$itmk0,$itme0,$itms0,$itmsk0;
			$karma=$rp*$killnum-$def+$att;
			$f1=false;
			//『G.A.M.E.O.V.E.R』itmk:Y itme:1 itms:1 itmsk:zxZ
			if (($ss>=600)&&($killnum<=15)){
				$itm0='『T.E.R.R.A』';
				$itmk0='Y';
				$itme0=1;
				$itms0=1;
				$itmsk0='z';
				include_once GAME_ROOT . './include/game/itemmain.func.php';
				itemget();
				$f1=true;
			}
			if ($karma<=2000){
				$itm0='『A.Q.U.A』';
				$itmk0='Y';
				$itme0=1;
				$itms0=1;
				$itmsk0='x';
				include_once GAME_ROOT . './include/game/itemmain.func.php';
				itemget();
				$f1=true;
			}
			if ($flag==true){
				$itm0='『V.E.N.T.U.S』';
				$itmk0='Y';
				$itme0=1;
				$itms0=1;
				$itmsk0='Z';
				include_once GAME_ROOT . './include/game/itemmain.func.php';
				itemget();
				$f1=true;
			}
			if ($f1==false){
				$itm0='『S.C.R.A.P』';
				$itmk0='Y';
				$itme0=1;
				$itms0=1;
				include_once GAME_ROOT . './include/game/itemmain.func.php';
				itemget();
			}
		}elseif ($itm == '『G.A.M.E.O.V.E.R』') {
			global $url;
			$state = 6;
			$url = 'end.php';
			include_once GAME_ROOT . './include/system.func.php';
			gameover ( $now, 'end7', $name );
		}elseif ($itm == '杏仁豆腐的ID卡') {
			include_once GAME_ROOT . './include/system.func.php';
			$duelstate = duel($now,$itm);
			if($duelstate == 50){
				$log .= "<span class=\"yellow\">你使用了{$itm}。</span><br><span class=\"evergreen\">“干得不错呢，看来咱应该专门为你清扫一下战场……”</span><br><span class=\"evergreen\">“所有的NPC都离开战场了。好好享受接下来的杀戮吧，祝你好运。”</span>——林无月<br>";
				$itm = $itmk = $itmsk = '';
				$itme = $itms = 0;
			}elseif($duelstate == 51){
				$log .= "你使用了<span class=\"yellow\">{$itm}</span>，不过什么反应也没有。<br><span class=\"evergreen\">“咱已经帮你准备好舞台了，请不要要求太多哦。”</span>——林无月<br>";
			} else {
				$log .= "你使用了<span class=\"yellow\">{$itm}</span>，不过什么反应也没有。<br><span class=\"evergreen\">“表演的时机还没到呢，请再忍耐一下吧。”</span>——林无月<br>";
			}
		} elseif ($itm == '奇怪的按钮') {
			global $bid;
			$button_dice = rand ( 1, 10 );
			if ($button_dice < 5) {
				$log .= "你按下了<span class=\"yellow\">$itm</span>，不过好像什么都没有发生！";
				$itm = $itmk = $itmsk = '';
				$itme = $itms = 0;
			} elseif ($button_dice < 8) {
				global $url;
				$state = 6;
				$url = 'end.php';
				include_once GAME_ROOT . './include/system.func.php';
				gameover ( $now, 'end5', $name );
			} else {
				$log .= '好像什么也没发生嘛？<br>咦，按钮上的标签写着什么？“危险，勿触”……？<br>';
				include_once GAME_ROOT . './include/state.func.php';
				$log .= '呜哇，按钮爆炸了！<br>';
				//$bid = 0;
				death ( 'button', '', 0, $itm );
			}
		} elseif ($itm == '装有H173的注射器') {
			global $wp, $wk, $wg, $wc, $wd, $wf, $club, $bid, $att, $def;
			$log .= '你考虑了一会，<br>把袖子卷了起来，给自己注射了H173。<br>';
			$deathdice = rand ( 0, 8191 );
			if ($deathdice == 8191 || $club == 15) {
				$log .= '你突然感觉到一种不可思议的力量贯通全身！<br>';
				$wp = $wk = $wg = $wc = $wd = $wf = 3000;
				$att = $def = 5000;
				$club = 15;
				addnews ( $now, 'suisidefail',$nick.' '.$name );
				$itm = $itmk = $itmsk = '';
				$itme = $itms = 0;
			} else {
				include_once GAME_ROOT . './include/state.func.php';
				$log .= '你失去了知觉。<br>';
				//$bid = 0;
				death ( 'suiside', '', 0, $itm );
			}
		} elseif (strpos($itm, '溶剂SCP-294')===0) {
			global $wp, $wk, $wg, $wc, $wd, $wf, $club, $att, $def, $hp, $mhp, $sp, $msp, $rp;
			if($itm == '溶剂SCP-294_PT_Poini_Kune'){
				$log .= '你考虑了一会，一扬手喝下了杯中中冒着紫色幽光的液体。<br><span class="yellow">你感到全身就像燃烧起来一样，不禁扪心自问这值得么？</span><br>';
				if ($mhp > 573){
					$up = rand (0, $mhp + $msp);
				} else{
					$up = rand (0, 573);
				}
				

				if($club == 17){
					$hpdown = $spdown = round($up * 1.5);
				}elseif($club == 13){
					$hpdown = $up+200;
					$spdown = $up;
					//根性兄贵加成消失
				}else{
					$hpdown = $spdown = $up;
				}
				$wp += $up;$wk += $up;$wg += $up;$wc += $up;$wd += $up;$wf += $up;
				$rp += 500;
				//$down = $club == 17 ? round($up * 1.5) : $up;
				
				$mhp = $mhp - $hpdown;
				$msp = $msp - $spdown;				
				$log .= '你的生命上限减少了<span class="yellow">'.$hpdown.'</span>点，体力上限减少了<span class="yellow">'.$spdown.'</span>点，而你的全系熟练度提升了<span class="yellow">'.$up.'</span>点！<br>';
			} elseif ($itm == '溶剂SCP-294_PT_Arnval'){
				$log .= '你考虑了一会，一扬手喝下了杯中中冒着白色气泡的清澈液体。<br><span class="yellow">你感到全身就像燃烧起来一样，不禁扪心自问这值得么？</span><br>';
				if ($msp > 573){
					$up = rand (0, $msp * 1.5);
				} else{
					$up = rand (0, 573);
				}
				$mhp = $mhp + $up;
				$def = $def + $up;
				$down = $club == 17 ? round($up * 1.5) : $up;
				$rp += 200;
				$msp = $msp - $down;
				$att = $att - $down;
				
				$log .= '你的体力上限和攻击力减少了<span class="yellow">'.$down.'</span>点，而你的生命上限和防御力提升了<span class="yellow">'.$up.'</span>点！<br>';
			} elseif ($itm == '溶剂SCP-294_PT_Strarf') {
				$log .= '你考虑了一会，一扬手喝下了杯中中冒着灰色气泡的清澈液体。<br><span class="yellow">你感到全身就像燃烧起来一样，不禁扪心自问这值得么？</span><br>';
				if ($mhp > 573){
					$up = rand (0, $msp * 1.5);
				} else{
					$up = rand (0, 573);
				}
				$msp = $msp + $up;
				$att = $att + $up;
				$down = $club == 17 ? round($up * 1.5) : $up;
				$rp += 200;
				$mhp = $mhp - $down;
				$def = $def - $down;
				$log .= '你的生命上限和防御力减少了<span class="yellow">'.$down.'</span>点，而你的体力上限和攻击力提升了<span class="yellow">'.$up.'</span>点！<br>';
			} elseif ($itm == '溶剂SCP-294_PT_ErulTron') {
				$log .= '你考虑了一会，<br>一扬手喝下了杯中中冒着粉红光辉的液体。<br>你感到你整个人貌似变得更普通了点。<br>';
				global $lvl, $exp;
				$lvl = $exp = 0;
				$att = round($att * 0.8);
				$def = round($def * 0.8);
				$log .= '<span class="yellow">你的等级和经验值都归0了！但是，你的攻击力和防御力也变得更加普通了。</span><br>';
			}
			if($att < 0){$att = 0;}
			if($def < 0){$def = 0;}
			if($hp > $mhp){$hp = $mhp;}
			if($sp > $msp){$sp = $msp;}
			$deathflag = false;
			if($mhp <= 0){$hp = $mhp =0;$deathflag = true;}
			if($msp <= 0){$sp = $msp =0;$deathflag = true;}
			if($deathflag){
				$log .= '<span class="yellow">看起来你的身体无法承受药剂的能量……<br>果然这一点都不值得……<br></span>';
				include_once GAME_ROOT . './include/state.func.php';
				death ( 'SCP', '', 0, $itm );
			} else {
				$club = 17;
				addnews ( $now, 'notworthit', $nick.' '.$name );
			}
			$itms --;
			if($itms <= 0){
				if($hp > 0){$log .= "<span class=\"yellow\">{$itm}用完了。</span><br>";}
				$itm = $itmk = $itmsk = '';
				$itme = $itms = 0;
			}
		} elseif ($itm == '挑战者之印') {
			include_once GAME_ROOT . './include/system.func.php';
			$log .= '你已经呼唤了幻影执行官，现在寻找并击败他们，<br>并且搜寻他们的ID卡吧！<br>';
			addnpc ( 7, 0,1);
			addnpc ( 7, 1,1);
			addnpc ( 7, 2,1);
			addnews ($now , 'secphase',$nick.' '.$name);
			$itm = $itmk = $itmsk = '';
			$itme = $itms = 0;
		} elseif ($itm == '破灭之诗') {
			global $hack,$rp;
			$rp = 0;
			include_once GAME_ROOT . './include/system.func.php';
			$log .= '在你唱出那单一的旋律的霎那，<br>整个虚拟世界起了翻天覆地的变化……<br>';
			addnpc ( 4, 0,1);
			include_once GAME_ROOT . './include/game/item2.func.php';
			$log .= '世界响应着这旋律，产生了异变……<br>';
			wthchange( $itm,$itmsk);
			addnews ($now , 'thiphase',$nick.' '.$name);
			$hack = 1;
			$log .= '因为破灭之歌的作用，全部锁定被打破了！<br>';
			//include_once GAME_ROOT.'./include/system.func.php';
			movehtm();
			addnews($now,'hack2',$nick.' '.$name);
			save_gameinfo();
			$itm = $itmk = $itmsk = '';
			$itme = $itms = 0;
		} elseif ($itm == '黑色碎片') {
			include_once GAME_ROOT . './include/system.func.php';
			$log .= '你已经呼唤了一个未知的存在，现在寻找并击败她，<br>并且搜寻她的游戏解除钥匙吧！<br>';
			addnews ($now , 'dfphase', $nick.' '.$name);
			addnpc ( 12, 0,1);
			
			$itm = $itmk = $itmsk = '';
			$itme = $itms = 0;
		} elseif ($itm == '✦NPC钥匙·一阶段') {
			include_once GAME_ROOT . './include/system.func.php';
			$log .= '已解锁一阶段NPC！<br>似乎大量NPC已经部署至游戏内……<br>';
			//思念体 4*4
			addnpc ( 2, 0,1);
			addnpc ( 2, 1,1);
			addnpc ( 2, 2,1);
			addnpc ( 2, 3,1);
			addnpc ( 2, 0,1);
			addnpc ( 2, 1,1);
			addnpc ( 2, 2,1);
			addnpc ( 2, 3,1);
			addnpc ( 2, 0,1);
			addnpc ( 2, 1,1);
			addnpc ( 2, 2,1);
			addnpc ( 2, 3,1);
			addnpc ( 2, 0,1);
			addnpc ( 2, 1,1);
			addnpc ( 2, 2,1);
			addnpc ( 2, 3,1);
			//职人 1*6
			addnpc ( 11, 0,1);
			addnpc ( 11, 1,1);
			addnpc ( 11, 2,1);
			addnpc ( 11, 3,1);
			addnpc ( 11, 4,1);
			addnpc ( 11, 5,1);
			//妖精幻象 1*3
			addnpc ( 13, 0,1);
			addnpc ( 13, 1,1);
			addnpc ( 13, 2,1);
			addnews ($now , 'key1', $name);						
			$itm = $itmk = $itmsk = '';
			$itme = $itms = 0;
		} elseif ($itm == '✦✦NPC钥匙·二阶段') {
			include_once GAME_ROOT . './include/system.func.php';
			$log .= '已解锁二阶段NPC！<br>似乎凶恶NPC已经部署至游戏内……<br>';
			//杏仁豆腐 2*2
			addnpc ( 5, 0,1);
			addnpc ( 5, 1,1);
			addnpc ( 5, 0,1);
			addnpc ( 5, 1,1);
			//猴子 1*2
			addnpc ( 6, 0,1);
			addnpc ( 6, 0,1);
			//假蓝凝
			addnpc ( 9, 0,1);
			addnews ($now , 'key2', $name);						
			$itm = $itmk = $itmsk = '';
			$itme = $itms = 0;
		} elseif ($itm == '✦种火钥匙') {
			include_once GAME_ROOT . './include/system.func.php';
			$log .= '虽然不知道你究竟想干啥，<br>但总之你放出了更多的种火……<br>';
			// $dice = rand(0,100);
			// if ($dice > 98){
			// 	$log .= '似乎还有其他的什么被你放出来咯！<br>';	
			// 	addnpc ( 89, 0,1);
			// 	addnpc ( 89, 1,1);
			// 	addnpc ( 89, 2,1);
			// }
			//种火 5*10
			addnpc ( 92, 0,10);
			addnpc ( 92, 1,10);
			addnpc ( 92, 2,10);
			addnpc ( 92, 3,10);
			addnpc ( 92, 4,10);
			addnews ($now , 'key3', $name);						
			$itm = $itmk = $itmsk = '';
			$itme = $itms = 0;
		} elseif ($itm == '✦种火定点移位装置✦') {
			global $db, $tablepre, $pls;
			$result = $db->query("SELECT * FROM {$tablepre}players WHERE type = 92"); //SELECT 全部种火NPC
			$fsdata = $db->fetch_array($result);//获取以上结果
			//$fspid = $fsdata['pid'];
			//echo "成功获得$fspid";
			$dice = rand ( 0, 100 );
			//echo "骰子点数$dice";
			if($dice <= 20){
				//1/5 可能性种火聚集到无月之影
				//$npls = 0;
				//更新位置
				$db->query("UPDATE {$tablepre}players SET pls = 0 WHERE type = 92 AND hp > 0");
				//文案
				$log .= '你使用了种火定点移位装置。<br>地图上全部种火被移动到了【无月之影】！<br>';
				$db->query("INSERT INTO {$tablepre}chat (type,`time`,send,recv,msg) VALUES ('2','$now','【Ｅ】','','看起来有搅局的人出现了，我们被全扔去了【无月之影】')");
				$db->query("INSERT INTO {$tablepre}chat (type,`time`,send,recv,msg) VALUES ('2','$now','【Ｐ】','','不过红暮看上去像个好人就是了……')");
			}elseif($dice <= 40){
				//1/5 可能性种火聚集到初始之树
				//$npls = 22;
				//更新位置
				$db->query("UPDATE {$tablepre}players SET pls = 22 WHERE type = 92 AND hp > 0");
				//文案
				$log .= '你使用了种火定点移位装置。<br>地图上全部种火被移动到了【初始之树】！<br>';
				$db->query("INSERT INTO {$tablepre}chat (type,`time`,send,recv,msg) VALUES ('2','$now','【Ｅ】','','看起来有搅局的人出现了，我们被全扔去了【初始之树】')");
				$db->query("INSERT INTO {$tablepre}chat (type,`time`,send,recv,msg) VALUES ('2','$now','【Ｐ】','','唔……这里是【约定】之地呢。')");
			}elseif($dice <= 60){
				//1/5 可能性种火聚集到幻想世界
				//$npls = 23;
				//更新位置
				$db->query("UPDATE {$tablepre}players SET pls = 23 WHERE type = 92 AND hp > 0");
				//文案
				$log .= '你使用了种火定点移位装置。<br>地图上全部种火被移动到了【幻想世界】！<br>';
				$db->query("INSERT INTO {$tablepre}chat (type,`time`,send,recv,msg) VALUES ('2','$now','【Ｅ】','','看起来有搅局的人出现了，我们被全扔去了【幻想世界】')");
				$db->query("INSERT INTO {$tablepre}chat (type,`time`,send,recv,msg) VALUES ('2','$now','【Ｐ】','','唔……这里是【幻想】之地呢。')");
			}elseif($dice <= 80){
				//1/5 可能性种火聚集到永恒的世界
				//$npls = 24;
				//更新位置
				$db->query("UPDATE {$tablepre}players SET pls = 24 WHERE type = 92 AND hp > 0");
				//文案
				$log .= '你使用了种火定点移位装置。<br>地图上全部种火被移动到了【永恒的世界】！<br>';
				$db->query("INSERT INTO {$tablepre}chat (type,`time`,send,recv,msg) VALUES ('2','$now','【Ｅ】','','看起来有搅局的人出现了，我们被全扔去了【永恒的世界】')");
				$db->query("INSERT INTO {$tablepre}chat (type,`time`,send,recv,msg) VALUES ('2','$now','【Ｐ】','','唔……这里是【永恒】之地呢。')");
			}else{
				//1/5 可能性种火聚集到FARGO前基地
				//$npls = 28;
				//更新位置
				$db->query("UPDATE {$tablepre}players SET pls = 28 WHERE type = 92 AND hp > 0");
				//文案
				$log .= '你使用了种火定点移位装置。<br>地图上全部种火被移动到了【FARGO前基地】！<br>';
				$db->query("INSERT INTO {$tablepre}chat (type,`time`,send,recv,msg) VALUES ('2','$now','【Ｅ】','','看起来有搅局的人出现了，我们被全扔去了【FARGO前基地】')");
				$db->query("INSERT INTO {$tablepre}chat (type,`time`,send,recv,msg) VALUES ('2','$now','【Ｐ】','','唔……这里是【试炼】之地呢。')");
			}
			addnews ($now , 'fsmove', $name, '', $pls);
			//销毁物品
			$itm = $itmk = $itmsk = '';
			$itme = $itms = 0;			
		} elseif ($itm == '✦种火聚集装置✦') {
			global $db, $tablepre, $pls;
			$result = $db->query("SELECT * FROM {$tablepre}players WHERE type = 92"); //SELECT 全部种火NPC
			$fsdata = $db->fetch_array($result);//获取以上结果
			//聚集种火
			$db->query("UPDATE {$tablepre}players SET pls = '$pls' WHERE type = 92 AND hp > 0");
			//文案
			$log .= '你使用了种火聚集装置。<br>地图上全部种火被移动到了你所在的位置！<br>';
			$db->query("INSERT INTO {$tablepre}chat (type,`time`,send,recv,msg) VALUES ('2','$now','【Ｅ】','','看起来有搅局的人出现了，我们被什么玩家全体移动了位置呢。')");
			$db->query("INSERT INTO {$tablepre}chat (type,`time`,send,recv,msg) VALUES ('2','$now','【Ｐ】','','看一下「游戏状况」，来确认一下吧！')");			
			addnews ($now , 'fsmove', $name, '', $pls);
			//销毁物品
			$itm = $itmk = $itmsk = '';
			$itme = $itms = 0;		
		} elseif ($itm == '✦呼唤种火✦') {
			global $db, $tablepre, $pls;
			$result = $db->query("SELECT * FROM {$tablepre}players WHERE type = 92"); //SELECT 全部种火NPC
			$fsdata = $db->fetch_array($result);//获取以上结果
			//聚集种火
			$db->query("UPDATE {$tablepre}players SET pls = '$pls' WHERE type = 92 AND hp > 0");
			//文案
			$log .= '你使用了种火聚集装置。<br>地图上全部种火被移动到了你所在的位置！<br>';
			$db->query("INSERT INTO {$tablepre}chat (type,`time`,send,recv,msg) VALUES ('2','$now','【Ｅ】','','听到了……')");
			$db->query("INSERT INTO {$tablepre}chat (type,`time`,send,recv,msg) VALUES ('2','$now','【Ｐ】','','…………召唤…………')");			
			addnews ($now , 'fsmove', $name, '', $pls);
		} elseif ($itm == '镣铐的碎片') {
//			include_once GAME_ROOT . './include/system.func.php';
//			$log .= '呜哦，看起来你闯了大祸……<br>请自己去收拾残局！<br>';
//			addnpc ( 12, 0,1);
//			addnews ($now , 'dfsecphase', $name);
//			$itm = $itmk = $itmsk = '';
//			$itme = $itms = 0;
		} elseif($itm == '莱卡召唤器') {
//			include_once GAME_ROOT . './include/system.func.php';
//			global $db,$tablepre;
//			$result = $db->query("SELECT pid FROM {$tablepre}players WHERE type = 13");
//			$num = $db->num_rows($result);
//			if($num){
//				$log.= '召唤器似乎用尽了能量。<br>';
//			}else{
//				addnpc ( 13, 0,1);
//				$log.= '你成功召唤了小莱卡，去测试吧。<br>';
//			}
//			$n_name = evonpc (1,'红暮');
//			if($n_name){
//				addnews($now , 'evonpc','红暮', $n_name);
//			}
		} elseif ($itm == '提示纸条A') {
			$log .= '你读着纸条上的内容：<br>“执行官其实都是幻影，那个红暮的身上应该有召唤幻影的玩意。”<br>“用那个东西然后打倒幻影的话能用游戏解除钥匙出去吧。”<br>';
		} elseif ($itm == '提示纸条B') {
			$log .= '你读着纸条上的内容：<br>“我设下的灵装被残忍地清除了啊……”<br>“不过资料没全部清除掉。<br>用那个碎片加上传奇的画笔和天然属性……”<br>“应该能重新组合出那个灵装。”<br>';
		} elseif ($itm == '提示纸条C') {
			$log .= '你读着纸条上的内容：<br>“小心！那个叫红暮的家伙很强！”<br>“不过她太依赖自己的枪了，有什么东西能阻挡那伤害的话……”<br>';
		} elseif ($itm == '提示纸条D') {
			$log .= '你读着纸条上的内容：<br>“我不知道另外那个孩子的底细。如果我是你的话，不会随便乱惹她。”<br>“但是她貌似手上拿着符文册之类的东西。”<br>“也许可以利用射程优势？！”<br>“你知道的，法师的射程都不咋样……”';
		} elseif ($itm == '提示纸条E') {
			$log .= '你读着纸条上的内容：<br>“生存并不能靠他人来喂给你知识，”<br>“有一套和元素有关的符卡的公式是没有出现在帮助里面的，用逻辑推理好好推理出正确的公式吧。”<br>“金木水火土在这里都能找到哦～”<br>';
		} elseif ($itm == '提示纸条F') {
			$log .= '你读着纸条上的内容：<br>“喂你真的是全部买下来了么……”<br>“这样的提示纸条不止这六种，其他的纸条估计被那两位撒出去了吧。”<br>“总之祝你好运。”<br>';
		} elseif ($itm == '提示纸条G') {
			$log .= '你读着纸条上的内容：<br>“上天保佑，”<br>“请不要在让我在模拟战中被击坠了！”<br>“空羽 上。”<br>';
		} elseif ($itm == '提示纸条H') {
			$log .= '你读着纸条上的内容：<br>“在研究施设里面出了大事的SCP竟然又输出了新的样本！”<br>“按照董事长的意见就把这些家伙当作人体试验吧！”<br>署名看不清楚……<br>';
		} elseif ($itm == '提示纸条I') {
			$log .= '你读着纸条上的内容：<br>“嗯……”<br>“制作神卡所用的各种认证都可以在商店里面买到。”<br>“其实卡片真的有那么强大的力量么？”<br>';
		} elseif ($itm == '提示纸条J') {
			$log .= '你读着纸条上的内容：<br>“知道么？”<br>“果酱面包果然还是甜的好，哪怕是甜的生姜也能配制出如地雷般爆炸似的美味。”<br>“祝你好运。”<br>';
		} elseif ($itm == '提示纸条K') {
			$log .= '你读着纸条上的内容：<br>“水符？”<br>“你当然需要水，然后水看起来是什么颜色的？”<br>“找一个颜色类似的东西合成就有了吧。”<br>';
		} elseif ($itm == '提示纸条L') {
			$log .= '你读着纸条上的内容：<br>“木符？”<br>“你当然需要树叶，然后说到树叶那是什么颜色？”<br>“找一个颜色类似的东西合成就有了吧。”<br>';
		} elseif ($itm == '提示纸条M') {
			$log .= '你读着纸条上的内容：<br>“火符？”<br>“你当然需要找把火，然后说到火那是什么颜色？”<br>“找一个颜色类似的东西合成就有了吧。”<br>';
		} elseif ($itm == '提示纸条N') {
			$log .= '你读着纸条上的内容：<br>“土符？”<br>“说到土那就是石头吧，然后说到石头那是什么颜色？”<br>“找一个颜色类似的东西合成就有了吧。”<br>';
		} elseif ($itm == '提示纸条P') {
			$log .= '你读着纸条上的内容：<br>“金符？这个的确很绕人……”<br>“说到金那就是炼金，然后这是21世纪了，炼制一个金色方块需要什么？”<br>“总之祝你好运。”<br>';
		} elseif ($itm == '提示纸条Q') {
			$log .= '你读着纸条上的内容：<br>“据说在另外的空间里面；”<br>“一个吸血鬼因为无聊就在她所居住的地方洒满了大雾，”<br>“真任性。”<br>';
		} elseif ($itm == '提示纸条R') {
			$log .= '你读着纸条上的内容：<br>“知道么，”<br>“东方幻想乡这作游戏里面EXTRA的最终攻击”<br>“被老外们称作『幻月的Rape Time』，当然对象是你。”<br>';
		} elseif ($itm == '提示纸条S') {
			$log .= '你读着纸条上的内容：<br>“土水符？”<br>“哈哈哈那肯定是需要土和水啦，可能还要额外的素材吧。”<br>“总之祝你好运。”<br>';
		} elseif ($itm == '提示纸条T') {
			$log .= '你读着纸条上的内容：<br>“我一直对虚拟现实中的某些迹象很在意……”<br>“这种未名的威压感是怎么回事？”<br>“总之祝你好运。”<br>';
		} elseif ($itm == '提示纸条U') {
			$log .= '你读着纸条上的内容：<br>“纸条啥的……”<br>“希望这张纸条不会成为你的遗书。”<br>“总之祝你好运。”<br>';
		} elseif ($itm == '人品探测器') {
			global $rp;
			$log .= '你读着纸条上的内容：<br>“你的RP值为'.$rp.'。”<br>“总之祝你好运。”<br>';
		} elseif ($itm == '仪水镜') {
			global $rp;
			$log .= '水面上映出了你自己的脸，你仔细端详着……<br>';
			if ($rp < 40){
				$log .= '你的脸看起来十分白皙。<br>';
			} elseif ($rp < 200){
				$log .= '你的脸看起来略微有点黑。<br>';
			} elseif ($rp < 550){
				$log .= '你的脸上貌似笼罩着一层黑雾。<br>';
			} elseif ($rp < 1200){
				$log .= '你的脸已经和黑炭差不多了，赶快去洗洗！<br>';
			} elseif ($rp < 5499){
				$log .= '你印堂漆黑，看起来最近要有血光之灾！<br>';
			} elseif ($rp > 5500){
				$log .= '水镜中已经黑的如墨一般了。<br>希望你的H173还在……<br>';
			} else{
				$log .= '你的脸从水镜中消失了。<br>';
			}
		} elseif ($itm == '风祭河水'){
			global $rp, $wp, $wk, $wg, $wc, $wd, $wf;
			$slv_dice = rand ( 1, 20 );
				if ($slv_dice < 8) {
				$log .= "你一口干掉了<span class=\"yellow\">$itm</span>，不过好像什么都没有发生！";
				$itm = $itmk = $itmsk = '';
				$itme = $itms = 0;
			} elseif ($slv_dice < 16) {
				$rp = $rp - 10*$slv_dice;
				$log .= "你感觉身体稍微轻了一点点。<br>";
				$itm = $itmk = $itmsk = '';
				$itme = $itms = 0;
			} elseif ($slv_dice < 20) {
				$rp = 0 ;
				$log .= "你头晕脑胀地躺到了地上，<br>感觉整个人都被救济了。<br>你努力着站了起来。<br>";
				$wp = $wk = $wg = $wc = $wd = $wf = 100;
				$itm = $itmk = $itmsk = '';
				$itme = $itms = 0;
			} else {
				$log .= '你头晕脑胀地躺到了地上，<br>感觉整个人都被救济了。<br>';
				include_once GAME_ROOT . './include/state.func.php';
				$log .= '然后你失去了意识。<br>';
				//$bid = 0;
				death ( 'salv', '', 0, $itm );
			}
		} elseif ($itm == '『灵魂宝石』' || $itm == '『祝福宝石』') {
			global $cmd;
			$cmd = '<input type="hidden" name="mode" value="item"><input type="hidden" name="usemode" value="qianghua"><input type="hidden" name="itmp" value="' . $itmn . '">你想强化哪一件装备？<br><input type="radio" name="command" id="menu" value="menu" checked><a onclick=sl("menu"); href="javascript:void(0);" >返回</a><br><br><br>';
			for($i = 1; $i <= 6; $i ++) {
				global ${'itmsk' . $i};
				if ((strpos ( ${'itmsk' . $i}, 'Z' ) !== false) && (strpos ( ${'itm' . $i}, '宝石』' ) === false)) {
					global ${'itm' . $i}, ${'itme' . $i}, ${'itms' . $i};
					$cmd .= '<input type="radio" name="command" id="itm' . $i . '" value="itm' . $i . '"><a onclick=sl("itm' . $i . '"); href="javascript:void(0);" >' . "${'itm'.$i}/${'itme'.$i}/${'itms'.$i}" . '</a><br>';
				  $flag = true;
				}
			}
			$cmd .= '<br><br><input type="button" onclick="postCmd(\'gamecmd\',\'command.php\');" value="提交">';
			if (! $flag) {
				$log .='唔？你的包裹里没有可以强化的装备，是不是没有脱下来呢？DA☆ZE<br><br>';
			}else{
				$log .="宝石在你的手上发出异样的光芒，似乎有个奇怪的女声在你耳边说道<span class=\"yellow\">\"我是从天界来的凯丽\"</span>.";
			}				
			return;
		} elseif ($itm == '水果刀') {
			$flag = false;
			
			for($i = 1; $i <= 6; $i ++) {
				global ${'itm' . $i}, ${'itmk' . $i},${'itms' . $i},${'itme' . $i},$wk;
				foreach(Array('香蕉','苹果','西瓜') as $fruit){
					
					if ( strpos ( ${'itm' . $i} , $fruit ) !== false && strpos ( ${'itm' . $i} , '皮' ) === false && strpos ( ${'itm' . $i} , '■' ) === false && (strpos ( ${'itmk' . $i} , 'H' ) === 0 || strpos ( ${'itmk' . $i} , 'P' ) === 0 )) {
						if($wk >= 120){
							$log .= "练过刀就是好啊。你娴熟地削着果皮。<br><span class=\"yellow\">${'itm'.$i}</span>变成了<span class=\"yellow\">★残骸★</span>！<br>咦为什么会出来这种东西？算了还是不要吐槽了。<br>";
							${'itm' . $i} = '★残骸★';
							${'itme' . $i} *= rand(2,4);
							${'itms' . $i} *= rand(3,5);
							$flag = true;
							$wk++;
						}else{
							$log .= "想削皮吃<span class=\"yellow\">${'itm'.$i}</span>，没想到削完发现只剩下一堆果皮……<br>手太笨拙了啊。<br>";
							${'itm' . $i} = str_replace($fruit, $fruit.'皮',${'itm' . $i} );
							${'itmk' . $i} = 'TN';
							${'itms' . $i} *= rand(2,4);
							$flag = true;
							$wk++;
						}
						break;
					}
				}
				if($flag == true) {break;};
			}
			if (! $flag) {
				$log .= '包裹里没有水果。<br>';
			} else {
				$dice = rand(1,5);
				if($dice==1){
					$log .= "<span class=\"red\">$itm</span>变钝了，无法再使用了。<br>";
					$itm = $itmk = $itmsk = '';
					$itme = $itms = 0;
				}
			}
		} elseif(strpos($itm,'RP回复设备')!==false){
			global $rp;
			$rp = 0;
			$log .= "你使用了<span class=\"yellow\">$itm</span>。你的RP归零了。<br>";
		} else {
			$log .= " <span class=\"yellow\">$itm</span> 该如何使用呢？<br>";
		}
		
		if (($itms <= 0) && ($itm)) {
			$log .= "<span class=\"red\">$itm</span> 用光了。<br>";
			$itm = $itmk = $itmsk = '';
			$itme = $itms = 0;
		}
	} else {
		$log .= "你使用了道具 <span class=\"yellow\">$itm</span> 。<br>但是什么也没有发生。<br>";
	}
	
	include_once GAME_ROOT.'./include/game/achievement.func.php';
	check_item_achievement($name,$i,$ie,$is,$ik,$isk);
		
	$mode = 'command';
	return;
}

?>
