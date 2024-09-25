<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <style>
        </style>
    </head>
    <body class="antialiased">
        <?php
            $pdf_mjs = asset('assets/library/javascript/PDF/pdf.mjs');
            $pdf_worker_mjs = asset('assets/library/javascript/PDF/pdf.worker.mjs');
        ?>


        {{-- <script src="//mozilla.github.io/pdf.js/build/pdf.mjs" type="module"></script> --}}
        <script src="{{$pdf_mjs}}" type="module"></script>

        <script type="module">
        // If absolute URL from the remote server is provided, configure the CORS
        // header on that server.
        var url = '/temporary/test.pdf';

        // Loaded via <script> tag, create shortcut to access PDF.js exports.
        var { pdfjsLib } = globalThis;

        // The workerSrc property shall be specified.
        // pdfjsLib.GlobalWorkerOptions.workerSrc = '//mozilla.github.io/pdf.js/build/pdf.worker.mjs';
        pdfjsLib.GlobalWorkerOptions.workerSrc = '{{$pdf_worker_mjs}}';

        // Asynchronous download of PDF
        var loadingTask = pdfjsLib.getDocument(url);
        loadingTask.promise.then(function(pdf) {
            console.log('PDF loaded');

            // Fetch the first page
            var pageNumber = 1;
            pdf.getPage(pageNumber).then(function(page) {
            console.log('Page loaded');

            var scale = 1.5;
            var viewport = page.getViewport({scale: scale});

            // Variavel adicionada por mim, para personalizar margin extra a mais
            var extraMargimFooter = 150;

            // Prepare canvas using PDF page dimensions
            var canvas = document.getElementById('the-canvas');
            var context = canvas.getContext('2d');

            canvas.height = viewport.height + extraMargimFooter;
            canvas.width = viewport.width;








            // backgroun vermelho e margins
            context.fillStyle = '#7E181A';
            context.fillRect(0, 0, canvas.width, canvas.height);

            const largura = canvas.width;
            const altura = canvas.height + extraMargimFooter;
            const margem = 10;

            // Movendo o ponto de origem para dentro do canvas, criando margens
            context.translate(margem, margem + extraMargimFooter);

            // Redimensionando o canvas "interno" para ajustar às margens
            context.scale((largura - 2 * margem) / largura, (altura - 2 * margem) / altura);









            // Render PDF page into canvas context
            var renderContext = {
                canvasContext: context,
                viewport: viewport
            };
            var renderTask = page.render(renderContext);
            renderTask.promise.then(function () {
                console.log('Page rendered');
                putElements()
                downloadImage()
            });
            });
        }, function (reason) {
            // PDF loading error
            console.error(reason);
        });








        // Função para desenhar um retângulo



        function putElements() {
            // adicionando conteúdo no topo
            const canvas = document.getElementById('the-canvas');
            const context = canvas.getContext('2d');
            context.translate(0, -50);

            // fild codigo
            putField(canvas, context)

            // Linha Rodapé
            putBorderFooter(canvas, context);
        }

        function putField(canvas, context) {
            const field = {
                width: canvas.width / 3,
                height: 35,
                color: 'white',
                radius: 5 // Set the corner radius to 5 pixels
            }
            context.fillStyle = field.color;
            context.fillRect(field.width, -50, field.width, field.height);

            return context;
        }

        function putBorderFooter(canvas, context) {
            context.fillStyle = '#7E181A';
            context.fillRect(0, canvas.height - 103, canvas.width + 1, 10);
        }


        </script>

        <canvas id="the-canvas"></canvas>

        <script>
            function downloadImage() {
                // const canvas = document.getElementById('the-canvas');
                const canvas = document.getElementById('the-canvas');
                const dataURL = canvas.toDataURL('image/png'); // Você pode escolher outros formatos como JPEG

                // Criar um link temporário
                const link = document.createElement('a');
                link.href = dataURL;
                link.download = 'minha_imagem.png'; // Nome do arquivo a ser salvo

                // Simular um clique no link para iniciar o download
                // document.body.appendChild(link);
                // link.click();
                // document.body.removeChild(link);
            }
        </script>
    </body>
</html>
