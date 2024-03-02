import React, { useEffect, useState } from "react";
import { useQuery } from "react-query";
import { Link } from "react-router-dom";
import axios from "axios";
import Slider from "react-slick";
import formatDate from "../../hook/FormatDate";

export default function () {
  const baseURL = "http://127.0.0.1:8000/";
  const RecentTags = async () => {
    const response = await axios.get(`${baseURL}api/Tabstags`);
    return response.data.tags;
  };
  const settings = {
    infinite: true,
    speed: 500,
    slidesToShow: 3,
    slidesToScroll: 1,
    vertical: true, // Set vertical to true
    verticalSwiping: true, // Enable vertical swiping if needed
  };
  const { data: tags, isLoadingtag, isErrortag } = useQuery("tags", RecentTags);
  return (
    <>
      {tags &&
        tags.slice(0, 2).map((tag) => (
          <>
            <h4 className="box_header page_margin_top_section">{tag.TITLE}</h4>
            <div className="vertical_carousel_container clearfix">
              {/* <ul className="blog small vertical_carousel autoplay-1 scroll-1 navigation-1 easing-easeInOutQuint duration-750"> */}
              <Slider {...settings}>
                {tag.posts &&
                  tag.posts.slice(0, 6).map((post) => (
                    <li className="post smallpost">
                      <Link to={`/post/${post.TITLE}`} title={post.TITLE}>
                        <span className="icon small gallery" />
                        <img
                          className="smalimage"
                          src={baseURL + post.Main_IMG}
                          alt={post.TITLE}
                          width={100}
                          height={100}
                        />
                      </Link>
                      <div className="post_content">
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
                      </div>
                    </li>
                  ))}
              </Slider>
              {/* </ul> */}
            </div>
          </>
        ))}
    </>
  );
}
