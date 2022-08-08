import './App.css';
import { Routes, Route } from 'react-router-dom';

import { SelectRestaurant } from './SelectRestaurant/SelectRestaurant';
import { SelectMode } from './SelectMode/SelectMode';

function App() {
  return (
    <Routes>
      <Route path="/" element={<SelectRestaurant />} />
      <Route path="/selectMode/:id" element={<SelectMode token="dk218dmZ1k" />}/>
    </Routes>
  );
}

export default App;
