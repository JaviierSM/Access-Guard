import React from "react";
import { Link } from "react-scroll";
import styles from "./Home.module.css";

const Home = () => {
  return (
    
    <div name="Home" className={styles.home}>
      <div className={styles.titleContainer}>
        <p>
        Manage your access control, <br />
          <b>keep your safety</b>
        </p>
        <p>
          With the best <br />
          <b>system control</b>
        </p>
      </div>
      <div className={styles.ctaContainer}>
        <Link
          to="Services"
          smooth
          duration={500}
          className={styles.callToAction}
        >
          Test
        </Link>
        <Link
          to="Services"
          smooth
          duration={500}
          className={styles.callToAction}
        >
          Get a Quote
        </Link>
      </div>
      
    </div>
      
  );
};

export default Home;
