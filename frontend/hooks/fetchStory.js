import { useState, useEffect } from "react";
import axios from "axios";
import request from "./request";

const fetchStory = (endpoint, id) => {
  const [story, setStory] = useState({});
  const [isLoading, setIsLoading] = useState(false);
  const [loading, setLoading] = useState(false);
  const [error, setError] = useState(null);

  const options = request(endpoint, id);

  const fetchData = async () => {
      setIsLoading(true);
      
      try {
          const response = await axios.request(options);
          
          // console.log(response.data);
          setStory(response.data);
          console.log(story);
          setIsLoading(false);
          setLoading(true);
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

  return { story, isLoading, loading, error, refetch };
};

export {fetchStory};