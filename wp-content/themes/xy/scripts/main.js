(function (runner) {
    runner();
})(function () {

    angular.module('xy', ['ngDialog'])
        .factory('TeamMember', ['$http', function ($http) {
            var member = [
                {
                    name: 'Jackey',
                    university: 'Hunan Railway University',
                    avatar: '/wp-content/themes/xy/misc/member1.png',
                    desc: '10年的咨询经验，为您提供专业服务',
                    title: 'Director'
                }, {
                    name: 'Jackey',
                    university: 'Hunan Railway University',
                    avatar: '/wp-content/themes/xy/misc/member1.png',
                    desc: '10年的咨询经验，为您提供专业服务',
                    title: 'Director'
                }, {
                    name: 'Jackey',
                    university: 'Hunan Railway University',
                    avatar: '/wp-content/themes/xy/misc/member1.png',
                    desc: '10年的咨询经验，为您提供专业服务',
                    title: 'Director'
                }, {
                    name: 'Jackey',
                    university: 'Hunan Railway University',
                    avatar: '/wp-content/themes/xy/misc/member1.png',
                    desc: '10年的咨询经验，为您提供专业服务',
                    title: 'Director'
                }, {
                    name: 'Jackey',
                    university: 'Hunan Railway University',
                    avatar: '/wp-content/themes/xy/misc/member1.png',
                    desc: '10年的咨询经验，为您提供专业服务',
                    title: 'Director'
                }, {
                    name: 'Jackey',
                    university: 'Hunan Railway University',
                    avatar: '/wp-content/themes/xy/misc/member1.png',
                    desc: '10年的咨询经验，为您提供专业服务',
                    title: 'Director'
                }, {
                    name: 'Jackey',
                    university: 'Hunan Railway University',
                    avatar: '/wp-content/themes/xy/misc/member1.png',
                    desc: '10年的咨询经验，为您提供专业服务',
                    title: 'Director'
                }, {
                    name: 'Jackey',
                    university: 'Hunan Railway University',
                    avatar: '/wp-content/themes/xy/misc/member1.png',
                    desc: '10年的咨询经验，为您提供专业服务',
                    title: 'Director'
                }, {
                    name: 'Jackey',
                    university: 'Hunan Railway University',
                    avatar: '/wp-content/themes/xy/misc/member1.png',
                    desc: '10年的咨询经验，为您提供专业服务',
                    title: 'Director'
                }, {
                    name: 'Jackey',
                    university: 'Hunan Railway University',
                    avatar: '/wp-content/themes/xy/misc/member1.png',
                    desc: '10年的咨询经验，为您提供专业服务',
                    title: 'Director'
                }, {
                    name: 'Jackey',
                    university: 'Hunan Railway University',
                    avatar: '/wp-content/themes/xy/misc/member1.png',
                    desc: '10年的咨询经验，为您提供专业服务',
                    title: 'Director'
                }, {
                    name: 'Jackey',
                    university: 'Hunan Railway University',
                    avatar: '/wp-content/themes/xy/misc/member1.png',
                    desc: '10年的咨询经验，为您提供专业服务',
                    title: 'Director'
                }
            ];
            return {
                getAllMember: function () {
                    return member;
                }
            }
        }])
        .directive('imagePreload', ['ImageLoader', '$rootScope' ,'$timeout' ,function (ImageLoader, $rootScope, $timeout) {
            return {
                retrict: 'A',
                link: function (scope, element, attrs) {

                    var LoaderContainer = (function LoaderContainer () {
                        var html = [];
                        html.push('<div class="bg-loader"></div>');
                        html.push('<div class="loader-icon">');
                        html.push('<img src="/wp-content/themes/xy/misc/logo.png" />');
                        html.push('</div>');

                        var element = angular.element(html.join(''));

                        return {
                            getBgElement: function () {
                                return angular.element(document.getElementsByClassName('bg-loader'));
                            },
                            getIconElement: function () {
                                return angular.element(document.getElementsByClassName('loader-icon'));
                            },
                            destroy: function () {
                                this.getBgElement().css({opacity: 0});
                                $timeout(function() {
                                    element.remove();
                                }, 500);
                            },
                            element: element
                        }
                    })();

                    // 把加载对象加入到body中
                    element.append(LoaderContainer.element).css({opacity: 1});

                    $timeout(function () {
                        $rootScope.$evalAsync(function () {
                            // 刷选出所有图片
                            var imgs = [];
                            angular.forEach(angular.element(document).find('img'), function (img) {
                                var $img = angular.element(img);
                                imgs.push($img.attr('src'));
                            });
                            var loader = ImageLoader(imgs);
                            loader.finished(function () {
                                LoaderContainer.destroy();

                                $rootScope.$emit('ImagesLoaded');
                            });
                        });
                    }, 500);
                }
            };
        }])
        .directive('scrollHeader', [function () {
            return {
                restrict: 'A',
                link: function (scope, element, attr) {
                    var $element = angular.element(element),
                        $window = angular.element(window);

                    $window.scroll(function () {
                        var offsetH = $element.offset().top,
                            H = $element.outerHeight(),
                            wH = angular.element(window).height(),
                            wS = angular.element(window).scrollTop();

                        if (wS > offsetH) {
                            angular.element('body').addClass('scroll-header');
                        }
                        else {
                            angular.element('body').removeClass('scroll-header');
                        }
                    });
                }
            };
        }])
        .factory("ImageLoader", [function ($timeout) {

            function Loader(urls) {
                this._urls = urls;
                this._images = [];
                this._fcbks = [function () {}];
                this._icbks = [function () {}];
                this._faildcbks = [function() {}];
                this._countLoaded = 0;
                this._maxItem = this._urls.length;

                this._init();
            }
            angular.extend(Loader.prototype, {
                _init: function () {
                    var $loader = this;
                    angular.forEach(this._urls, function (url, index) {
                        var image = angular.element(new Image())
                            .bind('load', function() {
                                var $this = this,
                                    $arguments = arguments;
                                $loader._itemLoaded('load');
                            })
                            .bind('error', function() {
                                var $this = this,
                                    $arguments = arguments;
                                $loader._itemLoaded('error');
                            })
                            .attr('src', url);
                    });
                },
                _itemLoaded: function(type) {
                    this._countLoaded += 1;
                    if (type == 'load' ) {
                        angular.forEach(this._icbks, function(cb) {
                            cb(this._countLoaded);
                        });
                    }
                    else if (type == 'error') {
                        angular.forEach(this._faildcbks, function(cb) {
                            cb(this._countLoaded);
                        });
                    }

                    if (this._countLoaded == this._maxItem) {
                        angular.forEach(this._fcbks, function(cb) {
                            cb(this._countLoaded);
                        });
                    }
                },
                finished: function (cb) {
                    if (!cb) return this._fcbks;
                    this._fcbks.push(cb);

                },
                itemLoad: function() {
                    if (!cb) return this._icbks;
                    this._icbks.push(cb);
                },
                itemFailed: function () {
                    if (!cb) return this._faildcbks;
                    this._faildcbks.push(cb);
                }
            });

            return function (urls) {
                return new Loader(urls);
            };
        }])
        .controller('XYController' , ['$scope', '$rootScope' ,'ngDialog', 'TeamMember' ,function ($scope, $rootScope ,$ngDialog, $TeamMember) {

            $scope.init = function () {
                window.sr = new scrollReveal();
            };

            $scope.showContactSocialPopup = function ($event) {
                $event.preventDefault();
                $ngDialog.open({
                    template: 'contactSocialTpl',
                    plain: false,
                    controller: 'XYController',
                    scope: $scope
                });
            };

            $scope.members = $TeamMember.getAllMember();

            $rootScope.$on('ImagesLoaded', function () {
                $scope.init();
            });

            $scope.businessHover = function ($event) {
                var $element = angular.element($event.target);
                $element.addClass('hover-on-it');
            };
    }]);

    angular.element(document).ready(function () {
        angular.bootstrap(document, ['xy']);
    });
});
