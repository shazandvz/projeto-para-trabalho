import React, { useState, useContext } from 'react';
import { FirebaseContext } from '../context/FirebaseContext';
import { useNavigate } from 'react-router-dom';

const Login = () => {
  const [userName, setUserName] = useState('');
  const { setUserName: setContextUserName } = useContext(FirebaseContext);
  const navigate = useNavigate();

  const handleLogin = () => {
    setContextUserName(userName);
    navigate('/chat');
  };

  return (
    <div className="p-4 max-w-md mx-auto">
      <h1 className="text-2xl font-bold mb-4">Login</h1>
      <input
        type="text"
        value={userName}
        onChange={(e) => setUserName(e.target.value)}
        className="border p-2 w-full mb-2"
        placeholder="Digite seu nome"
      />
      <button onClick={handleLogin} className="bg-green-500 text-white px-4 py-2 rounded">Entrar</button>
    </div>
  );
};

export default Login;
