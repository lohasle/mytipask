<? if(!defined('IN_TIPASK')) exit('Access Denied'); include template('header'); ?>
<div class="nav-line"></div>
<div class="wrapper clearfix">
    <div class="content-left">
        <div class="modbox">
            <div class="title">用户登陆</div>
            <div class="loginform">
                <form name="loginform"  action="<?=SITE_URL?>?user/login.html" method="post">
                    <div class="input-bar">
                        <h2>用户名</h2>
                        <input type="text" class="normal-input" id="username" name="username" />
                    </div>
                    <div class="clr"></div>
                    <div class="input-bar">
                        <h2>密&nbsp;&nbsp;码</h2>
                        <input type="password" class="normal-input" id="password" name="password" />
                    </div>
                    <? if($setting['code_login']) { ?>                    <div class="clr"></div>
                    <div class="input-bar">
                        <h2>验证码</h2>
                        <input type="text" class="code-input" id="code" name="code" onblur="check_code();"/><span id="codetip"></span>
                    </div>
                    <div class="clr"></div>
                    <div class="code-bar">
                        <span class="verifycode"><img  src="<?=SITE_URL?>?user/code.html" onclick="javascript:updatecode();" id="verifycode"></span><a class="changecode" href="javascript:updatecode();">&nbsp;看不清?</a>
                    </div>
                    <? } ?>                    <div class="clr"></div>
                    <div class="auto-login">
                        <input type="checkbox" id="cookietime" name="cookietime" value="2592000" /> 下次自动登录
                    </div>
                    <div class="auto-login">
                        <input type="hidden" name="forward" value="<?=$forward?>"/>
                        <input type="submit" value="登&nbsp;录" class="normal-button" name="submit" />&nbsp;忘记密码了？请点击 “<a href="<?=SITE_URL?>?user/getpass.html" class="red">找回密码</a>” 。
                    </div>
                </form>
                <div class="clr"></div>
            </div>
        </div>
    </div>
    <div class="aside-right">
        <div class="modbox">
            <div class="rtitle"><a href="<?=SITE_URL?>?user/register.html">还没有账号？立即注册!</a></div>
            <div class="rcontent clearfix">
                <h3>更多登录方式</h3>
                <? if($setting['sinalogin_open']) { ?>                <span><a href="<?=SITE_URL?>plugin/sinalogin/index.php"><img src="<?=SITE_URL?>css/default/sina_login_btn.png" alt="Connect_logo_3.png"></a></span>
                <? } ?>                <? if($setting['qqlogin_open']) { ?>                <span><a href="<?=SITE_URL?>plugin/qqlogin/index.php"><img src="<?=SITE_URL?>css/default/qq_login_btn.png" alt="Connect_logo_3.png"></a></span>
                <? } ?>            </div>
        </div>		
    </div>
</div>
<? include template('footer'); ?>
