<? if(!defined('IN_TIPASK')) exit('Access Denied'); include template(header,admin); ?>
<script src="js/admin.js" type="text/javascript"></script>
<div style="width:100%; height:15px;color:#000;margin:0px 0px 10px;">
    <div style="float:left;"><a href="index.php?admin_main/stat<?=$setting['seo_suffix']?>" target="main"><b>控制面板首页</b></a>&nbsp;&raquo;&nbsp;公告管理</div>
</div><? if(isset($message)) { $type=isset($type)?$type:'correctmsg';  ?><table cellspacing="1" cellpadding="4" width="100%" align="center" class="tableborder">
    <tr>
        <td class="<?=$type?>"><?=$message?></td>
    </tr>
</table><? } ?><form onsubmit="return confirm('该操作不可恢复，您确认要删除这些公告吗？');"  action="index.php?admin_note/remove<?=$setting['seo_suffix']?>"  method=post>
    <table cellspacing="1" cellpadding="4" width="100%" align="center" >
        <tr class="header"><td colspan="5">公告列表&nbsp;&nbsp;&nbsp;<input type="button" style="cursor:pointer" onclick="document.location.href = 'index.php?admin_note/add<?=$setting['seo_suffix']?>'" value="添加公告" /></td></tr>
        <tr class="header" align="center">
            <td width="5%"><input class="checkbox" value="chkall" id="chkall" onclick="checkall('delete[]')" type="checkbox" name="chkall"><label for="chkall">&nbsp;删除</label></td>
            <td  width="25%">公告标题</td>
            <td  width="30%">发布人</td>
            <td  width="15%">发布时间</td>
            <td  width="10%">编辑</td>
        </tr>
        
<? if(is_array($notelist)) { foreach($notelist as $note) { ?>
        <tr align="center" class="smalltxt">
            <td class="altbg2">&nbsp;<input class="checkbox" type="checkbox" value="<?=$note['id']?>" name="delete[]"></td>
            <td  class="altbg2"><strong><?=$note['title']?></strong></td>
            <td  class="altbg2"><?=$note['author']?></td>
            <td class="altbg2"><?=$note['format_time']?></td>
            <td class="altbg2"><a href="index.php?admin_note/edit/<?=$note['id']?><?=$setting['seo_suffix']?>">编辑</a></td>
        </tr>
        
<? } } ?>
        <? if($departstr) { ?>        <tr class="smalltxt">
            <td class="altbg2" colspan="5" align="right"><div class="scott"><?=$departstr?></div></td>
        </tr>
        <? } ?>        <tr><td colspan="5" class="altbg1"><input type="submit" class="button" value="提交" /></td></td>
    </table>
</form>
<? include template(footer,admin); ?>
