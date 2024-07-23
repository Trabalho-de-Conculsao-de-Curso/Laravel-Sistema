import React from 'react';
import { BrowserRouter as Router, Route, Routes } from 'react-router-dom';
import Header from './components/Header';
import Home from './pages/Home';
import CreateProduct from './pages/CreateProduct';
import Index from './pages/index'

function App() {
  return (
    <Router>
      <div >
        <Routes>
          <Route path="/" element={<Home />} />
          <Route path="/index" element={<Index />} />
          <Route path="/create" element={<CreateProduct />} />
        </Routes>
      </div>
    </Router>
  );
}

export default App;
