<? if(!defined('IN_TIPASK')) exit('Access Denied'); include template(header,admin); ?>
<div style="width:100%; height:15px;color:#000;margin:0px 0px 10px;">
  <div style="float:left;"><a href="index.php?admin_main/stat<?=$setting['seo_suffix']?>" target="main"><b>控制面板首页</b></a>&nbsp;&raquo;&nbsp;UCenter整合</div>
</div><? if(isset($message)) { $type=isset($type)?$type:'correctmsg';  ?><table cellspacing="1" cellpadding="4" width="100%" align="center" class="tableborder">
<tr>
<td class="<?=$type?>"><?=$message?></td>
</tr>
</table><? } ?><table width="100%" cellspacing="1" cellpadding="4" align="center" class="tableborder">
<tbody><tr class="header"><td>设置说明</td></tr>
            <tr class="altbg1"><td>UCenter整合开启前，务必关闭通行证整合。<br />配置步骤如下：<br />1、ucenter服务端添加tipask问答应用<br />2、添加完成之后将生成的应用配置贴到下方即可<br />3、ucenter服务端检测tipask问答连接状态，通信成功即表示整合完成</td></tr>
</tbody></table>
<br />
<form action="index.php?admin_setting/ucenter<?=$setting['seo_suffix']?>" method="post">
<a name="基本设置"></a>
<table cellspacing="1" cellpadding="4" width="100%" align="center" class="tableborder">
<tr class="header">
<td colspan="2">参数设置</td>
</tr>
<tr>
<td class="altbg1" width="45%"><b>UCenter整合:</b><br><span class="smalltxt">关闭后设置还会保留。</span></td>
<td class="altbg2">
<input class="radio"  type="radio"  <? if(1==$setting['ucenter_open'] ) { ?>checked<? } ?>  value="1" name="ucenter_open" ><label for="yes">开启</label>&nbsp;&nbsp;
<input class="radio"  type="radio"  <? if(0==$setting['ucenter_open'] ) { ?>checked<? } ?> value="0" name="ucenter_open" ><label for="no">关闭</label>
</td>
</tr>
<tr>
<td class="altbg1" width="45%"><b>应用配置信息</b><br><span class="smalltxt">ucener中的应用配置信息,保存之后配置会写入到tipask/data/ucconfig.inc.php中，也可自行修改</span></td>
<td class="altbg2"><textarea name="ucenter_config" style="width:650px;height:200px;"></textarea></td>
</tr>
</table>
<br>
<center><input type="submit" class="button" name="submit" value="提 交"></center><br>
</form>
<br>
<? include template(footer,admin); ?>
