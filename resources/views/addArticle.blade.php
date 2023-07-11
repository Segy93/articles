<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Articles</title>
        @viteReactRefresh
        @vite('resources/js/addArticle.js')
    </head>
    <body>
    <h2 style="text-align: center">Add article</h2>
        <div id="root">
        </div>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/react/umd/react.production.min.js" crossorigin></script>
    <script
    src="https://cdn.jsdelivr.net/npm/react-dom/umd/react-dom.production.min.js"
    crossorigin></script>

    <script
    src="https://cdn.jsdelivr.net/npm/react-bootstrap@next/dist/react-bootstrap.min.js"
    crossorigin></script>
</html>
