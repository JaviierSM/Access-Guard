import React, { useState, useEffect } from "react";
import { useNavigate, useParams } from "react-router-dom";
import { doc, getDoc, updateDoc } from "firebase/firestore";
import { db } from "../FirebaseConfig/Firebase";

const Edit = () => {
  const [name, setName] = useState("");
  const [area, setArea] = useState(0);
  const navigate = useNavigate();
  const { id } = useParams();

  const getEmployeeById = async (id) => {
    try {
      const employeeSnapshot = await getDoc(doc(db, "employees", id));
      if (employeeSnapshot.exists()) {
        const employeeData = employeeSnapshot.data();
        setName(employeeData.name);
        setArea(employeeData.area);
      } else {
        console.log("No se encontró el trabajador");
      }
    } catch (error) {
      console.error("Error al obtener el trabajador:", error);
    }
  };

  useEffect(() => {
    getEmployeeById(id);
  }, [id]);

  const updateEmployee = async (e) => {
    e.preventDefault();
    const employeeRef = doc(db, "employees", id);
    const updatedData = { name: name, area: area };
    try {
      await updateDoc(employeeRef, updatedData);
      navigate("/");
    } catch (error) {
      console.error("Error al actualizar el empleado:", error);
    }
  };

  return (
    <div className="container">
      <div className="row">
        <div className="col">
          <h1>Editar empleado</h1>
          <form onSubmit={updateEmployee}>
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
            <button type="submit" className="btn btn-success">
              Guardar
            </button>
          </form>
        </div>
      </div>
    </div>
  );
};

export default Edit;
