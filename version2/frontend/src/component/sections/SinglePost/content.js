import React, { useEffect, useState } from "react";
import { useQuery } from "react-query";
import { Link, useParams } from "react-router-dom";
import axios from "axios";
import formatDate from "../../hook/FormatDate";
import Slider from "react-slick";
import "slick-carousel/slick/slick.css";
import "slick-carousel/slick/slick-theme.css";
import { PrevArrow, NextArrow } from "../../hook/CustomArrows";
export default function () {
  const { name } = useParams();

  const baseURL = "http://127.0.0.1:8000/";
  const GetSinglePost = async () => {
    const response = await axios.get(`${baseURL}api/SinglePost/${name}`);
    return response.data.Singlepost;
  };
  const {
    data: Singlepost,
    isLoading,
    isError,
    refetch,
  } = useQuery("Singlepost", GetSinglePost);

  const RecentPosts = async () => {
    const response = await axios.get(`${baseURL}api/LastPosts`);
    return response.data.posts;
  };
  const settings = {
    infinite: true,
    speed: 500,
    slidesToShow: 3,
    slidesToScroll: 1,
    vertical: true, // Set vertical to true
    verticalSwiping: true, // Enable vertical swiping if needed
  };

  const {
    data: posts,
    isLoadingtag,
    isErrortag,
  } = useQuery("posts", RecentPosts);

  const GetPopularPosts = async () => {
    const response = await axios.get(`${baseURL}api/PopularPosts`);
    return response.data.PopularPosts;
  };

  const {
    data: popularposts,
    isLoadingInPopularPosts,
    isErrorInPopularPosts,
  } = useQuery("popularposts", GetPopularPosts);
  useEffect(() => {
    refetch();
  }, [name]);
  return (
    <>
      <div className="page">
        <div className="page_layout page_margin_top clearfix">
          <hr className="divider page_margin_top" />
          {isLoading ? (
            <p>Loading...</p>
          ) : (
            <>
              <div className="row page_margin_top row-reverse">
                <div className="column column_2_3">
                  <div className="row">
                    <div className="post postdetails single">
                      <h1 className="post_title">{Singlepost.TITLE}</h1>
                      <ul className="post_details clearfix">
                        <li className="detail  category spicalcategory">
                          <span> في</span>
                          <Link
                            to={`/tag/${Singlepost.tag.TITLE}`}
                            title={Singlepost.tag.TITLE}
                          >
                            {" " + Singlepost.tag.TITLE}
                          </Link>
                        </li>
                        <li className="detail date">
                          {formatDate(Singlepost.DATE)}
                        </li>

                        <li className="detail views">
                          {Singlepost.SHOW} مشاهدة
                        </li>
                      </ul>
                      <Link
                        to={`/post/${Singlepost.TITLE}`}
                        title={Singlepost.TITLE}
                        className="post_image page_margin_top prettyPhoto"
                      >
                        <img
                          src={baseURL + Singlepost.Main_IMG}
                          alt={Singlepost.TITLE}
                        />
                      </Link>
                      <div className="sentence">
                        <span className="text">{Singlepost.PIC_Name}</span>
                        {/* <span className="author">John Smith, Flickr</span> */}
                      </div>
                      <div className="post_content  clearfix">
                        {/* <div className="content_box"> */}
                        <div
                          className="content_box"
                          dangerouslySetInnerHTML={{
                            __html: Singlepost.TEXT1,
                          }}
                        />
                        {/* </div> */}
                        <div className="author_box animated_element">
                          هنا
                          <div className="author">
                            <Link
                              title="Anna Shubina"
                              to="author.html"
                              className="thumb"
                            >
                              <img
                                alt="img"
                                src="https://tebkum.com/main_page/images/logo.png"
                              />
                            </Link>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div className="row page_margin_top">
                    <div className="share_box clearfix">
                      <label>Share:</label>
                      <ul className="social_icons clearfix">
                        <li>
                          <Link
                            target="_blank"
                            title=""
                            to="https://facebook.com/QuanticaLabs"
                            className="social_icon facebook"
                          >
                            &nbsp;
                          </Link>
                        </li>
                        <li>
                          <Link
                            target="_blank"
                            title=""
                            to="https://twitter.com/QuanticaLabs"
                            className="social_icon twitter"
                          >
                            &nbsp;
                          </Link>
                        </li>
                        <li>
                          <Link
                            title=""
                            to="mailto:contact@pressroom.com"
                            className="social_icon mail"
                          >
                            &nbsp;
                          </Link>
                        </li>
                        <li>
                          <Link title="" to="#" className="social_icon skype">
                            &nbsp;
                          </Link>
                        </li>
                        <li>
                          <Link
                            title=""
                            to="https://1.envato.market/quanticalabs"
                            className="social_icon envato"
                          >
                            &nbsp;
                          </Link>
                        </li>
                        <li>
                          <Link
                            title=""
                            to="#"
                            className="social_icon instagram"
                          >
                            &nbsp;
                          </Link>
                        </li>
                        <li>
                          <Link
                            title=""
                            to="#"
                            className="social_icon pinterest"
                          >
                            &nbsp;
                          </Link>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div className="row page_margin_top">
                    <ul className="taxonomies tags left clearfix">
                      {Singlepost.tags.map((tag) => (
                        <li>
                          <Link to={`/tag/${tag.TITLE}`} title={tag.TITLE}>
                            {tag.TITLE}
                          </Link>
                        </li>
                      ))}
                    </ul>
                    <ul className="taxonomies categories right clearfix">
                      <li>
                        <Link to="category_health.html" title="HEALTH">
                          {Singlepost.group.TITLE}
                        </Link>
                      </li>
                    </ul>
                  </div>
                  <div className="row page_margin_top_section">
                    <h4 className="box_header">Posts Carousel</h4>
                    <div className="horizontal_carousel_container page_margin_top">
                      <ul className="blog horizontal_carousel autoplay-1 scroll-1 navigation-1 easing-easeInOutQuint duration-750">
                        <li className="post">
                          <Link
                            to="Singlepost.html"
                            title="New Painkiller Rekindles Addiction Concerns"
                          >
                            <img
                              src="images/samples/330x242/image_08.jpg"
                              alt="img"
                            />
                          </Link>
                          <h5>
                            <Link
                              to="Singlepost.html"
                              title="New Painkiller Rekindles Addiction Concerns"
                            >
                              New Painkiller Rekindles Addiction Concerns
                            </Link>
                          </h5>
                          <ul className="post_details simple">
                            <li className="category">
                              <Link to="category_health.html" title="HEALTH">
                                HEALTH
                              </Link>
                            </li>
                            <li className="date">10:11 PM, Feb 02</li>
                          </ul>
                        </li>
                        <li className="post">
                          <Link
                            to="post_small_image.html"
                            title="High Altitudes May Aid Weight Control"
                          >
                            <img
                              src="images/samples/330x242/image_01.jpg"
                              alt="img"
                            />
                          </Link>
                          <h5>
                            <Link
                              to="post_small_image.html"
                              title="High Altitudes May Aid Weight Control"
                            >
                              High Altitudes May Aid Weight Control
                            </Link>
                          </h5>
                          <ul className="post_details simple">
                            <li className="category">
                              <Link to="category_health.html" title="HEALTH">
                                HEALTH
                              </Link>
                            </li>
                            <li className="date">10:11 PM, Feb 02</li>
                          </ul>
                        </li>
                        <li className="post">
                          <Link
                            to="post_gallery.html"
                            title="Built on Brotherhood, Club Lives Up to Name"
                          >
                            <span className="icon gallery">
                              {/*<span class="info">999</span>*/}
                            </span>
                            <img
                              src="images/samples/330x242/image_03.jpg"
                              alt="img"
                            />
                          </Link>
                          <h5>
                            <Link
                              to="post_gallery.html"
                              title="Built on Brotherhood, Club Lives Up to Name"
                            >
                              Built on Brotherhood, Club Lives Up to Name
                            </Link>
                          </h5>
                          <ul className="post_details simple">
                            <li className="category">
                              <Link to="category_health.html" title="HEALTH">
                                HEALTH
                              </Link>
                            </li>
                            <li className="date">10:11 PM, Feb 02</li>
                          </ul>
                        </li>
                        <li className="post first">
                          <Link
                            to="Singlepost.html"
                            title="Built on Brotherhood, Club Lives Up to Name"
                          >
                            <img
                              src="images/samples/330x242/image_09.jpg"
                              alt="img"
                            />
                          </Link>
                          <h5>
                            <Link
                              to="Singlepost.html"
                              title="Built on Brotherhood, Club Lives Up to Name"
                            >
                              Built on Brotherhood, Club Lives Up to Name
                            </Link>
                          </h5>
                          <ul className="post_details simple">
                            <li className="category">
                              <Link to="category_health.html" title="HEALTH">
                                HEALTH
                              </Link>
                            </li>
                            <li className="date">10:11 PM, Feb 02</li>
                          </ul>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div className="column column_1_3">
                  <>
                    <h4 className="box_header page_margin_top_section">
                      أخر المقالات
                    </h4>
                    <div className="vertical_carousel_container clearfix">
                      {/* <ul className="blog small vertical_carousel autoplay-1 scroll-1 navigation-1 easing-easeInOutQuint duration-750"> */}
                      <Slider {...settings}>
                        {posts &&
                          posts.slice(0, 6).map((post) => (
                            <li className="post smallpost">
                              <Link
                                to={`/post/${post.TITLE}`}
                                title={post.TITLE}
                              >
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
                                  <Link
                                    to={`/post/${post.TITLE}`}
                                    title={post.TITLE}
                                  >
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
                                  <li className="date">
                                    {formatDate(post.DATE)}
                                  </li>
                                </ul>
                              </div>
                            </li>
                          ))}
                      </Slider>
                      {/* </ul> */}
                    </div>
                  </>
                  <h4 className="box_header page_margin_top_section">
                    الأكثر مشاهدة
                  </h4>
                  <ul className="authors rating clearfix">
                    {isLoadingInPopularPosts ? (
                      <p>....LoadingInPopularPosts</p>
                    ) : (
                      popularposts &&
                      popularposts.map((post) => (
                        <li className="author">
                          <Link className="thumb">
                            <img
                              src={baseURL + post.Main_IMG}
                              alt={post.TITLE}
                              width={100}
                              height={100}
                            />
                            <span
                              className="number animated_element"
                              // data-value={34}
                            />
                          </Link>
                          <div className="details">
                            <h5>
                              <Link
                                to={`/post/${post.TITLE}`}
                                title={post.TITLE}
                              >
                                {post.TITLE}
                              </Link>
                            </h5>
                            {/* <h6>EDITOR</h6> */}
                          </div>
                        </li>
                      ))
                    )}
                  </ul>
                  {/* <h4 className="box_header page_margin_top_section">
                    Most Commented
                  </h4>
                  <div className="vertical_carousel_container clearfix">
                    <ul className="blog small vertical_carousel autoplay-1 scroll-1 navigation-1 easing-easeInOutQuint duration-750">
                      <li className="post">
                        <Link
                          to="post_gallery.html"
                          title="Study Linking Illnes and Salt Leaves Researchers Doubtful"
                        >
                          <span className="icon small gallery" />
                          <img
                            src="images/samples/100x100/image_06.jpg"
                            alt="img"
                          />
                        </Link>
                        <div className="post_content">
                          <h5>
                            <Link
                              to="post_gallery.html"
                              title="Study Linking Illnes and Salt Leaves Researchers Doubtful"
                            >
                              Study Linking Illnes and Salt Leaves Researchers
                              Doubtful
                            </Link>
                          </h5>
                          <ul className="post_details simple">
                            <li className="category">
                              <Link to="category_health.html" title="HEALTH">
                                HEALTH
                              </Link>
                            </li>
                            <li className="date">10:11 PM, Feb 02</li>
                          </ul>
                        </div>
                      </li>
                      <li className="post">
                        <Link
                          to="post_quote.html"
                          title="Syrian Civilians Trapped For Months Continue To Be Evacuated"
                        >
                          <img
                            src="images/samples/100x100/image_12.jpg"
                            alt="img"
                          />
                        </Link>
                        <div className="post_content">
                          <h5>
                            <Link
                              to="post_quote.html"
                              title="Syrian Civilians Trapped For Months Continue To Be Evacuated"
                            >
                              Syrian Civilians Trapped For Months Continue To Be
                              Evacuated
                            </Link>
                          </h5>
                          <ul className="post_details simple">
                            <li className="category">
                              <Link to="category_world.html" title="WORLD">
                                WORLD
                              </Link>
                            </li>
                            <li className="date">10:11 PM, Feb 02</li>
                          </ul>
                        </div>
                      </li>
                      <li className="post">
                        <Link
                          to="post_small_image.html"
                          title="Built on Brotherhood, Club Lives Up to Name"
                        >
                          <img
                            src="images/samples/100x100/image_02.jpg"
                            alt="img"
                          />
                        </Link>
                        <div className="post_content">
                          <h5>
                            <Link
                              to="post_small_image.html"
                              title="Built on Brotherhood, Club Lives Up to Name"
                            >
                              Built on Brotherhood, Club Lives Up to Name
                            </Link>
                          </h5>
                          <ul className="post_details simple">
                            <li className="category">
                              <Link to="category_sports.html" title="SPORTS">
                                SPORTS
                              </Link>
                            </li>
                            <li className="date">10:11 PM, Feb 02</li>
                          </ul>
                        </div>
                      </li>
                      <li className="post">
                        <Link
                          to="Singlepost.html"
                          title="Nuclear Fusion Closer to Becoming a Reality"
                        >
                          <img
                            src="images/samples/100x100/image_13.jpg"
                            alt="img"
                          />
                        </Link>
                        <div className="post_content">
                          <h5>
                            <Link
                              to="Singlepost.html"
                              title="Nuclear Fusion Closer to Becoming a Reality"
                            >
                              Nuclear Fusion Closer to Becoming a Reality
                            </Link>
                          </h5>
                          <ul className="post_details simple">
                            <li className="category">
                              <Link to="category_science.html" title="SCIENCE">
                                SCIENCE
                              </Link>
                            </li>
                            <li className="date">10:11 PM, Feb 02</li>
                          </ul>
                        </div>
                      </li>
                    </ul>
                  </div>
                  <h4 className="box_header page_margin_top_section">
                    Featured Videos
                  </h4>
                  <div className="horizontal_carousel_container big page_margin_top">
                    <ul className="blog horizontal_carousel visible-1 autoplay-0 scroll-1 navigation-1 easing-easeInOutQuint duration-750">
                      <li className="post">
                        <Link
                          to="post_video.html"
                          title="Struggling Nuremberg Sack Coach Verbeek"
                        >
                          <span className="icon video" />
                          <img
                            src="images/samples/330x242/image_03.jpg"
                            alt="img"
                          />
                        </Link>
                        <h5 className="with_number">
                          <Link
                            to="post_video.html"
                            title="Struggling Nuremberg Sack Coach Verbeek"
                          >
                            Struggling Nuremberg Sack Coach Verbeek
                          </Link>
                          <Link
                            className="comments_number"
                            to="post_video.html#comments_list"
                            title="2 comments"
                          >
                            2<span className="arrow_comments" />
                          </Link>
                        </h5>
                        <ul className="post_details simple">
                          <li className="category">
                            <Link to="category_sports.html" title="SPORTS">
                              SPORTS
                            </Link>
                          </li>
                          <li className="date">10:11 PM, Feb 02</li>
                        </ul>
                      </li>
                      <li className="post">
                        <Link
                          to="post_video_2.html"
                          title="Built on Brotherhood, Club Lives Up to Name"
                        >
                          <span className="icon video" />
                          <img
                            src="images/samples/330x242/image_14.jpg"
                            alt="img"
                          />
                        </Link>
                        <h5 className="with_number">
                          <Link
                            to="post_video_2.html"
                            title="Built on Brotherhood, Club Lives Up to Name"
                          >
                            Built on Brotherhood, Club Lives Up to Name
                          </Link>
                          <Link
                            className="comments_number"
                            to="post_video_2.html#comments_list"
                            title="2 comments"
                          >
                            2<span className="arrow_comments" />
                          </Link>
                        </h5>
                        <ul className="post_details simple">
                          <li className="category">
                            <Link to="category_sports.html" title="SPORTS">
                              SPORTS
                            </Link>
                          </li>
                          <li className="date">10:11 PM, Feb 02</li>
                        </ul>
                      </li>
                      <li className="post">
                        <Link
                          to="post_video.html"
                          title="New Painkiller Rekindles Addiction Concerns"
                        >
                          <span className="icon video" />
                          <img
                            src="images/samples/330x242/image_04.jpg"
                            alt="img"
                          />
                        </Link>
                        <h5 className="with_number">
                          <Link
                            to="post_video.html"
                            title="New Painkiller Rekindles Addiction Concerns"
                          >
                            New Painkiller Rekindles Addiction Concerns
                          </Link>
                          <Link
                            className="comments_number"
                            to="post_video.html#comments_list"
                            title="2 comments"
                          >
                            2<span className="arrow_comments" />
                          </Link>
                        </h5>
                        <ul className="post_details simple">
                          <li className="category">
                            <Link to="category_sports.html" title="SPORTS">
                              SPORTS
                            </Link>
                          </li>
                          <li className="date">10:11 PM, Feb 02</li>
                        </ul>
                      </li>
                    </ul>
                  </div>
                  <h4 className="box_header page_margin_top_section">
                    Categories
                  </h4>
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
                  </ul> */}
                </div>
              </div>
            </>
          )}
        </div>
      </div>
    </>
  );
}
