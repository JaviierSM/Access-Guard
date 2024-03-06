import React, { useState } from "react";
import { useNavigate } from "react-router-dom";
import { collection, addDoc } from "firebase/firestore";
import { db } from "../FirebaseConfig/Firebase";

const Create = () => {
  const [area, setArea] = useState("");
  const [name, setName] = useState("");
  const navigate = useNavigate();

  const employeesCollection = collection(db, "employees");

  const store = async (e) => {
    e.preventDefault();
    await addDoc(employeesCollection, {
      area: area,
      name: name, 
    });
    navigate("/");
  };

  return (
    <div className="container">
      <div className="row">
        <div className="col">
          <h1>Agregar empledo</h1>
          <form onSubmit={store}>
            <div className="mb-3">
              <label className="form-label">Nombre</label>
              <input
                value={name}
                onChange={(e) => setName(e.target.value)}
                type="text"
                className="form-control"
              />
            </div>
            <div className="mb-3">
              <label className="form-label">Puesto/Permiso</label>
              <input
                value={area}
                onChange={(e) => setArea(e.target.value)}
                type="text"
                className="form-control"
              />
            </div>
            <button type="submit" className="btn btn-success">Guardar</button>
          </form>
        </div>
      </div>
    </div>
  );
};

export default Create;
