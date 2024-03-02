import React, { useEffect, useState } from "react";
import { useQuery } from "react-query";
import { Link } from "react-router-dom";
import axios from "axios";

import formatDate from "../../hook/FormatDate";
import TowSlider from "./TowSlider";
import VideoSection from "./VideoSection";
export default function () {
  const baseURL = "http://127.0.0.1:8000/";
  const RecentTags = async () => {
    const response = await axios.get(`${baseURL}api/Tabstags`);
    return response.data.tags;
  };

  const { data: tags, isLoadingtag, isErrortag } = useQuery("tags", RecentTags);
  return (
    <>
      <div className="column column_1_3">
        {tags &&
          tags.slice(0, 3).map((tag) => (
            <>
              <h4 className="box_header">{tag.TITLE}</h4>
              <ul className="blog small_margin clearfix">
                <li className="post">
                  <Link
                    to={`/post/${tag.posts[0].TITLE}`}
                    title={tag.posts[0].TITLE}
                  >
                    <img
                      src={baseURL + tag.posts[0].Main_IMG}
                      alt={tag.posts[0].TITLE}
                      width={510}
                      height={187}
                    />
                  </Link>
                  <div className="post_content">
                    <h5>
                      <Link
                        to={`/post/${tag.posts[0].TITLE}`}
                        title={tag.posts[0].TITLE}
                      >
                        {tag.posts[0].TITLE}
                      </Link>
                    </h5>
                    <ul className="post_details simple">
                      <li className="category">
                        <Link
                          to={`/tag/${tag.posts[0].tag.TITLE}`}
                          title={tag.posts[0].tag.TITLE}
                        >
                          {tag.posts[0].tag.TITLE}
                        </Link>
                      </li>
                      <li className="date">{formatDate(tag.posts[0].DATE)}</li>
                    </ul>
                  </div>
                </li>
              </ul>
              <ul className="list">
                {tag.posts.slice(1, 6).map((post) => (
                  <li className="bullet style_1">
                    <Link to={`/post/${post.TITLE}`} title={post.TITLE}>
                      {post.TITLE}
                    </Link>
                  </li>
                ))}
              </ul>
            </>
          ))}

        <TowSlider />
        <VideoSection />
      </div>
    </>
  );
}
