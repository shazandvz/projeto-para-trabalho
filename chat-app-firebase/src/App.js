import React, { useState, useEffect } from 'react';
import { BrowserRouter as Router, Routes, Route } from 'react-router-dom';
import Chat from './pages/Chat';
import Login from './pages/Login';
import { FirebaseProvider } from './context/FirebaseContext';

function App() {
  return (
    <FirebaseProvider>
      <Router>
        <Routes>
          <Route path="/" element={<Login />} />
          <Route path="/chat" element={<Chat />} />
        </Routes>
      </Router>
    </FirebaseProvider>
  );
}

export default App;
