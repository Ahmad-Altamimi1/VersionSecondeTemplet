import React, { useEffect, useState } from "react";
import { useQuery } from "react-query";
import { Link } from "react-router-dom";
import axios from "axios";
import Tabs from "./Tabs";
import Box from "./box";
import formatDate from "../../hook/FormatDate";

export default function () {
  const baseURL = "http://127.0.0.1:8000/";
  const RecentTags = async () => {
    const response = await axios.get(`${baseURL}api/testtag`);
    return response.data.tags;
  };

  const { data: tags, isLoadingtag, isErrortag } = useQuery("tags", RecentTags);
  return (
    <>
      <div className="row page_margin_top_section">
        <div className="column column_2_3">
          <h4 className="box_header">{tags && tags[0] && tags[0].TITLE}</h4>
          <div className="row">
            <ul className="blog column column_1_2">
              {tags && tags[0] && (
                <li className="post">
                  <Link
                    to={`/post/${tags[0].posts[0].TITLE}`}
                    title={tags[0].posts[0].TITLE}
                  >
                    <span className="icon gallery" />
                    <img
                      src={baseURL + tags[0].posts[0].Main_IMG}
                      alt={tags[0].posts[0].TITLE}
                    />
                  </Link>
                  <h2 className="with_number">
                    <Link
                      to={`/post/${tags[0].posts[0].TITLE}`}
                      title={tags[0].posts[0].TITLE}
                    >
                      {tags[0].posts[0].TITLE}
                    </Link>
                    {/* <Link
                    className="comments_number"
                    to="post.html#comments_list"
                    title="2 comments"
                  >
                    2<span className="arrow_comments" />
                  </Link> */}
                  </h2>
                  <ul className="post_details">
                    <li className="category">
                      <Link
                        to={`/tag/${tags[0].posts[0].tag.TITLE}`}
                        title={tags[0].posts[0].tag.TITLE}
                      >
                        {tags[0].posts[0].tag.TITLE}
                      </Link>
                    </li>
                    <li className="date">
                      {formatDate(tags[0].posts[0].DATE)}
                    </li>
                  </ul>
                  <p>{}</p>
                  <Link
                    className="read_more"
                    to={`/tag/${tags[0].TITLE}`}
                    title={tags[0].TITLE}
                  >
                    <span className="arrow" />
                    <span>قراءة المزيد</span>
                  </Link>
                </li>
              )}
            </ul>
            <div className="column column_1_2">
              <ul className="blog small clearfix">
                {tags &&
                  tags[0].posts.slice(1, 3).map((post) => (
                    <li className="post">
                      <Link
                        to="post.html"
                        title="Bayern Says Ties With Rivals Dortmund Have Frozen"
                      >
                        <img
                          src={baseURL + post.Main_IMG}
                          alt={post.TITLE}
                          width={"100"}
                          height={"100"}
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
              </ul>
              <Link className="more page_margin_top" to="#">
                مشاهدة أكثر في
                {tags && tags[0] && ` ${tags[0].TITLE}`}
              </Link>
            </div>
          </div>
        </div>
        <div className="column column_1_3">
          <h4 className="box_header">Categories</h4>
          <ul className="taxonomies columns clearfix page_margin_top">
            <li>
              <Link to="category_world.html" title="WORLD">
                WORLD
              </Link>
            </li>
            <li>
              <Link to="category_health.html" title="HEALTH">
                HEALTH
              </Link>
            </li>
            <li>
              <Link to="category_sports.html" title="SPORTS">
                SPORTS
              </Link>
            </li>
            <li>
              <Link to="category_science.html" title="SCIENCE">
                SCIENCE
              </Link>
            </li>
            <li>
              <Link to="category_lifestyle.html" title="LIFESTYLE">
                LIFESTYLE
              </Link>
            </li>
          </ul>
          <h4 className="box_header page_margin_top_section">Tags</h4>
          <ul className="taxonomies clearfix page_margin_top">
            <li>
              <Link to="#" title="Business">
                BUSINESS
              </Link>
            </li>
            <li>
              <Link to="#" title="Education">
                EDUCATION
              </Link>
            </li>
            <li>
              <Link to="#" title="Family">
                FAMILY
              </Link>
            </li>
            <li>
              <Link to="#" title="Film">
                FILM
              </Link>
            </li>
            <li>
              <Link to="#" title="Food">
                FOOD
              </Link>
            </li>
            <li>
              <Link to="#" title="Garden">
                GARDEN
              </Link>
            </li>
            <li>
              <Link to="#" title="People">
                PEOPLE
              </Link>
            </li>
            <li>
              <Link to="#" title="Sport">
                SPORT
              </Link>
            </li>
          </ul>
        </div>
      </div>
    </>
  );
}
