import { useState, useEffect } from "react";
import axios from "axios";

const fetchStories = () => {
    const [stories, setStory] = useState([]);
    const [isLoading, setIsLoading] = useState(false);
    const [error, setError] = useState(null);

    const fetchData = async () => {
        setIsLoading(true);

        try {
            const response = await axios.request("http://127.0.0.1:8000/api/stories");

            setStory(response.data.data);
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

export default fetchStories;