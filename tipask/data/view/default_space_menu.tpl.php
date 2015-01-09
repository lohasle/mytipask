<? if(!defined('IN_TIPASK')) exit('Access Denied'); ?>
    <div class="user-aside">
        <div class="usermenu">
            <div class="userbox clearfix">
                <a class="pic" title="<?=$member['username']?>" href="<?=SITE_URL?>?user/profile.html"><img width="60" height="60" src="<?=$member['avatar']?>" alt="<?=$member['username']?>"></a>
                <h3><?=$member['username']?></h3>
                <span><?=$member['grouptitle']?></span>
            </div>
            <ul class="menu clearfix">
                <li><a href="<?=SITE_URL?>?user/space_ask/<?=$member['uid']?>.html">提问数</a><?=$member['questions']?></li>
                <li><a href="<?=SITE_URL?>?user/space_answer/<?=$member['uid']?>.html">回答数</a><?=$member['answers']?></li>
                <li><a href="#">赞同</a><?=$member['supports']?></li>
            </ul>
            <ul class="user-nav">
                <li<? if($regular=="user/space") { ?> class="on"<? } ?>><? if($regular=="user/space") { ?>TA的首页<? } else { ?><a href="<?=SITE_URL?>?u-<?=$member['uid']?>.html">TA的首页</a><? } ?></li>
                <li<? if($regular=="user/space_ask") { ?> class="on"<? } ?>><? if($regular=="user/space_ask") { ?>TA的提问<? } else { ?><a href="<?=SITE_URL?>?user/space_ask/<?=$member['uid']?>.html">TA的提问</a><? } ?></li>
                <li<? if($regular=="user/space_answer") { ?> class="on"<? } ?>><? if($regular=="user/space_answer") { ?>TA的回答<? } else { ?><a href="<?=SITE_URL?>?user/space_answer/<?=$member['uid']?>.html">TA的回答</a><? } ?></li>
            </ul>
        </div>
    </div>
    <script type='text/javascript'>
        $(function() {
            $(".userprogress").progressbar({
                value: 70
            });
        });
    </script>