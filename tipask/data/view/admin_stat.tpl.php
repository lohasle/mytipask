<? if(!defined('IN_TIPASK')) exit('Access Denied'); include template(header,admin); ?>
            <TABLE class="tableborder" cellSpacing="1" cellPadding="4" width="100%" align="center">
              <TBODY>
              <TR>
                <TD style="PADDING-LEFT: 20px">第一次使用：请看&nbsp;&nbsp;[&nbsp;<A style="COLOR: red" href="#"><U>新手上路向导</U></A>&nbsp;]</TD>
                <TD>程序版本：TipAsk <?=TIPASK_VERSION?> Release <?=TIPASK_RELEASE?>[<A href="#"><B>检查更新</B></A>]</TD>
              </TR>
              <TR>
                <TD style="PADDING-LEFT: 20px">操作系统及 PHP:<?=$serverinfo?></TD>
                <TD>服务器软件:<?=$_SERVER['SERVER_SOFTWARE']?></TD>
              </TR>
              <TR>
                <TD style="PADDING-LEFT: 20px">MySQL 版本:<?=$dbversion?></TD>
                <TD>上传许可:<?=$fileupload?></TD>
              </TR>
              <TR>
                <TD style="PADDING-LEFT: 20px">当前数据库尺寸:<?=$dbsize?></TD>
                <TD>主机名:<?=$_SERVER['SERVER_NAME']?> (<?=$_SERVER['SERVER_ADDR']?>:<?=$_SERVER['SERVER_PORT']?>) </TD>
              </TR>
              <TR>
                <TD style="PADDING-LEFT: 20px">magic_quote_gpc:<?=$magic_quote_gpc?></TD>
                <TD>allow_url_fopen:<?=$allow_url_fopen?> </TD>
              </TR>
              </TBODY>
            </TABLE>
            <? if($verifyquestions||$verifyanswers ) { ?>            <h3 style="color:#E14300;">待处理事项:&nbsp;&nbsp;
            <span style="font-size:12px;font-weight:normal">
            <a href="index.php?admin_question/examine<?=$setting['seo_suffix']?>">等待审核的问题数：(<font color="red"><?=$verifyquestions?></font>)</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="index.php?admin_question/examineanswer<?=$setting['seo_suffix']?>">等待审核的回答数：(<font color="red"><?=$verifyanswers?></font>)</a>
            </span>
            </h3>
            <? } ?>            <!--最新动态-->
            <TABLE class="tableborder" cellSpacing="1" cellPadding="4" width="100%" align="center">
              <TBODY>
              <TR class="header"><TD colSpan="12"> <DIV class="NavaL ndt">开发团队</DIV></TD></TR>
              <TR class="altbg2"><TD>版权所有:<a href="http://www.tipask.com/" target="_blank">Tipask软件工作室 (Tipask Inc.)</a></TD></TR>
              <TR class="altbg2"><TD>总策划兼项目经理:<a href="mailto:tipask@qq.com" target="_blank">Tipask</a></TD></TR>
              <TR class="altbg2"><TD>开发团队:<a href="mailto:sky_php@qq.com" target="_blank">sdf_sky</a>,<a href="mailto:phpinside@163.com" target="_blank">phpinside</a></TD></TR>
              <TR class="altbg2"><TD>官方网站:<a href="http://www.tipask.com/" target="_blank">http://www.tipask.com/</a></TD></TR>
             </TBODY>
            </TABLE>
            <DIV class="c"></DIV>
            <TABLE class="tableborder" cellSpacing=1 cellPadding=4 width="100%" align="center">
              <TBODY>
              <TR class="header">
                <TD colSpan="3">Tipask问答系统官方链接</TD></TR>
              <TR class="altbg2">
                <TD><A href="http://help.tipask.com" target="_blank">问题求助</A></TD>
                <TD><A href="http://www.tipask.com/download.html" target="_blank">源码下载</A></TD>
                <TD><A href="http://www.tipask.com/buy.html" target="_blank">我要购买</A></TD>
              </TR>
              </TBODY>
            </TABLE>
<? include template(footer,admin); ?>
