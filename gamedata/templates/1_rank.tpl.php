<?php if(!defined('IN_GAME')) exit('Access Denied'); include template('header'); ?>
<div id="notice"></div>
<span class="subtitle">Player Rankings</span>
<center>
<form id='showrank' name="showrank" method="post">
<input type="hidden" name="checkmode" id="checkmode" value="credits">
<div>
<input type="button" id="credits" value="Browse Score Ranking" onClick="document['showrank']['checkmode'].value='credits';postCmd('showrank','rank.php');return false;">
<?php if($gamblingon) { ?>
<input type="button" id="credits2" value="Browse Gold Ranking" onClick="document['showrank']['checkmode'].value='credits2';postCmd('showrank','rank.php');return false;">
<?php } ?>
<input type="button" id="winrate" value="Browse Win Ratio Ranking" onClick="document['showrank']['checkmode'].value='winrate';postCmd('showrank','rank.php');return false;">
</div>
</form>
<div id="rank">
<?php include template('rankinfo'); ?>
</div>
</center>
<?php include template('footer'); ?>