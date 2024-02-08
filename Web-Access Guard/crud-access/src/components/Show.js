import React, {useState, useEffect} from 'react'
import { Link } from 'react-router-dom'
import {collection, getDocs, getDoc, deleteDoc} from 'firebase/firestore'
import { db } from '../firebaseConfig/firebase'

import Swal from 'sweetalert2'
import withReactContent from 'sweetalert2-react-content'
const MySwal = withReactContent(Swal);

const Show = () => {
  // 1 - configuración de los hooks

  // 2 - referenciamos a la DB firestore

  // 3 - función para mostrar TODOS los docs

  // 4 - función para eliminar un doc

  // 5 - función de confirmación para sweet alert 2

  // 6 - usamos useEffect

  // 7 - retornamos la vista 
  return (
    <div>Show</div>
  )
}

export default Show