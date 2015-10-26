(function (runner) {
    runner();
})(function () {

    angular.module('xy', ['ngDialog'])
        .controller('XYController' , ['$scope', 'ngDialog' ,function ($scope, $ngDialog) {

            $scope.init = function () {
                window.sr = new scrollReveal();
            };

            $scope.showContactSocialPopup = function () {
                $ngDialog.open({
                    template: 'contactSocialTpl',
                    plain: false,
                    controller: 'XYController',
                    scope: $scope
                });
            };

    }]);

    angular.element(document).ready(function () {
        angular.bootstrap(document, ['xy']);
    });
});
