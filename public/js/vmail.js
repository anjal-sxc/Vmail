$(document).ready(function () {

    // sleep time expects milliseconds
    function sleep (time) {
        return new Promise((resolve) => setTimeout(resolve, time));
    }

    $('.nav-link').on('focus', function () {
       say($(this).text());
    });

    $('.dashboardLinks a').on('focus', function () {
        say($(this).text());
    });

    $('.navbar-brand').on('focus', function () {
        say('Home');
    });

    $('.signOut').on('focus', function () {
        say('Sign Out');
    });



    $('#layoutAuthentication').on('click', function () {
        say('Welcome to login page');
    });

    // $('#layoutCompose').on('click', function () {
    //     say('Welcome to email compose');
    // });


    $('#inputEmailAddress').on('focus', function () {
        say('Speak out your email address.');
    });

    $('#inputPassword').on('focus', function () {
        say('Speak out your password.');
    });

    $('#loginButton').on('focus', function () {
        say('Login.');
    });

    $('#registerButton').on('focus', function () {
        say('Register.');
    });

    $('input[name="name"]').on('focus', function () {
        say('Name');
        listenInput($('input[name="name"]'));

    });

    $('input[name="email"]').on('focus', function () {
        say('email user name');
        sleep(2000).then(() => {
            listenInput($('input[name="email"]'));
        });


    });

    $('input[name="password"]').on('focus', function () {
        say('password');
        listenInput($('input[name="password"]'));
    });

    $('input[name="password_confirmation"]').on('focus', function () {
        say('password confirmation');
        // Usage!
        sleep(2000).then(() => {
            listenInput($('input[name="password_confirmation"]'));
        });

    });



    $('#emailBody').on('focus', function () {
        say('Email Body: ');
        sleep(2000).then(() => {
            listenEmailBody();
        });

    });

    $('#emailSubject').on('focus', function () {
        say('Email subject ');
        sleep(2000).then(() => {
            listenEmailSubject();
        });

    });

    $('#emailTo').on('focus', function () {
        say('Email to ');
        sleep(2000).then(() => {
            listenEmailTo();
        });

    });

    $('#emailSend').on('focus', function () {
        sleep(2000).then(() => {

        });
        say('Send email');
    });

    $('.btn.btn-danger').on('focus', function () {
       say('Delete email');
    });

    $('.btn.btn-success').on('focus', function () {
        say('Restore email');
    });

    $('.emailDetails').on('click', function () {
       let email = $('.card-body').text();
       say(email);
    });

    $('.emailRow').on('focus', function () {
        let subject = $(this).children('td').eq(2).text();
        say('Email about '+subject);
    });

    $('.trashRow').on('focus', function () {
        let origin = $(this).children('td').eq(1).text();
        let subject = $(this).children('td').eq(2).text();
        say('Email form ' + origin + '. About ' + subject);
    });




});
