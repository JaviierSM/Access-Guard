import "./App.css";
import "bootstrap/dist/css/bootstrap.min.css";
import { BrowserRouter as Router, Route, Routes } from "react-router-dom";
import { Show } from "./components/Show";
import Edit from "./components/Edit";
import Create from "./components/Create";
import Read from "./components/Read";

function App() {
  return (
    <div className="App">
      <Router>
        <Routes>
          <Route path="/" element={<Show />} />
          <Route path="/create" element={<Create />} />
          <Route path="/edit/:id" element={<Edit />} />
          <Route path="/read/:id" element={<Read />} />
        </Routes>
      </Router>
    </div>
  );
}

export default App;
