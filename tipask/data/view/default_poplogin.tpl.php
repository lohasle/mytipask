<? if(!defined('IN_TIPASK')) exit('Access Denied'); global $starttime,$querynum;$mtime = explode(' ', microtime());$runtime=number_format($mtime['1'] + $mtime['0'] - $starttime,6); $setting=$this->setting;$user=$this->user;$headernavlist=$this->nav;$regular=$this->regular; ?><div class="poploginform">
    <form name="loginform"  action="<?=SITE_URL?>?user/login.html" method="post"    <? if($setting['ucenter_open']==0) { ?>onsubmit="return checkform();"<? } ?>>
        <div class="input-bar">
            <div id="user_error" class="user_error">&nbsp;</div>
            <h2>用户名</h2>
            <input type="text" class="normal-input" id="popusername" name="username" />
        </div>
        <div class="clr"></div>
        <div class="input-bar">
            <h2>密&nbsp;&nbsp;码</h2>
            <input type="password" class="normal-input" id="poppassword" name="password" />
        </div>
        <? if($setting['code_login']) { ?>        <div class="clr"></div>
        <div class="input-bar">
            <h2>验证码</h2>
            <input type="text" class="code-input" id="login_code" name="code" onblur="check_login_code();"/><span id="logincodetip"></span>
        </div>
        <div class="clr"></div>
        <div class="code-bar">
            <span class="verifycode"><img  src="<?=SITE_URL?>?user/code.html" onclick="refresh_code();" id="verifylogincode"></span><a class="changecode" href="javascript:refresh_code();">&nbsp;看不清?</a>
        </div>
        <? } ?>        <div class="clr"></div>
        <div class="auto-login">
            <input type="checkbox" id="cookietime" name="cookietime" value="2592000" /> 下次自动登录
        </div>
        <div class="auto-login">
            <input type="hidden" name="forward" value="<?=$forward?>"/>
            <input type="submit" value="登&nbsp;录" class="normal-button" name="submit" /><a href="<?=SITE_URL?>?user/getpass.html" class="red">忘记密码?</a><a href="<?=SITE_URL?>?user/register.html" class="red">注册新账号</a>
        </div>
        <div class="thirdpart_login">
            其他账号登陆：
            <? if($setting['sinalogin_open']) { ?>            <a title="新浪微博登陆" href="<?=SITE_URL?>plugin/sinalogin/index.php" title="新浪微博登陆" class="sinaWebLogin"></a>
            <? } ?>            <? if($setting['qqlogin_open']) { ?>            <a  class="qqLogin" title="QQ账号登陆" href="<?=SITE_URL?>plugin/qqlogin/index.php"></a>
            <? } ?>        </div>
    </form>
    <div class="clr"></div>
    <script type="text/javascript">
        function checkform() {
            var username = $("#popusername").val();
            var password = $("#poppassword").val();
            if ($.trim(username) === '') {
                $("#user_error").html("请输入您的账号");
                $("#username").focus();
                return false;
            }
            if (password === '') {
                $("#user_error").html("请输入您的密码");
                $("#password").focus();
                return false;
            }
            $("#user_error").html("");
            check_login_code();
            if ($('#logincodetip').hasClass("input_error")) {
                $("#code").focus();
                return false;
            }
         
            $.ajax({
                type: "POST",
                async: false,
                cache: false,
                url: "<?=SITE_URL?>index.php?user/ajaxlogin",
                data: "username=" + $.trim(username) + "&password=" + password,
                success: function(ret) {
                    if (ret == '-1') {
                        $("#user_error").html("用户名或密码错误");
                    } else {
                        $("#user_error").html("");
                    }
                }
            });
            if ($("#user_error").html() != '') {
                return false;
            } else {
                return true;
            }

        }
        function refresh_code() {
            var img = g_site_url + "index.php" + query + "user/code/" + Math.random();
            $('#verifylogincode').attr("src", img);
        }
        function check_login_code() {
            var code = $.trim($('#login_code').val());
            if ($.trim(code) == '') {
                $('#logincodetip').html("验证码错误");
                $('#logincodetip').attr('class', 'input_error');
                return false;
            }
            $.ajax({
                type: "POST",
                async: false,
                cache: false,
                url: "<?=SITE_URL?>index.php?user/ajaxcode/"+code,
                success: function(flag) {                   
                    if (1 == flag) {
                        $('#logincodetip').html("&nbsp;");
                        $('#logincodetip').attr('class', 'input_ok');
                        return true;
                    } else {
                        $('#logincodetip').html("验证码错误");
                        $('#logincodetip').attr('class', 'input_error');
                        return false;
                    }

                }
            });
        }
    </script>

</div>