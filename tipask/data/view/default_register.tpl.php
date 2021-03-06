<? if(!defined('IN_TIPASK')) exit('Access Denied'); include template('header'); ?>
<div class="nav-line"></div>
<div class="wrapper clearfix">
    <div class="content-left">
        <div class="modbox">
            <div class="title">注册会员</div>
            <div class="loginform">
                <form name="loginform"  action="<?=SITE_URL?>?user/register.html" method="post">
                    <div class="input-bar">
                        <h2>用户名</h2>
                        <input type="text" class="normal-input" id="username" name="username" onblur="check_username();"/>
                        <span id="usernametip" class="input_desc">不超过14个字节(中文，数字，字母和下划线)</span>
                    </div>
                    <div class="clr"></div>
                    <div class="input-bar">
                        <h2>登陆密码</h2>
                        <input type="password" class="normal-input" id="password" name="password" onblur="check_passwd();" />
                        <span id="passwordtip" class="input_desc">长度6-14位，字母区分大小写</span>
                    </div>
                    <div class="clr"></div>
                    <div class="input-bar">
                        <h2>密码确认</h2>
                        <input type="password" class="normal-input" id="repassword" name="repassword"  onblur="check_repasswd();"/>
                        <span id="repasswordtip" class="input_desc">与登录密码输入一致</span>
                    </div>
                    <div class="clr"></div>
                    <div class="input-bar">
                        <h2>电子邮箱</h2>
                        <input type="text" class="normal-input" id="email" name="email"  onblur="check_email();"/>
                        <span id="emailtip" class="input_desc">请输入正确的电子邮箱地址</span>
                    </div>
                    <? if($setting['code_register']) { ?>                    <div class="clr"></div>
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
                        <input type="submit" value="注&nbsp;册" class="normal-button" name="submit" />&nbsp;&nbsp;<input type="checkbox" checked="true" name="agreeclause" id="agreeclause" value="1"/>同意&nbsp;<a href="javascript:void(0);" id="showclause" >网站服务条款</a>
                    </div>
                </form>
                <div class="clr"></div>
            </div>
        </div>
    </div>
    <div class="aside-right">
        <div class="modbox">
            <div class="rtitle"><a href="<?=SITE_URL?>?user/login.html">已有账号？立即登陆!</a></div>
            <div class="rcontent clearfix">
                <dl class="right-tips">
                    <dd>我们提醒您注意，您需要注册并登陆，才能享受我们的完整服务进行各项操作。</dd>
                    <dd>密码过于简单有被盗的风险，一旦密码被盗你的个人信息有泄漏的危险。</dd>
                    <dd>我们拒绝垃圾邮件，请使用有效的邮件地址。</dd>
                </dl>
            </div>
        </div>		
    </div>
    <div id="dialog" title="网站服务条款"  style="display: none"><?=$setting['register_clause']?></div>
</div>
<script type="text/javascript">
    var usernameok = 1;
    var password = 1;
    var repasswdok = 1;
    var emailok = 1;
    var codeok = 1;
    function check_username() {
        var username = $.trim($('#username').val());
        var length = bytes(username);
        if (length < 3 || length > 15) {
            $('#usernametip').html("用户名请使用3到15个字符");
            $('#usernametip').attr('class', 'input_error');
            usernameok = false;
        } else {
            $.post("<?=SITE_URL?>index.php?user/ajaxusername", {username: username}, function(flag) {
                if (-1 == flag) {
                    $('#usernametip').html("此用户名已经存在");
                    $('#usernametip').attr('class', 'input_error');
                    usernameok = false;
                } else if (-2 == flag) {
                    $('#usernametip').html("用户名含有禁用字符");
                    $('#usernametip').attr('class', 'input_error');
                    usernameok = false;
                } else {
                    $('#usernametip').html("&nbsp;");
                    $('#usernametip').attr('class', 'input_ok');
                    usernameok = true;
                }
            });
        }
    }

    function check_passwd() {
        var passwd = $('#password').val();
        if (bytes(passwd) < 6 || bytes(passwd) > 16) {
            $('#passwordtip').html("密码最少6个字符，最长不得超过16个字符");
            $('#passwordtip').attr('class', 'input_error');
            password = false;
        } else {
            $('#passwordtip').html("&nbsp;");
            $('#passwordtip').attr('class', 'input_ok');
            password = 1;
        }
    }

    function check_repasswd() {
        repasswdok = 1;
        var repassword = $('#repassword').val();
        if (bytes(repassword) < 6 || bytes(repassword) > 16) {
            $('#repasswordtip').html("密码最少6个字符，最长不得超过16个字符");
            $('#repasswordtip').attr('class', 'input_error');
            repasswdok = false;
        } else {
            if ($('#password').val() == $('#repassword').val()) {
                $('#repasswordtip').html("&nbsp;");
                $('#repasswordtip').attr('class', 'input_ok');
                repasswdok = true;
            } else {
                $('#repasswordtip').html("两次密码输入不一致");
                $('#repasswordtip').attr('class', 'input_error');
                repasswdok = false;
            }
        }
    }

    function check_email() {
        var email = $.trim($('#email').val());
        if (!email.match(/^[\w\.\-]+@([\w\-]+\.)+[a-z]{2,4}$/ig)) {
            $('#emailtip').html("邮件格式不正确");
            $('#emailtip').attr('class', 'input_error');
            usernameok = false;
        } else {
            $.post("<?=SITE_URL?>index.php?user/ajaxemail", {email: email}, function(flag) {
                if (-1 == flag) {
                    $('#emailtip').html("此邮件地址已经注册");
                    $('#emailtip').attr('class', 'font_orange2');
                    emailok = false;
                } else if (-2 == flag) {
                    $('#emailtip').html("邮件地址被禁止注册");
                    $('#emailtip').attr('class', 'input_error');
                    emailok = false;
                } else {
                    emailok = true;
                    $('#emailtip').html("&nbsp;");
                    $('#emailtip').attr('class', 'input_ok');
                }
            });
        }
    }

    function docheck() {<? if($setting['code_register']) { ?>        return (usernameok && repasswdok && emailok && check_code());<? } else { ?>        return (usernameok && repasswdok && emailok);<? } ?>    }
    $(document).ready(function() {
        $("#dialog").dialog({
            autoOpen: false,
            width: 600,
            modal: true,
            resizable: false
        });
        $("#showclause").click(function() {
            $("#dialog").dialog("open");
        });

        $("#agreeclause").change(function() {
            if ($("#agreeclause:checked").val() != 1) {
                document.location = "<?=SITE_URL?>";
            }
        });

    });
</script>
<? include template('footer'); ?>
