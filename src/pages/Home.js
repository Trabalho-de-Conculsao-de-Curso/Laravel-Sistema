import React, { useState, useEffect } from 'react';
import api from '../services/api';

const Home = () => {
    const [products, setProducts] = useState([]);

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
        <div>
            <table className="min-w-full divide-y divide-gray-200">
                <thead className="bg-gray-50">
                    <tr>
                        <th className="py-2 px-3">ID</th>
                        <th className="py-2 px-3">Nome</th>
                        <th className="py-2 px-3">Especificações</th>
                        <th className="py-2 px-3">Valor</th>
                        <th className="py-2 px-3">Moeda</th>
                        <th className="py-2 px-3">Loja</th>
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
                        </tr>
                    ))}
                </tbody>
            </table>
        </div>
    );
}

export default Home;
