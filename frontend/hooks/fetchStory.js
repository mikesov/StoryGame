import { useState, useEffect } from "react";
import axios from "axios";
import request from "./request";

const fetchStory = (endpoint, id) => {
  const [stories, setStory] = useState({});
  const [isLoading, setIsLoading] = useState(false);
  const [error, setError] = useState(null);

  const options = request(endpoint, id);

  const fetchData = async () => {
      setIsLoading(true);
      
      try {
          const response = await axios.request(options);
          
          // console.log(response.data);
          setStory(response.data);
          // console.log(stories);
          setIsLoading(false);
      }
      catch (error) {
          setError(error);
          console.log(error);
      } finally {
          setIsLoading(false);
      }
  }

  useEffect(() => {
      fetchData();
  }, []);

  const refetch = () => {
      setIsLoading(true);
      fetchData();
  };

  return { stories, isLoading, error, refetch };
};




export {fetchStory};