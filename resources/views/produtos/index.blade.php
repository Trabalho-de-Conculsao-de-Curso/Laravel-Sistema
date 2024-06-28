<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Crud das Entidades</title>
</head>
<body class="font-sans antialiased dark:bg-black dark:text-white/50">
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4 text-center">Lista de Produtos</h1>

        <div class="mb-4 flex justify-between items-center">
            <form action="{{ url('/produtos/search') }}" method="GET" class="flex items-center">
                <input type="text" name="search" placeholder="Procurar produto" class="border rounded-l py-2 px-3 focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-r focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm">Search</button>
            </form>

            <a href="/produtos/create" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm">Cadastrar Novo Produto</a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full border border-solid text-sm">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="py-2 px-3">ID</th>
                        <th class="py-2 px-3">Nome</th>
                        <th class="py-2 px-3">Marca</th>
                        <th class="py-2 px-3">Especificação</th>
                        <th class="py-2 px-3">Valor</th>
                        <th class="py-2 px-3">Moeda</th>
                        <th class="py-2 px-3">Lojas Online</th>
                        <th class="py-2 px-3">URL Loja Online</th>
                        <th class="py-2 px-3">Criado Em</th>
                        <th class="py-2 px-3">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($produtos as $produto)
                    <tr>
                        <td class="py-2 px-3">{{ $produto->id }}</td>
                        <td class="py-2 px-3">{{ $produto->nome }}</td>
                        <td class="py-2 px-3">{{ $produto->marca->nome }}</td>
                        <td class="py-2 px-3">{{ $produto->especificacoes->detalhes }}</td>
                        <td class="py-2 px-3">{{ $produto->preco->valor }}</td>
                        <td class="py-2 px-3">{{ $produto->preco->moeda }}</td>
                        <td class="py-2 px-3">{{ $produto->lojaOnline->nome }}</td>
                        <td class="py-2 px-3 max-w-xs truncate tooltip">
                            <span class="tooltiptext">{{ $produto->lojaOnline->urlLoja }}</span>
                            {{ $produto->lojaOnline->urlLoja }}
                        </td>
                        <td class="py-2 px-3">{{ $produto->created_at }}</td>
                        <td class="py-2 px-3">
                            <div class="border-solid border-2 border-blue-600 rounded mb-1">
                                <a href="{{ url("produtos/$produto->id/edit") }}" class="border-1 text-blue-500 hover:text-blue-100">Editar</a>
                            </div>
                           
                            <form method="POST" action="{{ url("produtos/$produto->id") }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                    class="text-white bg-red-800 hover:bg-red-600 focus:ring-4 
                                    focus:ring-blue-300 font-medium rounded-lg text-xs px-3 py-1.5 me-2 
                                    mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                                    onclick="return confirm('Tem certeza que deseja excluir? {{ $produto->nome }} ?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
