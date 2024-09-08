<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <style>
    .checked-background {
    background-color: #7e22ce; /* Cor roxa */
    color: white;
    }
    </style>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-zinc-900">
            @include('layouts.navigation')
        <div class="flex flex-1">
        <!-- Navbar -->
        <div class="bg-zinc-900 text-gray-200 w-64 p-4 border-r-2 border-gray-600 hidden md:block h-screen">
            <h2 class="text-2xl font-bold mb-6">Menu</h2>
            <ul>
                <li class="mb-4"><a href="#" class="text-lg hover:underline">Home</a></li>
                <li class="mb-4"><a href="#" class="text-lg hover:underline">Seleção de Softwares</a></li>
                <li class="mb-4"><a href="#" class="text-lg hover:underline">Configurações</a></li>
                <li class="mb-4"><a href="#" class="text-lg hover:underline">Ajuda</a></li>
            </ul>
        </div>

        <!-- Conteúdo Principal com ajuste para responsividade -->
        <div class="flex-1 container mx-auto py-8">
            <div class="block md:hidden mb-4">
                <button id="menu-btn" class="text-gray-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>

            <div id="mobile-menu" class="bg-zinc-900 text-gray-200 p-4 border-r-2 border-gray-600 fixed top-0 left-0 w-64 h-full transform -translate-x-full md:hidden">
                <h2 class="text-2xl font-bold mb-6">Menu</h2>
                <ul>
                    <li class="mb-4"><a href="#" class="text-lg hover:underline">Home</a></li>
                    <li class="mb-4"><a href="#" class="text-lg hover:underline">Seleção de Softwares</a></li>
                    <li class="mb-4"><a href="#" class="text-lg hover:underline">Configurações</a></li>
                    <li class="mb-4"><a href="#" class="text-lg hover:underline">Ajuda</a></li>
                </ul>
            </div>

            <div class="flex flex-col md:flex-row">
                <div class="md:flex-1 ml-20 mr-20 md:ml-55 p-3">
                <h1 class="text-3xl font-bold mb-0 text-zinc-200">Encontre o Hardware Ideal para Seus Softwares</h1>
                <h1 class="text-3xl mb-10 font-bold bg-gradient-to-r from-blue-600 via-indigo-800 via-purple-700 to-purple-900 text-transparent bg-clip-text">
                Conectando Tecnologia com Precisão
                </h1>
                <div class="p-5 grid grid-cols-1 gap-4 md:grid-cols-3 lg:grid-cols-6 text-slate-200">
                    <div class="flex justify-start items-center border-2 rounded-md border-purple-700">
                        <img src="{{ asset('images/csgo2.png') }}" alt="Descrição da imagem" class="w-8 h-8 object-cover">
                        <span class="ml-2">Counter Strike</span>
                    </div>
                    <div class="flex justify-start items-center border-2 rounded-md border-purple-700">
                        <img src="{{ asset('images/pubg.jpg') }}" alt="Descrição da imagem" class="w-12 h-8 object-cover">
                        <span class="ml-5">PUBG</span>
                    </div>
                    <div class="flex justify-start items-center border-2 rounded-md border-purple-700">
                        <img src="{{ asset('images/valorant.png') }}" alt="Descrição da imagem" class="w-12 h-8 object-cover">
                        <span class="ml-5">Valorant</span>
                    </div>
                    <div class="flex justify-start items-center border-2 rounded-md border-purple-700">
                        <img src="{{ asset('images/rockstar.jpg') }}" alt="Descrição da imagem" class="w-12 h-8 object-cover rounded-sm">
                        <span class="ml-5">GTA V</span>
                    </div>
                    <div class="flex justify-start items-center border-2 rounded-md border-purple-700">
                        <img src="{{ asset('images/minecraft.jpg') }}" alt="Descrição da imagem" class="w-12 h-8 object-cover">
                        <span class="ml-4">Minecraft</span>
                    </div>
                    <div class="flex justify-start items-center border-2 rounded-md border-purple-700">
                        <img src="{{ asset('images/vs-code-logo.png') }}" alt="Descrição da imagem" class="w-12 h-8 object-cover">
                        <span class="ml-4">VS Code</span>
                    </div>
                </div>
                    <div class="text-slate-200">
                        <form id="software-selection-form" action="{{ auth()->check() ? route('home.selecionar') : route('free.selecionar') }}" method="POST" class="bg-zinc-800 relative rounded-lg shadow p-6 border border-gray-600" onsubmit="validateForm(event)">
                            @csrf
                            <h2 class="text-2xl font-semibold mb-4">Selecione os Softwares Desejados:</h2>
                            <div class="mb-6 grid grid-cols-1 md:grid-cols-3 gap-6">
                                <!-- Coluna de Jogos -->
                                <div>
                                    <h3 class="text-xl font-semibold mb-4">Jogos</h3>
                                    @foreach($softwares as $software)
                                        @if($software->tipo == 1)
                                            <div id="checkboxDiv{{ $software->id }}" class="flex items-center mb-2 p-2 rounded-sm border-2 transition duration-300">
                                                <input type="checkbox" id="software{{ $software->id }}" name="softwares[]" value="{{ $software->id }}" class="checkbox hidden">
                                                <label for="software{{ $software->id }}" class="ml-2 text-lg cursor-pointer flex-1">{{ $software->nome }}</label>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                                <!-- Coluna de Trabalho -->
                                <div>
                                    <h3 class="text-xl font-semibold mb-4">Trabalho</h3>
                                    @foreach($softwares as $software)
                                        @if($software->tipo == 2)
                                        <div id="checkboxDiv{{ $software->id }}" class="flex items-center mb-2 p-2 rounded-sm border-2 transition duration-300">
                                                <input type="checkbox" id="software{{ $software->id }}" name="softwares[]" value="{{ $software->id }}" class="checkbox hidden">
                                                <label for="software{{ $software->id }}" class="ml-2 text-lg cursor-pointer flex-1">{{ $software->nome }}</label>
                                        </div>
                                        @endif
                                    @endforeach
                                </div>
                                <!-- Coluna de Dispositivos -->
                                <div>
                                    <h3 class="text-xl font-semibold mb-4">Dispositivos</h3>
                                    @foreach($softwares as $software)
                                        @if($software->tipo == 3)
                                            <div id="checkboxDiv{{ $software->id }}" class="flex items-center mb-2 p-2 rounded-sm border-2 transition duration-300">
                                                <input type="checkbox" id="software{{ $software->id }}" name="softwares[]" value="{{ $software->id }}" class="checkbox hidden">
                                                <label for="software{{ $software->id }}" class="ml-2 text-lg cursor-pointer flex-1">{{ $software->nome }}</label>
                                            </div>
                                        @endif
                                    @endforeach

                                </div>
                            </div>
                            <!-- Botão de Submissão -->
                            <button type="submit" class="bg-purple-800 text-white py-2 px-4 rounded hover:bg-purple-600 transition duration-300">Selecionar Softwares</button>

                            <!-- Animação de Carregamento -->
                            <div id="loading-spinner" class="absolute inset-0 bg-zinc-800 flex flex-col items-center justify-center z-10 hidden rounded-sm">
                                <div class="inline-block w-42 h-36 mb-4">
                                    <img src="{{ asset('images/gif-minecraft.gif') }}" alt="Descrição da imagem" class="object-cover w-42 h-36 rounded-sm">
                                </div>
                                <p class="text-white text-lg">Aguarde, seu setup está sendo montado...</p>
                            </div>
                        </form>
                         <div id="desktops-container"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{--<script>
    document.addEventListener('DOMContentLoaded', function () {
// Seleciona todos os checkboxes e suas divs pai
const checkboxes = document.querySelectorAll('.checkbox');

// Função para atualizar a cor da div com base no estado dos checkboxes
function updateDivColor() {
    checkboxes.forEach(checkbox => {
        const div = document.querySelector(`#checkboxDiv${checkbox.value}`);
        if (checkbox.checked) {
            div.classList.add('checked-background');
        } else {
            div.classList.remove('checked-background');
        }
    });
}

// Adiciona o evento de mudança para todos os checkboxes
checkboxes.forEach(checkbox => {
    checkbox.addEventListener('change', updateDivColor);
});

// Atualiza a cor da div ao carregar a página, para o estado inicial dos checkboxes
updateDivColor();
});


    // Toggle mobile menu
    document.getElementById('menu-btn').addEventListener('click', function() {
        var menu = document.getElementById('mobile-menu');
        menu.classList.toggle('-translate-x-full');
    });

    function toggleDetails(id) {
        var details = document.getElementById('details-' + id);
        if (details.style.display === 'none') {
            details.style.display = 'block';
        } else {
            details.style.display = 'none';
        }
    }

    function validateForm(event) {
        var checkboxes = document.querySelectorAll('input[name="softwares[]"]');
        var isChecked = Array.from(checkboxes).some(checkbox => checkbox.checked);

        if (!isChecked) {
            event.preventDefault();
            alert("Por favor, selecione pelo menos um software.");
        }
    }

    document.getElementById('software-selection-form').addEventListener('submit', function(event) {
    event.preventDefault();

    var loadingSpinner = document.getElementById('loading-spinner');
    loadingSpinner.classList.remove('hidden');

    var formData = new FormData(this);

    fetch('{{ route("home.selecionar") }}', {
        method: 'POST',
        body: formData,
        /*headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}' // Inclua o token CSRF se necessário
        }*/
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok ' + response.statusText);
        }
        return response.json();
    })
    .then(data => {
        loadingSpinner.classList.add('hidden');

        console.log('Dados recebidos:', data);
        alert("Softwares selecionados com sucesso!");

        if (data.desktops && Array.isArray(data.desktops)) {
            console.log('Desktops recebidos:', data.desktops);

            // Esconde o formulário
            var formContainer = document.getElementById('software-selection-form');
            formContainer.style.display = 'none';

            const desktopsContainer = document.getElementById('desktops-container');

            desktopsContainer.innerHTML = ''; // Limpa o conteúdo anterior

            data.desktops.forEach(desktop => {
                const desktopItem = document.createElement('div');

                desktopItem.classList.add('desktop-item', 'bg-zinc-800', 'p-4', 'rounded-lg', 'shadow', 'mb-4');

                desktopItem.innerHTML = `
                    <h3 class="text-xl font-semibold mb-2">Categoria: ${desktop.categoria}</h3>
                    <p><strong>CPU:</strong> ${desktop.componentes.CPU}</p>
                    <p><strong>Cooler:</strong> ${desktop.componentes.Cooler}</p>
                    <p><strong>Fonte:</strong> ${desktop.componentes.Fonte}</p>
                    <p><strong>GPU:</strong> ${desktop.componentes.GPU}</p>
                    <p><strong>HD:</strong> ${desktop.componentes.HD}</p>
                    <p><strong>MOTHERBOARD:</strong> ${desktop.componentes.MOTHERBOARD}</p>
                    <p><strong>RAM:</strong> ${desktop.componentes.RAM}</p>
                    <div class="border-1">
                        <button type="submit" class="bg-purple-800 text-white py-2 px-4 rounded hover:bg-purple-600 transition duration-300">Assine o Premium</button>
                    </div>
                `;

                desktopsContainer.appendChild(desktopItem);

            });

            desktopsContainer.style.display = 'block'; // Assegura que o container esteja visível
            console.log('Desktops exibidos com sucesso.');
        } else {
            console.error('Dados recebidos não estão no formato esperado:', data);
        }
    })
});

</script>  --}}
    </div>
</body>
</html>
