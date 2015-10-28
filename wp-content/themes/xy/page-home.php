<?php
/**
 * Template Name: Static Home
 */
?>

<?php get_header(); ?>

    <div id="main" data-scroll-header>
    <div id="content">
    <div class="container btype" >
        <div class="row section">
            <h2 data-sr="ease-in-out, over 1s, wait 0.5s">咨询范围</h2>
            <div class="line3"></div>
            <p data-sr="ease in out, over 1s, wait 0.5s">" 我们帮您设计完善的进度目标 "</p>
            <div class="row">
                <div class="business-intro mba odd clearfix" >
                    <div class="intro" data-sr="enter right, move 100px, over 1s, wait 0.5s">
                        <p>MBA 申请咨询 MBA 申请咨询 MBA 申请咨询 MBA 申请咨询 MBA 申请咨询 MBA 申请咨询 </p>
                    </div>
                    <div class="teaser" ng-mouseover="businessHover($event)" data-sr="enter left, move 100px, over 1s, wait 0.5s">
                        <div class="bg"></div>
                        <h3><i class="fa fa-bank"></i><span>MBA</span></h3>
                        <p>MBA 联系 联系 我们</p>
                        <a href="mail:jackey@fumer.cn&titlte=MBA咨询"><span>Email 联系 <br/> <br/> Email 联系</span></a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="business-intro ms even">
                    <div class="intro" data-sr="enter left, move 100px, over 1s, wait 0.5s">
                        <p>MS 申请咨询 MS 申请咨询 MS 申请咨询 MS 申请咨询 MS 申请咨询 MS 申请咨询</p>
                    </div>
                    <div class="teaser" data-sr="enter right, move 100px, over 1s, wait 0.5s">
                        <div class="bg"></div>
                        <h3><i class="fa fa-graduation-cap"></i><span>MS</span></h3>
                        <p>MBA 联系 联系 我们</p>
                        <a href="mail:jackey@fumer.cn&titlte=MBA咨询"><span>Email 联系 <br/> <br/> Email 联系</span></a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="business-intro odd gmat">
                    <div class="intro" data-sr="enter right, move 100px, over 1s, wait 0.5s">
                        <p>GMAT 考试 GMAT 考试 GMAT 考试 GMAT 考试 GMAT 考试 GMAT 考试</p>
                    </div>
                    <div class="teaser" data-sr="enter  left, move 100px, over 1s, wait 0.5s">
                        <div class="bg"></div>
                        <h3><i class="fa fa-pencil"></i><span>GMAT</span></h3>
                        <p>MBA 联系 联系 我们</p>
                        <a href=""><span>阅读详情 <br/> <br/> 阅读详情</span></a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="business-intro toefl even">
                    <div class="intro" data-sr="enter left, move 100px, over 1s, wait 0.5s">
                        <p>TOEFL 考试 TOEFL 考试 TOEFL 考试 TOEFL 考试</p>
                    </div>
                    <div class="teaser" data-sr="enter right, move 100px, over 1s, wait 0.5s">
                        <div class="bg"></div>
                        <h3><i class="fa fa-slack"></i><span>TOEFL</span></h3>
                        <p>MBA 联系 联系 我们</p>
                        <a href=""><span>阅读详情 <br/> <br/> 阅读详情</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container team">
        <div class="row section">
            <h2 data-sr="wait 0.5s, ease-in-out 1s, over 1s">我们的团队</h2>

            <div class="line3"></div>
            <p data-sr="wait 0.5s, ease-in-out 1s, over 1s">我们帮您定位完善的目标方式</p>

            <div class="row" >
                <div ng-repeat="member in members" class="col-xs-12 col-sm-4 col-md-3" data-sr="enter bottom, move 100px, over 1s">
                    <div class="member-info">
                        <img ng-src="{{member['avatar']}}" alt=""/>

                        <div class="bg"></div>
                        <div class="desc">{{member['desc']}}</div>
                        <div class="minfo">
                            <i class="name">{{member['name']}}</i>
                            <i class="school">/ {{member['university']}}</i>
                            <div class="line"></div>
                            <i class="job-title">{{member['title']}}</i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container blog" >
        <div class="row section">
            <div class="icon people-ceo"><img data-sr="wait 0s, ease-in-out 50px, over 1s" src="<?php echo esc_url(get_template_directory_uri()) . '/misc/melody.jpg' ?>" alt=""/></div>
            <i data-sr="wait 0s, ease-in-out 50px, over 1s">携隱CEO</i>

            <p data-sr="wait 0s, ease-in-out 50px, over 1s">"在国内大概每年有一百万学生申请MAB 通过率仅20% 我们的使命是帮助中国学生有效申请..."</p>
            <button data-sr="wait 0s, ease-in-out 50px, over 1s" class="btn btn-readblog">阅读更多</button>
        </div>
    </div>

    <div class="container contact" data-sr="">
        <div class="row section">
            <p>" 联系我们, 让我们帮您一起完善目标 " </p>
            <div class="row">
                <form class="form-horizontal" action="">
                    <div class="form-group">
                        <label class=" sr-only " for="name">姓名: </label>

                        <div class="col-sm-8 col-sm-offset-2 col-xs-12">
                            <input ng-class="{active: nameFocused}" ng-init="nameFocused=false" ng-focus="nameFocused=true" ng-blur="nameFocused=false" ng-model="name" type="text" class="form-control" placeholder="请输入您的姓名" name="name" id="name"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class=" sr-only " for="email">邮箱: </label>

                        <div class="col-sm-8 col-sm-offset-2 col-xs-12">
                            <input ng-class="{active: emailFocused}" ng-init="emailFocused=false" ng-focus="emailFocused=true" ng-blur="emailFocused=false" ng-model="email" type="text" class="form-control" placeholder="请输入您的邮箱" name="email" id="email"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="phone">手机:</label>

                        <div class="col-sm-8 col-sm-offset-2 col-xs-12">
                            <input ng-class="{active: phoneFocused}" ng-init="phoneFocused=false" ng-focus="phoneFocused=true" ng-blur="phoneFocused=false" ng-model="phone" type="text" class="form-control" placeholder="请输入您的手机号码 方便我们联系到您" name="email"
                                   id="email"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class=" sr-only " for="target">关注: </label>

                        <div class="col-sm-8 col-sm-offset-2 col-xs-12">
                            <select ng-model="target" class="form-control" name="target" id="target">
                                <option value="mba">MBA</option>
                                <option value="ms">MS</option>
                                <option value="gmat">GAMT</option>
                                <option value="toefl">TOEFL</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">
                            <button class="btn btn-primary btn-fill">发送</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>

    <?php get_sidebar(); ?>

<?php get_footer() ?>