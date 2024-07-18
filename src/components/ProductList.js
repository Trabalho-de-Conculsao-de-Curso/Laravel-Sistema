import React from 'react';

const ProductList = ({ products }) => (
  <div className="overflow-x-auto">
    <table className="min-w-full border border-solid text-sm">
      <thead>
        <tr className="bg-gray-200">
          <th className="py-2 px-3">ID</th>
          <th className="py-2 px-3">Nome</th>
          <th className="py-2 px-3">Marca</th>
          <th className="py-2 px-3">Especificação</th>
          <th className="py-2 px-3">Valor</th>
          <th className="py-2 px-3">Moeda</th>
          <th className="py-2 px-3">Lojas Online</th>
          <th className="py-2 px-3">URL Loja Online</th>
          <th className="py-2 px-3">Criado Em</th>
          <th className="py-2 px-3">Ações</th>
        </tr>
      </thead>
      <tbody>
        {products.map(product => (
          <tr key={product.id}>
            <td className="py-2 px-3">{product.id}</td>
            <td className="py-2 px-3">{product.nome}</td>
            <td className="py-2 px-3">{product.marca}</td>
            <td className="py-2 px-3">{product.especificacao}</td>
            <td className="py-2 px-3">{product.valor}</td>
            <td className="py-2 px-3">{product.moeda}</td>
            <td className="py-2 px-3">{product.lojaOnline}</td>
            <td className="py-2 px-3 max-w-xs truncate tooltip">
              <span className="tooltiptext">{product.urlLoja}</span>
              {product.urlLoja}
            </td>
            <td className="py-2 px-3">{product.createdAt}</td>
            <td className="py-2 px-3">
              <div className="border-blue-600 rounded mb-1">
                <button className="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm">Editar</button>
              </div>
              <button className="bg-red-500 hover:bg-red-700 text-white mt-2 font-bold py-2 px-3.5 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm">Excluir</button>
            </td>
          </tr>
        ))}
      </tbody>
    </table>
  </div>
);

export default ProductList;
