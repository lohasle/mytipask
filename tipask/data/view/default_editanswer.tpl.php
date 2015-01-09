<? if(!defined('IN_TIPASK')) exit('Access Denied'); include template('header'); $adlist = $this->fromcache("adlist"); ?><script src="<?=SITE_URL?>js/editor/ueditor.config.js" type="text/javascript"></script> 
<script src="<?=SITE_URL?>js/editor/ueditor.all.js" type="text/javascript"></script> 
<div class="nav-line"><a class="first" href="<?=SITE_URL?>"><?=$setting['site_name']?></a> &gt; <a href="<?=SITE_URL?>?q-<?=$question['id']?>.html"><?=$question['title']?></a> &gt; <span>编辑回答</span></div>
<div class="wrapper clearfix">
    <div class="content-left">
        <form name="answerform" onsubmit="return check_form();" action="<?=SITE_URL?>?question/editanswer.html" method="post" >
            <div class="askbox">
                <div class="inputbox pdt15">
                    <div id="introContent">
                        <script type="text/plain" id="editor" name="content" style="height: 222px;"><?=$answer['content']?></script>
                        <script type="text/javascript">UE.getEditor('editor', UE.utils.extend({toolbars:[[<?=$toolbars?>]]}));</script>
                    </div>
                </div>
                <div class="ask-input-bar clearfix">
                    <? if($user['grouptype']!=1) { ?>                    <h2>验证码</h2>
                    <input type="text" class="code-input" id="code" name="code" onblur="check_code()">&nbsp;<span class="verifycode"><img src="<?=SITE_URL?>?user/code.html" onclick="javascript:updatecode();" id="verifycode"></span><a href="javascript:updatecode();" class="changecode">&nbsp;换一个</a>
                    <span id="codetip"></span>
                    <? } ?>                    <input type="hidden" value="<?=$aid?>" name="aid" />
                    <input type="submit" value="保存修改" class="normal-button flright"  name="submit" />
                </div>
            </div>	
        </form>
    </div>
    <div class="aside-right">
        <!--广告位5-->
        <? if((isset($adlist['question_view']['right1']) && trim($adlist['question_view']['right1']))) { ?>        <div><?=$adlist['question_view']['right1']?></div>
        <? } ?>    </div>
</div>
<? include template('footer'); ?>
