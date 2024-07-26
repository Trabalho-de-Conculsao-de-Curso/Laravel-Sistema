import React from 'react';

const ProductForm = () => (
  <form className="flex items-center mb-4">
    <input type="text" name="search" placeholder="Procurar produto" className="border rounded-l py-2 px-3 focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm" />
    <button type="submit" className="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-r focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm">Search</button>
  </form>
);

export default ProductForm;
