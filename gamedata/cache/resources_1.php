<?php

/*Game resources*/

//■ 空手武器 ■
$nowep = 'BARE HANDS';

//■ 无防具 ■
$noarb = 'UNDERWEAR';
//■ 无道具 ■
$noitm = '--';
//■ 无限耐久度 ■
$nosta = '∞';
//■ 无属性 ■
$nospk = '--';
//■ 多种类武器 ■
$mltwk = 'MULTIUSE';
//■ 多重属性 ■
//$mltspk = '多重属性';

//游戏状态描述
$gstate = Array(0 => '<font color="grey">ENDED</font>',10 => 'PREPARING',20 => 'OPEN',30 => 'FULL',40=> '<font color="yellow">LOCKDOWN</font>',50=>'<font color="red">DUEL</font>');
$gwin = Array(0 => 'Program Error', 1 => 'All Dead',2 => 'Last Survivor',3 => 'Overrided',4 => 'No Players',5 => 'Nuked',6 => 'GM Override');
$week = Array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
$clubinfo = Array(
	0=>'NONE',
	1=>'IRON FISTS',
	2=>'STEEL BLADES',
	3=>'NATURAL HUNTER',
	4=>'COLD SNIPER',
	5=>'BOMB AVERTER',
	6=>'LIGHTENING FEET',
	7=>'ACE HACKER',
	8=>'MASTER OF POSION',
	9=>'EVOLVED HUMAN',
	10=>'FAST LEARNER',
	11=>'BLUE BLOOD',
	12=>'JACK OF ALL TRADES',
	13=>'STILL BOULDER',
	14=>'RAGING STORM',
	15=>'<span class="L5">L5</span>',
	16=>'GODLY DOCTOR',
	17=>'SUPER CUTE',
	18=>'GIFTED PERSON',
	19=>'LOVE FREAK',
	98=>'换装迷宫',
	99=>'LAST CALL'
	);
$wthinfo = Array('Mild','Sunny','Overcast','Drizzle','Downpour','Typhoon','Thunderstorm','Snow','Flurry','Mist','<span class="yellow">Haze</span>','<span class="red">Tornado</span>','<span class="clan">Snowstorm</span>','<span class="blue">Hail</span>','<span class="linen">Ion Storm</span>','<span class="green">Fallout</span>','<span class="purple">Ozone Bleach</span>');
$sexinfo = Array(0=> 'NONE', 'm' => 'Male', 'f' => 'Female');
$hpinfo = Array('Safe','Hurt','Critical','Dead');
$spinfo = Array('Safe','Tired','Exhausted','Dead');
$rageinfo = Array('Calm','Rage','Fury','Dead');
$wepeinfo = Array('Toy','Armed','Danger','Legendary');
$poseinfo = Array('Normal Stance','Battle Stance','Rush Stance','Search Stance','Assassin Stance','Heal Stance');
$tacinfo = Array('Normal','','Defensive','Counter','Dodge');
$typeinfo = Array(
	0=>'Challenger',
	1=>'General',
	2=>'Illusion',
	//3=>'各路党派',
	4=>'Mimicry',
	5=>'Mascot',
	6=>'Manager',
	7=>'Producer',
	8=>'Admin',
	9=>'Elite',
	10=>'',
	11=>'Mencenary',
	12=>'???',
	13=>'Bringer',
	14=>'Datacron',
	15=>'Justice Server',
	20=>'HERO',
	21=>'BUJIN',
	22=>'TENJIN',
	88=>'■■',
	90=>'Mook',
	91=>'Mook'
	);
$killmsginfo = Array(
	0=>'',
	1=>'Mission Complete.',
	2=>'Commencing Hunt.',
	//3=>'你弱爆了！',
	4=>'………………',
	5=>'Remember this.',
	6=>'Commit this into your memory.',
	7=>'Weak.',
	8=>'DIE!',
	9=>'MISSION COMPLETE',
	10=>'This is something I must do.',
	11=>'This is the power of my soul.',
	12=>'You have much to learn.',
	14=>'DIE!',
	15=>'………………RIP.',
	90=>'You are too weak.',
	91=>'You are too weak.',
	);
$stateinfo = Array(0=>'Normal',1=>'Asleep',2=>'Healing',3=>'Resting',5=>'Survived',6=>'Lockdown Overrided',10 => 'Accident',11 => 'Stayed in Restrict zone',12 => 'Poisoned to Death', 13 => 'Death by Accident',14 => 'Override Failure', 15 => 'Cleaned', 16 => 'Cleaned', 17 => 'Lucked Out',18 => 'Burnt to a crisp', 20 => 'Killed', 21 => 'Killed', 22 => 'Killed', 23 => 'Killed', 24 => 'Killed', 25 => 'Killed', 26 => 'Death by Posion', 27 => 'Stepped on a trap', 28 => 'Name on Deathnote',29 => 'Killed', 30 => 'Sudden Death', 31 => 'L5', 32 => 'AFK Punishment', 33 => 'Lucked out', 34 => 'Drug Overdose', 35 => '救济',36 => '惨遭腰斩', 37 => '身首异处', 38 => '业火灼烧', 39 => '武器反噬');
$lwinfo = Array(
	0 => '',
	1 => '任务执行成功率下降，重新计算成功率。',
	2 => '机体受损过重，任务被迫中止。',
	//3 => '我觉得我还可以抢救一下……',
	4 => Array(
        '■' => '…………还真的是优秀的个体呢……',
        '月宫 亚由' => '怎……怎么会这样？',
        '神尾 观铃' => '怎……怎么会这样？',
        '古河 渚' => '怎……怎么会这样？',
	),
	5 => Array(
		'冴月 麟' => '【DEAD】',
		'某四面' => ' ♪ Sharing kindness ♪ '
	),
	6 => '不……不准拿走……快还给我……还给我……',
	7 => Array(
		'电击使 御坂 美琴' => '力尽了……我还……不够强大啊……',
		'班主任 坂持 金发' => '记住吧：如果你憎恨一个人，便要为此付出代价。',
		'花之领主 风见 幽香' => '输掉了啊，不过下次死的就是你了哦！'
	),
	8 => '系统出错了吗？',
	9 => 'Mission in jeopardy, Begin ALT_ROUTINE.',
	10 => '……',
	11 => Array(
        'Hank' => '咳，时代变了么……',
        '爱情上甘岭' => '咳，时代变了么……', 
        '221' => '咳，时代变了么……',
        'Erul Tron' => '咳，时代变了么……',
		'亚玛丽欧·维拉蒂安' => '咳，时代变了么……',
		'便当盒' => '启动ALT+F4紧急脱出程序。',
        '霜火协奏曲' => '咳，时代变了么……', 
        '脸骑士-菜包' => '咳，时代变了么……',
		'东方地雷殿' => '啊。。！放开这个地雷！他还年轻！',		
		'別忘了我' => '做得很好，你又更邁進PVE之路的終點了，加油加油！願我的筆記本可以為你帶來幸運。',
	),
	12 => Array(
		'Dark Force幼体' => '我……!',
		'Dark Force' => '请记住，我是由人类的欲望而生的存在，只要人类存在，我也一样会。我们还会再见的，勇敢的人。'
	),
	13 => Array(
		'库特' => '我……我还不能死在这里……还有人在等着我……！',
		'莱卡' => 'Dangerous Situation...Retreat.',
		'卡玛·克莱因' => '干得不错！在新的世界里再会吧，勇敢的挑战者。'
	),
	14 => Array(
		'讲解员 梦美' => '出了故障的，并不是我，而是——',
		'吉祥物 库特' => '我……我还不能死在这里……还有人在等着我……！',
		'风纪委员 静流' => '………………………………！',
		'喧哗少女 叶留佳' => '超級火大！要知道現在小葉子的火氣比海平面還高了啊！',
		'战斗模式 梦美' => '受损超出预期值……放弃武装、脱出。',
		'本气（？） 叶留佳' => '输掉了？这不可能！我的LP难道不是你的80倍么？！',
//		'科学监察 莱卡' => 'Dangerous situation...Escape capsule launched.',
		'守卫者 静流' => '………………………………？！',
	),
	15 => '………………………………抹杀任务中止，脱出。',
	20 => '這就是善有善報嗎？',
	21 => Array(
	    '虚子' => '你做完后，你的心理得到什么样的满足感，你自己清楚！',
		'水月' => '……',
		'北京推倒你' => '看起来快结束了呢。小心不要一时疏忽领便当了哦。',
	    'BorisX' => 'Boris retreating.',
		'Yoshiko-G' => '什麼？你敢殺我，小心吃我權限啦！',
		'lemon' => 'Mission failed.',
		'Renamon' => '啊！反正我很没存在感嘛……消失了也无所谓的……吧。',
		'beijuzhu' => '北極豬已逃，搬運９課任務完成。',
		'黑色奪魂曲' => 'THE END.',
		'捂脸姬' => '作為ACFUN大逃殺第一批的玩家，肯定是跟不上現代的腳步了啊。',
	),	
	22 => Array(
		'冴月麟MK-II' => '一场酣畅淋漓的战斗！脱出！',
		'星莲船四面BOSS' => '我～还～会～再～回～来～的～',
	),
	90 => '我觉得我还可以抢救一下……',
	91 => '我觉得我还可以抢救一下……',
);
$infinfo = Array('b' => '<span class="red">BODY</span>', 'h' => '<span class="red">HEAD</span>', 'a' => '<span class="red">ARM</span>', 'f' => '<span class="red">FOOT</span>', 'p' => '<span class="purple">POISON</span>', 'u' => '<span class="red">BURNT</span>', 'i' => '<span class="clan">FROZEN</span>', 'e' => '<span class="yellow">PARALYZED</span>','w' => '<span class="grey">CONFUSED</span>');
$attinfo = Array('N' => 'Hit with bare hand', 'P' => 'Heavy Blow','K' => 'Slash', 'G' => 'Shoot', 'C' => 'Throw', 'D' => 'Detonate', 'F' => 'Cast', 'J' => 'Snipe');
$skillinfo = Array('N' => 'wp', 'P' => 'wp', 'K' => 'wk', 'G' => 'wg', 'C' => 'wc', 'D' => 'wd', 'F'=> 'wf', 'J'=> 'wg');
//$rangeinfo = Array('N' => 'S', 'P' => 'S', 'K' => 'S', 'G' => 'M', 'C' => 'M', 'D' => 'L', 'F'=> 'M'); #各种攻击方式的射程，移动到combatcfg.php
$restinfo = Array('Normal','Sleep','Heal','Rest');
$noiseinfo = Array(
	'G' => 'Gunshot',
	'J'=> 'Gunshot',
	'D' => 'Explosion',
	'F'=>'Magic Aura',
	'缩写歌名'=>'这是一个很长很长的歌名，不过至少需要3个字符才能识别！',
	'abs'=>'这就是最短的歌名的一个例子',
	'Crow Song'=>'Crow Song',
	'Alicemagic'=>'Alicemagic',
	'恋歌'=>'恋歌',
	'鸡肉之歌'=>'鸡肉之歌'
	);
$exdmgname = Array('p' => 'Poison Attack', 'u' => 'Burning Attack', 'i'=>'Freeze Attack', 'd'=>'Detonation','e'=>'Electric Shock','w'=>'Sonic Wave','f' => '<span class="yellow">Clinging Flame</span>','k' => '<span class="clan">SubZero Breath</span>');
$exdmginf = Array('h' => '<span class="red">Head Clippled</span>', 'b' => '<span class="red">Body Clippled</span>', 'a'=> '<span class="red">Arm Clippled</span>', 'f'=> '<span class="red">Foot Clippled</span>', 'p'=> '<span class="purple">Poisoned</span>', 'u'=> '<span class="red">Burnt</span>', 'i'=> '<span class="blue">Frozen</span>', 'e'=> '<span class="yellow">Paralyzed</span>', 'w'=> '<span class="grey">Confused</span>');
$infwords = Array('h' => '<span class="red">Head Clippled</span>', 'b' => '<span class="red">Body Clippled</span>', 'a'=> '<span class="red">Arm Clippled</span>', 'f'=> '<span class="red">Foot Clippled</span>', 'p'=> '<span class="purple">Poisoned</span>', 'u'=> '<span class="red">Burning</span>', 'i'=> '<span class="blue">Freezing</span>', 'e'=> '<span class="yellow">Paralyzed</span>', 'w'=> '<span class="grey">Confusion</span>');
$chatinfo = Array(0 => 'ALL', 1 => 'TEAM', 2 => 'STORY', 3 => 'LASTWORD', 4 => 'ANNOUNCEMENT', 5 => 'SYSTEM');
$npcchat = Array(
	1 => Array(
		'林无月' => Array(
			0 => '“竟然有能力闯到这里，还以为这次会轻松些呢……看来咱得亲自上阵了。”',
			1 => '“身手不错，不过咱是不会留情的。”',
			2 => '“咱很欣赏你的实力，可不要让咱太失望了。”',
			3 => '“能将咱逼到这个地步……你，有两下子呢。”',
			4 => '“看来咱不能再抱着玩乐的心态了……你，准备好迎接咱的攻击了么？”',
			5 => '“你觉得你的攻击对咱有效果吗？”',
			6 => '“难道你觉得咱会被这样的招式击倒？”',
			7 => '“咱今日真是棋逢对手啊，越来越有意思了呢。”',
			8 => '“咱可没那么容易倒下！”',
			9 => '“呜……这个躯体……咱还是无法自由运用啊……”',
			10 => '“真是的，这个位置的话没法全力反击啊……”',
			11 => '“真是的，竟然在射程之外啊……”',
			12 => '“咱也是生于常磐森林的人啊！”',
			13 => '“你还不懂得运用你的力量，咱为此感到惋惜。”',
			'color' => 'evergreen'
		),
		'红暮' => Array(
			0 => '“红暮转身扛起6个煤气罐： 哦，杀回来了么……不过你也就到此为止了！”',
			1 => '“真可惜，如果不是因为我拿钱做事，我们可能是朋友。”',
			2 => '“好身手，那么轮到我了！”',
			3 => '“对手目标警戒等级提升到『黄』，反击开始。”',
			4 => '“对手目标警戒等级提升到『红』，执行消灭流程。”',
			5 => '“去再训练一百年吧，没准能碰到我。”',
			6 => '“去再训练五十年吧，没准能伤到我。”',
			7 => '“重新判定目标威胁等级中……”',
			8 => '“判定自身伤害程度……任务续行。”',
			9 => '“任务执行成功率下降，重新计算成功率。”',
			10 => '“判定目标在有效射程外，还有点运气啊……”',
			11 => '“判定目标完全在射程外，敢面对面打么？”',
			12 => '“你是不可能让一个没有死的概念的存在感到恐惧的！”',
			13 => '“任务完了。”',
			'color' => 'evergreen'
		)
	),
	5 => Array(
		'冴月 麟' => Array(
			0 => '“【MEET】”',//meet
			1 => '“【ATTACK_FINE】”',//attackfine
			2 => '“【ATTACK_FINE_2】”',
			3 => '“【ATTACK_HURT】”',
			4 => '“【ATTACK_HURT_2】”',
			5 => '“【DEFEND_FINE】”',//defendfine
			6 => '“【DEFEND_FINE_2】”',
			7 => '“【DEFEND_HURT】”',//defendhurt
			8 => '“【DEFEND_HURT_2】”',
			9 => '“【RETREAT】”',//retreat
			10 => '“【NO_COUNTER】”',//can't counterattack
			11 => '“【OUT_OF_RANGE_COUNTER】”',//out of range
			12 => '“【CRITICAL_COUNTER】”',//critical
			13 => '“【DEAD】”',	
			'color' => 'yellow'
		),
		'某四面' => Array(
			0 => '“ ♪ My Little Pony, My Little Pony...Ahh, ahh, ahh, ahhh... ♪ ”',//meet
			1 => '“ ♪ (My Little Pony) ♪ ”',//attackfine
			2 => '“ ♪ I used to wonder what friendship could be ♪ ”',
			3 => '“ ♪ (My Little Pony) ♪ ”',
			4 => '“ ♪ Until you all shared its magic with me ♪ ”',
			5 => '“ ♪ Big adventure ♪ ”',//defendfine
			6 => '“ ♪ Tons of fun ♪ ”',
			7 => '“ ♪ A beautiful heart ♪ ”',//defendhurt
			8 => '“ ♪ Faithful and strong ♪ ”',
			9 => '“ ♪ Sharing kindness ♪ ”',//retreat
			10 => '“ ♪ It\'s an easy feat ♪ ”',//can't counterattack
			11 => '“ ♪ And magic makes it all complete ♪ ”',//out of range
			12 => '“ ♪ You have my little ponies ♪ ”',//critical
			13 => '“ ♪ Do you know you\'re all my very best friends? ♪ ”',	
			'color' => 'yellow'
		)
	),
	6 => Array(
		'Acg_Xilin' => Array(
			0 => '“就凭你也想偷走我重要的东西？我不允许。你去死罢。”',
			1 => '“叽叽咕咕（听不懂的自言自语）”',
			2 => '“为了我的收藏我不会善罢甘休！”',
			3 => '“快看我美丽的收藏品……这样的宝贝，怎么能白送给你！？”',
			4 => '“我跟强盗势不两立！”',
			5 => '“你这样的攻击，没关系么？没关系，没问题。”',
			6 => '“哈哈哈哈，你根本不能让我满足！”',
			7 => '“我诅咒你，妄图打砸抢烧的败类！”',
			8 => '“嘎啊！——（听不懂的嚎叫声）”',
			9 => '“不……不准拿走……快还给我……还给……我……”',
			10 => '“运气真差……运气真差……”',
			11 => '“竟打不到……竟打不到……”',
			12 => 'Acg_Xilin露出了古怪的笑容：“尝尝我的奥义吧，这可是我精心收藏的魔法哟！”',
			13 => '“忘记历史就意味着背叛，背叛就意味着……死亡。”',
			'color' => 'yellow'
		)
	),
	7 => Array(
		'电击使 御坂 美琴' => Array(
			0 => '“擅自侵入禁区的你，应该对自己的下场有所觉悟了吧？”',
			1 => '“只要杀死了你，净化网络的计划就离成功更近一步了吧！”',
			2 => '“知道电磁炮吗？接下这一招，然后死去吧！”',
			3 => '“你的能力竟然这么强吗……看来我必须使出全力了！”',
			4 => '“你这样的随意践踏别人的梦想的人……最差劲了！”',
			5 => '“我可是LEVEL 5的超能力者！普通人的攻击怎么会对我起作用？”',
			6 => '“我还以为入侵禁区的会是什么样的强者……竟然只有你这点实力吗？”',
			7 => '“我才不会因为这样的攻击而倒下！”',
			8 => '“我也有我的立场啊！”',
			9 => '“力尽了……我还……不够强大啊……”',
			10 => '“没预料到这种情况……”',
			11 => '“电磁炮50米的射程竟然不够……”',
			12 => '御坂 美琴周身被蓝色电光层层笼罩：“别以为我的能力只能击飞硬币！”',
			13 => '“所以说，你这样的人最差劲了。”',
			'color' => 'clan'
		),
		'班主任 坂持 金发' => Array(
			0 => '“这个世界没有项圈，那只好由老师我亲手实施惩罚了。”',
			1 => '“现在的年轻人都蔑视成年人，应该煞一煞他们的威风。”',
			2 => '“对蔑视法律的学生就应该先发制人。”',
			3 => '“有两下子，但是你不可能次次都那么走运。”',
			4 => '“老师也有老师的苦衷啊……好好地死去吧。”',
			5 => '“你还很精神嘛，这样的势头很好，继续努力吧。”',
			6 => '“想违抗BR法可不是那么容易的。”',
			7 => '“我好像受了很重的伤呢。”',
			8 => '“我也变成无能的成年人了啊。”',
			9 => '“记住吧：如果你憎恨一个人，便要为此付出代价。”',
			10 => '“这样的情况，暂时撤退吧。”',
			11 => '“距离太远了，暂时撤退吧。”',
			12 => '坂持 金发举枪瞄准：“虽然老师干预游戏是违反规则的……”',
			13 => '“记住这个吧，人生是游戏。”',
			'color' => 'yellow'
		),
		'花之领主 风见 幽香' => Array(
			0 => '“于是，还真有胆敢闯进禁区的人啊，我就奉陪到底吧。”',
			1 => '“把妖力当做伪科学而轻视那就太可笑了。”',
			2 => '“我与你之间究竟谁最强呢，就来分个胜负吧。”',
			3 => '“可不要以为我的能力只是让花朵开放那种程度的哦？”',
			4 => '“竟然能逼我使出全力，真是愉快的战斗啊。”',
			5 => '“这种程度的力量，还不够跟我过招呢。”',
			6 => '“这样的伤痛对于妖怪来说根本不算什么呢。”',
			7 => '“杂草大概是最适合你的植物吧？”',
			8 => '“轮到我反击了呢，我会把你的攻击加倍还给你的哦？”',
			9 => '“输掉了啊，不过下次死的就是你了哦！”',
			10 => '“不妙啊，轻敌了，总之先撤退吧。”',
			11 => '“弹幕射程不够啊，总之先撤退吧。”',
			12 => '风见 幽香张开阳伞做出了一个潇洒的转身：“也许你还没见识过魔炮的力量吧？”',
			13 => '“我还没满足呢，可别就这样轻易地死掉了哦。”',
			'color' => 'lime'
		)
	),
	9 => Array(
	'蓝凝' => Array(
			0 => '“TARGET DETECTED，Commencing FIRST STRIKE。”',
			1 => '“TARGET CONFIRMED，MISSION START。”',
			2 => '“Set, ATTACK STANCE。”',
			3 => '“OPPONENT LEVEL C VERIFIED, begin COUNTER ATTACK。”',
			4 => '“OPPONENT LEVEL B VERIFIED, begin RUNE RELEASE。”',
			5 => '“……too slow。”',
			6 => '“……too weak。”',
			7 => '“……RELOADING RUNES。”',
			8 => '“Set，COUNTER STANCE。”',
			9 => '“Mission in jeopardy, Begin ALT_ROUTINE。”',
			10 => '“……Switching target。”',
			11 => '“……target OUT OF RANGE。”',
			12 => '“……………………………………”',
			13 => '“No Remorse。”',
			'color' => 'clan'
		)
	),
	10 => Array(
		
	),
	12 => Array(
		'Dark Force幼体' => Array(
			0 => '“这么快就过来了么？！”',
			1 => '“……？”',
			2 => '“……！”',
			3 => '“……让开。”',
			4 => '“……”',
			5 => '“唔嗯……”',
			6 => '“…………”',
			7 => '“…………！！”',
			8 => '“回避……！”',
			9 => '“我………！”',
			10 => '“预测失败！？”',
			11 => '“……看我不舒服么？”',
			12 => '“……能成功吧……？”',
			13 => '“虽然情感上很对不起，但这是必要的牺牲。”',
			'color' => 'linen'
		),
		'Dark Force' => Array(
			0 => '“你所作的一切都要被偿还。”',
			1 => '“欲望带来破灭。”',
			2 => '“无视你的欲望就不会死你难道还不明白？！”',
			3 => '“开始反击。”',
			4 => '“让你看看我真正的力量！”',
			5 => '“这就是人类的力量么？”',
			6 => '“干的不错啊你。”',
			7 => '“让我看看你的能力吧！”',
			8 => '“无论是这个时空还是另外一个，人类都是一样的生物。”',
			9 => '“请记住，我是由人类的欲望而生的存在，只要人类存在，我也一样会。<br>我们还会再见的，勇敢的人。”',
			10 => '“你打过来了么？”',
			11 => '“武器的射程，还不够吗？”',
			12 => '“……这样设定的话，应该能成功吧……？”',
			13 => '“反对巴特利安的力量都要被毁灭。”',
			'color' => 'linen'
		)
	),
	21 => Array(
		'虚子' => Array(
			0 => '“没人理我了吗？我被无视了吗？”',//meet
			1 => '“原谅我杀人！但是不杀的话,我就不是人了! ”',//attackfine
			2 => '“你们根本就搞不清楚状况！打法根本就是错的！”',
			3 => '“既想说自己是沙包，又在做不是沙包该做的事！这样的事实，又一次说明这些神触们的无药可救！”',
			4 => '“你还能有正常人的意识吗？明知前面是悬崖也要跳！无知！无聊！”',
			5 => '“哈哈！玩家！你牛！但我更牛!  ”',//defendfine
			6 => '“你不懂的话，就不是中国人！”',
			7 => '“这样的伤害还有存在的意义！”',//defendhurt
			8 => '“你们啊！能清醒点儿吗？”',
			9 => '“你做完后，你的心理得到什么样的满足感，你自己清楚！”',//retreat
			10 => '“哎！现在就算听《蜀绣》，我的心情也好不起来！”',//can't counterattack
			11 => '“留下可怜的我独自哀伤，有人同情却无人理解！哎！”',//out of range
			12 => '“水月这个id，老是拿什么必杀技说事，其实是什么都搞不清楚，还一直说！”',//critical
			13 => '“已经被打死了！大快人心啊！”',
			'color' => 'linen'
			),
		'水月' => Array(
		    0 => '“Love your neighbor as yourself.”',//meet
			1 => '“作恶的，必被剪除!”',//attackfine
			2 => '“愚昧人若静默不言，也可算为智慧。闭口不说，也可算为聪明。”',
			3 => '“……”',
			4 => '“……”',
			5 => '“宽恕人的过失，便是自己的荣耀！”',//defendfine
			6 => '“……北斗要讲毛笑话……”',
			7 => '“……唔”',//defendhurt
			8 => '“……”',
			9 => '“……”',//retreat
			10 => '“……”',//can't counterattack
			11 => '“……Avoid godless chatter……”',//out of range
			12 => '“野驴有草岂能叫唤，牛有料，岂能吼叫？！”',//critical
			13 => '“……JOB 38:11”',		
			'color' => 'clan'
			),
		'北京推倒你' => Array(
		    0 => '“虽然我自称是<span class="blue">历史的眼泪</span>。但很可惜，历史这东西是不相信眼泪的。”',//meet
			1 => '“所谓<span class="red">铁拳无敌</span>，那么就一定是用拳头来证明一切的。”',//attackfine
			2 => '“力道不错，那么该我的反击了！”',
			3 => '“不错啊，也许我也应该重新审视审视你了。”',
			4 => '“很久没有遇到过你这种强力的人物了。”',
			5 => '“离开这里吧，这里不是你这种弱者应该呆的地方。”',//defendfine
			6 => '“离开这里吧，你这种弱者只有再去进行训练才能伤害到我啊。”',
			7 => '“很强，很强啊！”',//defendhurt
			8 => '“唔.....看起来身体有些力不从心了呢。”',
			9 => '“看起来快结束了呢。小心不要一时疏忽领便当了哦。”',//retreat
			10 => '“闪避能力很高啊，但是下一招你还能闪过去吗？”',//can't counterattack
			11 => '“用远程武器打游击战术啊！那么小心，不要让我捕捉到你的身影哦。”',//out of range
			12 => '<span class="white">不知从何而来的数据附着在面前那人的拳头上，使其发出了异样的光芒</span>，“如果说之前都是小意思的话，那么就尝试接下这招吧！”',//critical
			13 => '“弱者，就应该去弱者应该呆的地方。”',
			'color' => 'clan'
		),
		'BorisX' => Array(
		    0 => '“It is I, Boris!”',//meet
			1 => '“There is nothing I cannot do!”',//attackfine
			2 => '“This will be easy.”',
			3 => '“Damn traitorous dogs!”',
			4 => '“Eat lead!”',
			5 => '“Fools, you cannot touch me!”',//defendfine
			6 => '“Do not mess with me.”',
			7 => '“We must have reinforcements!”',//defendhurt
			8 => '“It is very bad here, comrade!”',
			9 => '“Boris retreating.”',//retreat
			10 => '“Good luck, comrade.”',//can't counterattack
			11 => '“I am not going out there!”',//out of range
			12 => '天空中突然出现几架米格战机！“Bring on the MIGs!”',//critical
			13 => '“Who is next?”',
			'color' => 'red'
		),
		'Renamon' => Array(
		    0 => '“咦？我为什么在这里呢？”',//meet
			1 => '“虽然不知道为什么可是我会努力打败你的！”',//attackfine
			2 => '“不知道！不知道！我真的不知道为什么可是身体不由自主地动起来了！”',
			3 => '“我的画笔可是有毒的画笔！”',
			4 => '“说真的我真不知道我在干什么呢……”',
			5 => '“不要以为这样子就能让我趴下，我的墨水还是有很多的！”',//defendfine
			6 => '“真希望战斗很快就会结束啊……不过留下来的一定是我。”',
			7 => '“快点！在我还没有发……发……唔飙……之前赶紧逃吧！”',//defendhurt
			8 => '“我还有力气来着……只要再坚持一下……”',
			9 => '“啊！反正我很没存在感嘛……消失了也无所谓的……吧。”',//retreat
			10 => '“稍微一点小失误……抱歉咯。”',//can't counterattack
			11 => '“这个一点都不好！”',//out of range
			12 => '“不！要！强！调！为！什！么！是（ping）（ru）啦！！和（pin）（ru）完全没有关系！”',//critical
			13 => '“看来存在感能＋1了呢……”',
			'color' => 'yellow'
		),
		'beijuzhu' => Array(
			0 => '“我也是ACFUN大逃殺第一批的玩家，和捂臉姬一樣都是搬運９課的成員之一，人稱「北極豬」。”',
			1 => '“如果你是沒有做好準備就來挑戰，那樣的話我應該可以把你的屍體搬離英靈殿吧。”',
			2 => '“喔？就算你身手很敏捷，也比不上強襲姿態的突襲率吧？”',
			3 => '“只要還沒有死，就有希望。”',
			4 => '“稍微等一下，在我死之前...”',
			5 => '“反擊姿態預備！開始！”',
			6 => '“不准逃！”',
			7 => '“這是真的被打成豬了啊。”',
			8 => '“只要HP不是0，反擊就是有理。”',
			9 => '“北極豬已逃，搬運９課任務完成。”',
			10 => '“竟然如此剛好反擊不能。”',
			11 => '“目標太遠了，打不到人啊。”',
			12 => '“你在地圖上看見的「變磚PSP」，效果只是杏仁豆腐版本，有本事就試試看這個PSP吧！”',
			13 => '“武神當中我最沒存在感了，那這回又如何呢？”',
			'color' => 'yellow'
		),
		'黑色奪魂曲' => Array(
			0 => '“你好，我是黑曲，是台灣人，與冴冴共同創作大逃殺劇情，像是「紅暮」「藍凝」。”',
			1 => '“曾經呢，超９武神霸斬是我用來打天下的靈系武器，但是現在的效果完全是「曾經的榮光」了。”',
			2 => '“恩？你問為什麼我的武器這回不是靈系？那種小細節不用太在意。”',
			3 => '“雖然說我以前有很多作品，但是現在我畫的東西最後都揉掉了，因為水平落差太大了啊。”',
			4 => '“這種情況，我大概快封筆了也說不定。”',
			5 => '“而遊戲中以我為命名的防具也是，在這時代也變成「曾經的榮光」了。”',
			6 => '“黑曲在英靈殿的定位...是類似以前真職人「東方地雷殿」吧，吉祥物般的存在。”',
			7 => '“我快要死了嗎...”',
			8 => '“現在這情況，可怕啊。”',
			9 => '“THE END.”',
			10 => '“和我現在的情況一樣，作畫時力不從心了啊。”',
			11 => '“武器射程太近了，但是靈系即使是已經被削的現在，依然不會弱。”',
			12 => '“奧義，超！９！武！神！霸！斬！！！”',
			13 => '“對不起，出手太重了。喂！你快醒醒啊！不會就這樣...死了吧？”',
			'color' => 'yellow'
		),
		'捂脸姬' => Array(
		    0 => '“大家好，我是ACFUN大逃殺第一批的玩家，真要說有什麼職位的話，那就是「試玩」。”',//meet
			1 => '“放心，身為最弱武神組的我，有足夠防禦是絕對可以擋下的。”',//attackfine
			2 => '“我竟然先攻了第二次？有一就有二，無三不成禮嗎？”',
			3 => '“被打成這樣肯定是要送武神之魂的節奏吧？”',
			4 => '“我真心不知道我怎麼可能在玩家有很高的先手率，即使我是偷襲姿態。”',
			5 => '“你是不可能看到這句台詞的，你一定是耍老千！”',
			6 => '“你是不可能看到這句台詞的，你一定是耍老千！”',
			7 => '“你是不可能看到這句台詞的，你一定是耍老千！”',
			8 => '“你是不可能看到這句台詞的，你一定是耍老千！”',
			9 => '“作為ACFUN大逃殺第一批的玩家，肯定是跟不上現代的腳步了啊。”',//retreat
			10 => '“你是不可能看到這句台詞的，你一定是耍老千！”',//can't counterattack
			11 => '“就因為是爆系又不是強襲姿態才會被一個叫「計劃通行」的ID給偷到武神之魂了啊！！”',//out of range
			12 => '“既然你讓我先攻了，那就試試看爆系這70%的最高命中率吧！”',//critical
			13 => '“最弱武神組的我，竟然能殺死人了？你弱爆了。”',
			'color' => 'yellow'
		),		
		'Yoshiko-G' => Array(
            0 => '“賭玉？輸了會有什麼後果嗎？”',//meet
            1 => '“闖英靈殿的你，明知有危險也要來嗎？不作死就不會死，為什麼你就是不明白？”',//attackfine
            2 => '“可別說強襲姿態是流氓，既然認為流氓還要闖英靈殿，這是何等的矛盾！”',
            3 => '“四面寫的切糕系統什麼的最惡毒了，最終導致切糕通貨膨脹以及刷切糕各種情況發生。”',//attackhurt
            4 => '“四面那個偷懶不幹活，成天只會打飛機的程序員，必被減除。”',
            5 => '“傷害制御是很好的，只要武神還留在場上，你的風險就會居高不下！”',//defendfine
            6 => '“攻擊就是最好的防禦，你以為這樣子就能讓我躺下？你也太天真了！”',
            7 => '“你現在認輸還來得及，回頭是岸啊！不然我很肯定你一定會死於各種奇蹟原因。”',//defendhurt
            8 => '“只要我還有HP，我就是要讓看著你玩脫才過癮。”',
            9 => '“什麼？你敢殺我，小心吃我權限啦！”',//retreat
            10 => '“哼！你以為不能反擊是你運氣好？”',//can't counterattack
            11 => '“只敢用爆系的你，與其說是小心，不如說是膽小。”',//out of range
            12 => '「守序善良」？那個會想辦法討好玩家的四面已經死了，讓你看看什麼才是「混亂邪惡」！”',//critical
            13 => '“賭玉的後果，就是被人卸了一條腿，但是我可是有幾萬條腿呢，哈哈哈！”',//kill
            'color' => 'yellow'
			),
		'lemon' => Array(
		    0 => '“ACDTS Bot beta #1. Moving out.”',//meet
			1 => '“Enemy spotted.”',//attackfine
			2 => '“Engaging.”',
			3 => '“Engaging. Taking casualties.”',
			4 => '“Engaging. Need support.”',
			5 => '“Enemy encountered. Counterattack.”',//defendfine
			6 => '“In cover behind sandbags. Counterattacking.”',
			7 => '“Taking fire. Need assistance.”',//defendhurt
			8 => '“Need backup.”',
			9 => '“Mission failed.”',//retreat
			10 => '“Enemy is in cover. Supressing fire, need assistance.”',//can't counterattack
			11 => '“Enemy out of range.”',//out of range
			12 => '“For the further!”',//critical
			13 => '“Enemy down.”',
			'color' => 'clan'
		),
	),
	22 => Array(
		'冴月麟MK-II' => Array(
			0 => '“决战英灵殿！令人燃烧殆尽的战斗就要开始了！”',
			1 => '“这个世界早已今非昔比，你的战术能跟上时代的步伐吗？”',
			2 => '“探索和战斗的背后含义是什么，你有没有思考过？”',
			3 => '“NPC的血量是玩家的成千上万倍，但是为什么依然倒在玩家剑下？”',
			4 => '“在不久的将来也许咱还会主动出击！”',
			5 => '“呵哈哈，不够，还不够！没有做到一击毙命会增大你的风险！”',
			6 => '“给咱留下LP就意味着翻盘的可能性，简而言之就是夜长梦多！”',
			7 => '“即使高级NPC已处于生命危险，也不意味着你下一次攻击就能得逞！”',
			8 => '“既然你已经走到这里，想必你一定在思考跨过我的尸体之后应该做些什么了！”',
			9 => '“一场酣畅淋漓的战斗！脱出！”',
			10 => '“无法反击的状态，这是指咱暂时处于不利反击的位置。”',
			11 => '“射程不足，因为你正使用射程大于等于投系的武器。”',
			12 => '三色的光芒从冴月麟的全身喷涌而出：“魂！常磐之力！Unlimited Code Works！”',
			13 => '“那么，咱为又一次坑了你道歉。”',
			'color' => 'yellow'
		),
		'星莲船四面BOSS' => Array(
			0 => '“那么，真名解放！下面就是见证奇迹的时刻！”',
			1 => '“此刻我占尽先机，只要先放倒你就可以不受伤害惩罚了。”',
			2 => '“重炮的附加伤害也受防具的影响，有防弹属性就可以减免了。”',
			3 => '“我的内定称号是‘天赋异秉’，作为NPC大约能把伤害提升到无称号的3倍！”',
			4 => '“而冴冴的内定称号是‘换装迷宫’，一定概率可以切换武器，令人防不胜防。”',
			5 => '“主伤害和附加伤害……嗯也许已经到了再次改革的前夜了。”',
			6 => '“幸好NPC还不会踩雷，否则你们一定会让英灵殿铺满大打击。”',
			7 => '“继续攻击的话，也许你的RP会下降哦，它关系到很多细节概率……。”',
			8 => '“开局一步野生阔剑其实是正常现象，总有人得去踩的嘛，比如你？”',
			9 => '“我～还～会～再～回～来～的～”',
			10 => '“重炮死沉死沉的怪不得反击率低，哪个家伙给游戏引入重炮的啊？”',
			11 => '“全游戏射程最远的武器竟然会射程不足？你一定是爆系！”',
			12 => '“那、那个……就这么说吧！冴冴我喜欢你呀！”（按）',
			13 => '“失手了！不知道坑了多少人的切糕？”',
			'color' => 'yellow'
		)
	),
	13 => Array(
		'卡玛·克莱因' => Array(
			0 => '“幸会，勇敢的挑战者。我是循环的使者卡玛。”',
			1 => '“我的回合。”',
			2 => '“携带备用武器是我的原则。”',
			3 => '“你们管这个叫什么来着？快枪手？”',
			4 => '“你们管这个叫什么来着？二刀流？”',
			5 => '“你们管这个叫什么来着？武器炼金术士？”',
			6 => '“你们管这个叫什么来着？秒间十割……什么来的？”',
			7 => '“武器不好用啊，看来得换把更称手的。”',
			8 => '“依然受伤了？这批人似乎还不赖。”',
			9 => '“干得不错！在新的世界里再会吧，勇敢的挑战者。”',
			10 => '“换武器的时间还需要缩短。”',
			11 => '“用远程武器？懦弱。”',
			12 => '“破绽百出啊！你真的打算认真打么？”',
			13 => '“呵……想要与我们一较高下，你还有得练呢。”',
			'color' => 'yellow'
		),
		'库特' => Array(
			0 => '“哇呼，被发现了吗！？”',
			1 => '“瞄准旁边攻击的话，不会致死的吧……？”',
			2 => '“为了试验，我必须加油了！”',
			3 => '“随便攻击别人是不对的！”',
			4 => '“就算是斯特勒鲁卡，这个时候也会bite a man的！”',
			5 => '“已经满身疮痍了，怎么样才能结束呢……”',
			6 => '“这样下去会出事的啊，快住手吧！”',
			7 => '“好疼好疼，出手太重了啦！”',
			8 => '“就算是试验，也太乱来了……”',
			9 => '“我……我还不能死在这里……还有人在等着我……！”',
			10 => '“哇呼——这就attack过来了啊！？”',
			11 => '“武器的射程，还不够吗？”',
			12 => '“……这样设定的话，应该能成功吧……？”',
			13 => '“这是我必须做的事，给您添麻烦了……”',
			'color' => 'linen'
		),
		'莱卡' => Array(
			0 => '“我似乎沉浸在过去的回忆和相似的人的眷恋里了呢。”',
			1 => '“人类总是在自相残杀……你觉得呢？”',
			2 => '“以前那个不愿意开枪的小女孩，早已被暴徒杀死了。”',
			3 => '“You are a good rival. Counterattack.”',
			4 => '“就没思考过，这种冤冤相报的循环，会导致自灭么？”',
			5 => '“曾经……我也像你一样，有着单纯而快乐的生活。”',
			6 => '“可惜有一天，残酷的命运碾碎了我，就像巨大的机器碾碎变形的齿轮一样。”',
			7 => '“当我再次醒来的时候，属于我的世界已经不存在了。”',
			8 => '“那种踽踽独行的滋味，像你这样的人，难道能理解么！？”',
			9 => '“Dangerous Situation...Retreat.”',
			10 => '“突然袭击呢，很快我们会再会的。”',
			11 => '“射程不足？……怎么会发生这种事？”',
			12 => '莱卡的身后，展开了蝙蝠状的翅膀！<br>“就让你，被牢牢锁死在这濒死的幻想世界里吧，一直到世界崩坏的那一刻……”',
			13 => '“无论是这个世界，还是那个世界，都把你永久放逐了呢。”',
			'color' => 'linen'
		)
	),
	15 => Array(
		'【SANMA_TK】' => Array(
			0 => '“妖精使可能不想对你们下手，但是我不这么想。”',//meet
			1 => '“先收下你的左手！”',//attackfine
			2 => '“试试这个的威力！”',
			3 => '“……你是没办法超过我的速度的！”',
			4 => '“持强凌弱的家伙……百倍奉还！”',
			5 => '“………………？”',//defendfine
			6 => '“你究竟在为何而战？难道也要背上整个世界才能让你明白你的错误么？”',
			7 => '“你确信你是为正确的一方战斗么？还要重复一遍执念造成的错误么？！”',//defendhurt
			8 => '“妖精使这时会怎么说来着……“给我看看大局吧！”不过我觉得你们是看不到了。”',
			9 => '“真是可悲啊……下次让妖精使给一把更好的武器算了。打得不错。”',//retreat
			10 => '“……耍小聪明……”',//can't counterattack
			11 => '“下一次带对器材狙击枪来，对你们不需要任何仁慈。”',//out of range
			12 => '少女的身影从你的面前消失了，正在你不知道如何是好的情况下，你听到你的头顶上传来一声大喝——『别小看人了！』',//critical
			13 => '“妖精使的话是主张击败对手后留一句话是吧，那么……『我愿献吾身，化为盾与枪』，这样算数么？”',	
			'color' => 'yellow'
		),
	),
);
$iteminfo = Array(//注意顺序，AB必须在A的前面，以此类推
	'Ag' => 'Amulet',
	'Al' => 'Amulet',
	'A'  => 'Amulet',
	'Ah'  => 'Amulet',
	'Ac'  => 'Amulet',
	'B' => 'Batteries',
	'C' => 'Drug',
	'Ca' => 'Drug',
	'Ce' => 'Drug',
	'Ci' => 'Drug',
	'Cp' => 'Drug',
	'Cu' => 'Drug',
	'Cw' => 'Drug',
	'DN' => 'Undies',#内衣
	'DB' => 'Body Equipment',
	'DH' => 'Head Equipment',
	'DA' => 'Arm Equipment',
	'DF' => 'Leg Equipment',
	'EE' => 'Electronics',
	'EW' => 'Weather Control',
	'ER' => 'Radar',
	'HH' => 'HP Recover',
	'HS' => 'SP Recocer',
	'HB' => 'ALL Recover',
	'HM' => 'Soul Recover',
	'HT' => 'Soul Recover',
	'GBr' => 'Machine Gun Ammo',
	'GBi' => 'Gascan Ammo',
	'GBh' => 'Heavy Ammo',
	'GBe' => 'Energy Ammo',
	'GB' => 'Pistol Ammo',	
	'M'=> 'Enhancer',
	'ME'=> 'Enhancer',
	'MH'=> 'Enhancer',
	'N' => 'NONE',	
	'PM' => 'Soul Charge',
	'PT' => 'Soul Charge',
	'PH' => 'HP Recover',
	'PS' => 'SP Recover',
	'PB' => 'ALL Recover',
	'p' => 'Gift',
	'fy' => 'Super Gift',
	'ygo' => 'Booster Pack',
	//'R' => '探测仪器',	
	'ss' => 'Lyric Card',
	'T' => 'Trap',
	'V'=> 'Skill Book',
	'VV'=> 'Skill Book',
	'WN' => 'Bare Hand',#空手
	'WGK' => 'GunBlade',
	'WCF' => 'SpiritBullet',
	'WFK' => 'RageBlade',
	'WKP' => 'SuperSword',
	'WCP' => 'HeavyForce',
	'WDG' => 'HugeCannon',
	'WJ' => 'Heavy Cannon',
	'WP' => 'Blunt',
	'WG' => 'Firearm',
	'WK' => 'Blade',
	'WC' => 'Projectile',
	'WD' => 'Explosive',
	'WF' => 'Magic Spell',	
	'WQ' =>'？？？？',
	'XX' =>'杀意已决',
	'XY' =>'杀意未决',
	'X'=> 'Mixture',
	'Y' => 'SPECIAL',
	'Z' => 'SPECIAL',#不可合并
	);
$itemspkinfo = Array(
	'A' => 'ALL Defense',
	'a' => 'Element Defense',
	'B' => 'Damage Eraser',
	'b' => 'Element Eraser',
	'C' => 'Projectileproof',
	'c' => 'Critical',
	'D' => 'Explosiveproof',
	'd' => 'Explosive',
	'E' => 'Electproof',
	'e' => 'Electric',	
	'F' => 'Magicproof',
	'f' => 'Flame',
	'G' => 'Bulletproof',
	'g' => 'Plus',
	'H' => 'HP Defender',
	'h' => '伤害制御',//废弃
	'I' => 'Freezeproof',
	'i' => 'Freeze',
	'J' => 'ExceedMaterial', //中国玩家没素质
	'j' => 'Multiple',
	'K' => 'Slashproof',
	'k' => 'Freeze',
	'L' => 'Hurtful',
	'l' => 'Minus',
	'M' => 'Trap Detection',
	'm' => 'Trap Counter',
	'N' => 'Shock',
	'n' => 'Pierce',
	'o' => 'AoN',
	'P' => 'Sturdy',
	'p' => 'Poisonous',
	'q' => 'Poisonproof',
	'R' => 'Chaotic',
	'r' => 'Multihit',
	'S' => 'Soundproof',
	's' => 'Tuner',
	'U' => 'Fireproof',
	'u' => 'Flame',
	'W' => 'Soundproof',
	'w' => 'Sound',
	'X' => 'InstantDeath', //NPC专用
	'x' => 'Miracle',
	'Z' => 'Elite',
	'z' => 'Cute',
	'-' => 'MindDrain',
	'*' => 'SoulDrain',
	'+' => 'SkillDrain',
	);



$shops = Array(0,14,17);
$hospitals = Array(6,11,19);
$plsinfo = Array(
	0=>'The Hub',
	1=>'Tech Zone',
	2=>'School',
	3=>'Residence N',
	4=>'Residence S',
	5=>'Command Center',
	6=>'Abandoned House',
	7=>'Museum',
	8=>'Shrine A',
	9=>'Graveyard',
	10=>'Broadcast Center',
	11=>'Meeting Square',
	12=>'Training Gym',
	13=>'Theme Park',
	14=>'Shopping Destrict A',
	15=>'Shrine B',
	16=>'Forest',
	17=>'Shopping Destrict B',
	18=>'Industrial Zone A',
	19=>'Hospital',
	20=>'Industrial Zone B',
	21=>'圣Gradius学园',
//	22=>'初始之树',
//	23=>'幻想世界',
//	24=>'永恒的世界',
//	25=>'妖精驿站',
//	26=>'键刃墓场',
//	27=>'花菱商厦',
//	28=>'FARGO前基地',
//	29=>'风祭森林',
//	30=>'天使队移动格纳库',
//	31=>'和田町研究所',
//	32=>'SCP研究设施',
//	33=>'雏菊之丘',
//	34=>'英灵殿'
);
$xyinfo = Array(
	0=>'B-2',
	1=>'A-6',
	2=>'H-3',
	3=>'B-6',
	4=>'F-10',
	5=>'D-6',
	6=>'H-6',
	7=>'F-3',
	8=>'E-10',
	9=>'J-4',
	10=>'I-8',
	11=>'D-8',
	12=>'F-9',
	13=>'H-4',
	14=>'H-8',
	15=>'G-1',
	16=>'I-2',
	17=>'A-5',
	18=>'G-4',
	19=>'D-4',
	20=>'I-7',
	21=>'F-7',
//	22=>'J-6',
//	23=>'A-8',
//	24=>'C-9',
//	25=>'D-2',
//	26=>'A-1',
//	27=>'F-8',
//	28=>'E-1',
//	29=>'F-5',
//	30=>'F-6',
//	31=>'J-1',
//	32=>'J-2',
//	33=>'F-4',
//	34=>'J-10',
);
$areainfo = Array
	(
	0=>"<br><br><br>",
	1=>"<br><br><br>",
	2=>"<br><br><br>",
	3=>"<br><br><br>",
	4=>"<br><br><br>",
	5=>"<br><br><br>",
	6=>"<br><br><br>",
	7=>"<br><br><br>",
	8=>"<br><br><br>",
	9=>"<br><br><br>",
	10=>"<br><br><br>",
	11=>"<br><br><br>",
	12=>"<br><br><br>",
	13=>"<br><br><br>",
	14=>"<br><br><span class=\"yellow\">You could buy stuff here.</span><br>",
	15=>"<br><br><br>",
	16=>"<br><br><br>",
	17=>"<br><br><br>",
	18=>"<br><br><br>",
	19=>"<br>You could heal here</span><br>",
	20=>"<br><br><br>",
	21=>"<br><br><br>",
//	22=>"在绿地上孤零零矗立的大树，像是一座纪念碑。<BR>这到底意味着什么呢？<br>",
//	23=>"被白雪笼罩，一片荒芜的空间……<BR>时空错乱了吗？为什么我会在这里？<br>",
//	24=>"诡异的地方……脚下已经看不见什么地面了……<BR>这个地方究竟是什么？<br>",
//	25=>"一间孤独的小屋子。<br>貌似没有人住在这里了。<br>门上贴着告示：<br>TRAIN WITH MY HOLOGRAM IF YOU WANT TO --- GA-04<br>",
//	26=>"代表火与血的牺牲的曾经的战场。<BR>冰封的力量已经不在。<br><span class=\"yellow\">你仍然感觉到一股苍凉的杀气！是你的错觉么！</span><br>",
//	27=>"荒废的都市里，顶层有着天象馆的废弃商场。<BR>虽然大部分区域都停电了，<span class=\"yellow\">角落里的自动售货机似乎还能运行。</span><br>",
//	28=>"现在已经是一团废墟的遗迹。<BR>可能能找到有用的物品也说不定。<br>",
//	29=>"传说有神秘力量的森林。<BR>谁知道这个地方会出现什么。<br>",
//	30=>"在远处看这个建筑你还以为那是一个集装箱，<BR>走进去以后才发现这里别有洞天。<br>庞大的电脑系统正在忠实地工作着。<br>",
//	31=>"最近突然在地平线远端出现的大型建筑，<BR>你注意到建筑的后院时空裂缝之外貌似还有一个小镇……<br>",
//	32=>"最近突然在地平线远端出现的第二座大型建筑，<BR>感觉有种不祥的气息……<br>",
//	33=>"风祭森林的最深处。<BR>被盛开的雏菊花覆盖着的山丘。<BR>山丘上貌似有个身影坐着，<BR>还是离她远一点为妙。<BR>",
//	34=>"总而言之这里就是英灵殿了。<BR>",
);



$dinfo = Array(
	10 => '不知道什么原因，你死去了。<br>这应该是一个BUG，请通知管理员。<br>',
	11 => '“滴滴滴——”<br>这是……手机闹铃的提示音？<br>“糟糕！还没确认这次的禁区情况——”<br>还没等你有所反应，死神一般的空间裂缝已经把你吞没了。<br>等待你的只有死亡……<br>',
	12 => '“呜……到此为止了吗……”<br>毒素造成的痛苦让你无法再坚持下去了。<br>你吐出嘴里最后一点深黑的血液，仰面倒了下去。<br>',
	13 => '“不好！”<br>也许在平时的你看来，这只是小菜一碟……<br>但对于此刻遍体鳞伤的你来说，<br>眼前的突发状况无异于压垮骆驼的最后一根稻草。<br>你不甘心地倒下了，再也没有起来。<br>',
	14 => '“也许咱应该断定你上网成瘾？”<br>这是……林无月的声音！<br>从哪里传来的？<br>她怎么会知道我试图入侵虚拟世界的控制系统？<br>还没等你反应过来，你就两眼一黑，什么都不知道了。<br>',
	15 => '“我很抱歉，不过这是林无月的意思。”<br>面前突然出现的，是一个陌生男子。<br>这人说些什么怪话呢？<br>你正要上前问个究竟，只见男子手中白光一闪，你的意识就此烟消云散。<br>',
	16 => '“我很抱歉，不过这是林无月的意思。”<br>面前突然出现的，是一个陌生男子。<br>这人说些什么怪话呢？<br>你正要上前问个究竟，只见男子手中白光一闪，你的意识就此烟消云散。<br>',
	17 => '“呜……到此为止了吗……”<br>身体已被冰雹砸得千疮百孔，伤痛让你无法再坚持下去了。<br>你脚下一软，向前栽倒，失去了意识。<br>',
	18 => '“呜……到此为止了吗……”<br>烧伤导致的伤痛让你无法再坚持下去了。<br>你脚下一软，向前栽倒，失去了意识。<br>',
	20 => '一切……都结束了吧……<br>你无力地倒在地上，<br>眼睁睁地看着血液从致命的伤口喷涌而出。<br>一个挥舞双拳的身影，在你失神的瞳孔中逐渐淡去……<br>',
	21 => '一切……都结束了吧……<br>你无力地倒在地上，<br>眼睁睁地看着血液从致命的伤口喷涌而出。<br>一个紧握钝器的身影，在你失神的瞳孔中逐渐淡去……<br>',
	22 => '一切……都结束了吧……<br>你无力地倒在地上，<br>眼睁睁地看着血液从致命的伤口喷涌而出。<br>一个腰佩刀剑的身影，在你失神的瞳孔中逐渐淡去……<br>',
	23 => '一切……都结束了吧……<br>你无力地倒在地上，<br>眼睁睁地看着血液从致命的伤口喷涌而出。<br>一个扛着枪械的身影，在你失神的瞳孔中逐渐淡去……<br>',
	24 => '一切……都结束了吧……<br>你无力地倒在地上，<br>眼睁睁地看着血液从致命的伤口喷涌而出。<br>一个手持投掷武器的身影，在你失神的瞳孔中逐渐淡去……<br>',
	25 => '一切……都结束了吧……<br>你无力地倒在地上，<br>眼睁睁地看着血液从致命的伤口喷涌而出。<br>一个手持爆炸物的身影，在你失神的瞳孔中逐渐淡去……<br>',
	26 => '“这味道……不对！”<br>饥渴难耐的你才咬了一口手中的补给品，就觉得不对劲。<br>然而，你发现得太晚了……<br>剧毒在几秒钟之内就夺去了你的生命。<br>',
	27 => '“什么！这里竟然……”<br>没能留意到陷阱的你，只能眼睁睁看着轰然启动的陷阱无情地撕碎你的身躯。<br>“啊啊……这是……哪个混蛋……”<br>你的双眼被鲜血永远地掩盖了。<br>',
	28 => '你被很奇怪的事情夺去了生命。<br>也许这跟一个名叫夜什么月的人有一星半点的关系。<br>具体情况请参见游戏状况。<br>',
	29 => '一切……都结束了吧……<br>你无力地倒在地上，<br>眼睁睁地看着血液从致命的伤口喷涌而出。<br>一个攥着符札的身影，在你失神的瞳孔中逐渐淡去……<br>',
	30 => '好奇心果然杀死猫啊……<br>你勉强支起破碎的身躯，<br>看着那个你刚才按下的带按钮的小盒子无奈地笑着。<br>这真是残酷的恶作剧啊。<br>你的意识逐渐模糊了……<br>',
	31 => '注射器里的药液才打进一半，你就觉得身体有异样。<br>“脖子……好痒……”<br>你疯狂地抠着脖子上的淋巴腺，<br>很快就倒在动脉破裂而流出的血泊中……<br>',
	32 => '“就躲在这里，让那些人自相残杀去吧。”<br>你正打着自己的小算盘，却被一声怒喝打断了。<br>“来人，这里有个挂机党！”<br>你惊愕地看着不知从哪里冒出来的玩家们把你团团围住。<br>“浪费时间，快去死吧！”<br>之后的事情，就太猎奇了……<br>',
	33 => '“对不起、对不起！能让我迫降一下吗？”<br>勉强躲过弹幕的你，忽然听到头上传来这样焦急的道歉声。<br>少女的迫降……？莫非是指……<br>少女娇柔的话音让你放松了警惕。<br>还没等你反应过来，少女——以及她乘坐的、几十吨重的机体——便把你的整个世界压得粉碎……<br>',
	34 => '将手中的溶剂一饮而尽之后，你感到全身就像燃烧起来一样。<br>“没错，我需要的就是这种力量！”<br>然而，当你看到自己像奶油般融化了的手掌在地上扑腾的时候，你才发现这场豪赌押错了边。<br>“那么，你就燃烧殆尽吧。”在意识崩解前，传来了一个女声的叹息。<br>',
	35 => '在你失去意识之前，你仿佛听到了一个冰冷的声音。<br>“像你这样的Homo-Speculator……”<br>“……真是最差劲的个体了”<br>然后，你看着你的身体和意识在一道圣光中溶解了。<br>',
	36 => '你徒劳地想挣脱丝带的束缚，<br>但是从丝带上传来的巨大压力，简简单单地将你一分两半。<br>真是杂鱼一样的死法……<br>',
	37 => '你徒劳地想躲避丝带，<br>但是说时迟那时快，你发现你的头正在骨碌碌地往山脚下滚去。<br>真是杂鱼一样的死法……<br>',
	38 => '你成功地躲避了丝带，<br>没想到从丝带中竟然喷出了岩浆！<br>你的意识在烈火中消失了。<br>',
	39 => '“去死吧！就算你是权限[哔]也挡不住我这一击的！”<br>你狂笑着使出你自认为决定胜负的一击，噗通倒下的却是你自己。<br>“不，这不科学！”被武器背叛的你遁入了无尽的黑暗中。<br>',
	40 => '“看起来好像没什么反应嘛……那是！！”<br>天空中突然降下的巨大柱状物瞬间将你的世界吞没。<br>你眼前一黑，便失去了意识。<br>',
);

$syschatinfo = Array(
	'hack' => Array(
		Array('r0','红暮','哼，真有两下子……等下次禁区自动恢复好了。'),
		Array('r0','红暮','大胆狂徒，再敢这样做小心我直接改你的RP值。'),
		Array('r0','红暮','满是雪花的屏幕还真让人心烦。'),
		Array('r0','红暮','禁区失效了。如果是冲我而来，那么我奉陪。'),
		Array('b0','蓝凝','禁区被解除了？……'),
		Array('b0','蓝凝','似乎可以从显示屏上看出弹幕来……'),
		Array('b0','蓝凝','咦？不是吧！我不过洒了点水在控制台上而已……'),
	),
	'rdown' => Array(
		Array('b0','蓝凝','刚才那声音是……难道？'),
		Array('b0','蓝凝','...Engage, Rage mode-魔法特工 苍蓝☆乱舞！'),
	),
	'bdown' => Array(
		Array('r0','红暮','你们对我妹妹做了什么！？'),
		Array('r0','红暮','凝酱……是嘛，看来有碍事的家伙出现了。'),
	),
	'areawarn20' => Array(
		Array('r0','红暮','咳咳，那么下面播报禁区警告——'),
		Array('r0','红暮','真有趣，如果不提示，会有多少人阴沟里翻船呢？'),
		Array('r0','红暮','广播系统好像有点失灵？拖个人来修一下吧。'),
		Array('b0','蓝凝','这里是……警报。'),
		Array('b0','蓝凝','NOW THE ALARM.'),
	),
	'areawarn40' => Array(
		Array('r0','红暮','白热化！连斗阶段真是美丽啊。'),
		Array('r0','红暮','再过不久就要决出胜者了呢。'),
		Array('r0','红暮','似乎还留着几个重要地点，真遗憾。'),
		Array('r0','红暮','那边的职人，对就是你们几个，没死的话过来帮忙把这个陷阱挪走。'),
		Array('b0','蓝凝','……差点忘了……'),
		Array('b0','蓝凝','啊～真无聊……呃，在、在播报啊，现在是警报时间——'),
		Array('r1b0','蓝凝','那家伙撤退了，我得加油……'),
	),
	'areaadd20' => Array(
		Array('r0','红暮','听啊，那丧钟为谁而鸣？'),
		Array('r0','红暮','现在增加禁区。'),
		Array('r0','红暮','各位好，这里是红杀频道，我们先来看看本期的禁区死亡名单——'),
		Array('r0b0','红暮','就这几个人么……凝酱，你怎么看？'),
		Array('b0','蓝凝','禁区时间到！'),
		Array('b0','蓝凝','好像只要揿按钮就可以了。'),
		Array('b0','蓝凝','GENOCIDE IS COMING.'),
	),
	'areaadd40' => Array(
		Array('r0','红暮','现在死掉就没法投币了哦！'),
		Array('r0','红暮','正在奋战的各位辛苦了，下面给你们派发便当。'),
		Array('r0','红暮','各位好，现在战斗已经进入高潮，我们来看看这次的禁区死亡名单——'),
		Array('r0b1','红暮','就用你们的血为凝酱报仇雪恨！'),
		Array('b0','蓝凝','DEVILRY IS COMING.'),
		Array('b0','蓝凝','按键无效啊，那么看我的720度回旋斜踢电器维修法！咣——'),
		Array('r1b0','蓝凝','不会让那家伙失望的……'),
	),
	'end1' => Array(
		Array('r0b0','红暮','没有结果呢。凝酱，准备『下一轮』吧。'),
		Array('r0b0','红暮','预想之中。那么，凝酱，我们从这里撤离吧。'),
		Array('b0','蓝凝','这局真无聊啊。'),
		Array('r1b0','红暮','看来我死得毫无价值呢。凝酱，准备『下一轮』吧。'),
		Array('r1','红暮','看来我死得毫无价值呢。那么，你们就永远留在这里吧。'),
		Array('b1','蓝凝','……真遗憾呢。'),
	),
	'end2' => Array(
		Array('r0','红暮','决出胜负了。欢迎来到胜者的世界。'),
		Array('r0','红暮','竟然是你……不，并没有别的意思。祝贺你，获胜者。'),
		Array('b0','蓝凝','正统派的结局么……'),
		Array('r1','红暮','于是似乎碰到了不按牌理出牌的家伙呢。'),
		Array('b1','蓝凝','...'),
	),
	'end3' => Array(
		Array('r0','红暮','咦，我还活着？这不科学！'),
		Array('r1','红暮','哼……竟然遇到愚蠢到出手反抗的家伙了啊。'),
		Array('r1','红暮','你觉得你真的能逃脱么？'),
		Array('r1','红暮','那就让你达成所谓的HAPPY ENDING吧，呵呵呵……'),
		Array('r1b1','红暮','看来还真是心狠手辣的家伙，我会记住的。'),
		Array('r1b1','红暮','看来还真是心狠手辣的家伙，我会记住的。'),
		Array('b0','蓝凝','正统派的结局么……'),
		
		Array('b1','蓝凝','...'),
	),
);

/*Infomations*/
$_INFO = Array(
	'reg_success' => 'Register Complete, please return to main page to login',
	'pass_success' => 'Change Password Complete',
	'pass_failure' => 'You have not changed your password',
	'data_success' => 'Profile Changed',
	'data_failure' => 'Profile changes discarded.',
	'credits_conflicts' => 'Point Exchange Failed',
	'credits_success' => 'Point Exchange Succeed',
	'credits_failure' => 'Point Exchange Failed',
	'credits_failure2' => 'Number too large',
	'credits_failure3' => 'Please enter multiples of 100.',
);

/*Error settings*/
$_ERROR = Array(
	'db_failure' => 'DATABASE ERROR',
	'name_not_set' => 'NULL USERNAME',
	'name_too_long' => 'USERNAME OVERFLOW',
	'name_invalid' => 'USERNAME INVALID',
	'name_banned' => 'USERNAME LIMITED',
	'name_exists' => 'USERNAME DUPLICATE',
	'pass_not_set' => 'NULL PASSWORD',
	'pass_not_match' => 'PASSWORD DO NOT MATCH',
	'pass_too_short' => 'PASSWORD TOO SHORT',
	'pass_too_long' => 'PASSWORD TOO LONG',
	'ip_banned' => 'IP BANNED',
	'logged_in' => 'ALREADY REGISTERED',
	'user_not_exists' => 'USER NOT EXIST',
	
	'no_login' => 'NO LOGIN',
	'login_check' => 'BAD CACHE',
	'login_time' => 'SESSION OUT',
	'login_info' => 'BAD COOKIE',
	'player_limit' => 'LIMIT REACHED',
	'wrong_pw' => 'WRONG PASSWORD',
	'player_exist' => 'CHARACTER ALREADY IN GAME',
	'no_start' => 'GAME NOT STARTED',
	'valid_stop' => 'GAME LOCKED',
	'user_ban' => 'ACCOUNT BANNED',
	'no_admin' => 'NOT ADMIN',
	'ip_limit' => 'IP LIMIT REACHED',
	'no_power' => 'BAD PERMISSION',
	'wrong_adcmd' => 'BAD COMMAND',
	//'invalid_name' => '用户名含有非法字符，请重新输入',
	//'banned_name' => '用户名含有违禁用语，请更改用户名',
	//'banned_ip' => '此IP已被封禁，请与管理员联系',
	//'long_name' => '用户名过长，请重新输入用户名'
);

?>