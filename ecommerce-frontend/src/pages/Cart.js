import React, { useContext } from 'react';
import { CartContext } from '../context/CartContext';

const Cart = () => {
  const { cartItems, removeFromCart } = useContext(CartContext);

  return (
    <div className="p-4">
      <h1 className="text-2xl font-bold mb-4">Carrinho</h1>
      {cartItems.length === 0 ? (
        <p>Seu carrinho está vazio.</p>
      ) : (
        cartItems.map(item => (
          <div key={item.id} className="border p-4 mb-2">
            <h2>{item.title}</h2>
            <p>${item.price}</p>
            <button onClick={() => removeFromCart(item.id)} className="text-red-500">Remover</button>
          </div>
        ))
      )}
    </div>
  );
};

export default Cart;
