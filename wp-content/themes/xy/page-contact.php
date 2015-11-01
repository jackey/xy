<?php
/**
 * Template Name: Static Home
 */
?>

<?php get_header(); ?>

<div id="main" data-scroll-header>
    <div id="content">
        <div class="container map">
            <div class="row map-header">
                <div class="col-md-12 col-xl-12">
                    <h2>公司位置</h2>
                    <div class="l3"></div>
                    <p>如有任何疑问，可以直接电话我们</p>
                </div>
            </div>
            <div class="row map-content">
                <div class="contact-address col-md-3 col-xs-12">
                    <h2 class="company-name">携隐信息咨询（上海）有限公司</h2>
                    <span class="address"><i class="fa fa-map-pin"></i>上海长寿路360号源达大厦2113</span>
                    <span class="tel"><i class="fa fa-mobile"></i><a href="tel:177-1747-0123">177-1747-0123</a></span>
                    <span class="who"><i class="fa fa-user"></i>Melody Zhang (女士)</span>
                </div>
                <div class="mapimg col-md-8 col-xs-12 col-md-offset-1">
                    <div id="allmap" ></div>
                </div>
            </div>
        </div>

        <script type="text/javascript" src="http://api.map.baidu.com/api?v=1.5&ak=ZuVRDtLTr1PXxz7g028BUPYL"></script>
        <script type="text/javascript">
            // 百度地图API功能
            var map = new BMap.Map("allmap");
            var point = new BMap.Point(121.445431,31.2484185);
            map.centerAndZoom(point, 19);
            var marker = new BMap.Marker(point);
            map.addOverlay(marker);

            marker.addEventListener('click', function () {
                var infoWindow = new BMap.InfoWindow("上海长寿路360号源达大厦2113", {
                    width:250,
                    height:100,
                    title: '携隐信息咨询（上海）有限公司'
                });
                map.openInfoWindow(infoWindow, point);
            });
        </script>

    </div>

<?php get_sidebar(); ?>

<?php get_footer() ?>

