import React, { useEffect, useState } from "react";
import { useQuery } from "react-query";
import { Link } from "react-router-dom";
import axios from "axios";
import Tabs from "./Tabs";
import Box from "./box";
import Aside from "./aside";
import formatDate from "../../hook/FormatDate";

export default function () {
  const baseURL = "http://127.0.0.1:8000/";
  const RecentTags = async () => {
    const response = await axios.get(`${baseURL}api/testtag`);
    return response.data.tags;
  };

  const { data: tags, isLoadingtag, isErrortag } = useQuery("tags", RecentTags);

  const RecentPosts = async () => {
    const response = await axios.get(`${baseURL}api/LastPosts`);
    return response.data.posts;
  };

  const { data: posts, isLoading, isError } = useQuery("posts", RecentPosts);

  return (
    <>
      <div className="row page_margin_top">
        <div className="column column_2_3">
          {tags && <h4 className="box_header">أخر الأخبار</h4>}
          <div className="row">
            <ul className="blog big">
              {posts &&
                posts.map((post) => (
                  <li className="post" key={post.id}>
                    <Link to={`/post/${post.TITLE}`} title={post.TITLE}>
                      <img src={baseURL + post.Main_IMG} alt={post.TITLE} />
                    </Link>
                    <div className="post_content">
                      <h2 className="with_number">
                        <Link to={`/post/${post.TITLE}`} title={post.TITLE}>
                          {post.TITLE}
                        </Link>
                      </h2>
                      <ul className="post_details">
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
                      <p dir="rtl">{post.DESCRIPTION}</p>
                      <Link
                        className="read_more"
                        to={`/post/${post.TITLE}`}
                        title="قراءة المزيد"
                      >
                        <span className="arrow" />
                        <span>قراءة المزيد</span>
                      </Link>
                    </div>
                  </li>
                ))}
            </ul>
          </div>
          <Tabs />
          <Box />
        </div>
        <Aside />
      </div>
    </>
  );
}
