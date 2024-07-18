import React, { useState, useEffect} from 'react';
import ProductList from '../components/ProductList';
import api from '../services/api'



const Home = () => {

    const products = [
        // Simulated product data
        { id: 1, nome: 'Produto 1', marca: 'Marca 1', especificacao: 'Especificação 1', valor: '10.00', moeda: 'USD', lojaOnline: 'Loja 1', urlLoja: 'http://loja1.com', createdAt: '2024-01-01' },
        { id: 2, nome: 'Produto 1', marca: 'Marca 1', especificacao: 'Especificação 1', valor: '10.00', moeda: 'USD', lojaOnline: 'Loja 1', urlLoja: 'http://loja1.com', createdAt: '2024-01-01' },
        // Add more products as needed
    ];

    //const [products, setProducts] = useState([]);

    /*async function getDados(){
        console.log("entrou getDados");

        try {
            let d = await api.get('/produtos');

            if(d.status === 200){
                console.log(d.data);
                setProducts(d.data)
            }else{
                console.log("404");
            }
            
        } catch (error) {
            console.log("erro" + error)
        }
    }

    useEffect(() => {
        getDados();
    },[]);*/

    return (
        <div>
          <ProductList products={products} />
        </div>
      );
}

export default Home;