<? if(!defined('IN_TIPASK')) exit('Access Denied'); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <? $user=$this->user; $setting=$this->setting; ?>    <head>
        <title>Tipask后台管理系统</title>
        <meta http-equiv=Content-Type content="text/html; charset=<?=TIPASK_CHARSET?>" />
            <LINK href="css/admin/admin_m.css" type="text/css" rel="stylesheet" />
     </head>
    <BODY style="HEIGHT: 100%" scroll="yes">
        <SCRIPT type="text/javascript">
            function setTab(name,cursel,n){
                for(i=1;i<=n;i++){
                    var menu=document.getElementById(name+i);
                    var con=document.getElementById("con_"+name+"_"+i);
                    try {
                        menu.className=i==cursel?"navon":"";
                        con.style.display=i==cursel?"block":"none";
                    }catch(e){}
                }
                return false;
            }
        </SCRIPT>
        <TABLE height="100%" cellSpacing=0 cellPadding=0 width="100%" border=0>
            <TBODY>
                <TR>
                    <TD vAlign="top" colSpan="2" height="80">
                        <DIV id="header">
                            <DIV class="logo fl">
                                <DIV class="png"><img height="43" alt=" Tipask问答系统 " src="css/admin/logo.png" width="160"></DIV>
                                <DIV class="lun"><font size="3" color="#E68319">Tipask<?=TIPASK_VERSION?></font></DIV>
                            </DIV>
                            <!--大导航 -->
                            <UL class="nav">
                                <LI class="navon" id="nav1" onclick="return setTab('nav',1,8)"><EM><A href="#">常用操作</A></EM></LI>
                                <LI id="nav2" onclick="return setTab('nav',2,8)"><EM><A href="#">系统设置</A></EM></LI>
                                <LI id="nav3" onclick="return setTab('nav',3,8)"><EM><A href="#">用户管理</A></EM></LI>
                                <LI id="nav4" onclick="return setTab('nav',4,8)"><EM><A href="#">内容管理</A></EM></LI>
                                <LI id="nav5" onclick="return setTab('nav',5,8)"><EM><A href="#">系统工具</A></EM></LI>
                                <LI id="nav6" onclick="return setTab('nav',6,8)"><EM><A href="#">数据库管理</A></EM></LI>
                                <LI id="nav7" onclick="return setTab('nav',7,8)"><EM><A href="#">系统整合</A></EM></LI>
                            </UL>
                            <!--头部信息导航-->
                            <DIV class="wei fl">用户名：<?=$user['username']?>（<A href="index.php?admin_main/logout<?=$setting['seo_suffix']?>">退出</A>）&nbsp;|&nbsp; <A href="index.php?admin_main/stat<?=$setting['seo_suffix']?>" target="main">控制面板首页</A> &nbsp;|&nbsp; <A  href="index.php?admin_setting/cache<?=$setting['seo_suffix']?>" target="main">清空缓存</A> &nbsp;|&nbsp; <A class="s0" style="CURSOR: pointer" href="<?=SITE_URL?>" target="_blank">访问网站首页</A> &nbsp;|&nbsp; <A title=后退到前一页 style="CURSOR: pointer" onclick=history.go(-1);>后退一页</A> &nbsp;</DIV>
                            <!--头部信息导航结束-->
                        </DIV>
                    </TD>
                </TR>

                <TR>
                    <TD id="main-fl" vAlign="top">
                        <DIV id="left">
                            <DIV id="con_nav_1">
                                <H1>常用操作</H1>
                                <DIV class="cc"></DIV>
                                <UL>
                                    <li><a href="index.php?admin_setting/base<?=$setting['seo_suffix']?>" target="main">站点设置</a></li>
                                    <li><a href="index.php?admin_setting/register<?=$setting['seo_suffix']?>" target="main">注册设置</a></li>
                                    <li><a href="index.php?admin_user<?=$setting['seo_suffix']?>" target="main">用户管理</a> </li>
                                    <li><a href="index.php?admin_expert<?=$setting['seo_suffix']?>" target="main">专家管理</a> </li>
                                    <li><a href="index.php?admin_usergroup<?=$setting['seo_suffix']?>" target="main">用户组权限</a></li>
                                    <li><a href="index.php?admin_question<?=$setting['seo_suffix']?>" target="main">问题管理</a> </li>
                                    <li><a href="index.php?admin_question/searchanswer<?=$setting['seo_suffix']?>" target="main">回答管理</a></li>
                                    <li><a href="index.php?admin_note<?=$setting['seo_suffix']?>" target="main">公告管理</a></li>
                                    <li><a href="index.php?admin_nav<?=$setting['seo_suffix']?>" target="main">导航管理</a> </li>
                                    <li><a href="index.php?admin_link<?=$setting['seo_suffix']?>" target="main">友情链接</a> </li>
                                    <li><a href="index.php?admin_ad<?=$setting['seo_suffix']?>" target="main">广告管理</a></li>
                                    <li><a href="index.php?admin_category<?=$setting['seo_suffix']?>" target="main">分类管理</a></li>
                                    <li><a href="index.php?admin_db/backup<?=$setting['seo_suffix']?>" target="main">数据库备份</a> </li>
                                    <li><a href="index.php?admin_db/sqlwindow<?=$setting['seo_suffix']?>" target="main">SQL查询</a> </li>
                                    <li><a href="index.php?admin_setting/cache<?=$setting['seo_suffix']?>" target="main">更新缓存</a> </li>
                                </UL>
                            </DIV>
                            <DIV id="con_nav_2" style="DISPLAY: none">
                                <H1>系统设置</H1>
                                <DIV class=cc></DIV>
                                <UL>
                                    <li><a href="index.php?admin_setting/base<?=$setting['seo_suffix']?>" target="main">站点设置</a></li>
                                    <li><a href="index.php?admin_setting/time<?=$setting['seo_suffix']?>" target="main">时间设置</a> </li>
                                    <li><a href="index.php?admin_setting/list<?=$setting['seo_suffix']?>" target="main">首页设置</a> </li>
                                    <li><a href="index.php?admin_setting/search<?=$setting['seo_suffix']?>" target="main">搜索管理</a></li>
                                    <li><a href="index.php?admin_setting/register<?=$setting['seo_suffix']?>" target="main">注册设置</a></li>
                                    <li><a href="index.php?admin_nav<?=$setting['seo_suffix']?>" target="main">导航管理</a> </li>
                                    <li><a href="index.php?admin_link<?=$setting['seo_suffix']?>" target="main">友情链接</a> </li>
                                </UL>
                                <H1>高级设置</H1>
                                <DIV class=cc></DIV>
                                <ul>
                                    <li><a href="index.php?admin_setting/mail<?=$setting['seo_suffix']?>" target="main">邮件设置</a> </li>
                                    <li><a href="index.php?admin_setting/msgtpl<?=$setting['seo_suffix']?>" target="main">消息模板</a> </li>
                                    <li><a href="index.php?admin_setting/credit<?=$setting['seo_suffix']?>" target="main">积分设置</a> </li>
                                    <li><a href="index.php?admin_setting/ebank<?=$setting['seo_suffix']?>" target="main">财富充值</a> </li>
                                    <li><a href="index.php?admin_setting/seo<?=$setting['seo_suffix']?>" target="main">seo设置</a> </li>
                                    <li><a href="index.php?admin_setting/stopcopy<?=$setting['seo_suffix']?>" target="main">防采集设置</a> </li>
                                    <li><a href="index.php?admin_editor/setting<?=$setting['seo_suffix']?>" target="main">编辑器设置</a> </li>
                                    <li><a href="index.php?admin_setting/qqlogin<?=$setting['seo_suffix']?>" target="main">qq互联设置</a> </li>
                                    <li><a href="index.php?admin_setting/sinalogin<?=$setting['seo_suffix']?>" target="main">sina互联设置</a> </li>
                                </ul>
                            </DIV>
                            <DIV id="con_nav_3" style="DISPLAY: none">
                                <H1>用户管理</H1>
                                <DIV class=cc></DIV>
                                <ul>
                                    <li><a href="index.php?admin_user/add<?=$setting['seo_suffix']?>" target="main">添加用户</a> </li>
                                    <li><a href="index.php?admin_user<?=$setting['seo_suffix']?>" target="main">用户管理</a> </li>
                                    <li><a href="index.php?admin_banned/add<?=$setting['seo_suffix']?>" target="main">禁止IP</a> </li>
                                    <li><a href="index.php?admin_expert<?=$setting['seo_suffix']?>" target="main">专家管理</a> </li>
                                    <li><a href="index.php?admin_usergroup<?=$setting['seo_suffix']?>" target="main">用户组</a></li>
                                    <li><a href="index.php?admin_usergroup/system<?=$setting['seo_suffix']?>" target="main">系统用户组</a></li>
                                </ul>
                            </DIV>
                            <DIV id="con_nav_4" style="DISPLAY: none">
                                <H1>内容管理</H1>
                                <DIV class=cc></DIV>
                                <ul>
                                    <li><a href="index.php?admin_question/examine<?=$setting['seo_suffix']?>" target="main">问答审核</a></li>
                                    <li><a href="index.php?admin_question<?=$setting['seo_suffix']?>" target="main">问题管理</a></li>
                                    <li><a href="index.php?admin_question/searchanswer<?=$setting['seo_suffix']?>" target="main">回答管理</a></li>
                                    <li><a href="index.php?admin_category<?=$setting['seo_suffix']?>" target="main">分类管理</a></li>
                                    <li><a href="index.php?admin_topic<?=$setting['seo_suffix']?>" target="main">专题管理</a></li>
                                    <li><a href="index.php?admin_tag<?=$setting['seo_suffix']?>" target="main">标签管理</a></li>
                                    <li><a href="index.php?admin_word<?=$setting['seo_suffix']?>" target="main">词语过滤</a></li>
                                    <li><a href="index.php?admin_inform<?=$setting['seo_suffix']?>" target="main">举报管理</a></li>
                                    <li><a href="index.php?admin_note<?=$setting['seo_suffix']?>" target="main">公告管理</a></li>
                                    <li><a href="index.php?admin_ad<?=$setting['seo_suffix']?>" target="main">广告管理</a></li>
                                </ul>
                                <H1>礼品商店</H1>
                                <DIV class=cc></DIV>
                                <ul>
                                    <li><a href="index.php?admin_gift<?=$setting['seo_suffix']?>" target="main">礼品列表</a></li>
                                    <li><a href="index.php?admin_gift/add<?=$setting['seo_suffix']?>" target="main">添加礼品</a></li>
                                    <li><a href="index.php?admin_gift/note<?=$setting['seo_suffix']?>" target="main">礼品公告</a></li>
                                    <li><a href="index.php?admin_gift/addrange<?=$setting['seo_suffix']?>" target="main">礼品价格区间</a></li>
                                    <li><a href="index.php?admin_gift/log<?=$setting['seo_suffix']?>" target="main">礼品兑换日志</a></li>
                                </ul>
                            </DIV>
                            <DIV id="con_nav_5" style="DISPLAY: none">
                                <H1>系统工具</H1>
                                <DIV class="cc"></DIV>
                                <ul>
                                    <li><a href="index.php?admin_setting/cache<?=$setting['seo_suffix']?>" target="main">更新缓存</a> </li>
                                    <li><a href="index.php?admin_datacall/default<?=$setting['seo_suffix']?>" target="main">js数据调用</a> </li>
                                    <li><a href="index.php?admin_main/regulate<?=$setting['seo_suffix']?>" target="main">数据校正</a> </li>
                                </ul>
                            </DIV>
                            <DIV id="con_nav_6" style="DISPLAY: none">
                                <H1>数据库管理</H1>
                                <DIV class=cc></DIV>
                                <UL>
                                    <li><a href="index.php?admin_db/backup<?=$setting['seo_suffix']?>" target="main">数据库备份</a> </li>
                                    <li><a href="index.php?admin_db/tablelist<?=$setting['seo_suffix']?>" target="main">数据库优化</a> </li>
                                </UL>
                            </DIV>
                            <DIV id="con_nav_7" style="DISPLAY: none">
                                <H1>系统整合</H1>
                                <DIV class=cc></DIV>
                                <ul>
                                    <li><a href="index.php?admin_setting/passport<?=$setting['seo_suffix']?>" target="main">通行证</a> </li>
                                    <li><a href="index.php?admin_setting/ucenter<?=$setting['seo_suffix']?>" target="main">UCenter</a> </li>
                                    <li><a href="index.php?admin_cms/setting<?=$setting['seo_suffix']?>" target="main">CMS系统</a> </li>
                                </ul>
                            </DIV>
                        </DIV><!--end left-->
                    </TD>
                    <TD id="mainright" style="HEIGHT: 94%" vAlign="top">
                        <IFRAME style="OVERFLOW: visible" name="main" src="index.php?admin_main/stat<?=$setting['seo_suffix']?>" frameBorder=0 width="100%" scrolling="yes" height="100%"></IFRAME>
                    </TD>
                </TR>
            </TBODY>
        </TABLE>
    </BODY>
</HTML>