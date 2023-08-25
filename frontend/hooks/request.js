const request = (endpoint, id = null) => {
  const options = id == null ? {
    method: "GET",
    url: `http://192.168.1.9:8000/api/${endpoint}`,
  } : {
    method: "GET",
    url: `http://192.168.1.9:8000/api/${endpoint}/${id}`,
  }
  return options;
}

export default request;
