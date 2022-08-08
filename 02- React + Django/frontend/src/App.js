import './App.css';
import { Routes, Route } from 'react-router-dom';

import { SelectRestaurant } from './SelectRestaurant/SelectRestaurant';

function App() {
  return (
    <Routes>
      <Route path="/" element={<SelectRestaurant />} />
      <Route path="/selectMode/:id" element={<h1>Ciao</h1>} />
    </Routes>
  );
}

export default App;
