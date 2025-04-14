import React, { useEffect, useState } from 'react';
import { Link } from 'react-router-dom';

const Home = () => {
  const [products, setProducts] = useState([]);

  useEffect(() => {
    fetch('https://fakestoreapi.com/products')
      .then(res => res.json())
      .then(data => setProducts(data));
  }, []);

  return (
    <div className="p-4 grid grid-cols-1 md:grid-cols-3 gap-4">
      {products.map(product => (
        <div key={product.id} className="border p-4 rounded shadow">
          <h2 className="text-lg font-bold">{product.title}</h2>
          <img src={product.image} alt={product.title} className="h-40 object-contain" />
          <p>${product.price}</p>
          <Link to={`/product/${product.id}`} className="text-blue-500 underline">Ver Produto</Link>
        </div>
      ))}
    </div>
  );
};

export default Home;
