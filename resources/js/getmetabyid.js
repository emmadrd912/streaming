const theMovieDb = require('./TMDB');
function searchfilmbyname(name)
{
  const film = theMovieDb.search.getMovie({"query":name}, getfilmidbyname, errorgetfilmidbyname);
  
  function getfilmidbyname(data) 
  {
    let stored = JSON.parse(data);
    id = stored.results[0].id;
    return id
  };
  console.log(getfilmidbyname())
          
  function errorgetfilmidbyname(data) 
  {
    console.log("Error callback: " + data);
  }
}

function getcomment(id)
{
  const film = theMovieDb.movies.getById({"id":id}, getcommentbyid, errorgetcommentbyid);
  
  function getcommentbyid(data) 
  {
    let stored = JSON.parse(data);
    console.log(stored.overview);
  };
          
  function errorgetcommentbyid(data) 
  {
    console.log("Error callback: " + data);
  };
};

function releasedate(id)
{
  const film = theMovieDb.movies.getById({"id":id}, releasedatebyid, errorreleasedatebyid);
  
  function releasedatebyid(data) 
  {
    let stored = JSON.parse(data);
    console.log(stored.release_date);
  };
          
  function errorreleasedatebyid(data) 
  {
    console.log("Error callback: " + data);
  };
};

function gender(id)
{
  const film = theMovieDb.movies.getById({"id":id}, genderbyid, errorgenderbyid);
  
  function genderbyid(data) 
  {
    let stored = JSON.parse(data);
    for (let i = 0; i < stored.genres.length; i++) 
    {
        console.log(stored.genres[i].name);
    }
  };
          
  function errorgenderbyid(data) 
  {
    console.log("Error callback: " + data);
  };
};

function vote(id)
{
  const film = theMovieDb.movies.getById({"id":id}, votebyid, errorvotebyid);
  
  function votebyid(data) 
  {
    let stored = JSON.parse(data);
    console.log(stored.vote_average);
  };
          
  function errorvotebyid(data) 
  {
    console.log("Error callback: " + data);
  };
};
searchfilmbyname('Ad Astra')
// vote(id)
// gender(id)
// releasedate(id)
// getcomment(id)
