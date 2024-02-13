import React from "react";
import styles from "./Services.module.css";
import Step from "../Components/Step";

const Services = () => {
  const steps = [
    {
      text: " Security Consulting and Evaluation.",
      id: 1,
    },
    {
      text: " Custom Design and Development.",
      id: 2,
    },
    {
      text: " Installation and commissioning.",
      id: 3,
    },
    {
      text: " Data Management and Security.",
      id: 4,
    },
    
  ];

  return (
    <div name="Services" className={styles.services}>
      <p>We solve security problems by registering biometric data.</p>
      {steps.map((x) => (
        <Step text={x.text} step={x.id} />
      ))}
      <img
        className={styles.webImage}
        src={require("../assets/images/lectorHuellas.jpg")}
      ></img>
    </div>
  );
};

export default Services;
