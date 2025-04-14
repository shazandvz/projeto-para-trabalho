import React, { useEffect, useState, useContext } from 'react';
import { useParams } from 'react-router-dom';
import { CartContext } from '../context/CartContext';

const Product = () => {
  const { id } = useParams();
  const [product, setProduct] = useState(null);
  const { addToCart } = useContext(CartContext);

  useEffect(() => {
    fetch(`https://fakestoreapi.com/products/${id}`)
      .then(res => res.json())
      .then(data => setProduct(data));
  }, [id]);

  if (!product) return <div>Carregando...</div>;

  return (
    <div className="p-4">
      <h1 className="text-2xl font-bold">{product.title}</h1>
      <img src={product.image} alt={product.title} className="h-60 object-contain" />
      <p>{product.description}</p>
      <p className="text-xl font-semibold">${product.price}</p>
      <button onClick={() => addToCart(product)} className="bg-blue-500 text-white px-4 py-2 mt-2 rounded">Adicionar ao Carrinho</button>
    </div>
  );
};

export default Product;
