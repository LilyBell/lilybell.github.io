[Click here to support](https://www.patreon.com/lilybell)







# Google reCaptcha in Symfony 4

For quite some time now Google reCaptcha has been the most advanced and easy to use reCaptcha option available. In addition to keeping
websites and forms safe from malicious software it is also being used to digitize text, annotate images, and build machine learning data sets.

This tutorial will require Laravel 5.5 and a Google reCaptcha site key. Please make sure you meet all the dependency [requirements](https://symfony.com/doc/current/reference/requirements.html) to create a
Laravel 5.5 project.

To begin, open your terminal and navigate to the directory where you want to create your project. In my case, since I am using the JetBrains IDE
PhpStorm, I am going to navigate to my project directory and create a new project with Laravel. It's important to note that you don't have to use PhpStorm.
There are many other viable options to develop Laravel projects including [Atom](https://atom.io), [Brackets](http://brackets.io), [Sublime](https://www.sublimetext.com), [Eclipse](https://www.eclipse.org) and [Netbeans](https://netbeans.org). 
You can also use [vim](https://www.vim.org), [nano](https://www.nano-editor.org) or [emacs](https://www.gnu.org/software/emacs) if you prefer working from the command line. 

```Bash
cd ~/PhpStormProjects && composer create-project symfony/website-skeleton symfonygrecaptcha && cd symfonygrecaptcha
```

Now that we are in our new project directory it's time to get down to business. 

The first thing we want to do is get a site key for the Google reCaptcha API.

[Start Here](https://www.google.com/recaptcha/intro/)

1. Click on the "Get reCaptcha" button at the top
2. Fill in the form and check reCAPTCHA V2
3. The form will expand and ask you to register the domains that are associated with this app.

> **It is very important to list all domains that your application might access the API from,**
> **Failure to do this will result in the API refusing requests from your application.**

> When developing locally enter 127.0.0.1 for your domain

Next, what we want to do is create a base view template. These are useful for setting up content blocks as well as maintaining
application wide dependencies.

```Twig
<!-- templates/base.html.twig -->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>{% block title %}Welcome!{% endblock %}</title>
        {% block stylesheets %} {% endblock %}
    </head>
    <body>
        {% block body %}{% endblock %}
        {% block javascripts %}{% endblock %}
    </body>
</html>
```

Now that we have our base template, we can create the view that we are going to display our form and the Google reCaptcha in. 

```Twig
<!-- templates/index/index.html -->
{% extends 'base.html.twig' %}

{% block title %}{% endblock %}

{% block body %}
<div id="grecaptcha">
    <h3>I'm a Google reCaptcha!</h3>
</div>
{% endblock %}

{% block javascripts %}{% endblock %}
```

Now that you have the view where your reCaptcha challenge is going to live, go back to the reCaptcha page in your browser
and locate the section that says *Client Side Integration*. 
You will find two lines of code there.

```html
<script src='https://www.google.com/recaptcha/api.js'></script>
```

```html
<div class="g-recaptcha" data-sitekey="YOUR SITE KEY HERE"></div>
```

Where you put the first line of code depends entirely on whether or not you are going to use multiple instances of the
reCaptcha challenge or a single validation. E.G.: a user registration form

> **Single Use**
```Twig
<!-- templates/index.html.twig -->
{% extends 'base.html.twig' %}

{% block title %}Hello {{ controller_name }}!{% endblock %}

{% block body %}
<div id="grecaptcha">
    <h3>I'm a Google reCaptcha!</h3>
    <div class="g-recaptcha" data-sitekey="6LdNWk4UAAAAAEYU26mm1LU_5AiXVkcaxcntGl3G"></div>
</div>
{% endblock %}

{% block javascripts %}
<script src='https://www.google.com/recaptcha/api.js'></script>
{% endblock %}
```

> **Global Use**
```Twig
<!-- templates/base.html.twig -->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>{% block title %}Welcome!{% endblock %}</title>
        {% block stylesheets %} {% endblock %}
    </head>
    <body>
        {% block body %}{% endblock %}
        {% block javascripts %}
        <script src='https://www.google.com/recaptcha/api.js'></script>
        {% endblock %}
    </body>
</html>
```

```
ATTENTION
You should only use one of the above options. Using both runs the risk of the reCaptcha challenge not functioning
```
Success! The reCaptcha is now ready for use!

![Imgur](https://i.imgur.com/TNiseSd.png)

In the next tutorial we will cover how to use the reCaptcha challenge to validate a user registration form.