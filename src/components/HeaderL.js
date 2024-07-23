import React from 'react';
import { Link } from 'react-router-dom';

const Header = () => (
  <header className="py-4 text-center">
    <h1 className="text-2xl font-bold mb-4">Lista de Produtos</h1>
    <div className="flex justify-between items-center">
      <Link to="/" className="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm">
        Home
      </Link>
      <Link to="/create" className="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm">
        Cadastrar Novo Produto
      </Link>
    </div>
  </header>
);

export default Header;
