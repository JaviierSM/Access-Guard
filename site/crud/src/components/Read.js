import React, { useState, useEffect } from "react";
import { useNavigate, useParams } from "react-router-dom";
import { doc, getDoc } from "firebase/firestore";
import { db } from "../FirebaseConfig/Firebase";

const Read = () => {
  const [employee, setEmployee] = useState(null);
  const navigate = useNavigate();
  const { id } = useParams();

  useEffect(() => {
    const fetchEmployee = async () => {
      try {
        const docRef = doc(db, "employees", id);
        const docSnap = await getDoc(docRef);
        if (docSnap.exists()) {
          setEmployee(docSnap.data());
        } else {
          console.log("No such document!");
        }
      } catch (error) {
        console.error("Error fetching employee: ", error);
      }
    };
    fetchEmployee();
  }, [id]);

  return (
    <div className="container">
      <div className="row">
        <div className="col">
          <h1>Detalles del Empleado</h1>
          {employee && (
            <div>
              <p><strong>Nombre:</strong> {employee.name}</p>
              <p><strong>Puesto/Permiso:</strong> {employee.area}</p>
            </div>
          )}
          <button className="btn btn-primary" onClick={() => navigate("/")}>
            Volver
          </button>
        </div>
      </div>
    </div>
  );
};

export default Read;
