import React, { useEffect, useState } from "react";
import { useQuery } from "react-query";
import { Link } from "react-router-dom";
import axios from "axios";
import formatDate from "../../hook/FormatDate";
import Slider from "react-slick";
import "slick-carousel/slick/slick.css";
import "slick-carousel/slick/slick-theme.css";
import { PrevArrow, NextArrow } from "../../hook/CustomArrows";
export default function () {
  const baseURL = "http://127.0.0.1:8000/";
  const PopularPosts = async () => {
    const response = await axios.get(`${baseURL}api/PopularPosts`);
    return response.data.posts;
  };
  const {
    data: posts,
    isLoadingtag,
    isErrortag,
  } = useQuery("posts", PopularPosts);
  const settings = {
    infinite: true,
    speed: 500,
    slidesToShow: 3,
    slidesToScroll: 1,
  };

  return (
    <>
      <div className="row page_margin_top_section">
        <div className="column column_1_1">
          <h4 className="box_header">مقالات مختاره</h4>
          {posts && (
            <div className="horizontal_carousel_container page_margin_top">
              <ul className="blog  ">
                <Slider {...settings}>
                  {posts &&
                    posts.map((post) => (
                      <li className="post">
                        <Link to={`/post/${post.TITLE}`} title={post.TITLE}>
                          <img src={baseURL + post.Main_IMG} alt={post.TITLE} />
                        </Link>
                        <h5>
                          <Link to={`/post/${post.TITLE}`} title={post.TITLE}>
                            {post.TITLE}
                          </Link>
                        </h5>
                        <ul className="post_details simple">
                          <li className="category">
                            <Link
                              to={`/tag/${post.tag.TITLE}`}
                              title={post.tag.TITLE}
                            >
                              {post.tag.TITLE}
                            </Link>
                          </li>
                          <li className="date">{formatDate(post.DATE)}</li>
                        </ul>
                      </li>
                    ))}
                </Slider>
              </ul>
            </div>
          )}
        </div>
      </div>
    </>
  );
}
