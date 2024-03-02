import React, { useEffect, useState } from "react";
import { useQuery } from "react-query";
import axios from "axios";
import { Link } from "react-router-dom";

export default function CheckIfHaveTag({ child }) {
  const [childtags, setChildTags] = useState(null);
  const [isLoading, setIsLoading] = useState(true);
  const [isError, setIsError] = useState(false);

  const fetchChildTagsData = async () => {
    try {
      const response = await axios.get(
        `http://127.0.0.1:8000/api/childtags/${child.id}`
      );
      setChildTags(response.data);
      setIsLoading(false);
      setIsError(false);
    } catch (error) {
      setIsError(true);
      setIsLoading(false);
    }
  };

  useEffect(() => {
    const intervalId = setInterval(() => {}, 2000);

    // Fetch data immediately when the component mounts
    fetchChildTagsData();

    return () => {
      clearInterval(intervalId);
    };
  }, [child]);

  if (isError || isLoading) {
    return null;
  }

  return (
    <>
      {childtags && childtags.children && (
        <ul>
          <>
            {childtags.children.map((childTag) => (
              <>
                <li
                  key={childTag.id}
                  className={
                    childTag.children && childTag.children.length > 0
                      ? "submenu"
                      : ""
                  }
                >
                  <Link to={`/tag/${childTag.TITLE}`}>{childTag.TITLE}</Link>
                  <ul>
                    {childTag.children &&
                      childTag.children.map((childTagse) => (
                        <>
                          <li key={childTagse.id}>
                            <Link to={`/tag/${childTagse.TITLE}`}>
                              {childTagse.TITLE}
                            </Link>
                          </li>
                        </>
                      ))}
                  </ul>
                </li>
              </>
            ))}
          </>
        </ul>
      )}
    </>
  );
}
