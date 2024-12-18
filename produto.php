<?php
if (isset($_GET['id'])) {
    $produtoId = $_GET['id'];
}

require 'dados.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopninel</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <link rel="stylesheet" href="/swiper.css">
</head>

<body class="tracking-wide">
    <header>
        <nav class="bg-zinc-900 text-center">
            <div id="logo"
                class="text-5xl uppercase text-emerald-900 py-4
                       hover:animate-pulse cursor-pointer">
                <a href="#">shopninel</a>
            </div>
            <ul class="sm:text-sm text-[0.6rem] text-gray-950 bg-zinc-50 uppercase font-bold flex">
                <li class="cursor-pointer py-2 w-1/4
                           hover:duration-500 hover:bg-zinc-800 hover:text-gray-200">
                    <a href="#">Camisetas</a>
                </li>
                <li class="cursor-pointer py-2 w-1/4
                           hover:duration-500 hover:bg-zinc-800 hover:text-gray-200">
                    <a href="#">Moletons</a>
                </li>
                <li class="cursor-pointer py-2 w-1/4
                           hover:duration-500 hover:bg-zinc-800 hover:text-gray-200">
                    <a href="#">Calças</a>
                </li>
                <li class="cursor-pointer py-2 w-1/4
                           hover:duration-500 hover:bg-zinc-800 hover:text-gray-200">
                    <a href="#">Bermudas</a>
                </li>
            </ul>
        </nav>
    </header>

    <main class="lg:px-[4vh]">
        <section class="w-full lg:flex justify-center">
            <div class="flex w-full lg:w-1/2 justify-center lg:py-[6vh]">
                <div class="swiper bannerProductImg h-full lg:h-[80vh]">
                    <div class="swiper-wrapper lg:ml-[4vh]">
                        <div class="swiper-slide">
                            <img src="/img/camisaBolovo.png" class="h-full">
                        </div>
                        <div class="swiper-slide">
                            <img src="/img/camisaBolovo2.png" class="h-full">
                        </div>
                        <div class="swiper-slide">
                            <img src="/img/camisaBolovo.png" class="h-full">
                        </div>
                        <div class="swiper-slide">
                            <img src="/img/camisaBolovo.png" class="h-full">
                        </div>
                    </div>
                    <div class="swiper-pagination">
                        <span class="swiper-pagination-progressbar-fill"></span>
                    </div>
                </div>
            </div>
            <?php foreach ($produtos as $produto): ?>
                <?php if ($produto['id'] ==  $produtoId): ?>
                    <div class="flex flex-col lg:w-1/3 mt-[8vh] px-[4vh]">
                        <h2 class="text-md font-semibold"><?= $produto['nome'] ?></h2>
                        <span class="text-md"><?= $produto['preco'] ?></span>
                        <ul class="flex justify-between py-[4vh] uppercase text-sm">
                            <?php foreach ($produto['medidas']['tamanhos'] as $tamanhos): ?>
                                <li tabindex="0" class="border hover:border-gray-200 rounded-lg px-2 cursor-pointer focus:bg-gray-900 focus:text-gray-50"><?= $tamanhos ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <button class="w-full border-2 border-gray-900 rounded-xl border-gray-900 p-1 hover:bg-gray-900 hover:text-gray-50 font-medium uppercase">comprar</button>
                        <div class="flex flex-col pt-[4vh]">
                            <p class="text-sm"><?= $produto['descricao'] ?></p>
                            <p class="text-sm"><?= $produto['tags'] ?></p>
                            <p class="uppercase pt-4"><?= $produto['fabricacao'] ?></p>
                        </div>
                        <ul class="flex uppercase gap-4 mt-[3vh]">
                            <li id="medidas" class="cursor-pointer">medidas</li>
                            <li id="composicao" class="cursor-pointer">composição</li>
                            <li id="lavagem" class="cursor-pointer">lavagem</li>
                        </ul>

                        <div class="my-6">
                            <table id="medidasProduto" class="hidden w-full uppercase text-[0.6rem]">
                                <thead>
                                    <tr class="text-sm">
                                        <th class="p-1 text-left"></th>
                                        <?php foreach ($produto['medidas']['tamanhos'] as $tamanhos): ?>
                                            <th class="p-1 text-center"><?= $tamanhos ?></th>
                                        <?php endforeach; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="border border-black p-1 text-left">Peito</td>
                                        <?php foreach ($produto['medidas']['peito'] as $peito): ?>
                                            <td class="border border-black p-1 text-center"><?= $peito ?></td>
                                        <?php endforeach; ?>
                                    </tr>
                                    <tr>
                                        <td class="border border-black p-1 text-left">Comprimento</td>
                                        <?php foreach ($produto['medidas']['comprimento'] as $comprimento): ?>
                                            <td class="border border-black p-1 text-center"><?= $comprimento ?></td>
                                        <?php endforeach; ?>
                                    </tr>
                                    <tr>
                                        <td class="border border-black p-1 text-left">Manga</td>
                                        <?php foreach ($produto['medidas']['manga'] as $manga): ?>
                                            <td class="border border-black p-1 text-center"><?= $manga ?></td>
                                        <?php endforeach; ?>
                                    </tr>
                                </tbody>
                            </table>

                            <div id="composicaoPorduto" class="hidden space-y-1 text-sm">
                                <?php foreach ($produto['composicao'] as $composicao): ?>
                                    <p><?= $composicao ?></p>
                                <?php endforeach; ?>
                            </div>

                            <div id="lavagemProduto" class="hidden text-sm">
                                <p><?= $produto['lavagem'] ?></p>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </section>

        <section class="swiper bannerBestSellers my-[6vh]">
            <h2 class="text-[1.5vh] font-bold text-gray-900 uppercase mb-[2vh]">Mais vendidos</h2>
            <div class="swiper-wrapper flex items-center h-full w-full">
                <article class="swiper-slide flex w-[calc(25%)] justify-around cursor-pointer">
                    <div class="w-full">
                        <div class="relative h-[45vw] sm:h-[35vw] md:h-[30vw] lg:h-[25vw]">
                            <img src="/img/bolovoFrente2.png" alt="Imagem da frente" class="absolute inset-0 w-full h-full object-cover transition-opacity duration-500 hover:opacity-0">
                            <img src="/img/bolovoCostas2.png" alt="Imagem de costas" class="absolute inset-0 w-full h-full object-cover transition-opacity duration-500 opacity-0 hover:opacity-100">
                        </div>
                        <div class="flex flex-col sm:flex-row justify-between uppercase sm:text-[1.4vh] text-[1vh] text-zinc-800 py-[0.5vh]">
                            <h2 class="font-bold">Camisa High Street</h2>
                            <p>R$270,90</p>
                        </div>
                    </div>
                </article>
            </div>
            <button class="swiper-button-next nextBannerBestSellers">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                </svg>
            </button>
            <button class="swiper-button-prev prevBannerBestSellers">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75 3 12m0 0 3.75-3.75M3 12h18" />
                </svg>
            </button>
        </section>
    </main>

    <footer class="mt-[10vh] bg-gray-900 p-[2vh] text-gray-400 text-center space-y-[2vh]">
        <div class="text-center text-[6vh] uppercase max-w-screen-lg mx-auto">
            <a href="#" class="text-emerald-900" id="logo">shopninel</a>
            <div class="text-center text-[1.3vh] font-normal">
                Desde 2001, a Shopninel inspira autenticidade e estilo.
                Mais que moda, criamos conexões e peças que convidam você a explorar o mundo com confiança.
                Aprendemos que viver intensamente faz toda a diferença.
                <br> - Wear Your Story.
            </div>
        </div>

        <ul class="font-semibold text-center">
            <li class="text-center text-[3vh] uppercase text-emerald-900 mb-[1vh]">Fale conosco</li>
            <li class="text-[1.3vh]">
                INSTAGRAM: <span class="text-gray-400 ml-2">@bruno_i79</span>
            </li>
            <li class="text-[1.3vh]">
                WHATSAPP: <span class="text-gray-400 ml-2">(11) 99999-9999</span>
            </li>
            <li class="text-[1.3vh]">
                EMAIL: <span class="text-gray-400 ml-2">contato@shopininel.com</span>
            </li>
        </ul>
        <p class="text-center text-gray-400 text-[1.2vh] mt-4">
            © SHOPNINEL | BRNO - TECNOLOGIA EM ECOMMERCE | CNPJ: 77779999/0001-99
        </p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="/script.js"></script>
</body>

</html>