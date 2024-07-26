import React, { useState, useEffect } from 'react';

import Header from '../components/HeaderL';
import api from '../services/api';

const Home = () => {
    const [products, setProducts] = useState([]);

    async function handleEdit(id){
        console.log(`Editar item com ID: ${id}`);
    }

    async function handleDelete(id){
        console.log(`eXCLUIR item com ID: ${id}`);

        let res = await api.delete(`/produtos/${id}`,{
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
              }
        }
        );
        

        if(res.status === 200){
            console.log('produto deletado')
        }
    }

    async function getDados() {
        console.log("entrou getDados");

        try {
            let d = await api.get('/produtos');
            console.log(d.data); // Verifique o formato dos dados

            if (d.status === 200) {
                setProducts(d.data);
            } else {
                console.log("404");
            }
        } catch (error) {
            console.log("erro: " + error);
        }
    }

    useEffect(() => {
        getDados();
    }, []);

    return (
        <>
        <Header />
        <div className="flex items-center justify-center min-h-screen">
            
            <div className="w-full max-w-7xl">
                <table className="min-w-full divide-y divide-gray-200 border border-1">
                    <thead className="bg-gray-50">
                        <tr>
                            <th className="py-2 px-3">ID</th>
                            <th className="py-2 px-3">Nome</th>
                            <th className="py-2 px-3">Especificações</th>
                            <th className="py-2 px-3">Valor</th>
                            <th className="py-2 px-3">Moeda</th>
                            <th className="py-2 px-3">Loja</th>
                            <th className="py-2 px-3">Ações</th>
                        </tr>
                    </thead>
                    <tbody className="bg-white divide-y divide-gray-200">
                        {products.map(product => (
                            <tr key={product.id}>
                                <td className="py-2 px-3">{String(product.id)}</td>
                                <td className="py-2 px-3">{String(product.marca.nome)}</td>
                                <td className="py-2 px-3">{String(product.especificacoes.detalhes)}</td>
                                <td className="py-2 px-3">{String(product.preco.valor)}</td>
                                <td className="py-2 px-3">{String(product.preco.moeda)}</td>
                                <td className="py-2 px-3">{String(product.loja_online.nome)}</td>
                                <td className="py-2 px-3 flex flex-col items-end space-y-2">
                                    <button
                                        onClick={() => handleEdit(product.id)}
                                    className="bg-blue-500 text-white py-1 px-2.5 rounded">Editar</button>
                                    <button 
                                        onClick={() => handleDelete(product.id)}
                                    className="bg-red-500 text-white py-1 px-2 rounded">Excluir</button>
                                </td>
                            </tr>
                        ))}
                    </tbody>
                </table>
            </div>
        </div>
        </>
    );
}

export default Home;
