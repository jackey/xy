(function (runner) {
    runner();
})(function () {

    angular.module('xy', ['ngDialog'])
        .factory('TeamMember', ['$http', '$q' , function ($http, $q) {

            var defer = $q.defer();

            $http.get(ajaxurl+ '?action=team_member')
                .then(function (response) {
                    var member = response.data;
                    defer.resolve(member);
                }, function (response) {
                    defer.reject();
                });
            return defer.promise;
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
        .factory('ContactForm', ['$http', '$q', function ($http, $q) {
            return function (name, email, phone, type) {
                return $q(function (resovle, reject)  {
                    $http.post(ajaxurl+ '?action=submit_contact_form', {
                        name: name,
                        email: email,
                        phone: phone,
                        type: type
                    }).then(function (response) {
                        resovle();
                    },function () {
                        reject();
                    });
                });
            }
        }])
        .factory('BlogList', ['$http', '$q', function ($http, $q) {
           return function (term) {
                return $q(function (resolve, reject) {
                    var data = {};
                    if (term) data['term'] = term;
                    $http
                        .post(ajaxurl+ '?action=blog_list', data)
                        .then(function (response) {
                            resolve(response);
                        }, function (response) {
                            reject(response);
                        });
                });
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
        .controller('XYController' , ['$scope', '$rootScope', '$timeout' , 'ngDialog', 'TeamMember', 'ContactForm', 'BlogList' ,function (
            $scope,
            $rootScope ,
            $timeout,
            $ngDialog,
            TeamMember,
            ContactForm,
            BlogList) {

            $scope.members = [];
            $scope.blogs = [];

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

            $rootScope.$on('ImagesLoaded', function () {
                $scope.init();
            });

            $scope.businessHover = function ($event) {
                var $element = angular.element($event.target);
                $element.addClass('hover-on-it');
            };

            TeamMember.then(function (members) {
                angular.forEach(members, function (member) {
                    $scope.members.push(member);

                })
            });

            BlogList().then(function (response) {
                angular.forEach(response.data, function (blog) {
                    $scope.blogs.push(blog);
                });
            });

            $scope.$watch('email', function (newEmail) {
                var EMAIL_REGEXP = /^[a-z0-9!#$%&'*+/=?^_`{|}~.-]+@[a-z0-9]([a-z0-9-]*[a-z0-9])?(\.[a-z0-9]([a-z0-9-]*[a-z0-9])?)*$/i;
                if (newEmail
                    && newEmail.length
                    && EMAIL_REGEXP.test(newEmail)) {
                    // 邮件有效
                }
                else {

                }
            });

            $scope.submitContactForm = function($event) {
                $event.preventDefault();
                $element = angular.element($event.target);
                if ($element.prop('tagName') == 'SPAN') $element = $element.parent();

                $element.prop('disable', true);

                $element.find('.bnow').css({opacity: 0});
                $element.find('.bold').css({opacity: 1});

                $timeout(function() {
                    $element.find('span').removeAttr('style');
                }, 1000);

                ContactForm(
                    $scope.name,
                    $scope.phone,
                    $scope.email,
                    $scope.type
                ).then(function () {
                        $element.prop('disable', false);
                    });
            };
    }]);

    angular.element(document).ready(function () {
        angular.bootstrap(document, ['xy']);
    });
});
