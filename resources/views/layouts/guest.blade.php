<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="utf-8">
    <title>Achievers Town: Social Media Connections</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Achievers Town Wild Wild West of social media where people share content about the roulette wheel of life in Achievers Town."/>
   <meta name="keywords" content="achievers, town, social media, share content, content, roulette wheel, roulette, wheel">
   <meta name="author" content="Mark Hayes">
   <meta name="robots" content="index, follow">
   <meta name="revisit-after" content="1 Week">
   <meta name="language" content="EN">
   <meta name="copyright" content="Achievers Town">
   <meta name="rating" content="general">
   <meta name="generator" content="FreeWebSubmission.com Meta Tag Generator">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="{{ asset('plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/bootstrap/css/bootstrap-theme.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/guest.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bsUtility.css') }}" rel="stylesheet">

    <link rel="shortcut icon" href="{{asset('images/guest_logo.png')}}" />
    <link rel="apple-touch-icon" href="{{asset('images/guest_logo.png')}}" />
    
    <script src="{{asset('js/particles.js')}}"></script>
    <script>
        /* particlesJS.load(@dom-id, @path-json, @callback (optional)); */
        particlesJS.load('particles-js', '{{asset('js/particles.json')}}', function() {
          console.log('callback - particles.js config loaded');
        });
    </script>
</head>

<body>
    <div style="height:100%" id="particles-js">

    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-5 pt-5 mt-5 text-center lead text-white">
                <a href="{{ url('/') }}" class="mt-0 pt-0">
                    <img width="300px" src="{{ asset('images/guest_logo.png') }}" class="mt-0 pt-0" alt="" />
                </a><br>
                <b><p>
                    Achievers Town Wild Wild West of social media where people share content about the roulette wheel of life in Achievers Town.</br></br>
                    Achievers Town a source for connections and communications.</b>
                    The Future's Bright.</br> The Future's <b>Achievers Town</b>.
                </p>

            </div>
            <div class="col-md-1">

            </div>

            <div class="col-md-6">


                <div class="tab_container">
                    <input id="tab1" type="radio" name="tabs" {{ old('tab') != 'register' ? 'checked' : '' }}
                        class="radio_hidden">
                    <label for="tab1" class="head"><i class="fa fa-user"></i><span>LOGIN</span></label>

                    <input id="tab2" type="radio" name="tabs" {{ old('tab') == 'register' ? 'checked' : '' }}
                        class="radio_hidden">
                    <label for="tab2" class="head"><i class="fa fa-user-plus"></i><span>SIGN UP</span></label>

                    <div class="contents">
                        <section id="content1" class="tab-content">

                            @include('auth.login')

                        </section>

                        <section id="content2" class="tab-content">
                            @include('auth.register')

                        </section>
                    </div>
                </div>



            </div>

        </div>


        @include('widgets.footer')
    </div>


    <!-- Scripts -->
    <script src="{{ asset('plugins/jquery/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script>



<!-- Default Statcounter code for Achievers Town
http://achieverstown.com./ -->
<script type="text/javascript">
var sc_project=12171005; 
var sc_invisible=1; 
var sc_security="d85e379f"; 
</script>
<script type="text/javascript"
src="https://www.statcounter.com/counter/counter.js"
async></script>
<noscript><div class="statcounter"><a title="Web Analytics
Made Easy - StatCounter" href="https://statcounter.com/"
target="_blank"><img class="statcounter"
src="https://c.statcounter.com/12171005/0/d85e379f/1/"
alt="Web Analytics Made Easy -
StatCounter"></a></div></noscript>
<!-- End of Statcounter Code -->



</body>

</html>