import React from "react";

const PrevArrow = (props) => {
  //   const { className, style, onClick } = props;
  return (
    <div
      className={`slider_control left slider_control_1 `}
      //   style={{ ...style, display: "block" }}
      //   onClick={onClick}
    />
  );
};

const NextArrow = () => {
  //   const { className, style, onClick } = props;
  return (
    <a
      class="slider_control right slider_control_0  slideLeftBack"
      href="#"
      title="next"
    ></a>
  );
};

export { PrevArrow, NextArrow };
