<? if(!defined('IN_TIPASK')) exit('Access Denied'); include template(header,admin); ?>
<div style="width:100%; height:15px;color:#000;margin:0px 0px 10px;">
  <div style="float:left;"><a href="index.php?admin_main/stat<?=$setting['seo_suffix']?>" target="main"><b>控制面板首页</b></a>&nbsp;&raquo;&nbsp;礼品公告</div>
</div><? if(isset($message)) { $type=isset($type)?$type:'correctmsg';  ?><table cellspacing="1" cellpadding="4" width="100%" align="center" class="tableborder">
<tr>
<td class="<?=$type?>"><?=$message?></td>
</tr>
</table><? } ?><form action="index.php?admin_gift/note<?=$setting['seo_suffix']?>" method="post" enctype="multipart/form-data">
<table cellspacing="1" cellpadding="4" width="100%" align="center" class="tableborder">
<tr class="header"><td colspan="2">参数设置</td></tr>
<tr>
<td class="altbg1" width="45%"><b>礼品公告:</b><br><span class="smalltxt">礼品商店模块公告</span></td>
<td class="altbg2"><textarea class="area" name="note"  style="height:100px;width:300px;"><? if(isset($setting['gift_note'])) { ?><?=$setting['gift_note']?><? } ?></textarea></td>
</tr>
</table>
<br />
<center><input type="submit" class="button" name="submit" value="提 交"></center><br>
</form>
<br />
<? include template(footer,admin); ?>
