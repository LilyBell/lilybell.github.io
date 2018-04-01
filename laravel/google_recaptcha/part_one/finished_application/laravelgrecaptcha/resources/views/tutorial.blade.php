@extends('app')
@section('content')
<div class="container">
    <div class="pref-text">
        <a href="https://www.patreon.com/lilybell">Click here to support me!</a><br>
        <h2>Google reCaptcha in Laravel 5</h2>
        <p>For quite some time now Google reCaptcha has been the most advanced and easy to use reCaptcha option. In addition
            to keeping websites and forms safe from malicious intent it is also being used to digitize text, annotate images,
            and build machine learning data sets.</p>
        <p>This tutorial will require Laravel 5 and a Google reCaptcha site key. Please make sure you meet all the
            <a href="https://symfony.com/doc/current/reference/requirements.html">dependency requirements</a> to create a Laravel 5 project.</p>
        <p>To being, open your terminal and navigate to the directory where you want to create your project. In my case, since I am
            using the JetBrains IDE PhpStorm, I am going to navigate to my project directory and create a new project with Laravel 5.
            It's important to note that you don't have to use PhpStorm. There are many other viable otpions to develop Symfony
            projects including Atom, Brackets, Sublime, Eclipse and Netbeans. Tou can also use vim, nano or emacs if you prefer
            working from the command line.</p>
    </div>
    <code><strong>cd ~/phpstormprojects && composer create-project symfony/website-skeleton symfonygrecaptcha && cd symfonygrecaptcha</strong></code>
    <div class="pref-text">
        <p>Now that we are in our new project directory it's time to get down to business.</p>
        <p>The first thing we want to do is get a site key for the Google reCaptcha API. <a href="https://www.google.com/recaptcha/intro/">Start here.</a></p>
        <ol class="list-group">
            <li class="list-group-item">Click on the "Get reCaptcha" button at the top</li>
            <li class="list-group-item">Fill in the form and check reCAPTCHA V2</li>
            <li class="list-group-item">The form will expand and ask you to register the domains that are associated with this app.</li>
        </ol>
        <div class="alert alert-info">
            It is very important to list all domains that your application might access the API from,
            Failure to do this will result in the API refusing requests from your application.
            When developing locally enter 127.0.0.1 for your domain.
        </div>
        <p>Next, what we want to do is create a base view template. These are useful for setting up content blocks as well as maintaining application wide dependencies.</p>
        <div class="card">
            <div class="card-body">
                <pre><span class="comment-location">/resources/views/app.blade.php</span>
                &#60;html&#62;
                &#60;head&#62;
                    &#60;title&#62;Google reCaptcha - Laravel 5.5&#60;/title&#62;
                &#60;/head&#62;
                &#60;body&#62;
                &#60;div class="container"&#62;
                    &#64;yield('content')
                &#60;/div&#62;
                &#60;/body&#62;
                &#60;/html&#62;</pre>
            </div>
        </div>
        <p>Now that we have our base template, we can create the view that we are going to display our form and the Google reCaptcha in.</p>
        <div class="card">
            <div class="card-body">
                <pre><span class="comment-location">/resources/views/index.blade.php</span>
                    &#64;extends('app')
                    &#64;section('content')
                    &#60;div id="grecaptcha"&#62;
                        &#60;h3&#62;I'm a Google reCaptcha challenge!&#60;/h3&#62;
                       &#60;/div&#62;
                    &#64;endsection
                </pre>
            </div>
        </div>
    </div>
    <div class="pref-text">
        <p>Now that you have the view where your reCaptcha challenge is going to live, go back to the reCaptcha page in your browser and locate
            the section that says <i>Client Side Integration</i>. You will find two lines of code there.</p>
        <code><strong>&#60;script src='https://www.google.com/recaptcha/api.js'&#62;&#60;/script&#62;</strong></code><br>
        <code><strong>&#60;div class="g-recaptcha" data-sitekey="YOUR SITE KEY HERE"&#62;&#60;/div&#62;</strong></code>
        <p>Where you put the first line of code depends entirely on whether or not you are going to use multiple
            instances of the reCaptcha challenge or a single validation. E.G.: a user registration form</p>

        <div class="card">
            <div class="card-title">Single Use</div>
            <div class="card-body">
                    <pre>
                        <span class="comment-location">/resources/views/index.blade.php</span>
                        &#64;extends('app')
                        &#64;section('content')
                        &#60;script src='https://www.google.com/recaptcha/api.js'&#62;&#60;/script&#62;
                        &#60;div id="grecaptcha"&#62;
                        &#60;h3&#62;I'm a Google reCaptcha challenge!&#60;/h3&#62;
                        &#60;div class="g-recaptcha" data-sitekey="6LdNWk4UAAAAAEYU26mm1LU_5AiXVkcaxcntGl3G"&#62;&#60;/div&#62;
                        &#60;/div&#62;
                        &#64;endsection
                        </pre>
            </div>
        </div>
        <div class="card">
            <div class="card-title">Global Use</div>
            <div class="card-body">
                <pre><span class="comment-location">/resources/views/app.blade.php</span>
                    &#60;html&#62;
                    &#60;head&#62;
                        &#60;title&#62;Google reCaptcha - Laravel 5.5&#60;/title&#62;
                    &#60;/head&#62;
                    &#60;body&#62;
                    &#60;div class="container"&#62;
                        &#64;yield('content')
                    &#60;/div&#62;
                    &#60;script src='https://www.google.com/recaptcha/api.js'&#62;&#60;/script&#62;
                    &#60;/body&#62;
                    &#60;/html&#62;
                </pre>

            </div>
        </div>
        <div class="alert alert-warning">
            You should only use one of the above options. Using both runs the risk of the reCaptcha challenge not functioning.
        </div>
        <p>Success! The reCaptcha is now ready for use!</p>
        <img src="https://i.imgur.com/TNiseSd.png">
        <p>In the next tutorial we will cover how to use the reCaptcha challenge to validate a user registration form</p>
    </div>
</div>
    @endsection