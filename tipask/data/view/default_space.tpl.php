<? if(!defined('IN_TIPASK')) exit('Access Denied'); include template('header'); ?>
<div class="wrapper mt10 clearfix">
    
<? include template('space_menu'); ?>
    <div class="user-content">
        <div class="my-answerbox">
            <div class="mod-status-info">
                <div class="hd">
                    <h3>TA的资料</h3>
                </div>
                <div class="bd">
                    <div class="status-data clearfix">
                        <ul>
                            <li class="item"><em><?=$member['answers']?></em><span>回答</span></li>
                            <li class="item"><em><?=$member['questions']?></em><span>提问</span></li>
                            <li class="item"><em><?=$adoptpercent?>%</em>采纳率</li>
                            <li class="item"><em><?=$member['supports']?></em>赞同</li>
                            <li class="item"><em><?=$member['credit1']?></em>经验</li>
                            <li class="item"><em><?=$member['credit2']?></em><span>财富</span></li>
                            <li class="item"><em><?=$member['followers']?></em><span>关注者</span></li>
                            <li class="item last"><em><?=$member['attentions']?></em><span>已关注</span></li>
                        </ul>
                    </div>
                    <div class="expert-single-input clearfix">
                        <? if($member['introduction']) { ?>                        <p><label>身份：</label><i><?=$member['introduction']?></i></p>
                        <? } ?>                        <p>
                            <label>擅长：</label>
                            <? if($member['category']) { ?>                            
<? if(is_array($member['category'])) { foreach($member['category'] as $category) { ?>
                            <i class="expert-field"><a target="_blank" href="<?=SITE_URL?>?c-<?=$category['cid']?>.html"><?=$category['categoryname']?></a></i>
                            
<? } } ?>
                            <? } else { ?>                            暂无
                            <? } ?>                        </p>
                        <? if($member['mobile']) { ?>                        <p><label>手机：</label><i><?=$member['mobile']?></i></p>
                        <? } ?>                        <? if($member['qq']) { ?>                        <p><label>qq：</label><i><?=$member['qq']?></i></p>
                        <? } ?>                        <p><label>介绍：</label><i><span><? if($member['signature']) { ?><?=$member['signature']?><? } else { ?>暂无介绍<? } ?></span></i></p>
                        <p><label>注册日期：</label><i><?=$member['register_time']?></i></p>
                        <p><label>最近更新：</label><i><?=$member['refresh_time']?></i></p>
                    </div>
                    <div class="ask-box clearfix">
                        <form name="askform" action="<?=SITE_URL?>?question/add/<?=$member['uid']?>.html" method="POST">
                            <input type="text" class="tag-input" name="word"/>
                            <input type="submit" name="post" class="normal-button" value="向TA提问"  />
                        </form>
                    </div>
                </div>
            </div>
            <div class="mod-status-info">
                <div class="hd">
                    <h3>TA的动态</h3>

                </div>
                <ul class="q-tabmod mt10">
                    
<? if(is_array($doinglist)) { foreach($doinglist as $doing) { ?>
                    <li>
                        <div class="msgcontent">
                            <div class="source">
                                <? if($doing['hidden'] && in_array($doing['action'],array(1,8))) { ?>                                匿名
                                <? } else { ?>                                <a title="<?=$doing['author']?>"  target="_blank" href="<?=SITE_URL?>?u-<?=$doing['authorid']?>.html"><?=$doing['author']?></a> 
                                <? } ?>                            
                                <?=$doing['actiondesc']?><span class="time"><?=$doing['doing_time']?></span>
                            </div>                        <div class="title"><a href="<?=SITE_URL?>?q-<?=$doing['questionid']?>.html" target="_blank"><?=$doing['title']?>?</a></div>
                            <div class="detail"><p><? echo cutstr($doing['content'],500) ?></p></div>
                            <div class="related">
                                <div class="pv"><?=$doing['attentions']?> 人关注 <span class="dot">•</span> <?=$doing['answers']?> 个回答 <span class="dot">•</span> <?=$doing['views']?> 次浏览 <span class="dot">•</span> 发表于 <?=$doing['question_time']?> </div>
                            </div>
                            <? if($doing['referid']) { ?>                            <div class="quote">
                                <div class="avatar">
                                    <a href="<?=SITE_URL?>?u-<?=$doing['refer_authorid']?>.html"  target="_blank" class="pic"><img alt="自由的风" src="<?=$doing['refer_avatar']?>" onmouseover="pop_user_on(this, '<?=$doing['refer_authorid']?>', 'img');"  onmouseout="pop_user_out();" /></a>
                                </div>
                                <div class="detail"><p><? echo cutstr($doing['refer_content'],200) ?></p></div>
                            </div>
                            <? } ?>                        </div>
                        <div class="clr"></div>
                    </li>
                    
<? } } ?>
                </ul>
            </div>
            <div class="pages"><?=$departstr?></div>	
        </div>
    </div>
</div>
<? include template('footer'); ?>
