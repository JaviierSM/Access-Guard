import React, { useState, useEffect } from "react";
import { Link } from "react-router-dom";
import { collection, getDocs, doc, deleteDoc } from "firebase/firestore";
import { db } from "../FirebaseConfig/Firebase";
import Swal from "sweetalert2";
import withReactContent from "sweetalert2-react-content";

const MySwal = withReactContent(Swal);

export const Show = () => {
  const [employees, setEmployees] = useState([]);
  const employeesCollection = collection(db, "employees");

  const getEmployees = async () => {
    const data = await getDocs(employeesCollection);
    setEmployees(data.docs.map((doc) => ({ ...doc.data(), id: doc.id })));
  };

  const deleteEmployee = async (id) => {
    const employeeDoc = doc(db, "employees", id);
    await deleteDoc(employeeDoc);
    getEmployees();
  };

  const confirmDelete = (id) => {
    MySwal.fire({
        title: "¿Estás seguro?",
        text: "Una vez eliminado, no podrás recuperar este producto",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        confirmButtonText: "Sí, eliminar",
        cancelButtonText: "No, cancelar",
        }).then((result) => {
        if (result.isConfirmed) {
            deleteEmployee(id);
            Swal.fire(id);
            MySwal.fire("Eliminado", "El empleado ha sido eliminado", "success");
        }
    })
  }

  useEffect(() => {
    getEmployees();
  }, []);

  return (
    <>
      <div className="container">
        <div className="row">
          <div className="col">
            <div className="d-grid gap-2">
              <Link to="/create" className="btn btn-primary">
                Crear
              </Link>
            </div>
            <br />
            <table className="table table-dark table hover">
              <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Area/Puesto/Permiso</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                {employees.map((employee) => (
                  <tr key={employee.id}>
                    <td>{employee.name}</td>
                    <td>{employee.area}</td>
                    <td>
                      <Link
                        to={`/edit/${employee.id}`}
                        className="btn btn-light"
                      >
                        <i className="fa-regular fa-pen-to-square"></i>
                      </Link>
                      <Link
                        to={`/read/${employee.id}`}
                        className="btn btn-success"
                      >
                        <i class="fa-regular fa-eye"></i>
                      </Link>
                      <button
                        onClick={() => confirmDelete(employee.id)}
                        className="btn btn-danger"
                      >
                        <i className="fa-solid fa-trash"></i>
                      </button>
                    </td>
                  </tr>
                ))}
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </>
  );
};
