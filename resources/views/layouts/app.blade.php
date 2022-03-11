<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{env('APP_NAME')}}</title>
    <link href="/style/css/bootstrap.min.css" rel="stylesheet">
    <link href="/style/css/plugins.css" rel="stylesheet">
    <link href="/style.css" rel="stylesheet">
    <link href="/style/css/color/blue.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Karla:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <link href="/style/type/icons.css" rel="stylesheet">
</head>
<body style="background-color: black">
    <main class="body-wrapper">
        @include('partials.navbar', ['navOpt' => $navOpt ?? ''])
        @yield('content')
        @include('partials.footer')
    </main>

    <script data-cfasync="false" src="https://demos.elemisthemes.com/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="style/js/jquery.min.js"></script> 
    <script src="style/js/bootstrap.min.js"></script> 
    <script src="style/js/plugins.js"></script> 
    <script src="style/js/classie.js"></script> 
    <script src="style/js/jquery.themepunch.tools.min.js"></script> 
    <script src="style/js/scripts.js"></script>
    <?php
        $category = \App\Models\Category::where([['name', '<>', 'homepage'], ['name', '<>', 'about']])->get('name')->toArray();
        $catNames = [];
        foreach ($category as $key => $name) {
            array_push($catNames,$name['name']);
        }

    ?>
    @if($includeScripts ?? '')
        <script>
            function updateFilter(filt){
                console.log(filt)
                document.querySelectorAll('.cbp-filter-item-active')[0].classList.remove('cbp-filter-item-active');
                document.querySelectorAll(`[data-filter='${filt}']`)[0].classList.add('cbp-filter-item-active');
                $("#js-grid-full-width").cubeportfolio('filter', filt);
            }
            
            @if(in_array(request()->get('filt'),$catNames))
            window.onload = ()=>{
                setTimeout(() => {
                    updateFilter('.' + "{{request()->get('filt')}}"); 
                }, 500);
            }
            @endif
            </script>
    @endif
</body>
</html>