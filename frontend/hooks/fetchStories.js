import { useState, useEffect } from "react";
import axios from "axios";
import request from "./request";

const fetchStories = (endpoint) => {
    const [stories, setStories] = useState([]);
    const [isLoading, setIsLoading] = useState(false);
    const [error, setError] = useState(null);

    const options = request(endpoint);

    const fetchData = async () => {
        setIsLoading(true);
        
        try {
            const response = await axios.request(options);

            setStories(response.data);
            // console.log(data);
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

export {fetchStories};