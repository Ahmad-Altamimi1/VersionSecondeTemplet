import React, { useEffect, useState } from "react";
import { useQuery } from "react-query";
import { Link } from "react-router-dom";
import axios from "axios";
import formatDate from "../../hook/FormatDate";
import Slider from "react-slick";
import "slick-carousel/slick/slick.css";
import "slick-carousel/slick/slick-theme.css";
export default function () {
  const baseURL = "http://127.0.0.1:8000/";
  const PopularVideos = async () => {
    const response = await axios.get(`${baseURL}api/PopularVideos`);
    return response.data.PopularVideos;
  };
  const {
    data: videos,
    isLoadingtag,
    isErrortag,
  } = useQuery("videos", PopularVideos);
  const settings = {
    infinite: true,
    speed: 500,
    slidesToShow: 1,
    slidesToScroll: 1,
  };
  return (
    <>
      <h4 className="box_header page_margin_top_section">الفيديوهات</h4>
      <div className="horizontal_carousel_container big page_margin_top">
        {/* <ul className="blog horizontal_carousel visible-1 autoplay-0 scroll-1 navigation-1 easing-easeInOutQuint duration-750"> */}
        <Slider {...settings}>
          {videos &&
            videos.map((video) => (
              <li className="post">
                <Link to={`/video/${video.TITLE}`} title={video.TITLE}>
                  <span className="icon video" />
                  <img src={baseURL + video.IMG} alt={video.TITLE} />
                </Link>
                <h5 className="with_number">
                  <Link to={`/video/${video.TITLE}`} title={video.TITLE}>
                    {video.TITLE}
                  </Link>
                </h5>
                <ul className="post_details simple">
                  <li className="category">
                    <Link
                      to={`/video/${video.tag.TITLE}`}
                      title={video.tag.TITLE}
                    >
                      {video.tag.TITLE}
                    </Link>
                  </li>
                  <li className="date">{formatDate(video.DATE)}</li>
                </ul>
              </li>
            ))}
        </Slider>
        {/* </ul> */}
      </div>
    </>
  );
}
