<? if(!defined('IN_TIPASK')) exit('Access Denied'); include template(header,admin); ?>
<div style="width:100%; height:15px;color:#000;margin:0px 0px 10px;">
    <div style="float:left;"><a href="index.php?admin_main/stat<?=$setting['seo_suffix']?>" target="main"><b>控制面板首页</b></a>&nbsp;&raquo;&nbsp;搜索设置</div>
</div><? if(isset($message)) { $type=isset($type)?$type:'correctmsg';  ?><table cellspacing="1" cellpadding="4" width="100%" align="center" class="tableborder">
    <tr>
        <td class="<?=$type?>"><?=$message?></td>
    </tr>
</table><? } ?><table width="100%" cellspacing="1" cellpadding="4" align="center" class="tableborder">
    <tbody><tr class="header"><td>设置说明</td></tr>
        <tr><td>1、开启全文检索之前系统要开启了PHP iconv库,否则系统不支持<br />
                2、全文检索目前整合的是第三方搜全文检索引擎xunsearch，整合前请先确认已配置好xunsearch。
            </td></tr>
    </tbody></table>
<br />
<form action="index.php?admin_setting/search<?=$setting['seo_suffix']?>" method="post">
    <a name="基本设置"></a>
    <table cellspacing="1" cellpadding="4" width="100%" align="center" class="tableborder">
        <tr class="header">
            <td colspan="2">参数设置</td>
        </tr>
        <tr>
            <td width="45%" class="altbg1"><b>搜索框提示文字</b><br><span class="smalltxt">可以留空</span></td>
            <td class="altbg2"><input type="text" style="width:332px;" name="search_placeholder" value="<?=$setting['search_placeholder']?>" /></td>
        </tr>
        <tr>
            <td class="altbg1" width="45%"><b>开启全文检索:</b><br><span class="smalltxt">需要先安装xunsearch程序</span></td>
            <td class="altbg2">
                <input class="radio"  type="radio"  <? if(1==$setting['xunsearch_open'] ) { ?>checked<? } ?>  value="1" name="xunsearch_open"><label for="yes">是</label>&nbsp;&nbsp;&nbsp;&nbsp;
                <input class="radio"  type="radio"  <? if(0==$setting['xunsearch_open'] ) { ?>checked<? } ?> value="0" name="xunsearch_open"><label for="no">否</label>
                <? if($setting['xunsearch_open'] && $nofulltext) { ?><label for="questions"><font color="red"><b><?=$nofulltext?></b>个问题没有建立全文检索</font>&nbsp;[<a href="javascript:void(0);" onclick="createfulltext();">开始建立全文检索</a>]</label><? } ?>            </td>
        </tr>
        <tr>
            <td width="45%" class="altbg1"><b>PHP-SDK文件绝对路径</b><br><span class="smalltxt">默认路径是/usr/local/xunsearch/</span></td>
            <td class="altbg2"><input type="text" style="width:332px;" name="xunsearch_sdk_file" value="<?=$setting['xunsearch_sdk_file']?>"></td>
        </tr>
        <? if(1==$setting['xunsearch_open'] ) { ?>        <tr>
            <td width="45%" class="altbg1"><b>重建索引</b><br><span class="smalltxt">如果安装xunsearch前已有问答数据，请在xunsearch配置后重建索引</span></td>
            <td class="altbg2" id="indexmsg"><a href="javascript:makeindex();" id="makeindex" style="color:green;">点击此处开始建立索引</a></td>
        </tr>
        <? } ?>    </table>
    <br>
    <center><input type="submit" class="button" name="submit" value="提 交"></center><br>
</form>
<script type="text/javascript">
    function makeindex() {
        $("#makeindex").parent().html("<font color='orange'>正在重新建立索引,请稍后...</font>");
        $.get("<?=SITE_URL?>index.php?admin_question/makeindex", function(msg) {
            if (msg == 'ok') {
                $("#indexmsg").html("<font color='green'>已完成!</font>");
            }
        });
    }
</script>
<? include template(footer,admin); ?>
