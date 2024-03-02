import React, { useEffect, useState } from "react";
import { useQuery } from "react-query";
import { Link } from "react-router-dom";
import axios from "axios";
import Slider from "react-slick";

import formatDate from "../../hook/FormatDate";

export default function () {
  const settings = {
    infinite: true,
    speed: 500,
    slidesToShow: 3,
    slidesToScroll: 1,
  };
  const baseURL = "http://127.0.0.1:8000/";
  const Tabstags = async () => {
    const response = await axios.get(`${baseURL}api/Tabstags`);
    return response.data.tags;
  };
  const { data: tags, isLoadingtag, isErrortag } = useQuery("tags", Tabstags);
  const [postInTap, setPostInTap] = useState([]);
  useEffect(() => {
    if (tags) {
      console.log(tags, "tagstagstags");
      console.log(postInTap, "postInTappostInTap");
      setPostInTap(tags[0].posts);
    } else {
      setPostInTap([]);
    }
  }, [tags]);

  useEffect(() => {
    console.log("yes");
  }, [postInTap]);
  return (
    <>
      <div className="row page_margin_top_section">
        <h4 className="box_header">مواضيع أخرى</h4>
        <div className="tabs no_scroll margin_top_10 clearfix">
          <ul className="tabs_navigation small clearfix">
            {tags &&
              tags.map((tag) => (
                <li>
                  <Link
                    onClick={(e) => {
                      setPostInTap(tag.posts);
                    }}
                    title={tag.TITLE}
                  >
                    {tag.TITLE}
                  </Link>
                </li>
              ))}
          </ul>

          <div className="horizontal_carousel_container page_margin_top">
            {/* <ul className="blog horizontal_carousel page_margin_top autoplay-0 scroll-1 navigation-1 easing-easeInOutQuint duration-750"> */}
            <Slider {...settings}>
              {postInTap &&
                postInTap.slice(0, 6).map((post, number) => (
                  <li className="post ">
                    <Link to={`/post/${post.TITLE}`} title={post.TITLE}>
                      <img
                        className="imageintaps"
                        src={baseURL + post.Main_IMG}
                        alt={post.TITLE}
                      />
                    </Link>
                    <h5>
                      {/* <span className="number">{number + 1}.</span> */}
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

            {/* </ul> */}
          </div>
        </div>
      </div>
    </>
  );
}
