const theMovieDb = require('./TMDB');

function searchfilmbyname(name)
{
  const film = theMovieDb.search.getMovie({"query":name}, getfilmidbyname, errorgetfilmidbyname);
  
  function getfilmidbyname(data) 
  {
    let stored = JSON.parse(data);
    console.log(stored.results[0].id);
  };
          
  function errorgetfilmidbyname(data) 
  {
    console.log("Error callback: " + data);
  };
};
searchfilmbyname('Ad Astra')
