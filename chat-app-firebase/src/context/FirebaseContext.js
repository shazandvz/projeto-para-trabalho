import React, { createContext, useState, useEffect } from 'react';
import { initializeApp } from 'firebase/app';
import { getFirestore, collection, addDoc, onSnapshot } from 'firebase/firestore';

// Configurações do Firebase
const firebaseConfig = {
  apiKey: 'SUA_API_KEY',
  authDomain: 'SEU_PROJECT_ID.firebaseapp.com',
  projectId: 'SEU_PROJECT_ID',
  storageBucket: 'SEU_PROJECT_ID.appspot.com',
  messagingSenderId: 'SEU_SENDER_ID',
  appId: 'SEU_APP_ID',
};

// Inicializar Firebase
const app = initializeApp(firebaseConfig);
const db = getFirestore(app);

// Contexto Firebase
export const FirebaseContext = createContext();

export const FirebaseProvider = ({ children }) => {
  const [messages, setMessages] = useState([]);
  const [userName, setUserName] = useState('');

  // Escuta em tempo real as mensagens
  useEffect(() => {
    const messagesRef = collection(db, 'messages');
    const unsubscribe = onSnapshot(messagesRef, (snapshot) => {
      setMessages(snapshot.docs.map((doc) => doc.data()));
    });

    return () => unsubscribe();
  }, []);

  // Enviar mensagem
  const sendMessage = async (text) => {
    try {
      await addDoc(collection(db, 'messages'), {
        user: userName,
        text,
        createdAt: new Date(),
      });
    } catch (e) {
      console.error('Erro ao enviar mensagem: ', e);
    }
  };

  return (
    <FirebaseContext.Provider value={{ sendMessage, messages, userName, setUserName }}>
      {children}
    </FirebaseContext.Provider>
  );
};
