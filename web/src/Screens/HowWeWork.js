import React from "react";
import styles from "./HowWeWork.module.css";
import Step from "../Components/Step";

const HowWeWork = () => {
  const steps = [
    {
      text: " Integration with IoT.",
      id: 1,
    },
    {
      text: " Deployment and Implementation.",
      id: 2,
    },
    {
      text: " Data Management and Security.",
      id: 3,
    },
    {
      text: " Support and maintenance.",
      id: 4,
    },
    {
      text: " Don't miss out on the benefits and hire our services.",
      id: 5,
    },
  ];

  return (
    <div name="HowWeWork" className={styles.howWeWork}>
      <h2 className={styles.title}>How We Work</h2>
      {steps.map((x) => (
        <Step text={x.text} step={x.id} />
      ))}
    </div>
  );
};

export default HowWeWork;
