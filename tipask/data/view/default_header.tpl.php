<? if(!defined('IN_TIPASK')) exit('Access Denied'); ?>
<!DOCTYPE html>
<html><? global $starttime,$querynum;$mtime = explode(' ', microtime());$runtime=number_format($mtime['1'] + $mtime['0'] - $starttime,6); $setting=$this->setting;$user=$this->user;$headernavlist=$this->nav;$regular=$this->regular;$toolbars="'".str_replace(",", "','", $setting['editor_toolbars'])."'"; ?><head>
    <meta http-equiv="Content-Type" content="text/html; charset=<?=TIPASK_CHARSET?>"/>
    <? if(isset($seo_title)) { ?>    <title><?=$seo_title?></title>
    <? } else { ?>    <title><? if($navtitle) { ?><?=$navtitle?> - <? } ?><?=$setting['site_name']?></title>
    <? } ?>    <? if(isset($seo_description)) { ?>    <meta name="description" content="<? echo cutstr($seo_description,160,'') ?>" />
    <? } else { ?>    <meta name="description" content="<?=$setting['site_name']?>" />
    <? } ?>    <meta name="keywords" content="<?=$seo_keywords?>" />
    <meta name="generator" content="Tipask <?=TIPASK_VERSION?> <?=TIPASK_RELEASE?>" />
    <meta name="author" content="Tipask Team" />
    <meta name="copyright" content="2014 tipask.com" />
    <meta name="robots" content="index, follow">
    <meta name="googlebot" content="index, follow" />
    <meta property="qc:admins" content="1157543261064101336375" />
    <meta property="wb:webmaster" content="21013a86963dbbe5" />
    <link rel="stylesheet" type="text/css" href="<?=SITE_URL?>css/default/main.css" />
    <link rel="stylesheet" type="text/css" href="<?=SITE_URL?>js/jquery-ui/jquery-ui.css" />
    <script src="<?=SITE_URL?>js/jquery.js" type="text/javascript"></script>
    <script type="text/javascript">var g_site_url = "<?=SITE_URL?>";
    var g_site_name = "<?=$setting['site_name']?>";
    var g_prefix = "<?=$setting['seo_prefix']?>";
    var g_suffix = "<?=$setting['seo_suffix']?>";
    var g_uid = <?=$user['uid']?>;
    $(document).on('focus','#search-kw',function(){
        $(this).parent().addClass('active');
    }).on('blur','#search-kw',function(){
        $(this).parent().removeClass('active');
    });
    </script>
</head>
<body>
<div class="js-fixed">
    <div class="top-bar">
        <div class="wrapper clearfix">
            <ul class="tnav">
                <? $headernavlist = $this->fromcache("headernavlist"); ?>                
<? if(is_array($headernavlist)) { foreach($headernavlist as $nav) { ?>
                <? if($nav['type']==2 && $nav['available']) { ?>                <li>
                    <a title="<?=$nav['title']?>" href="<?=$nav['url']?>"  <? if($nav['target']) { ?>target="_blank"<? } ?>><span text="hd-home" ><?=$nav['name']?></span></a>
                </li>
                <? } ?>                
<? } } ?>
            </ul>
            <div class="tuser-top-inner">
                <? if(0!=$user['uid']) { ?>                <ul class="tuser-login">
                    <li class="tuser-bar"><a href="<?=SITE_URL?>?user/default.html"><?=$user['username']?></a>
                        <span style="margin: 0"><?=$user['grouptitle']?></span>
                        <span style="margin: 0"> 财富:<?=$user['credit2']?></span>
                        <span style="margin-left: 0;margin-right: 6px">经验:<?=$user['credit1']?></span>
                    </li>
                    <li id="myqa" class="tuser_menu">
                        <span class="ismore"><a target="_blank" href="<?=SITE_URL?>?user/ask/2.html">我的问答</a><i class="ar-ico"></i></span>
                        <div class="tuser-more-list">
                            <a target="_blank" href="<?=SITE_URL?>?user/ask/2.html">我的提问</a>
                            <a target="_blank" href="<?=SITE_URL?>?user/answer/1.html">我的回答</a>
                        </div>
                    </li>
                    <li id="mymessage" class="tuser_menu">
                        <!-- 如果没有短消息的话 msg-ico 后面有个 msg-null -->
                        <? if(($user['msg_system']+$user['msg_personal'])>0) { ?>                        <span class="ismore" id="mymessage_status"><a target="_self" href="<?=SITE_URL?>?message/personal.html" class="msg-ico"></a><i class="ar-ico"></i></span>
                        <? } else { ?>                        <span class="ismore" id="mymessage_status"><a target="_self" href="<?=SITE_URL?>?message/personal.html" class="msg-ico msg-null"></a><i class="ar-ico"></i></span>
                        <? } ?>                        <div class="tuser-more-list tuser_msg">
                            <a onclick="msgClear();" target="_blank" href="<?=SITE_URL?>?message/personal.html">私人消息<span class="msg-num"  id="mymessage_personal"></span></a>
                            <a onclick="msgClear();" target="_blank" href="<?=SITE_URL?>?message/system.html">系统消息<span class="msg-num"  id="mymessage_system"></span></a>
                            <a target="_blank" href="<?=SITE_URL?>?user/recommend.html">为我推荐<span class="msg-num"  id="mymessage_recommend"></span></a>
                        </div>
                    </li>
                    <li class="tuser_menu">
                        <span class="ismore"><a target="_blank" href="<?=SITE_URL?>?user/profile.html">账号</a><i class="ar-ico"></i></span>
                        <div class="tuser-more-list">
                            <? if($user['groupid']<=3) { ?>                            <a href="<?=SITE_URL?>index.php?admin_main">系统设置</a>
                            <? } ?>                            <a target="_blank" href="<?=SITE_URL?>?user/profile.html">修改资料</a>
                            <a href="<?=SITE_URL?>?user/logout.html" class="tuser_logout">退出</a>
                        </div>
                    </li>
                </ul>
                <? } else { ?>                <ul class="tuser-login">
                    <li class="tuser-bar">
                        <span>您好，欢迎来到<?=$setting['site_name']?>!&nbsp;&nbsp;[<a  href="javascript:void(0);" onclick="login();">请登录</a>]</span>|<span>[<a href="<?=SITE_URL?>?user/register.html">免费注册</a>]</span>
                        <p style="display:none;" class="pub-login-tips">登录体验更流畅的互动沟通 <i></i><span class="top-close"></span></p>
                    </li>
                </ul>
                <? } ?>            </div>
        </div>
    </div>
    <div class="search_mod">
        <div class="header clearfix">
            <div class="logo">
                <a href="<?=SITE_URL?>"><?=$setting['site_name']?></a>
            </div>
            <div class="searchbox">
                <form name="searchform"  action="<?=SITE_URL?>?question/search.html" method="post">
                    <span class="round"><input autocomplete="off" maxlength="100" placeholder="<?=$setting['search_placeholder']?>" class="js-sh-ipt input_key" tabindex="1" name="word" id="search-kw" value="<?=$word?>" /></span>
                    <span class="button"><input type="button" id="search_btn" style="position: relative;left: -3px;" class="js-search-bt s_btn" value="搜索答案" /></span>
                    <span class="button"><input type="button" id="ask_btn" style="position: relative;left: -2px;" class="js-ask-bt s_btn" value="我要提问" /></span>
                </form>
            </div>
        </div>
    </div>
</div>
<div style="height:92px;"></div>
<div id="navbox">
    <div class="main-nav clearfix">
        <ul class="navlist">
            
<? if(is_array($headernavlist)) { foreach($headernavlist as $headernav) { ?>
            <? if($headernav['type']==1 && $headernav['available']) { ?>            <li  <? if(strstr($headernav['url'],$regular)) { ?>class="on"<? } ?>>
            <a title="<?=$headernav['title']?>" href="<?=$headernav['format_url']?>"><span text="hd-home" ><?=$headernav['name']?></span></a>
            </li>
            <? } ?>            
<? } } ?>
        </ul>
        <p class="total">&nbsp;</p>
    </div>
</div>


