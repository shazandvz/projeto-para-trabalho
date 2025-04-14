import React, { useState, useEffect, useContext } from 'react';
import { FirebaseContext } from '../context/FirebaseContext';

const Chat = () => {
  const { sendMessage, messages, userName } = useContext(FirebaseContext);
  const [message, setMessage] = useState('');

  const handleSendMessage = () => {
    if (message.trim()) {
      sendMessage(message);
      setMessage('');
    }
  };

  return (
    <div className="p-4">
      <h1 className="text-2xl font-bold mb-4">Chat ao vivo - {userName}</h1>
      <div className="mb-4">
        {messages.map((msg, index) => (
          <div key={index} className="mb-2">
            <strong>{msg.user}: </strong>{msg.text}
          </div>
        ))}
      </div>
      <input
        type="text"
        value={message}
        onChange={(e) => setMessage(e.target.value)}
        className="border p-2 w-full mb-2"
        placeholder="Digite uma mensagem..."
      />
      <button onClick={handleSendMessage} className="bg-blue-500 text-white px-4 py-2 rounded">Enviar</button>
    </div>
  );
};

export default Chat;
