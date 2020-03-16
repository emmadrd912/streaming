function successCB(data) {
    // console.log(data);
    let stored = JSON.parse(data);
    console.log(stored.results[0].id);
  };
          
  function errorCB(data) {
            console.log("Error callback: " + data);
      };
  
  const film = theMovieDb.search.getMovie({"query":"Fight Club"}, successCB, errorCB);