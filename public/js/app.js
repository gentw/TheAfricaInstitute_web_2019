'use strict'

var app = angular.module('alrayan1', ['ngSanitize']);

app.config(['$httpProvider', '$interpolateProvider', function($httpProvider, $interpolateProvider) {
    $httpProvider.defaults.useXDomain = true;
    delete $httpProvider.defaults.headers.common['X-Requested-With'];

    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');

}
]);

app.run(function($rootScope, $http, $timeout) {
    
    // new WOW().init();
    $timeout(function () {
        var owl = $('.gallery_carousel');
        owl.owlCarousel({
          items:3,
          loop:true,
          margin:10,
          center: false,
          dots: true,
          autoplay:true,
          autoplayTimeout:3000,
          autoplayHoverPause:true,
          responsive:{
          0:{
              items:1,
              nav:false,
          },
          600:{
              items:3,
          },
          1000:{
              items:2,
          }
        }
      });
  
      }, 1000)

    $rootScope.globalRequest = {
        "global":[     
            {
                "type":"gallery_main",
                "limit": 'all'
            },  
            {
                "type":"video_main",
                "limit": 'all'
            },
            {
                "type":"second_about",
                "limit": 'all'
            },
            {
                "type":"team_members",
                "limit": 'all'
            },
            {
                "type":"f_career",
                "limit": 'all'
            },
        ]
    };

    $http({
        method: 'POST',
        url: '/websites/api/global',
        data: $rootScope.globalRequest,
    }).then(function (response) {

        $rootScope.includes = response.data;

        console.log($rootScope.includes);

    });
});

app.controller("HeaderCtrl", function ($scope, $http, $log, $window) {

    $scope.isSending = false;
    $scope.validateForm = false;
    $scope.sendingSuccesful = false;
    $scope.contact = {
        name: '',
        email: '',
        subject: '',
        phone: '',
        message: ''
    };

    $http({
        method:'GET',
        format: 'jsonp',
        url: "/websites/api/pages",
    }).then(function (response) {
        $scope.pages = response.data;
    });

    $scope.redirect = function ( slug) {
        var url = "http://" + $window.location.host + slug;
        $log.log(url);
        $window.location.href = url;
    };

    $scope.mailSubject = function (param) {
        $scope.contact.subject = param;
        console.log($scope.contact);
    };

    $scope.sendMail = function (contact) {

        if ($scope.hasNull($scope.contact)) {
            $scope.validateForm = true;
            $scope.isSending = false;
        } else {
            $scope.validateForm = false;
            $scope.isSending = true;
        }

        if ($scope.validateForm == false) {
            $http({
                method:'POST',
                format: 'jsonp',
                data: $scope.contact,
                url: "/send/mail",
            }).then(function (response) {
                $scope.isSending = false;
                $scope.sendingSuccesful = true;
            });
        }
    };

    $scope.hasNull = function (target) {
       for (var contact in target) {
            if (target[contact] == null || target[contact] == "")
                return true;
        }
        return false;
    };

    $scope.sendNewsletter = function (newsletter) {
        $http({
            method:'POST',
            format: 'jsonp',
            url: "/websites/api/pages",
        }).then(function (response) {
            $scope.pages = response.data;
        });
    };

});

// FILTERS

// app.filter('trustUrl' ,function ($sce) {
//     return function(url) {
//         return $sce.trustAsResourceUrl(url);
//     };
// });
//
app.filter('moment', function () {
    return function (input, momentFn /*, param1, param2, ...param n */) {
        var args = Array.prototype.slice.call(arguments, 2),
            momentObj = moment(input);
        return momentObj[momentFn].apply(momentObj, args);
    };
});