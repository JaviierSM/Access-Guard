import React from "react";
import styles from "./Benefits.module.css";
import { HiOutlineIdentification } from "react-icons/hi2";
import { MdOutlineSecurity } from "react-icons/md";
import { GiTentaclesSkull } from "react-icons/gi";
import { MdOutlineDashboardCustomize } from "react-icons/md";

const Benefits = () => {
  return (
    <div name="Benefits" className={styles.benefits}>
      <h2 className={styles.benefitTitle}>
        Benefits of having a biometric data security system
      </h2>
      <p>
        Accurate identification <HiOutlineIdentification />
      </p>
      <p>
        Greater security
        <MdOutlineSecurity />
      </p>
      <p>
        {" "}
        Fraud reduction <GiTentaclesSkull />
      </p>
      <p>
        Customization and scalability
        <MdOutlineDashboardCustomize />
      </p>
      
    </div>
  );
};

export default Benefits;
